<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductQtyPay;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;

class FeatureUserController extends CustomerController
{
    public function getFormPay()
    {
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
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $note = $request->note;
        $type_payment = $request->type_payment;
        $amount = $request->price;
        if (\session()->has('coupon')) {
            $totalAmount = number_format(str_replace('.', '', \Cart::subtotal(0, ',', '.')) * (100 - session()->get('coupon')->sale) / 100) . " " . "VND";
        } else {
            $totalAmount = str_replace(',', '.', \Cart::subtotal(0)) . " " . "VND";
        }
        $days = Carbon::now()->day;
        $months = Carbon::now()->month;
        $years = Carbon::now()->year;
        $time_order = Carbon::now();
        $delivery_time = Carbon::now()->addDays(5);
        $codeVoucher = \session()->get('coupon')->code ?? '';
        $saleVoucher = \session()->get('coupon')->sale ?? '';

//        dd($amount);
        // insert data transaction and get id then insert
        $transactionId = Transaction::insertGetId([
            'customer_name' => $name ?? '',
            'user_id' => Auth::user()->id,
            'total' => $amount ?? str_replace(',', '', \Cart::subtotal(0)),
            'note' => $request->note ?? '',
            'address' => $request->address ?? '',
            'phone' => $request->phone ?? '',
            'status' => 'pending',
            'type_payment' => $request->type_payment ?? '',
            'status_payment' => $request->status_payment ?? 'Paуment not received',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // check exist id transaction above and insert order
        if ($transactionId) {
            Transaction::where('id', $transactionId)->update(['payment_code' => 'MGD-' . $transactionId ?? '']);
            $products = \Cart::content();
            foreach ($products as $product) {
                Order::insert([
                    'transaction_id' => $transactionId ?? '',
                    'product_id' => $product->id ?? '',
                    'quantity' => $product->qty ?? '',
                    'price' => $product->options->price_old ?? '',
                    'sale' => $product->options->sale ?? '',
                    'payment_code' => 'MGD-' . $transactionId ?? '',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                $startDayOfMonth = Carbon::now()->startOfMonth();
                $endDayOfMonth = Carbon::now()->endOfMonth();
                $checkExistProduct = ProductQtyPay::where('product_id', $product->id)->whereBetween('time_pay', [$startDayOfMonth, $endDayOfMonth])->first();
                if (!empty($checkExistProduct)) {
                    $monthOfProduct = Carbon::parse($checkExistProduct['time_pay'])->format('m');
                    if ($monthOfProduct == Carbon::now()->format('m')) {
                        ProductQtyPay::where('product_id', $product->id)->update([
                            'quantity_pay' => $checkExistProduct->quantity_pay + ($product->qty ?? ''),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    } else {
                        ProductQtyPay::create([
                            'product_id' => $product->id ?? '',
                            'quantity_pay' => $product->qty ?? '',
                            'time_pay' => Carbon::now(),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }
                } else {
                    ProductQtyPay::create([
                        'product_id' => $product->id ?? '',
                        'quantity_pay' => $product->qty ?? '',
                        'time_pay' => Carbon::now(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
                $product_qty = Product::find($product->id);
                $quantity = $product_qty->quantity - $product->qty;
                $quantity_pay = $product_qty->qty_pay + $product->qty;
                Product::where('id', $product->id)->update(['quantity' => $quantity ?? '', 'qty_pay' => $quantity_pay ?? '']);
            }
//            dd($codeVoucher, $saleVoucher);
            $data = [
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'note' => $note,
                'type_payment' => $type_payment,
                'total' => $totalAmount,
                'day' => $days,
                'month' => $months,
                'year' => $years,
                'time_order' => $time_order,
                'delivery_time' => $delivery_time,
                'codeVoucher' => $codeVoucher ?? '',
                'saleVoucher' => $saleVoucher ?? '',
            ];

            //Send mail
            if (isset($products)) {
                Mail::send('fe.email.payment',compact('transactionId', 'data', 'products'), function($email) {
                    $email->from(env('MAIL_USERNAME'), 'Kaiser Computer');
                    $email->subject('Hóa đơn thanh toán');  //Tieu de mail
                    $email->to(auth()->user()->email);
                });
            }
            \Cart::destroy();
            Session::forget('coupon');
        }
        return view('fe.thank');
    }
    public function deleteNofication(Request $request, $id)
    {
        $nofication = Notification::find($id);
        $nofication->delete();
        return redirect()->back();
    }

    // Check payment VNPay and save data to database
    public function vnpayCheck(Request $request)
    {
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef');
        $vnp_Amount = $request->get('vnp_Amount');

        if ($vnp_ResponseCode != null) {
            if ($vnp_ResponseCode == 00) {
                Transaction::where('payment_code', $vnp_TxnRef)->update(['status_payment' => 'Paуment received']);
                $products = \Cart::content();

                $transaction = Transaction::where('payment_code', $vnp_TxnRef)->first();
                $transactionId = $transaction->id ?? '';
                $name = $transaction->customer_name ?? '';
                $address = $transaction->address ?? '';
                $phone = $transaction->phone ?? '';
                $note = $transaction->note ?? '';
                $type_payment = $transaction->type_payment ?? '';
                $totalAmount = \Cart::subtotal(0, ',', '.') . " " . "VND" ?? '';
                $days = Carbon::now()->day;
                $months = Carbon::now()->month;
                $years = Carbon::now()->year;
                $time_order = Carbon::now();
                $delivery_time = Carbon::now()->addDays(5);
                $status_payment = $transaction->status_payment ?? '';
                $data = [
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'note' => $note,
                    'type_payment' => $type_payment,
                    'total' => $totalAmount,
                    'day' => $days,
                    'month' => $months,
                    'year' => $years,
                    'time_order' => $time_order,
                    'delivery_time' => $delivery_time,
                    'status_payment' => $status_payment
                ];

                //Send mail
                if (isset($products)) {
                    Mail::send('fe.email.payment',compact('transactionId', 'data', 'products'), function($email) {
                        $email->from(env('MAIL_USERNAME'), 'Kaiser Computer');
                        $email->subject('Hóa đơn thanh toán');  //Tieu de mail
                        $email->to(auth()->user()->email);
                    });
                }
                \Cart::destroy();
                Session::forget('coupon');
                return view('fe.thank');
            } else {
                Order::where('payment_code', $vnp_TxnRef)->delete();
                Transaction::where('payment_code', $vnp_TxnRef)->delete();
                return redirect()->route('feature-user.checkout');
            }
        }
    }

    // Check payment Momo and save data to database
    public function momoCheck(Request $request)
    {
        $resultCode = $request->get('resultCode');
        $orderId = $request->get('orderId');

        if ($resultCode != null) {
            if ($resultCode == 0) {
                Transaction::where('payment_code', $orderId)->update(['status_payment' => 'Paуment received']);

                $products = \Cart::content();

                $transaction = Transaction::where('payment_code', $orderId)->first();
                $transactionId = $transaction->id ?? '';
                $name = $transaction->customer_name ?? '';
                $address = $transaction->address ?? '';
                $phone = $transaction->phone ?? '';
                $note = $transaction->note ?? '';
                $type_payment = $transaction->type_payment ?? '';
                $totalAmount = number_format($transaction->total) . " " . "VNĐ" ?? '';
                $days = Carbon::now()->day;
                $months = Carbon::now()->month;
                $years = Carbon::now()->year;
                $time_order = Carbon::now();
                $delivery_time = Carbon::now()->addDays(5);
                $status_payment = $transaction->status_payment ?? '';
                $codeVoucher = \session()->get('coupon')->code ?? '';
                $saleVoucher = \session()->get('coupon')->sale ?? '';
                $data = [
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'note' => $note,
                    'type_payment' => $type_payment,
                    'total' => $totalAmount,
                    'day' => $days,
                    'month' => $months,
                    'year' => $years,
                    'time_order' => $time_order,
                    'delivery_time' => $delivery_time,
                    'status_payment' => $status_payment,
                    'codeVoucher' => $codeVoucher ?? '',
                    'saleVoucher' => $saleVoucher ?? '',
                ];

                //Send mail
                if (isset($products)) {
                    Mail::send('fe.email.payment',compact('transactionId', 'data', 'products'), function($email) {
                        $email->from(env('MAIL_USERNAME'), 'Kaiser Computer');
                        $email->subject('Hóa đơn thanh toán');  //Tieu de mail
                        $email->to(auth()->user()->email);
                    });
                }

                \Cart::destroy();
                Session::forget('coupon');
                return view('fe.thank');
            } else {
                Order::where('payment_code', $orderId)->delete();
                Transaction::where('payment_code', $orderId)->delete();
                return redirect()->route('feature-user.checkout');
            }
        }
    }
}
