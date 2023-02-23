<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Category_Attribute;
use App\Repositories\AttributeRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function __construct(CategoryRepository $categoryRepo, AttributeRepository $attributeRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->attributeRepo = $attributeRepo;
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
        $data = $request->all();
        $category = $this->categoryRepo->prepareCategory($data);
        $result = $this->categoryRepo->create($category);
        foreach ($request->all() as $key => $value) {
            if (is_int($key)) {
                Category_Attribute::create([
                    'category_id' => $result->id,
                    'attribute_id' => $key
                ]);
            }
        }
        if ($result) {
            return redirect()->route('admin.category.index')->with('success', 'Đã thêm 1 Category!');
        }

        return redirect()->back()->with('error', 'Thêm Category không thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get all attribute
        $attributes = $this->attributeRepo->all();
        //get category
        $category = $this->categoryRepo->find($id);
        //get attribute in category
        $categoryAttribute = Category_Attribute::where('category_id',$id)->get();
        $arrayCategoryAttribute = array();
        // push attribute of category in array for compare attribute in form
        foreach($categoryAttribute as $ca)
        {
            $arrayCategoryAttribute[]= $ca->attribute_id;
        }
        //variable transfer

        $data = [
            'attributes' =>$attributes,
            'category' => $category,
            'arrayCategoryAttribute' => $arrayCategoryAttribute

        ];

        return view('cms.category.edit',$data);
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
                Category_Attribute::create([
                    'category_id' => $result->id,
                    'attribute_id' => $key
                ]);
            }
        }
        if ($result) {
            return redirect()->route('admin.category.index')->with('success', 'Đã sửa thành công loại sản phẩm mang ID số'.$category->id.'!');
        }
        return redirect()->back()->with('error', 'Sửa không thành công loại sản phẩm mang ID số'.$category->id.'!');
    }

    public function handle(Request $request,$action,$id)
    {
        $category = Category::find($id);
        switch ($action) {
            case 'delete':
                $category->delete();
                $request->session()->flash('success', 'Đã xóa thành công loại sản phẩm mang ID số '.$id.'!');
                break;
            case 'status':
                $category->status= $category->status== 'active' ? 'inactive' : 'active';
                $category->save();
                break;
            default:
                dd('Lỗi !!');
                break;
        }
        return redirect()->route('admin.category.index');
    }
}
