<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatureUserController extends CustomerController
{
    public function getFormPay()
    {
//        dd($_GET);
        if ($_GET != null) {
            $payment = Payment::where("orderId", $_GET['orderId'])->first();
            if (empty($payment)) {
                Payment::create([
                    'partnerCode' => $_GET['partnerCode'],
                    'orderId' => $_GET['orderId'],
                    'requestId' => $_GET['requestId'],
                    'amount' => $_GET['amount'],
                    'orderInfo' => $_GET['orderInfo'],
                    'orderType' => $_GET['orderType'],
                    'transId' => $_GET['transId'],
                    'payType' => $_GET['payType'],
                    'signature' => $_GET['signature'],
                ]);
            }
        }

        $checkPayment = Payment::where("resultCode", 1)->first();
        $products = \Cart::content();
        $data = [
            'products' => $products,
            'payment' => $checkPayment ?? ''
        ];
        return view('fe.feature-user.formpay', $data);
    }
    public function saveInfoShoppingCart(Request $request)
    {
//        dd($request->all());
        // get value in total money cart
        $totalMoney = str_replace(',', '', \Cart::subtotal(0));
        // insert data transaction and get id then insert
        $transactionId = Transaction::insertGetId([
            'user_id' => Auth::user()->id,
            'total' => $totalMoney,
            'note' => $request->note,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => 'pending',
            'type_payment' => $request->type_payment,
            'status_payment' => $request->status_payment,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Payment::where("resultCode", 1)->update(['resultCode' => 0]);
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
