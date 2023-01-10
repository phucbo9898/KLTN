<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function saveRating(Request $request, $id)
    {
        if($request->ajax())
        {
            $checkonerating = Rating::where(
                [
                    ["product_id","=",$id],
                    ["user_id","=",Auth::user()->id]
                ]
            )->first();
            if($checkonerating)
            {
                //Đã đánh giá
                return \response()->json(['code'=>2]);
            }
            foreach(Auth::user()->transactions->where('status', 'completed') as $transactions)
            {
                foreach($transactions->orders as $order)
                {
                    if($order->product_id == $id)
                    {
                        Rating::insert([
                            'ra_product_id'=>$id,
                            'ra_number'=>$request->number,
                            'ra_content'=>$request->content,
                            'ra_user_id' => Auth::user()->id,
                            'created_at'=>Carbon::now(),
                            'updated_at'=>Carbon::now(),
                        ]);
                        $product = Product::find($id);
                        $product->total_star += $request->number;
                        $product->number_of_reviewers += 1;
                        $product->save();
                        return \response()->json(['code'=>1]);
                    }
                }
            }
            return \response()->json(['code'=>3]);
        }
    }
    public function deleteRating($id)
    {
        $rating = Rating::find($id);
        $product = Rating::find($id)->product;
        $product->total_star -= $rating->number;
        $product->number_of_reviewers -= 1;
        $product->save();
        $rating->delete();
        return redirect()->back();
    }
}
