<?php

namespace App\Http\Controllers\Cms;

use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Attribute_Value;
use App\Models\Product_Attribute;
use App\Models\ProductHistory;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Services\UploadImageToFirebase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    private $uploadImageToFirebase;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        UploadImageToFirebase $uploadImageToFirebase
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->uploadImageToFirebase = $uploadImageToFirebase;
    }

    public function index(Request $request)
    {
        $options = $request->all();
        $products = $this->productRepository->query($options)->get();
        $categories = $this->categoryRepository->all();

        return view('cms.product.index', compact('options', 'products', 'categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();

        return view('cms.product.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            if (!empty($request->file('image'))) {
                $checkExtensionImage = checkExtensionImage($request->file('image'));
                if (!$checkExtensionImage) {
                    return redirect()->back()->withInput()->with('error', __('Only PNG, JPEG and JPG files can be uploaded.'));
                }
            }

            $data = $request->all();
            // Upload image
            if ($request->hasFile('image')) {
                $imageUpload = $request->file('image');
                $convertImageToBase64 = 'data:' . $imageUpload->getMimeType() . ';base64,' . base64_encode(file_get_contents($imageUpload));
                $data['image'] = $this->uploadImageToFirebase->upload($convertImageToBase64, env('FIRE_BASE_UPLOAD_PRODUCT_COLLECTION'));
            }

            $product = $this->productRepository->prepareProduct($data);
            $result = $this->productRepository->create($product);

            foreach ($data as $key => $value) {
                if (is_int($key)) {
                    // check exist attribute value
                    $check_attribute_value = Attribute_Value::where([
                        ['attribute_id', $key],
                        ['value', $value]
                    ])->first();

                    if ($check_attribute_value) {
                        // save product_id and atribute_value_id in product_atribute
                        $product_attribute = new Product_Attribute();
                        $product_attribute->product_id = $result->id ?? '';
                        $product_attribute->attribute_value_id = $check_attribute_value->id ?? '';
                        $product_attribute->save();
                    } else {
                        // create attribute value id
                        $attribute_value = new Attribute_Value();
                        $attribute_value->attribute_id = $key ?? '';
                        $attribute_value->value = $value ?? '';
                        $attribute_value->save();
                        // save product_id and atribute_value_id in product_atribute
                        $product_attribute = new Product_Attribute();
                        $product_attribute->product_id = $result->id ?? '';
                        $product_attribute->attribute_value_id = $attribute_value->id ?? '';
                        $product_attribute->save();
                    }
                }
            }
            DB::commit();
            return redirect()->route('admin.product.index')->with('success', 'Đã thêm 1 Product!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Thêm Product không thành công')->withInput();
        }
    }

    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', __('The requested resource is not available'));
        }
        $categories = $this->categoryRepository->all();
        $attribute_product = Product_Attribute::where('product_id', $id)->get();
        $data = [
            'product' => $product,
            'categories' => $categories,
            'attribute_product' => $attribute_product
        ];
        return view('cms.product.edit', $data);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = $this->productRepository->find($id);
            if (!$product) {
                return redirect()->route('admin.product.index')->with('error', __('The requested resource is not available'));
            }

            if (!empty($request->file('image'))) {
                $checkExtImage = checkExtensionImage($request->file('image'));
                if (!$checkExtImage) {
                    return redirect()->back()->withInput()->with('error', __('Only PNG, JPEG and JPG files can be uploaded.'));
                }
            }

            $data = $request->all();
            if ($request->hasFile('image')) {     // image
                $imageUpload = $request->file('image');
                $convertImageToBase64 = 'data:' . $imageUpload->getMimeType() . ';base64,' . base64_encode(file_get_contents($imageUpload));
                $data['image'] = $this->uploadImageToFirebase->upload($convertImageToBase64, env('FIRE_BASE_UPLOAD_PRODUCT_COLLECTION'));
            } else {
                $data['image'] = $product->image;
            }
            $products = $this->productRepository->prepareProduct($data);
            $result = $this->productRepository->update($product->id, $products);

            // get attribute if Request->variable is int !! That is attribute
            Product_Attribute::where('product_id', $id)->delete();
            foreach ($request->all() as $key => $value) {
                if (is_int($key)) {
                    // variable for check exist attribute value
                    $check_attribute_value = Attribute_Value::where([
                        ['attribute_id', '=', $key],
                        ['value', '=', $value]
                    ])->first();
                    if ($check_attribute_value) {
                        // save product_id and atribute_value_id in product_atribute
                        $product_attribute = new Product_Attribute();
                        $product_attribute->product_id = $result->id ?? '';
                        $product_attribute->attribute_value_id = $check_attribute_value->id ?? '';
                        $product_attribute->save();
                    } else {
                        // create attribute value id
                        $attribute_value = new Attribute_Value();
                        $attribute_value->attribute_id = $key ?? '';
                        $attribute_value->value = $value ?? '';
                        $attribute_value->save();
                        // save product_id and atribute_value_id in product_atribute
                        $product_attribute = new Product_Attribute();
                        $product_attribute->product_id = $result->id ?? '';
                        $product_attribute->attribute_value_id = $attribute_value->id ?? '';
                        $product_attribute->save();
                    }
                }
            }
            DB::commit();
            return redirect()->route('admin.product.index')->with('success', 'Đã sửa thành công sản phẩm mang ID số ' . $product->id . '!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Sửa không thành công sản phẩm mang ID số ' . $product->id . '!');
        }
    }

    public function handle(Request $request, $action, $id)
    {
        $product = $this->productRepository->find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', __('The requested resource is not available'));
        }
        switch ($action) {
            case 'delete':
                try {
                    DB::beginTransaction();
                    $productAttrs = Product_Attribute::where('product_id', $id);
                    if ($productAttrs->get()) {
                        foreach ($productAttrs->get() as $productAttr) {
                            Attribute_Value::where('id', $productAttr->attribute_value_id)->delete();
                            $productAttrs->delete();
                        }
                    }
                    ProductHistory::where('product_id', $id)->delete();
                    $product->delete();
                    $request->session()->flash('success', 'Đã xóa thành công sản phẩm mang ID số ' . $id . '!');
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    Log::debug($e);
                }
                break;
            case 'status':
                $product->status = $product->status == 'active' ? 'inactive' : 'active';
                $product->save();
                break;
            case 'hot':
                $product->hot = $product->hot == 'yes' ? 'no' : 'yes';
                $product->save();
                break;

            default:
                dd("Lỗi rồi");
                break;
        }
        return redirect()->route('admin.product.index');
    }

    public function getAttribute(Request $request)
    {
        $category = $this->categoryRepository->where('id', $request->category_id)->where('status', ActiveStatus::ACTIVE)->first();
        // check if this is update or add !! if id ==0 this is add form and opposite
        if ($request->id == 0) {
            //render html
            $html = view('cms.product.getattribute', compact('category'))->render();
        } else {
            // get product
            $product = $this->productRepository->where('id', $request->id)->where('status', ActiveStatus::ACTIVE)->first();
            if (empty($product)) {
                return response()->json('error2');
            }
            $data = [
                'product' => $product,
                'category' => $category
            ];
            //render html
            $html = view('cms.product.getattribute', $data)->render();
        }
        return \response()->json($html);
    }
}
