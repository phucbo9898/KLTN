<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
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
        $attributes = $this->attributeRepo->paginate(10);
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|unique:attributes,name',
                'type' => 'required'
            ],
            [
                'name.required' => 'Tên thuộc tính bắt buộc',
                'name.unique' => 'Thuộc tính đã tồn tại',
                'type.required' => 'Kiểu dữ liệu là bắt buộc'
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator, 'attributeErrors');
        }

        $data = $request->all();
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

        $attribute = $this->attributeRepo->prepareAttribute($data);
        $result = $this->attributeRepo->create($attribute);

        if ($result) {
            $request->session()->flash('create_attribute_success', 'Đã thêm 1 Attribute!');
            return redirect()->route('admin.attribute.index');
        }
        $request->session()->flash('create_attribute_error', 'Thêm Attribute không thành công');
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
    public function update(Request $request, $id)
    {
        $attribute = $this->attributeRepo->find($id);
        if (!$attribute) {
            return redirect()->route('admin.attribute.index')->with('error', __('The requested resource is not available'));
        }
        //check Input
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'type' => 'required'
            ],
            [
                'name.required' => 'Tên thuộc tính bắt buộc',
                'type.required' => 'Kiểu dữ liệu là bắt buộc'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'attributeErrors');
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
//        dd($attribute);
        $result = $this->attributeRepo->update($attribute->id, $attributes);
        if ($result) {
            $request->session()->flash('create_attribute_success', 'Đã thêm 1 Attribute!');
            return redirect()->route('admin.attribute.index');
        }
        $request->session()->flash('create_attribute_error', 'Thêm Attribute không thành công');
        return redirect()->back();
    }

    public function handle(Request $request,$action,$id){
        //get Attribute
        $attribute = Attribute::find($id);
        switch ($action) {
            case 'delete':
                $attribute->delete();
                $request->session()->flash('delete_attribute_success', 'Đã xóa thuộc tính ID='.$id.' !');
                break;

            default:
                dd("Lỗi rồi");
                break;
        }
        return redirect()->route('admin.attribute.index');
    }
}
