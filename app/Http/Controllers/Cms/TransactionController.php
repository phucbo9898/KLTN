<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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
        return view('cms.transaction.index', $data);
    }

    public function getOrderItem(Request $request, $id)
    {
        if ($request->ajax()) {
            $orders = Order::where('transaction_id', $id)->get();
            $html = view('cms.transaction.orderItem', compact('orders'))->render();

            return \response()->json($html);
        }
    }

    public function handle(Request $request, $action, $id)
    {
        if ($action) {
            $transaction = Transaction::find($id);
            switch ($action) {
                case 'delete':
                    if ($transaction->status == 'pending') {
                        $orders = Order::where('transaction_id', $id)->get();
                        if ($orders) {
                            foreach ($orders as $order) {
                                $order->delete();
                            }
                        }
                        Notification::insert(
                            [
                                'sender' => Auth::user()->id,
                                'receiver' => $transaction->user_id,
                                'content' => 'Giao dịch <b>mã số ' . $id . '</b> với ghi chú "' . $transaction->note . '" <b>ĐÃ BỊ HỦY</b> ! Có thể do thiếu số lượng sản phẩm bạn yêu cầu, liên hệ lại chủ cửa hàng để biết thêm chi tiết !!!',
                                'created_at' => Carbon::now(),
                            ]
                        );
                        $transaction->delete();
                    } else if ($transaction->status == 'processing') {
                        // find orders of customer in transaction
                        $orders = Order::where('transaction_id', $id)->get();
                        if ($orders) {
                            foreach ($orders as $order) {
                                // find product in order
                                $product = Product::find($order->product_id);
                                $product->quantity = $product->quantity + $order->quantity;
                                $product->save();
                                $order->delete();
                            }
                        }
                        Notification::insert(
                            [
                                'sender' => Auth::user()->id,
                                'receiver' => $transaction->user_id,
                                'content' => 'Giao dịch <b>mã số ' . $id . '</b> với ghi chú "' . $transaction->note . '" <b>đã bị hủy</b> trong khi vận chuyển !! Liên lạc lại chủ cửa hàng để biết thêm chi tiết !',
                                'created_at' => Carbon::now()
                            ]
                        );
                        $transaction->delete();
                    } else {
                        $request->session()->flash('stopDelete', 'Giao dịch này đã thành công hoặc có dữ liệu quan trọng không thể xóa !!!');
                    }
                    return redirect()->route('admin.transaction.index')->with('success', 'Đã hủy giao dịch thành công');
                    break;
                case 'send':
                    // find orders of customer in transaction
                    $orders = Order::where('transaction_id', $id)->get();
                    if ($orders) {
                        foreach ($orders as $order) {
                            // find product in order
                            $product = Product::find($order->product_id);
                            // check number product enough number product customer buy
                            if ($product->quantity < $order->quantity) {
                                Notification::insert(
                                    [
                                        'sender' => Auth::user()->id,
                                        'receiver' => $transaction->user_id,
                                        'content' => 'Giao dịch mã số ' . $id . ' có sản phẩm ' . $product->name . ' đã hết hàng ! Chủ cửa hàng có thể nhập thêm hoặc đơn hàng này sẽ bị <b>HỦY</b> trong thời gian tới !!!',
                                        'created_at' => Carbon::now()
                                    ]
                                );
                                $request->session()->flash('OutOfStock', 'Sản phẩm ' . $product->name . ' đã hết hàng không thể thay đổi trạng thái giao dịch này !!!');
                                return redirect()->back();
                            }

                            // subtract number product in stock
                            $product->quantity =  $product->quantity - $order->quantity;
                            $product->save();
                        }
                        $transaction->status = 'processing';
                        $transaction->save();
                    }
                    return redirect()->route('admin.transaction.index')->with('success', 'Đã gửi hàng thành công !');
                case 'change-status':
                    $transaction->status_payment = $transaction->status_payment == '' ? 'Paуment received' : '';
                    $transaction->save();
                    break;
            }
            return redirect()->route('admin.transaction.index');
        }
    }

    public function transactionPaid($id)
    {
        $transaction = Transaction::find($id);
        // find orders of customer in transaction
        $orders = Order::where('transaction_id', $id)->get();
        if ($orders) {
            foreach ($orders as $order) {
                // find product in order
                $product = Product::find($order->product_id);
                //Add number product bought in table product
                $product->qty_pay = $product->qty_pay + $order->quantity;
                $product->save();
            }
            $transaction->status = 'completed';
            Notification::insert(
                [
                    'sender' => Auth::user()->id,
                    'receiver' => $transaction->user_id,
                    'content' => 'Giao dịch <b>mã số ' . $id . '</b> đã <b>GIAO DỊCH THÀNH CÔNG</b> !! Bạn có thể đánh giá các sản phẩm trong giao dịch này bằng cách tìm sản phẩm hoặc kiểm tra tại Lịch sử mua hàng !!!',
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
        $pdf = \PDF::loadView('cms.transaction.transactionPdf', $data);

        return $pdf->download('DetailTransaction' . $transaction->User->name . 'No.' . $transaction->id . '.pdf');
    }
}
