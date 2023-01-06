<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
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
            $orders = Order::where('transaction_id',$id)->get();
            $html  = view('cms.transaction.orderItem',compact('orders'))->render();

            return \response()->json($html);
        }
    }

    public function transactionPaid($id)
    {
        $transaction = Transaction::find($id);
        // find orders of customer in transaction
        $orders = Order::where('or_transaction_id',$id)->get();
        if($orders)
        {
            foreach ($orders as $order)
            {
                // find product in order
                $product = Product::find($order->or_product_id);
                //Add number product bought in table product
                $product->pro_pay=  $product->pro_pay + $order->or_qty;
                $product->save();
            }
            $transaction->tr_status = 2;
            Nofitication::insert(
                [
                    'nof_sender' => Auth::user()->id,
                    'nof_receiver' =>$transaction->tr_user_id,
                    'nof_content' => 'Giao dịch <b>mã số '.$id.'</b> đã <b>GIAO DỊCH THÀNH CÔNG</b> !! Bạn có thể đánh giá các sản phẩm trong giao dịch này bằng cách tìm sản phẩm hoặc kiểm tra tại Lịch sử mua hàng !!!',
                    'created_at' => Carbon::now(),
                ]
            );
            $transaction->save();
        }
        return redirect()->route('admin.transaction.index');
    }

    public function exportTransactionPdf($id)
    {
        $day = Carbon::now()->day;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $transaction = Transaction::find($id);
        $data = [
            'transaction' => $transaction,
            'day' => $day,
            'month' => $month,
            'year' => $year
        ];
        // return view('Admin.transaction.transactionPdf',$data);
        $pdf = \PDF::loadView('cms.transaction.transactionPdf', $data);
        return $pdf->download('DetailTransaction'.$transaction->User->name.'MGD'.$transaction->id.'.pdf');
    }
}
