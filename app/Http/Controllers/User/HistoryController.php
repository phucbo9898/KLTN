<?php

namespace App\Http\Controllers\User;

use App\Enums\StatusTransaction;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends CustomerController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
//        dd($user);
        $transactions = Transaction::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        $countTransaction = $transactions->count();
        $data = [
            'transactions' => $transactions,
            'count' => $countTransaction
        ];

        return view('fe.history.index', $data);
    }

    public function getOrderItem(Request $request, $id)
    {
        if ($request->ajax()) {
            $orders = Order::where('transaction_id', $id)->get();
            $html = view('cms.transaction.orderItem', compact('orders'))->render();
            return \response()->json($html);
        }
    }

    public function transactionPaid(Request $request, $action, $id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('transaction_id', $id)->get();
//        if ($orders) {
//            foreach ($orders as $order) {
//                $product = Product::find($order->product_id);
//                $product->quantity = $product->quantity - $order->quantity;
//                $product->qty_pay = $product->qty_pay + $order->quantity;
//                $product->save();
//            }
//            $transaction->status = StatusTransaction::COMPLETED;
//            $transaction->save();
//        }
//        return redirect()->back();

        if ($action) {
            switch ($action) {
                case 'change-status':
//                    if ($orders) {
//                        foreach ($orders as $order) {
//                            $product = Product::find($order->product_id);
//                            $product->quantity = $product->quantity - $order->quantity;
//                            $product->qty_pay = $product->qty_pay + $order->quantity;
//                            $product->save();
//                        }
//                    }
                    $transaction->status = StatusTransaction::COMPLETED;
                    $transaction->save();
                    break;
                case 'cancel-order':
                    if ($orders) {
                        foreach ($orders as $order) {
                            // find product in order
                            $product = Product::find($order->product_id);
                            // subtract number product in stock
                            $product->quantity =  $product->quantity + $order->quantity;
                            $product->qty_pay = $product->qty_pay - $order->quantity;
                            $product->save();
                        }
                    }
                    $transaction->status = 'canceled';
                    $transaction->save();
                    break;
            }
            return redirect()->back();
        }
    }
}
