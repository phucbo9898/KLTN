<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class ProductController extends CustomerController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug, $id)
    {
        $product = Product::find($id);
        $ratings = Rating::where('product_id', $id)->orderBy('id', 'DESC')->get();
        // get number rating *
        $fivestar = Rating::where('product_id', $id)->where('number', 5)->count();
        $forstar = Rating::where('product_id', $id)->where('number', 4)->count();
        $threestar = Rating::where('product_id', $id)->where('number', 3)->count();
        $twostar = Rating::where('product_id', $id)->where('number', 2)->count();
        $onestar = Rating::where('product_id', $id)->where('number', 1)->count();
        // push array for transmission
        $eachstar = [
            1 => $onestar,
            2 => $twostar,
            3 => $threestar,
            4 => $forstar,
            5 => $fivestar
        ];
        $data = [
            'product' => $product,
            'ratings' => $ratings,
            'eachstar' => $eachstar
        ];
        return view('fe.product.index', $data);
    }
}
