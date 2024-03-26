<?php

namespace App\Http\Controllers\User;

use App\Enums\StatusTransaction;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RatingController extends CustomerController
{
    public function saveRating(Request $request, $id)
    {
        try {
            if ($request->ajax()) {
                $getTransactionsByProduct = Order::where('product_id', $id)->distinct()->pluck('transaction_id')->toArray();
                $getTransactionsComplete = Auth::user()->transactions()->where('status', StatusTransaction::COMPLETED)->whereIn('id', $getTransactionsByProduct)->get();
                $checkonerating = Rating::where(
                    [
                        "product_id" => $id,
                        "user_id" => Auth::id()
                    ]
                )->get();
                if (count($getTransactionsComplete) > 0) {
                    if (count($checkonerating) > 0 && count($checkonerating) >= count($getTransactionsComplete)) {
                        //Đã đánh giá
                        return \response()->json(['code' => 2]);
                    }
                    Rating::insert([
                        'product_id' => $id ?? '',
                        'number' => $request->number ?? '',
                        'content' => $request->content_rating ?? '',
                        'user_id' => Auth::id(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                    $product = Product::find($id);
                    $product->total_star += $request->number;
                    $product->number_of_reviewers += 1;
                    $product->save();
                    return \response()->json(['code' => 1]);
                }
                return \response()->json(['code' => 3]);
            }
        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
        }
    }

    public function deleteRating($id)
    {
        try {
            DB::beginTransaction();
            $rating = Rating::find($id);
            $product = $rating->product;
            $product->total_star -= $rating->number;
            $product->number_of_reviewers -= 1;
            $product->save();
            $rating->delete();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::debug($exception->getMessage());
        }
    }
}
