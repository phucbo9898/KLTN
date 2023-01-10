<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Attribute_Value;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_Attribute;
use App\Repositories\AttributeValueRepository;
use App\Repositories\ProductRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct(ProductRepository $productRepo, AttributeValueRepository $attributeValueRepo)
    {
        $this->productRepo = $productRepo;
        $this->attributeValueRepo = $attributeValueRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $data = [
            'products' => $products
        ];
        return view('cms.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('cms.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|unique:products,name|min:3|max:255',
                'description' => 'required|min:3|max:1000',
                'content' => 'required|min:3',
                'category_id' => 'required',
                'price' => 'required|integer|gte:0',
                'sale' => 'required|integer|gte:0|lte:100',
            ],
            [
                'name.required' => 'Bạn cần nhập trường tên sản phẩm',
                'name.unique' => 'Tên sản phẩm đã tồn tại',
                'name.min' => 'Tên sản phẩm ít nhất 3 kí tự',
                'name.max' => 'Tên sản phẩm nhiều nhất nhất 255 kí tự',
                'description.required' => 'Bạn cần nhập trường mô tả sản phẩm',
                'description.min' => 'Mô tả sản phẩm ít nhất 3 kí tự',
                'description.max' => 'Mô tả sản phẩm nhiều nhất 1000 kí tự',
                'content.required' => 'Bạn cần nhập trường nội dung sản phẩm',
                'content.min' => 'Nội dung sản phẩm ít nhất 3 kí tự',
                'category_id.required' => 'Bạn cần chọn loại sản phẩm',
                'price.required' => 'Bạn cần nhập trường giá sản phẩm',
                'price.integer' => 'Giá sản phẩm là kiểu số',
                'price.gte' => 'Giá sản phẩm phải là 1 số nguyên dương !',
                'sale.integer' => 'Giảm giá sản phẩm là kiểu số nguyên dương',
                'sale.required' => 'Bạn cần nhập trường giảm giá sản phẩm, Nếu k muốn giảm giá hãy nhập giá trị bằng 0 xin cảm ơn !!',
                'sale.gte' => 'Giảm giá sản phẩm phải lớn hơn hoặc bằng 0 !',
                'sale.lte' => 'Giảm giá sản phẩm phải nhỏ hơn hoặc bằng 100 !',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator, 'productErrors');
        }

        $data = $request->all();
//        dd($data);
        if ($request->hasFile('image')) {     // image
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
                $check_attribute_value = Attribute_Value::where(
                    [
                        ['attribute_id', '=', $key],
                        ['value', '=', $value]
                    ]
                )->first();
//                dd($check_attribute_value);
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

        if ($result) {
            $request->session()->flash('create_product_success', 'Đã thêm 1 Product!');
            return redirect()->route('admin.product.index');
        }
        $request->session()->flash('create_product_error', 'Thêm Product không thành công');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $attribute_product = Product_Attribute::where('product_id',$id)->get();
        $data = [
            'product' => $product,
            'categories' => $categories,
            'attribute_product' => $attribute_product
        ];
        return view('cms.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = $this->productRepo->find($id);
        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', __('The requested resource is not available'));
        }
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:3|max:255',
                'description' => 'required|min:3|max:1000',
                'content' => 'required|min:3',
                'category_id' => 'required',
                'price' => 'required|integer|gte:0',
                'sale' => 'required|integer|gte:0|lte:100',
            ],
            [
                'name.required' => 'Bạn cần nhập trường tên sản phẩm',
                'name.unique' => 'Tên sản phẩm đã tồn tại',
                'name.min' => 'Tên sản phẩm ít nhất 3 kí tự',
                'name.max' => 'Tên sản phẩm nhiều nhất nhất 255 kí tự',
                'description.required' => 'Bạn cần nhập trường mô tả sản phẩm',
                'description.min' => 'Mô tả sản phẩm ít nhất 3 kí tự',
                'description.max' => 'Mô tả sản phẩm nhiều nhất 1000 kí tự',
                'content.required' => 'Bạn cần nhập trường nội dung sản phẩm',
                'content.min' => 'Nội dung sản phẩm ít nhất 3 kí tự',
                'category_id.required' => 'Bạn cần chọn loại sản phẩm',
                'price.required' => 'Bạn cần nhập trường giá sản phẩm',
                'price.integer' => 'Giá sản phẩm là kiểu số',
                'price.gte' => 'Giá sản phẩm phải là 1 số nguyên dương !',
                'sale.integer' => 'Giảm giá sản phẩm là kiểu số nguyên dương',
                'sale.required' => 'Bạn cần nhập trường giảm giá sản phẩm, Nếu k muốn giảm giá hãy nhập giá trị bằng 0 xin cảm ơn !!',
                'sale.gte' => 'Giảm giá sản phẩm phải lớn hơn hoặc bằng 0 !',
                'sale.lte' => 'Giảm giá sản phẩm phải nhỏ hơn hoặc bằng 100 !',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator, 'productErrors');
        }

        $data = $request->all();
        if ($request->hasFile('image')) {     // image
            $file = $request->file('image');
            $filename = Carbon::now()->toDateString() . '_' . $file->getClientOriginalName();
            $path_upload = 'upload/product/';
            $file->move($path_upload, $filename);
            $data['image'] = $path_upload . $filename;
        }
        $products = $this->productRepo->prepareProduct($data);
        $result = $this->productRepo->update($product->id, $products);

        // get attribute if Request->variable is int !! That is attribute
        $productAttribute = Product_Attribute::where('product_id', $id)->delete();
        foreach ($request->all() as $key => $value) {
            if (is_int($key)) {
                // variable for check exist attribute value
                $check_attribute_value = Attribute_Value::where(
                    [
                        ['attribute_id', '=', $key],
                        ['value', '=', $value]
                    ]
                )->first();
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

        if ($result) {
            $request->session()->flash('edit_product_success', 'Đã thêm 1 Product!');
            return redirect()->route('admin.product.index');
        }
        $request->session()->flash('edit_product_error', 'Thêm Product không thành công');
        return redirect()->back();
    }

    public function handle(Request $request,$action,$id)
    {
        $product = Product::find($id);
        switch ($action) {
            case 'delete':
                Product_Attribute::where('product_id',$id)->delete();
                $request->session()->flash('delete_product_success', 'Đã sửa thành công sản phẩm mang ID số '.$id.'!');
                $product->delete();
                break;
            case 'status':
                $product->status= $product->status== 'active' ? 'inactive' : 'active';
                $product->save();
                break;
            case 'hot':
                $product->hot= $product->hot== 'yes' ? 'no' : 'yes';
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
        $category = Category::find($request->category_id);
        // check if this is update or add !! if id ==0 this is add form and opposite
        if($request->id==0)
        {
            //render html
            $html = view('cms.product.getattribute',compact('category'))->render();
        }
        else
        {
            // get product
            $product = Product::find($request->id);
            $data = [
                'product' => $product,
                'category' => $category
            ];
            //render html
            $html = view('cms.product.getattribute',$data)->render();
        }
        return \response()->json($html);
        // return view('admin.product.getattribute',compact('category'));
    }
}
