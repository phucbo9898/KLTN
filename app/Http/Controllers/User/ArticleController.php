<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends CustomerController
{
    public function index()
    {
        $count_article = Article::where('status', 'active')->count();
        $check_link = 0;
        if ($count_article > 7) {
            $articles = Article::where('status', 'active')->paginate(3);
            $check_link = 1;
        } else {
            $articles = Article::where('status', 'active')->get();
        }

        $data = [
            'articles' => $articles,
            'check_link' => $check_link
        ];
        return view('fe.article.index', $data);
    }
    public function getDetailArticle($id)
    {
        $getListArticles = Article::where('id', '<>', $id)->where('status', 'active')->limit(5)->get();
        $article = Article::where([
            'id' => $id,
            'status' => 'active'
        ])->first();
        // $data = [
        //     'article' => $article,
        //     'articles' => $articles
        // ];
        // dd($data['article']);
        return view('fe.article.detail', compact('article', 'getListArticles'));
    }
}
