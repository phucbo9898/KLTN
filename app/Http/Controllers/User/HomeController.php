<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class HomeController extends CustomerController
{
    public function index()
    {
        $slides = Slide::all();
        $products = Product::all();
        $categories = Category::where('status', 'active')->get();
        $product_news = Product::where('status', 'active')->orderBy('updated_at', 'DESC')->limit(5)->get();
        $articles = Article::where('status', 'active')->orderBy('updated_at', 'DESC')->take(3)->get();
        $product_best_pays = Product::where('status', 'active')
            ->orderBy('qty_pay', 'DESC')
            ->limit(5)
            ->get();
        return view('fe.index', compact('slides', 'products', 'categories', 'product_news', 'articles', 'product_best_pays'));
    }

    public function aboutUs()
    {
        return view('fe.aboutus');
    }

    public function contact()
    {
        return view('fe.contact');
    }

    public function changeLanguage($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
