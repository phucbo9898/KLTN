<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteProductController extends Controller
{
    public function index()
    {
        dd(123);
        $products = Auth::user()->favoriteProduct;
        $data = [
            'products' => $products
        ];
        return view('fe.favorite-product.index',$data);
    }
    public function deleteProduct(Request $request , $id)
    {
        $favorite_product = FavoriteProduct::where([
            'fp_user_id' => Auth::user()->id,
            'fp_product_id' => $id
        ])->first();
        $favorite_product->delete();
        return redirect()->back();
    }
    public function addProduct(Request $request, $id)
    {
        if($request->ajax())
        {
            // check exist produt in my list favorite product
            foreach (Auth::user()->favoriteProduct as $product)
            {
                if($product->id == $id){
                    return response()->json([
                        'status' => 0
                    ]);
                }
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
    }
}
