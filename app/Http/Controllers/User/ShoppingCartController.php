<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

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
            return redirect()->back()->with('warning', 'Sản phẩm ' . $product_in_stock_name . ' chỉ còn ' . $number_product_in_stock . ' trong kho');
        //get rowId for update number product in cart
        $rowId = $cart->where('id', $pro_id)->first()->rowId;
        \Cart::update($rowId, $number_product_edit);
        return redirect()->back()->with('success', 'Cập nhật số lượng sản phẩm thành công');
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
//        dd($request->all());
        $amountTotal = (int)round($request->total_momo);
        $userPayment = $request->name;
        $addressPayment = $request->address;
        $phonePayment = $request->phone_number;
        $notePayment = $request->note;

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = $amountTotal;
        $orderId = $amountTotal . $phonePayment;
        $redirectUrl = "http://localhost:8080/webpc/public/feature-user/checkout";
        $ipnUrl = "http://localhost:8080/webpc/public/feature-user/checkout";
        $extraData = "";
//        dd($extraData);
//        dd($extraData);

        $requestId = time() . "";
        $requestType = "payWithATM";
//        $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
//        dd($extraData);
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
//        dd($signature);
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
            'name' => $userPayment,
            'phone' => $phonePayment,
            'address' => $addressPayment,
            'note' => $notePayment
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
//        dd($result);
        $jsonResult = json_decode($result, true);  // decode json

        return redirect()->to($jsonResult['payUrl']);
//        header('Location: ' . $jsonResult['payUrl']);
//        }
    }
}
