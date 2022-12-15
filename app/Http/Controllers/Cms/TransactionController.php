<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        $data = [
            'transactions' => $transactions
        ];
        return view('cms.transaction.index',$data);
    }

    public function getOrderItem(Request $request,$id)
    {
        if($request->ajax())
        {
            $orders = Order::where('or_transaction_id',$id)->get();
            $html  = view('admin.transaction.orderItem',compact('orders'))->render();
            return \response()->json($html);
        }
    }
}
