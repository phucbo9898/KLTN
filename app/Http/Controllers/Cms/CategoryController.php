<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Category_Attribute;
use App\Models\Product;
use App\Models\ProductHistory;
use App\Repositories\AttributeRepository;
use App\Repositories\CategoryAttributeRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function __construct(CategoryRepository $categoryRepo, AttributeRepository $attributeRepo, CategoryAttributeRepository $categoryAttrRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->attributeRepo = $attributeRepo;
        $this->categoryAttrRepo = $categoryAttrRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $options = $request->all();
        //get list Category
        $categories = $this->categoryRepo->query($options)->get();
        $dataAttributes = $this->attributeRepo->all();

        return view('cms.category.index', compact('categories', 'dataAttributes', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get all attribute
        $attributes = $this->attributeRepo->all();

        return view('cms.category.create', compact('attributes'));
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
            $data = $request->all();
            $category = $this->categoryRepo->prepareCategory($data);
            $result = $this->categoryRepo->create($category);
            foreach ($request->all() as $key => $value) {
                if (is_int($key)) {
                    $this->categoryAttrRepo->create([
                        'category_id' => $result->id,
                        'attribute_id' => $key
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.category.index')->with('success', 'Đã thêm 1 Category!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Thêm Category không thành công');
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
        $category = $this->categoryRepo->find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', __('The requested resource is not available'));
        }

        $attributes = $this->attributeRepo->all();
        $categoryAttribute = $this->categoryAttrRepo->where('category_id', $id)->get();
        $arrayCategoryAttribute = array();
        // push attribute of category in array for compare attribute in form
        foreach ($categoryAttribute as $ca) {
            $arrayCategoryAttribute[] = $ca->attribute_id;
        }

        $data = [
            'attributes' => $attributes,
            'category' => $category,
            'arrayCategoryAttribute' => $arrayCategoryAttribute

        ];

        return view('cms.category.edit', $data);
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
            $category = $this->categoryRepo->find($id);
            if (!$category) {
                return redirect()->route('admin.category.index')->with('error', __('The requested resource is not available'));
            }

            $data = $request->all();
            $categories = $this->categoryRepo->prepareCategory($data);
            $result = $this->categoryRepo->update($category->id, $categories);
            Category_Attribute::where('category_id', $category->id)->delete();
            foreach ($request->all() as $key => $value) {
                if (is_int($key)) {
                    $this->categoryAttrRepo->create([
                        'category_id' => $result->id,
                        'attribute_id' => $key
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.category.index')->with('success', 'Đã sửa thành công loại sản phẩm mang ID số' . $category->id . '!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Sửa không thành công loại sản phẩm mang ID số' . $category->id . '!');
        }
    }

    public function handle(Request $request, $action, $id)
    {
        $category = $this->categoryRepo->find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', __('The requested resource is not available'));
        }
        switch ($action) {
            case 'delete':
                try {
                    DB::beginTransaction();
                    Log::debug('xóa category 123');
                    Log::debug('xóa category');
                    $products = Product::where('category_id', $id);
                    if ($products->get()) {
                        foreach ($products->get() as $product) {
                            ProductHistory::where('product_id', $product->id)->delete();
                        }
                    }
                    Category_Attribute::where('category_id', $id)->delete();
                    $products->delete();
                    $category->delete();
                    $request->session()->flash('success', 'Đã xóa thành công loại sản phẩm mang ID số ' . $id . '!');
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    Log::debug($e);
                }
                break;
            case 'status':
                $category->status = $category->status == 'active' ? 'inactive' : 'active';
                $category->save();
                break;
            default:
                dd('Lỗi !!');
                break;
        }
        return redirect()->route('admin.category.index');
    }
}
