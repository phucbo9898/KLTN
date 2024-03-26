<?php

namespace App\Http\Controllers\User;

use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends CustomerController
{
    public function index()
    {
        $articles = Article::where('status', ActiveStatus::ACTIVE)->paginate(10);
        return view('fe.article.index', ['articles' => $articles]);
    }
    public function getDetailArticle($id)
    {
        $getListAnotherArticles = Article::where('id', '<>', $id)->where('status', ActiveStatus::ACTIVE)->orderBy('updated_at', 'desc')->limit(5)->get();
        $articleDetail = Article::where([
            'id' => $id,
            'status' => ActiveStatus::ACTIVE
        ])->first();
        return view('fe.article.detail', ['articleDetail' => $articleDetail, 'getListAnotherArticles' => $getListAnotherArticles]);
    }
}
