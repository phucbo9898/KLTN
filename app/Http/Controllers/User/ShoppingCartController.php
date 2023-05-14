<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShoppingCartController extends CustomerController
{
    public function index()
    {
        $products = \Cart::content();
        $data = [
            'products' => $products
        ];
        return view('fe.shopping-cart.index', $data);
    }

    public function addCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon)->first();
        if (!empty($coupon)) {
            session()->put('coupon', $coupon);
            return back()->withInput()->with('success', 'Áp dụng voucher thành công');
        }
        return back()->withInput()->with('error', 'Áp dụng voucher thành công');
    }

    //
    public function addProduct(Request $request, $id)
    {
        if ($request->ajax()) {
            // find product
            $product = Product::find($id);
            //find product in cart for get number product in cart how many
            $product_in_cart = \Cart::content()->where('id', $id);
            // check product in cart exist and create variable test + 1 product to qty
            if ($product_in_cart->first()) {
                $then_number_product_in_cart = $product_in_cart->first()->quantity + 1;
                // check if test variable qty not ennough number product return false
                if ($then_number_product_in_cart > $product->quantity)
                    return response()->json([
                        'status' => 2,
                        'product_less' => $product->quantity
                    ]);
            }
            // check product exist
            if (!$product)
                return response()->json([
                    'status' => 3
                ]);
            // get price when customer add product to cart
            $price = $product->price;
            if ($product->sale) {
                $price = $price * (100 - $product->sale) / 100;
            }
            if ($product->quantity == 0)
                return response()->json([
                    'status' => 4
                ]);
            // add product to cart
            \Cart::add(
                [
                    'id' => $id,
                    'name' => $product->name,
                    'qty' => 1,
                    'weight' => 0,
                    'price' => $price,
                    'options' => [
                        'image' => $product->image,
                        'price_old' => $product->price,
                        'sale' => $product->sale
                    ]
                ]
            );
            return response()->json([
                'status' => 1,
                'number_product_in_cart' => \Cart::count(),
                'price_total_cart' => \Cart::subtotal(0, ',', '.')
            ]);
        }
    }

    public function editProductItem(Request $request)
    {
        $pro_id = $request->pro_id;
        $number_product_edit = $request->number_product_edit;
        // get cart
        $cart = \Cart::content();
        //get number product in stock
        $number_product_in_stock = Product::find($pro_id)->quantity;
        $product_in_stock_name = Product::find($pro_id)->name;
        //get number product in cart
        $number_product_in_cart = $cart->where('id', $pro_id)->first()->quantity;
        //check number product edit bigger number product in stock
        if ($number_product_edit > $number_product_in_stock)
            return redirect()->back()->with('warning', __('Product') . ' ' . $product_in_stock_name . ' ' .  __('only'). ' ' . $number_product_in_stock . ' ' .  __('in stock'));
        //get rowId for update number product in cart
        $rowId = $cart->where('id', $pro_id)->first()->rowId;
        \Cart::update($rowId, $number_product_edit);
        return redirect()->back()->with('success', __('Update the number of successful products'));
    }

    public function deleteProductItem($key)
    {
        \Cart::remove($key);
        return redirect()->back();
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function paymentMomo(Request $request)
    {
        $amountTotal = (int)round($request->total_momo);
        $transactionId = Transaction::insertGetId([
            'customer_name' => $request->name ?? '',
            'user_id' => Auth::user()->id,
            'total' => $amountTotal ?? '',
            'note' => $request->note ?? '',
            'address' => $request->address ?? '',
            'phone' => $request->phone_number ?? '',
            'status' => 'pending',
            'type_payment' => $request->type_payment ?? '',
            'status_payment' => $request->status_payment ?? '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($transactionId) {
            Transaction::where('id', $transactionId)->update(['payment_code' => "MGD" . "-" . $transactionId]);
            $products = \Cart::content();
            foreach ($products as $product) {
                Order::insert([
                    'transaction_id' => $transactionId ?? '',
                    'product_id' => $product->id ?? '',
                    'quantity' => $product->qty ?? '',
                    'price' => $product->options->price_old ?? '',
                    'sale' => $product->options->sale ?? '',
                    'payment_code' => "MGD" . "-" . $transactionId ?? '',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                $product_qty = Product::find($product->id);
                $quantity = $product_qty->quantity - $product->qty;
                $quantity_pay = $product_qty->qty_pay + $product->qty;
                Product::where('id', $product->id)->update(['quantity' => $quantity ?? '', 'qty_pay' => $quantity_pay ?? '']);
            }
        }

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = $amountTotal;
        $orderId = "MGD" . "-" . $transactionId;
        $redirectUrl = "http://webpc.test/feature-user/checkout/momo-check";
        $ipnUrl = "http://webpc.test/feature-user/checkout/momo-check";
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";

        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
//        dd($result);
        $jsonResult = json_decode($result, true);  // decode json
//        dd($jsonResult);

        return redirect()->to($jsonResult['payUrl']);
    }

    public function paymentVNPay(Request $request)
    {
        // get value in total money cart
        $totalMoney = str_replace(',', '', \Cart::subtotal(0));
        // insert data transaction and get id then insert
        $transactionId = Transaction::insertGetId([
            'customer_name' => $request->name ?? '',
            'user_id' => Auth::user()->id,
            'total' => $totalMoney ?? '',
            'note' => $request->note ?? '',
            'address' => $request->address ?? '',
            'phone' => $request->phone_number ?? '',
            'status' => 'pending',
            'type_payment' => $request->type_payment ?? '',
            'status_payment' => $request->status_payment ?? '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($transactionId) {
            Transaction::where('id', $transactionId)->update(['payment_code' => "MGD" . "-" . $transactionId]);
            $products = \Cart::content();
            foreach ($products as $product) {
                Order::insert([
                    'transaction_id' => $transactionId ?? '',
                    'product_id' => $product->id ?? '',
                    'quantity' => $product->qty ?? '',
                    'price' => $product->options->price_old ?? '',
                    'sale' => $product->options->sale ?? '',
                    'payment_code' => "MGD" . "-" . $transactionId ?? '',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                $product_qty = Product::find($product->id);
                $quantity = $product_qty->quantity - $product->qty;
                $quantity_pay = $product_qty->qty_pay + $product->qty;
                Product::where('id', $product->id)->update(['quantity' => $quantity ?? '', 'qty_pay' => $quantity_pay ?? '']);
            }
        }

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://webpc.test/feature-user/checkout/vnpay-check";
        $vnp_TmnCode = "XYT8WGGX";//Mã website tại VNPAY
        $vnp_HashSecret = "GBREZWZSSWLXQMRMILBUUJMBCCRPVCBJ"; //Chuỗi bí mật

        $vnp_TxnRef = "MGD" .  "-" . $transactionId; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán đơn hàng";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $_POST['total_money'] * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
}
