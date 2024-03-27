<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slide\StoreRequest;
use App\Http\Requests\Slide\UpdateRequest;
use App\Repositories\SlideRepository;
use App\Services\UploadImageToFirebase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    private $slideRepository;
    private $uploadImageToFirebase;

    public function __construct(SlideRepository $slideRepository, UploadImageToFirebase $uploadImageToFirebase)
    {
        $this->slideRepository = $slideRepository;
        $this->uploadImageToFirebase = $uploadImageToFirebase;
    }

    public function index()
    {
        $slides = $this->slideRepository->get();

        return view('cms.slide.index', compact('slides'));
    }

    public function create()
    {
        return view('cms.slide.create');
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            if (!empty($request->file('image'))) {
                $checkExtensionImage = checkExtensionImage($request->file('image'));
                if (!$checkExtensionImage) {
                    return redirect()->back()->withInput()->with('error', __('Only PNG, JPEG and JPG files can be uploaded.'));
                }
            }

            $data = $request->all();
            if ($request->hasFile('image')) {     // image
                $imageUpload = $request->file('image');
                $convertImageToBase64 = 'data:' . $imageUpload->getMimeType() . ';base64,' . base64_encode(file_get_contents($imageUpload));
                $data['image'] = $this->uploadImageToFirebase->upload($convertImageToBase64, env('FIRE_BASE_UPLOAD_SLIDE_COLLECTION'));
            }
            $slide = $this->slideRepository->prepareSlide($data);
            $this->slideRepository->create($slide);

            DB::commit();
            return redirect()->route('admin.slide.index')->with('success', 'Đã thêm 1 Slide!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Thêm Slide không thành công');
        }
    }

    public function edit($id)
    {
        $slide = $this->slideRepository->find($id);
        if (!$slide) {
            return back()->with('error', __('The requested resource is not available'));
        }

        return view('cms.slide.edit', compact('slide'));
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $slide = $this->slideRepository->find($id);
            if (!$slide) {
                return redirect()->route('admin.slide.index')->with('error', __('The requested resource is not available'));
            }

            if (!empty($request->file('image'))) {
                $checkExtensionImage = checkExtensionImage($request->file('image'));
                if (!$checkExtensionImage) {
                    return redirect()->back()->withInput()->with('error', __('Only PNG, JPEG and JPG files can be uploaded.'));
                }
            }

            $data = $request->all();
            if ($request->hasFile('image')) {     // image
                $imageUpload = $request->file('image');
                $convertImageToBase64 = 'data:' . $imageUpload->getMimeType() . ';base64,' . base64_encode(file_get_contents($imageUpload));
                $data['image'] = $this->uploadImageToFirebase->upload($convertImageToBase64, env('FIRE_BASE_UPLOAD_SLIDE_COLLECTION'));
            } else {
                $data['image'] = $slide->image ?? '';
            }
            $slides = $this->slideRepository->prepareSlide($data);
            $this->slideRepository->update($slide->id, $slides);

            DB::commit();
            return redirect()->route('admin.slide.index')->with('success', 'Đã sửa thành công slide id số ' . $slide->id . '!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Sửa không thành công slide id số ' . $slide->id . '!');
        }
    }

    public function handle(Request $request, $action, $id)
    {
        try {
            $slide = $this->slideRepository->find($id);
            switch ($action) {
                case 'delete':
                    $slide->delete();
                    $request->session()->flash('success', 'Đã xóa thành công slide mang ID số ' . $id . '!');
                    break;

                default:
                    dd("Lỗi r");
                    break;
            }
            return redirect()->route('admin.slide.index');
        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
        }
    }
}
