<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attribute\StoreRequest;
use App\Http\Requests\Attribute\UpdateRequest;
use App\Models\Attribute;
use App\Models\Attribute_Value;
use App\Repositories\AttributeRepository;
use Illuminate\Http\Request;
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
//        dd($slides);
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
        $result = $this->attributeRepo->create($attribute);

        if ($result) {
            return redirect()->route('admin.attribute.index')->with('success', 'Đã thêm 1 Attribute!');
        }
        return redirect()->back()->with('error', 'Thêm Attribute không thành công');
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
        $result = $this->attributeRepo->update($attribute->id, $attributes);

        if ($result) {
            return redirect()->route('admin.attribute.index')->with('success', 'Đã sửa thành công thuộc tính mang ID số ' . $attribute->id . '!');
        }

        return redirect()->back()->with('error', 'Sửa không thành công thuộc tính mang ID số ' . $attribute->id . '!');
    }

    public function handle(Request $request, $action, $id)
    {
        //get Attribute
        $attribute = $this->attributeRepo->find($id);
        switch ($action) {
            case 'delete':
                $attribute->delete();
                $request->session()->flash('success', 'Đã xóa thuộc tính ID = ' . $id . ' !');
                break;

            default:
                dd("Lỗi rồi");
                break;
        }
        return redirect()->route('admin.attribute.index');
    }
}
