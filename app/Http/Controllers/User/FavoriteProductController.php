<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FavoriteProductController extends CustomerController
{
    public function index()
    {
        $products = Auth::user()->favoriteProduct;
        return view('fe.favorite-product.index', ['products' => $products]);
    }
    public function deleteProduct(Request $request, $id)
    {
        try {
            $favorite_product = FavoriteProduct::where([
                'user_id' => Auth::user()->id,
                'product_id' => $id
            ])->first();
            $favorite_product->delete();
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
        }
    }
    public function addProduct(Request $request, $id)
    {
        try {
            if ($request->ajax()) {
                // check exist product in my list favorite product
                $arrayFavoriteProductsByUser = Auth::user()->favoriteProduct()->pluck('product_id')->toArray();
                if (in_array($id, $arrayFavoriteProductsByUser)) {
                    return response()->json([
                        'status' => 0
                    ]);
                }
                // create favorite product
                $favorite = new FavoriteProduct();
                $favorite->product_id = $id;
                $favorite->user_id = Auth::user()->id;
                $favorite->save();
                $number_favorite_product = Auth::user()->favoriteProduct->count();
                return response()->json([
                    'status' => 1,
                    'number_favorite_product' => $number_favorite_product
                ]);
            }
        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
        }
    }
}
