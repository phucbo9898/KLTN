<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Repositories\SlideRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    public function __construct(SlideRepository $slideRepo)
    {
        $this->slideRepo = $slideRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = $this->slideRepo->paginate(10);
        //        dd($slides);
        return view('cms.slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
                'image' => 'required'
            ],
            [
                'name.required' => __('Please enter slide name'),
                'image.required' => __('Please choose slide photo'),
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'slideErrors');
        }

        $data = $request->all();
        if ($request->hasFile('image')) {     // image
            $file = $request->file('image');
            $filename = Carbon::now()->toDateString() . '_' . $file->getClientOriginalName();
            $path_upload = 'upload/slide/';
            $file->move($path_upload, $filename);
            $data['image'] = $path_upload . $filename;
        }
        $slide = $this->slideRepo->prepareSlide($data);
        $result = $this->slideRepo->create($slide);
        if ($result) {
            $request->session()->flash('create_slide_success', 'Đã thêm 1 Slide!');
            return redirect()->route('admin.slide.index');
        }
        $request->session()->flash('create_slide_error', 'Thêm Slide không thành công');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = $this->slideRepo->find($id);
        if (!$slide) {
            return back()->with('error', __('The requested resource is not available'));
        }

        return view('cms.slide.edit', compact('slide'));
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
        $slide = $this->slideRepo->find($id);
        if (!$slide) {
            return redirect()->route('admin.slide.index')->with('error', __('The requested resource is not available'));
        }
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
            ],
            [
                'name.required' => __('Please enter slide name'),
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'slideErrors');
        }

        $data = $request->all();
        if ($request->hasFile('image')) {     // image
            $file = $request->file('image');
            $filename = Carbon::now()->toDateString() . '_' . $file->getClientOriginalName();
            $path_upload = 'upload/slide/';
            $file->move($path_upload, $filename);
            $data['image'] = $path_upload . $filename;
        } else {
            $data['image'] = $slide->image;
        }
        $slides = $this->slideRepo->prepareSlide($data);
        $result = $this->slideRepo->update($slide->id, $slides);
        if ($result) {
            $request->session()->flash('edit_slide_success', 'Đã sửa thành công slide id số ' . $slide->id . '!');
            return redirect()->route('admin.slide.index');
        }

        $request->session()->flash('edit_slide_error', 'Sửa không thành công slide id số ' . $slide->id . '!');
        return redirect()->route('admin.slide.index');
    }

    public function handle(Request $request, $action, $id)
    {
        $slide = Slide::find($id);
        switch ($action) {
            case 'delete':
                $slide->delete();
                $request->session()->flash('delete_slide_success', 'Đã xóa thành công slide mang ID số' . $id . '!');
                break;

            default:
                dd("Lỗi r");
                break;
        }
        return redirect()->route('admin.slide.index');
    }
}
