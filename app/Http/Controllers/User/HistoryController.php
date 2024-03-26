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
use Illuminate\Support\Facades\Log;

class HistoryController extends CustomerController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->paginate(10);
        return view('fe.history.index', ['transactions' => $transactions]);
    }

    public function getOrderItem(Request $request, $id)
    {
        if ($request->ajax()) {
            $transaction = Transaction::where('id', $id)->first();
            $orders = Order::where('transaction_id', $id)->get();
            $html = view('fe.history.orderItem', compact('orders', 'transaction'))->render();

            return \response()->json($html);
        }
    }

    public function transactionPaid(Request $request, $action, $id)
    {
        try {
            $transaction = Transaction::find($id);
            $orders = Order::where('transaction_id', $id)->get();

            if ($action) {
                switch ($action) {
                    case 'change-status':
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
        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
        }
    }
}
