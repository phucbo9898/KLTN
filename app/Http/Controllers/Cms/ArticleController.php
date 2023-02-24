<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepo = $articleRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->articleRepo->all();

        return view('cms.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.article.create');
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
            $path_upload = 'upload/article/';
            $file->move($path_upload, $filename);
            $data['image'] = $path_upload . $filename;
        }
        $article = $this->articleRepo->prepareArticle($data);
        $result = $this->articleRepo->create($article);

        if ($result) {
            return redirect()->route('admin.article.index')->with('success', 'Đã thêm 1 Article!');
        }
        return redirect()->back()->with('error', 'Thêm Article không thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->articleRepo->find($id);

        return view('cms.article.edit', compact('article'));
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
        $article = $this->articleRepo->find($id);
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

        $articles = $this->articleRepo->prepareArticle($data);
        $result = $this->articleRepo->update($article->id, $articles);

        if ($result) {
            return redirect()->route('admin.article.index')->with('success', 'Đã sửa thành công bài viết mang ID số ' . $article->id . '!');
        }

        return redirect()->back()->with('error', 'Sửa không thành công bài viết mang ID số ' . $article->id . '!');
    }

    public function handle(Request $request, $action, $id)
    {
        $article = $this->articleRepo->find($id);
        switch ($action) {
            case 'delete':
                $article->delete();
                $request->session()->flash('success', 'Đã xóa thành công bài viết mang ID số ' . $id . '!');
                break;
            case 'status':
                $article->status = $article->status == 'active' ? 'inactive' : 'active';
                $article->save();
                break;
            default:
                dd("Lỗi r");
                break;
        }
        return redirect()->route('admin.article.index');
    }
}
