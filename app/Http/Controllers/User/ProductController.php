<?php

namespace App\Http\Controllers\User;

use App\Enums\ActiveStatus;
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
        $product = Product::where('id', $id)->first();
        $ratings = Rating::where('product_id', $id)->orderBy('id', 'DESC')->get();
        // get number rating *
        $fivestar = Rating::where('product_id', $id)->where('number', Rating::FIVE_STAR)->count();
        $forstar = Rating::where('product_id', $id)->where('number', Rating::FOUR_STAR)->count();
        $threestar = Rating::where('product_id', $id)->where('number', Rating::THREE_STAR)->count();
        $twostar = Rating::where('product_id', $id)->where('number', Rating::TWO_STAR)->count();
        $onestar = Rating::where('product_id', $id)->where('number', Rating::ONE_STAR)->count();
        // push array for transmission
        $eachstar = [
            1 => $onestar,
            2 => $twostar,
            3 => $threestar,
            4 => $forstar,
            5 => $fivestar
        ];

        //list product
        $product_in_category_ids = Product::where('category_id', $product->category_id)
            ->where('status', ActiveStatus::ACTIVE)
            ->orderby('updated_at', 'desc')
            ->take(4)
            ->get();

        $data = [
            'product' => $product,
            'ratings' => $ratings,
            'eachstar' => $eachstar,
            'product_in_category_ids' => $product_in_category_ids,
        ];
        return view('fe.product.index', $data);
    }
}
