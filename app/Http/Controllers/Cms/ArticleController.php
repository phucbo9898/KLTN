<?php

namespace App\Http\Controllers\Cms;

use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->all();

        return view('cms.article.index', compact('articles'));
    }

    public function create()
    {
        return view('cms.article.create');
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();

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
                $path_upload = 'upload/article/';
                $file->move($path_upload, $filename);
                $data['image'] = $path_upload . $filename;
            }
            $article = $this->articleRepository->prepareArticle($data);
            $this->articleRepository->create($article);

            DB::commit();
            return redirect()->route('admin.article.index')->with('success', 'Đã thêm 1 Article!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Thêm Article không thành công');
        }
    }

    public function edit($id)
    {
        $article = $this->articleRepository->find($id);
        if (!$article) {
            return redirect()->route('admin.article.index')->with('error', __('The requested resource is not available'));
        }

        return view('cms.article.edit', compact('article'));
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $article = $this->articleRepository->find($id);
            if (!$article) {
                return redirect()->route('admin.article.index')->with('error', __('The requested resource is not available'));
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
                $path_upload = 'upload/article/';
                $file->move($path_upload, $filename);
                $data['image'] = $path_upload . $filename;
            } else {
                $data['image'] = $article->image;
            }

            $articles = $this->articleRepository->prepareArticle($data);
            $this->articleRepository->update($article->id, $articles);

            DB::commit();
            return redirect()->route('admin.article.index')->with('success', 'Đã sửa thành công bài viết mang ID số ' . $article->id . '!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Sửa không thành công bài viết mang ID số ' . $article->id . '!');
        }
    }

    public function handle(Request $request, $action, $id)
    {
        $article = $this->articleRepository->find($id);
        if (!$article) {
            return redirect()->route('admin.article.index')->with('error', __('The requested resource is not available'));
        }
        try {
            switch ($action) {
                case 'delete':
                    $article->delete();
                    $request->session()->flash('success', 'Đã xóa thành công bài viết mang ID số ' . $id . '!');
                    break;
                case 'status':
                    $article->status = $article->status == ActiveStatus::ACTIVE ? ActiveStatus::INACTIVE : ActiveStatus::ACTIVE;
                    $article->save();
                    break;
                default:
                    dd("Lỗi r");
                    break;
            }
            return redirect()->route('admin.article.index');
        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
        }
    }
}
