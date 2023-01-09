<?php

namespace App\Http\Controllers\User;

use App\Enums\StatusTransaction;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $transactions = $user->transactions->sortByDesc('id');
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

    public function transactionPaid($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('transaction_id', $id)->get();
        if ($orders) {
            foreach ($orders as $order) {
                $product = Product::find($order->product_id);
                if ($product->number < $order->quantity)
                    return redirect()->route('admin.home');
                $product->quantity = $product->quantity - $order->quantity;
                $product->qty_pay = $product->qty_pay + $order->quantity;
                $product->save();
            }
            $transaction->status = StatusTransaction::COMPLETED;
            $transaction->save();
        }
        return redirect()->back();
    }
}
