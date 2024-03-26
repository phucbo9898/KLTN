<?php

namespace App\Http\Controllers\Cms;

use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category_Attribute;
use App\Models\Product;
use App\Models\ProductHistory;
use App\Repositories\AttributeRepository;
use App\Repositories\CategoryRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    private $categoryRepository;
    private $attributeRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        AttributeRepository $attributeRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function index(Request $request)
    {
        $options = $request->all();
        //get list Category
        $categories = $this->categoryRepository->query($options)->get();
        $dataAttributes = $this->attributeRepository->all();
        return view('cms.category.index', compact('categories', 'dataAttributes', 'options'));
    }

    public function create()
    {
        //get all attribute
        $attributes = $this->attributeRepository->all();

        return view('cms.category.create', compact('attributes'));
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $category = $this->categoryRepository->prepareCategory($data);
            // Save category in database
            $createCategory = $this->categoryRepository->create($category);

            // Handle attribute and save to database
            $categoryAttributes = array_keys($data, 'on');
            $createCategory->attributes()->attach($categoryAttributes, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            DB::commit();
            return redirect()->route('admin.category.index')->with('success', 'Đã thêm 1 Category!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Thêm Category không thành công');
        }
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', __('The requested resource is not available'));
        }

        $attributes = $this->attributeRepository->all();
        $categoryAttribute = Category_Attribute::where('category_id', $id)->pluck('attribute_id')->toArray();

        $data = [
            'attributes' => $attributes,
            'category' => $category,
            'arrayCategoryAttribute' => $categoryAttribute
        ];

        return view('cms.category.edit', $data);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $category = $this->categoryRepository->find($id);
            if (!$category) {
                return redirect()->route('admin.category.index')->with('error', __('The requested resource is not available'));
            }

            $data = $request->all();
            $categories = $this->categoryRepository->prepareCategory($data);
            $updateCategory = $this->categoryRepository->update($category->id, $categories);

            // Handle attribute and save to database
            $updateCategory->attributes()->detach();
            $categoryAttributes = array_keys($data, 'on');
            $updateCategory->attributes()->attach($categoryAttributes, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
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
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', __('The requested resource is not available'));
        }
        try {
            DB::beginTransaction();
            switch ($action) {
                case 'delete':
                    $products = Product::where('category_id', $id);
                    ProductHistory::whereIn('product_id', $products->pluck('id')->toArray())->delete();
                    $products->delete();
                    $category->attributes()->detach();
                    $category->delete();
                    $request->session()->flash('success', 'Đã xóa thành công loại sản phẩm mang ID số ' . $id . '!');
                    break;
                case 'status':
                    $category->status = $category->status == ActiveStatus::ACTIVE ? ActiveStatus::INACTIVE : ActiveStatus::ACTIVE;
                    $category->save();
                    break;
                default:
                    dd('Lỗi !!');
                    break;
            }
            DB::commit();
            return redirect()->route('admin.category.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
        }
    }
}
