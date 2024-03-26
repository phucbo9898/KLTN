<?php

namespace App\Http\Controllers\User;

use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends CustomerController
{
    public function index(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search_key . '%')->where('status', ActiveStatus::ACTIVE);
        if ($request->search_category_id != 0) {
            $products = $products->where('category_id', $request->search_category_id);
        }
        $products = $products->get();
        return view('fe.search.index', ['products' => $products]);
    }
}
