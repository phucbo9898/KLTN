<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attribute\StoreRequest;
use App\Http\Requests\Attribute\UpdateRequest;
use App\Models\Attribute;
use App\Models\Attribute_Value;
use App\Models\Category_Attribute;
use App\Repositories\AttributeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    private $attributeRepository;

    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function index()
    {
        $attributes = $this->attributeRepository->get();
        return view('cms.attribute.index', compact('attributes'));
    }

    public function create()
    {
        return view('cms.attribute.create');
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            if ($data['value']) {
                $arrayAttributeValue = explode(';', $data['value']);
                $checkValueInArray = array_unique($arrayAttributeValue);
                if (count($checkValueInArray) < count($arrayAttributeValue)) {
                    return back()->withInput()->with('sameValue', 'Giá trị thuộc tính nhập không được giống nhau');
                }
            }

            $attribute = $this->attributeRepository->prepareAttribute($data);
            $this->attributeRepository->create($attribute);

            DB::commit();
            return redirect()->route('admin.attribute.index')->with('success', 'Đã thêm 1 Attribute!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Thêm Attribute không thành công');
        }
    }

    public function edit($id)
    {
        //find attribute
        $attribute = $this->attributeRepository->find($id);
        if (!$attribute) {
            return back()->with('error', __('The requested resource is not available'));
        }

        return view('cms.attribute.edit', compact('attribute'));
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $attribute = $this->attributeRepository->find($id);
            if (!$attribute) {
                return redirect()->route('admin.attribute.index')->with('error', __('The requested resource is not available'));
            }

            $data = $request->all();
            //Check same value
            if ($data['value']) {
                $arrayAttributeValue = explode(';', $data['value']);
                $checkValueInArray = array_unique($arrayAttributeValue);
                if (count($checkValueInArray) < count($arrayAttributeValue)) {
                    return back()->withInput()->with('sameValue', 'Giá trị thuộc tính nhập không được giống nhau');
                }
            }

            $attributes = $this->attributeRepository->prepareAttribute($data);
            $this->attributeRepository->update($attribute->id, $attributes);
            DB::commit();
            return redirect()->route('admin.attribute.index')->with('success', 'Đã sửa thành công thuộc tính mang ID số ' . $attribute->id . '!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Sửa không thành công thuộc tính mang ID số ' . $attribute->id . '!');
        }
    }

    public function handle(Request $request, $action, $id)
    {
        //get Attribute
        $attribute = $this->attributeRepository->find($id);
        if (!$attribute) {
            return redirect()->route('admin.attribute.index')->with('error', __('The requested resource is not available'));
        }
        try {
            DB::beginTransaction();
            switch ($action) {
                case 'delete':
                    Category_Attribute::where('attribute_id', $id)->delete();
                    $attribute->delete();
                    DB::commit();
                    $request->session()->flash('success', 'Đã xóa thuộc tính ID = ' . $id . ' !');
                    break;
                default:
                    dd("Lỗi rồi");
                    break;
            }
            return redirect()->route('admin.attribute.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
        }
    }
}
