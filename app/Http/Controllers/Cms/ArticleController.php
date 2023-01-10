<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
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
        $articles = Article::all();
        $data = [
            'articles' => $articles
        ];
        return view('cms.article.index', $data);
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
    public function store(Request $request)
    {
        // Check data input
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:articles,name|min:3|max:255',
                'description' => 'required|min:3',
                'content' => 'required|min:3'
            ],
            [
                'name.required' => 'Bạn cần nhập trường tên bài viết',
                'name.unique' => 'Tên bài viết đã tồn tại',
                'description.required' => 'Mô tả bài viết còn trống',
                'description.min' => 'Mô tả bài viết cần ít nhất 3 kí tự',
                'content.required' => 'Nội dung bài viết còn trống',
                'content.min' => 'Nội dung bài viết cần ít nhất 3 kí tự',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'articleErrors');
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
            $request->session()->flash('create_article_success', 'Đã thêm 1 Article!');
            return redirect()->route('admin.article.index');
        }
        $request->session()->flash('create_article_error', 'Thêm Article không thành công');
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
        $article = Article::find($id);
        $data = [
            'article' => $article
        ];
        return view('cms.article.edit', $data);
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
        $article = $this->articleRepo->find($id);
        if (!$article) {
            return redirect()->route('admin.article.index')->with('error', __('The requested resource is not available'));
        }

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:3|max:255',
                'description' => 'required|min:3',
                'content' => 'required|min:3'
            ],
            [
                'name.required' => 'Bạn cần nhập trường tên bài viết',
                'description.required' => 'Mô tả bài viết còn trống',
                'description.min' => 'Mô tả bài viết cần ít nhất 3 kí tự',
                'content.required' => 'Nội dung bài viết còn trống',
                'content.min' => 'Nội dung bài viết cần ít nhất 3 kí tự',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'articleErrors');
        }

        $data = $request->all();
        if ($request->hasFile('image')) {     // image
            $file = $request->file('image');
            $filename = Carbon::now()->toDateString() . '_' . $file->getClientOriginalName();
            $path_upload = 'upload/article/';
            $file->move($path_upload, $filename);
            $data['image'] = $path_upload . $filename;
        }
        $articles = $this->articleRepo->prepareArticle($data);
        $result = $this->articleRepo->update($article->id, $articles);

        if ($result) {
            $request->session()->flash('edit_product_success', 'Đã thêm 1 Product!');
            return redirect()->route('admin.article.index');
        }
        $request->session()->flash('edit_product_error', 'Thêm Product không thành công');
        return redirect()->back();
    }

    public function handle(Request $request,$action,$id)
    {
        $article = Article::find($id);
        switch ($action) {
            case 'delete':
                $article->delete();
                $request->session()->flash('delete_article_success',
                    'Đã xóa thành công bài viết mang ID số '.$id.'!');
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
