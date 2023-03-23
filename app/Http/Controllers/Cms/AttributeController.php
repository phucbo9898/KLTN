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
    public function __construct(AttributeRepository $attributeRepo)
    {
        $this->attributeRepo = $attributeRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = $this->attributeRepo->get();
        return view('cms.attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.attribute.create');
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
            if ($request->value) {
                $arrayAttributeValue = explode(';', $request->value);
                for ($i = 0; $i < count($arrayAttributeValue); $i++) {
                    for ($j = $i + 1; $j < count($arrayAttributeValue); $j++) {
                        if ($arrayAttributeValue[$i] == $arrayAttributeValue[$j]) {
                            return back()->withInput()->with('sameValue', 'Giá trị thuộc tính nhập không được giống nhau');
                        }
                    }
                }
            }

            $attribute = $this->attributeRepo->prepareAttribute($data);
            $this->attributeRepo->create($attribute);
            DB::commit();
            return redirect()->route('admin.attribute.index')->with('success', 'Đã thêm 1 Attribute!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Thêm Attribute không thành công');
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
        //find attribute
        $attribute = $this->attributeRepo->find($id);
        if (!$attribute) {
            return back()->with('error', __('The requested resource is not available'));
        }

        return view('cms.attribute.edit', compact('attribute'));
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
            $attribute = $this->attributeRepo->find($id);
            if (!$attribute) {
                return redirect()->route('admin.attribute.index')->with('error', __('The requested resource is not available'));
            }

            $data = $request->all();
            //Check same value
            if ($request->value) {
                $arrayAttributeValue = explode(';', $request->value);
                for ($i = 0; $i < count($arrayAttributeValue); $i++) {
                    for ($j = $i + 1; $j < count($arrayAttributeValue); $j++) {
                        if ($arrayAttributeValue[$i] == $arrayAttributeValue[$j]) {
                            return redirect()->back()->with('sameValue', 'Giá trị giống nhau');
                        }
                    }
                }
            }

            $attributes = $this->attributeRepo->prepareAttribute($data);
            $this->attributeRepo->update($attribute->id, $attributes);
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
        $attribute = $this->attributeRepo->find($id);
        if (!$attribute) {
            return redirect()->route('admin.attribute.index')->with('error', __('The requested resource is not available'));
        }

        switch ($action) {
            case 'delete':
                try {
                    DB::beginTransaction();
                    Category_Attribute::where('attribute_id', $id)->delete();
                    $attribute->delete();
                    $request->session()->flash('success', 'Đã xóa thuộc tính ID = ' . $id . ' !');
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    Log::debug($e);
                }

                break;

            default:
                dd("Lỗi rồi");
                break;
        }
        return redirect()->route('admin.attribute.index');
    }
}
