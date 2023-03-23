<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Attribute_Value;
use App\Models\Product_Attribute;
use App\Models\ProductHistory;
use App\Repositories\AttributeValueRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function __construct(ProductRepository $productRepo, AttributeValueRepository $attributeValueRepo, CategoryRepository $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->attributeValueRepo = $attributeValueRepo;
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $options = $request->all();
        $products = $this->productRepo->query($options)->get();
        $categories = $this->categoryRepo->all();

        return view('cms.product.index', compact('options', 'products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepo->all();

        return view('cms.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            if (!empty($request->file('image'))) {
                $extention = $request->file('image')->getClientOriginalExtension();
                if (!in_array(strtolower($extention), ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->withInput()->with('error', __('Only PNG, JPEG and JPG files can be uploaded.'));
                }
            }

            $data = $request->all();

            // Upload image: Check file -> Get File upload -> Insert Name -> move folder -> save
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = Carbon::now()->toDateString() . '_' . $file->getClientOriginalName();
                $path_upload = 'upload/product/';
                $file->move($path_upload, $filename);
                $data['image'] = $path_upload . $filename;
            }

            $product = $this->productRepo->prepareProduct($data);
            $result = $this->productRepo->create($product);

            foreach ($request->all() as $key => $value) {
                if (is_int($key)) {
                    // check exist attribute value
                    $check_attribute_value = Attribute_Value::where([
                        ['attribute_id', $key],
                        ['value', $value]
                    ])->first();

                    if ($check_attribute_value) {
                        // save product_id and atribute_value_id in product_atribute
                        $product_attribute = new Product_Attribute();
                        $product_attribute->product_id = $result->id;
                        $product_attribute->attribute_value_id = $check_attribute_value->id;
                        $product_attribute->save();
                    } else {
                        // create attribute value id
                        $attribute_value = new Attribute_Value();
                        $attribute_value->attribute_id = $key;
                        $attribute_value->value = $value;
                        $attribute_value->save();
                        // save product_id and atribute_value_id in product_atribute
                        $product_attribute = new Product_Attribute();
                        $product_attribute->product_id = $result->id;
                        $product_attribute->attribute_value_id = $attribute_value->id;
                        $product_attribute->save();
                    }
                }
            }
            DB::commit();
            return redirect()->route('admin.product.index')->with('success', 'Đã thêm 1 Product!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Thêm Product không thành công');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepo->find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', __('The requested resource is not available'));
        }
        $categories = $this->categoryRepo->all();
        $attribute_product = Product_Attribute::where('product_id', $id)->get();
        $data = [
            'product' => $product,
            'categories' => $categories,
            'attribute_product' => $attribute_product
        ];
        return view('cms.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = $this->productRepo->find($id);
            if (!$product) {
                return redirect()->route('admin.product.index')->with('error', __('The requested resource is not available'));
            }

            if (!empty($request->file('image'))) {
                $extention = $request->file('image')->getClientOriginalExtension();
                if (!in_array(strtolower($extention), ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->withInput()->with('error', __('Only PNG, JPEG and JPG files can be uploaded.'));
                }
            }

            $data = $request->all();
            if ($request->hasFile('image')) {     // image
                $file = $request->file('image');
                $filename = Carbon::now()->toDateString() . '_' . $file->getClientOriginalName();
                $path_upload = 'upload/product/';
                $file->move($path_upload, $filename);
                $data['image'] = $path_upload . $filename;
            } else {
                $data['image'] = $product->image;
            }
            $products = $this->productRepo->prepareProduct($data);
            $result = $this->productRepo->update($product->id, $products);

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
                        $product_attribute->product_id = $result->id;
                        $product_attribute->attribute_value_id = $check_attribute_value->id;
                        $product_attribute->save();
                    } else {
                        // create attribute value id
                        $attribute_value = new Attribute_Value();
                        $attribute_value->attribute_id = $key;
                        $attribute_value->value = $value;
                        $attribute_value->save();
                        // save product_id and atribute_value_id in product_atribute
                        $product_attribute = new Product_Attribute();
                        $product_attribute->product_id = $result->id;
                        $product_attribute->attribute_value_id = $attribute_value->id;
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
        $product = $this->productRepo->find($id);
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
        $category = $this->categoryRepo->find($request->category_id);
        // check if this is update or add !! if id ==0 this is add form and opposite
        if ($request->id == 0) {
            //render html
            $html = view('cms.product.getattribute', compact('category'))->render();
        } else {
            // get product
            $product = $this->productRepo->find($request->id);
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
