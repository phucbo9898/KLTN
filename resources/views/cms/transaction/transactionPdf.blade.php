<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @font-face {
            font-family: 'DejaVuSans';
            src: url({{ storage_path('fonts/DejaVuSans.ttf') }}) format('truetype');
            font-weight: 600;
            font-style: normal;
        }

        body {
            font-family: DejaVuSans;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="font-family:DejaVuSans">
    <img src="{{ asset('images/logo-fe.png') }}" alt="" style="width: 90px;">
    <center><span style="font-weight: bolder;font-size: 1.75rem;">CHI TIẾT GIAO DỊCH SỐ {{ $transaction->id }}</span>
    </center>
    <br>
    <div style="font-size: 14px">
        Cửa hàng: Kinh doanh linh kiện máy tính Gaming.<br />
        Địa chỉ cửa hàng: Trâu Quỳ, Gia Lâm, Hà Nội.<br />
        Tên khách hàng: {{ $transaction->customer_name ?? '' }}<br />
        Số điện thoại: {{ $transaction->phone ?? '' }}<br />
        Địa chỉ giao hàng: {{ $transaction->address ?? '' }}.
    </div>
    <p style="font-size: 14px">Lời nhắn từ khách hàng: {{ $transaction->note ?? '' }}</p>
    <p style="font-size: 14px">Trạng thái giao dịch:
        @if ($transaction->status == 0)
            <b style="font-weight: bold">Đang xử lý</b>
        @elseif($transaction->status == 1)
            <b style="font-weight: bold;">Đã gửi hàng</b>
        @elseif($transaction->status == 2)
            <b style="font-weight: bold;">Đã nhận hàng</b>
        @else
            <b>Không xác định</b>
        @endif
    </p>
    <?php
    $i = 1;
    $total_earn_money = 0;
    ?>
    <table class="table table-bordered" style="font-size: 11px;">
        <thead class="thead-dark">
            <th scope="col">STT</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">SL</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Giảm giá</th>
            <th scope="col">Thành tiền</th>
            <tr></tr>
        </thead>
        <tbody>
            @foreach ($transaction->orders as $order)
                <tr>
                    <td class="" style="text-align: center;">{{ $i++ }}</td>
                    <td class="col-md-3">{{ $order->product->name }}</td>
                    <td class="" style="text-align: center;">{{ $order->quantity }}</td>
                    <td class="col-md-2">{{ number_format($order->price, 0, ',', '.') }} VNĐ</td>
                    @if($order->sale > 0)
                        <td class="col-md-4">
                            {{ number_format(($order->price * (100 - $order->sale)) / 100, 0, ',', '.') . ' VNĐ (-' . $order->sale . '%)'}}
                        </td>
                    @else
                        <td class="col-md-4">
                            {{ number_format(($order->price * (100 - $order->sale)) / 100, 0, ',', '.') . ' VNĐ (-' . $order->sale . '%)' : 'Không giảm giá' }}
                        </td>
                    @endif
                    <td class="col-md-3">{{ $order->sale > 0 ? number_format($order->quantity * (($order->price * (100 - $order->sale)) / 100), 0, '.', '.') : number_format($order->quantity * $order->price, 0, ',', '.') }}VNĐ</td>
                    <?php $total_earn_money = $total_earn_money + ($order->sale > 0 ? $order->quantity * (($order->price * (100 - $order->sale)) / 100) : $order->quantity * $order->price); ?>
                </tr>
            @endforeach
{{--            <tr>--}}
{{--                <td colspan="4" style="text-align: right;font-weight: bold;font-size: 16px;">Tổng tiền:</td>--}}
{{--                <td colspan="2" style="text-align: center;font-weight: bold;font-size: 16px;">--}}
{{--                    {{ number_format($total_earn_money, '0', ',', '.') }} VNĐ--}}
{{--                </td>--}}
{{--            </tr>--}}
        </tbody>
    </table>
    <div style="float: right; text-align: center">
        <span style="font-size: 13px">Hà Nội, ngày {{ $day }} tháng {{ $month }} năm
            {{ $year }}</span><br />
        Người xuất giao dịch<br />
        <br />
        <br />
        <span class="margin-top:20px">{{ Auth::user()->name }}</span>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
