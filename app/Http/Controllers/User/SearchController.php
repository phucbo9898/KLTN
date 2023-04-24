<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends CustomerController
{
    public function index(Request $request)
    {
        if ($request->search_category_id == 0) {
            $products = Product::where('name', 'like', '%' . $request->search_key . '%')->get();
        } else {
            $products = Product::where('name', 'like', '%' . $request->search_key . '%')->where('category_id', $request->search_category_id)->get();
        }
        $data = [
            'products' => $products
        ];

        //check git push
        return view('fe.search.index', $data);
    }
}
