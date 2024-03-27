<?php

namespace App\Http\Controllers\Cms;

use App\Enums\StatusTransaction;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductQtyPay;
use App\Models\Transaction;
use App\Repositories\ProductRepository;
use App\Repositories\TransactionRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDF;

class TransactionController extends Controller
{
    private $transactionRepository;
    private $productRepository;

    public function __construct(
        TransactionRepository $transactionRepository,
        ProductRepository $productRepository
    )
    {
        $this->transactionRepository = $transactionRepository;
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $options = $request->all();
        $transactions = $this->transactionRepository->query($options)->get();
        return view('cms.transaction.index', compact('options', 'transactions'));
    }

    public function getOrderItem(Request $request, $id)
    {
        if ($request->ajax()) {
            $transaction = Transaction::where('id', $id)->first();
            $orders = Order::where('transaction_id', $id)->get();
            $html = view('cms.transaction.orderItem', compact('orders', 'transaction'))->render();

            return \response()->json($html);
        }
    }

    public function handle(Request $request, $action, $id)
    {
        $transaction = $this->transactionRepository->find($id);
        if (!$transaction) {
            return redirect()->route('admin.transaction.index')->with('error', __('The requested resource is not available'));
        }
        if ($action) {
            switch ($action) {
                case 'cancel':
                    $transaction->status = 'canceled';
                    $transaction->save();
                    Notification::insert(
                        [
                            'sender' => Auth::user()->id,
                            'receiver' => $transaction->user_id ?? 0,
                            'content' => 'Giao dịch <b>mã số ' . $id . '</b> với ghi chú "' . $transaction->note . '" <b>ĐÃ BỊ HỦY</b> ! Khách hàng yêu cầu hủy đơn hàng !!!',
                            'created_at' => Carbon::now(),
                        ]
                    );

                    $orders = Order::where('transaction_id', $transaction['id'])->get();
                    if ($orders) {
                        foreach ($orders as $order) {
                            // find product in order
                            $product = $this->productRepository->find($order->product_id);
                            // subtract number product in stock
                            $product->quantity = $product->quantity + $order->quantity;
                            $product->qty_pay = $product->qty_pay - $order->quantity;
                            $product->save();
                        }
                    }
                    return redirect()->route('admin.transaction.index')->with('success', 'Đã hủy giao dịch thành công');
                case 'send':
                    // find orders of customer in transaction
                    $orders = Order::where('transaction_id', $transaction['id'])->get();
                    if ($orders) {
                        foreach ($orders as $order) {
                            // find product in order
                            $product = $this->productRepository->find($order->product_id);
                            // check number product enough number product customer buy
                            if ($product->quantity < $order->quantity) {
                                Notification::insert(
                                    [
                                        'sender' => Auth::user()->id,
                                        'receiver' => $transaction->user_id ?? 0,
                                        'content' => 'Giao dịch mã số ' . $id . ' có sản phẩm ' . $product->name . ' đã hết hàng ! Chủ cửa hàng có thể nhập thêm hoặc đơn hàng này sẽ bị <b>HỦY</b> trong thời gian tới !!!',
                                        'created_at' => Carbon::now()
                                    ]
                                );
                                $request->session()->flash('error', 'Sản phẩm ' . $product->name . ' đã hết hàng không thể thay đổi trạng thái giao dịch này !!!');
                                return redirect()->back();
                            }
                        }
                        $transaction->status = StatusTransaction::PROCESSING;
                        $transaction->save();
                    }
                    return redirect()->route('admin.transaction.index')->with('success', 'Đã gửi hàng thành công !');
                case 'change-status':
                    $transaction->status_payment = 'Paуment received';
                    $transaction->save();
                    break;
            }
            return redirect()->route('admin.transaction.index');
        }
    }

    public function transactionPaid($id)
    {
        try {
            DB::beginTransaction();
            $transaction = $this->transactionRepository->find($id);
            // find orders of customer in transaction
            $orders = Order::where('transaction_id', $id)->get();
            if ($orders) {
                foreach ($orders as $order) {
                    $product = Product::where('id', $order->product_id)->first();
                    $startDayOfMonth = Carbon::now()->startOfMonth();
                    $endDayOfMonth = Carbon::now()->endOfMonth();
                    $checkExistProduct = ProductQtyPay::where('product_id', $product->id)
                        ->whereBetween('time_pay', [$startDayOfMonth, $endDayOfMonth])
                        ->first();
                    if (!empty($checkExistProduct)) {
                        $monthOfProduct = Carbon::parse($checkExistProduct['time_pay'])->format('m');
                        if ($monthOfProduct == Carbon::now()->format('m')) {
                            ProductQtyPay::where('product_id', $product->id)->update([
                                'quantity_pay' => $checkExistProduct->quantity_pay + $order->quantity,
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ]);
                        } else {
                            ProductQtyPay::create([
                                'product_id' => $product->id ?? '',
                                'quantity_pay' => $order->quantity ?? '',
                                'time_pay' => Carbon::now(),
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ]);
                        }
                    } else {
                        ProductQtyPay::create([
                            'product_id' => $product->id ?? '',
                            'quantity_pay' => $order->quantity ?? '',
                            'time_pay' => Carbon::now(),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }
                }
                $transaction->status = 'completed';
                Notification::insert(
                    [
                        'sender' => Auth::id(),
                        'receiver' => $transaction->user_id ?? 0,
                        'content' => 'Giao dịch <b>mã số ' . $id . '</b> đã <b>GIAO DỊCH THÀNH CÔNG</b> !! Bạn có thể đánh giá các sản phẩm trong giao dịch này bằng cách tìm sản phẩm hoặc kiểm tra tại Lịch sử mua hàng !!!',
                        'created_at' => Carbon::now(),
                    ]
                );
                $transaction->save();
            }
            DB::commit();
            return redirect()->route('admin.transaction.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::debug($exception->getMessage());
        }
    }

    public function exportTransactionPdf($id)
    {
        $day = Carbon::now()->day;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $transaction = $this->transactionRepository->find($id);
        $data = [
            'transaction' => $transaction,
            'day' => $day,
            'month' => $month,
            'year' => $year
        ];
        $pdf = \PDF::loadView('cms.transaction.transactionPdf', $data);
        $nameUser = str_replace(' ', '_', Auth::user()->name);

        return $pdf->download('DetailTransaction' . $nameUser . 'No.' . $transaction->id . '.pdf');
    }
}
