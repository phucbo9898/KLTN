<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="width:650px;margin-left: 10px;margin-right: 10px;">
    <div>
        <h3>Cảm ơn bạn đã tin tưởng và đặt mua sản phẩm bên shop. Shop đã nhận được yêu cầu đặt hàng của bạn và đang xử lý, shop sẽ giao hàng đúng thời gian dự kiến</h3>
    </div>
    <h1 style="text-align: center">Thông tin đơn hàng MGD-{{$transactionId}}</h1>
    <div style="display:flex; width: 600px; margin-bottom: 10px;">
        <div style="width: 450px;">
            <span>Tên khách hàng: {{$data['name'] ?? ''}}</span><br>
            <span>Điện thoại: {{$data['phone'] ?? ''}}</span><br>
            <span>Địa chỉ: {{$data['address'] ?? ''}}</span><br>
            <span>Ghi chú: {{$data['note'] ?? ''}}</span><br>
            <span>Phương thức thanh toán: {{$data['type_payment'] ?? ''}}</span><br>
            <span>Tình trạng thanh toán: {{ isset($data['status_payment']) && $data['status_payment'] == 'Paуment received' ? 'Đã thanh toán' : 'Chưa thanh toán'}}</span>
        </div>
    </div>
    <table border="1" cellspacing="0" cellpadding="0" width="100%" style="border:1px solid;">
        <thead>
            <tr>
                <th scope="col">TT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">SL</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Giảm giá</th>
                <th scope="col">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php
                $stt =1
            @endphp
            @if(isset($products))
                @foreach($products as $product)
                    <tr>
                        <td style="text-align:center;">{{$stt++}}</td>
                        <td style="text-align:center; width: 250px;">{{$product->name}}</td>
                        <td style="text-align:center;">{{$product->qty}}</td>
                        <td style="text-align:center;">{{number_format($product->options->price_old,0,',',',')}} VNĐ</td>
                        <td style="text-align:center;">{{$product->options->sale}}</td>
                        <td style="text-align:center;">{{number_format(($product->options->price_old * (100 -$product->options->sale)/100) * $product->qty, 0, ',', ',') }} VNĐ</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <br>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td style="width:245px;">Thời gian đặt hàng: {{date('H:i d/m/Y', strtotime($data['time_order']))}}</td>
            <td style="width:115px;">&ensp;</td>
            <td>Áp mã giảm giá: {{ !empty($data['saleVoucher']) && !empty($data['codeVoucher']) ? $data['codeVoucher'] . " (" . $data['saleVoucher'] . "%" . ")" : 'Không có' }}</td>
            <td>&ensp;</td>
        </tr>
        <tr>
            <td>Thời gian giao hàng: {{date('d/m/Y', strtotime($data['delivery_time']))}}</td>
            <td>&ensp;</td>
            <td>Tổng cộng: {{$data['total']}}</td>
            <td>&ensp;</td>
        </tr>
    </table>
    <br>
    <footer>
        <div style="text-align: center;margin-left:360px;">
            <div><span>Ngày {{$data['day']}} tháng {{$data['month']}} năm {{$data['year']}}</span></div>
            <div><span>Người bán hàng</span></div>
            <br><br>
            <div><span></span></div>
        </div>
    </footer>
</div>
</body>
</html>
