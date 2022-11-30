<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $products = Product::all();
        $categories = Category::where('status', 'active')->get();
        $product_news = Product::where('status', 'active')->orderBy('created_at', 'DESC')->limit(4)->get();
        $articles = Article::where('status', 'active')->orderBy('created_at', 'DESC')->take(3)->get();
        $product_best_pays = Product::where('status', 'active')->orderBy('qty_pay', 'DESC')->limit(5)->get();
        $data = [
            'slides' => $slides,
            'products' => $products,
            'categories' => $categories,
            'product_news' => $product_news,
            'articles' => $articles,
            'product_best_pays' => $product_best_pays
        ];

        return view('fe.index', $data);
    }

    public function aboutUs()
    {
        return view('fe.aboutus');
    }

    public function contact()
    {
        return view('fe.contact');
    }
}
