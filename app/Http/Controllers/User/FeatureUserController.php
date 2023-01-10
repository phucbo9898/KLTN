<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatureUserController extends CustomerController
{
    public function getFormPay()
    {
        $products = \Cart::content();
        $data = [
            'products' => $products
        ];
        return view('fe.feature-user.formpay', $data);
    }
    public function saveInfoShoppingCart(Request $request)
    {
        // get value in total money cart
        $totalMoney = str_replace(',', '', \Cart::subtotal(0));
        // insert data transaction and get id then insert
        $transactionId = Transaction::insertGetId([
            'user_id' => Auth::user()->id,
            'total' => $totalMoney,
            'note' => $request->note,
            'address' => $request->address,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // check exist id transaction above and insert order
        if ($transactionId) {
            $products = \Cart::content();
            foreach ($products as $product) {
                Order::insert([
                    'transaction_id' => $transactionId,
                    'product_id' => $product->id,
                    'quantity' => $product->qty,
                    'price' => $product->options->price_old,
                    'sale' => $product->options->sale,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
            \Cart::destroy();
        }
        return redirect()->route('home');
    }
    public function deleteNofication(Request $request, $id)
    {
        $nofication = Notification::find($id);
        $nofication->delete();
        return redirect()->back();
    }
}
