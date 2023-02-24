<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slide\StoreRequest;
use App\Http\Requests\Slide\UpdateRequest;
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
        $slides = $this->slideRepo->get();

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
    public function store(StoreRequest $request)
    {
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
            $path_upload = 'upload/slide/';
            $file->move($path_upload, $filename);
            $data['image'] = $path_upload . $filename;
        }
        $slide = $this->slideRepo->prepareSlide($data);
        $result = $this->slideRepo->create($slide);
        if ($result) {
            return redirect()->route('admin.slide.index')->with('success', 'Đã thêm 1 Slide!');
        }

        return redirect()->back()->with('error', 'Thêm Slide không thành công');
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
    public function update(UpdateRequest $request, $id)
    {
        $slide = $this->slideRepo->find($id);
        if (!$slide) {
            return redirect()->route('admin.slide.index')->with('error', __('The requested resource is not available'));
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
            $path_upload = 'upload/slide/';
            $file->move($path_upload, $filename);
            $data['image'] = $path_upload . $filename;
        } else {
            $data['image'] = $slide->image;
        }
        $slides = $this->slideRepo->prepareSlide($data);
        $result = $this->slideRepo->update($slide->id, $slides);
        if ($result) {
            return redirect()->route('admin.slide.index')->with('success', 'Đã sửa thành công slide id số ' . $slide->id . '!');
        }

        return redirect()->back()->with('error', 'Sửa không thành công slide id số ' . $slide->id . '!');
    }

    public function handle(Request $request, $action, $id)
    {
        $slide = $this->slideRepo->find($id);
        switch ($action) {
            case 'delete':
                $slide->delete();
                return redirect()->back()->with('success', 'Đã xóa thành công slide mang ID số ' . $id . '!');
                break;

            default:
                dd("Lỗi r");
                break;
        }
        return redirect()->route('admin.slide.index');
    }
}
