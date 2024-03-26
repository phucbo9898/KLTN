<?php

namespace App\Http\Controllers\User;

use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductQtyPay;
use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class HomeController extends CustomerController
{
    public function index()
    {
        $startDayOfMonth = Carbon::now()->startOfMonth();
        $endDayOfMonth = Carbon::now()->endOfMonth();
        $slides = Slide::all();
        $products = Product::where('status', ActiveStatus::ACTIVE)->get();
        $categories = Category::where('status', ActiveStatus::ACTIVE)->get();
        $product_news = Product::where('status', ActiveStatus::ACTIVE)->orderBy('updated_at', 'DESC')->limit(5)->get();
        $articles = Article::where('status', ActiveStatus::ACTIVE)->orderBy('updated_at', 'DESC')->take(3)->get();

        $product_pay = ProductQtyPay::whereBetween('time_pay', [$startDayOfMonth, $endDayOfMonth]);
        if ($product_pay->count() > 0) {
            $arrayProductId = $product_pay->pluck('product_id')->toArray();
            $product_best_pays = Product::where('status', ActiveStatus::ACTIVE)->whereIn('id', $arrayProductId)
                ->orderBy('qty_pay', 'DESC')
                ->limit(5)
                ->get();
        } else {
            $product_best_pays = Product::where('status', ActiveStatus::ACTIVE)
                ->orderBy('qty_pay', 'DESC')
                ->limit(5)
                ->get();
        }
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
