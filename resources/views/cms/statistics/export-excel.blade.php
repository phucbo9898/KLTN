{{--    @dd($data['statistical_date_start']) --}}
<?php
$i = 1;
$total_earn_money = 0;
$statistical_date_start = date('d-m-Y H:i:s', strtotime($data['statistical_date_start'] ?? ''));
$statistical_date_end = date('d-m-Y H:i:s', strtotime($data['statistical_date_end'] ?? ''));
$startDate = date('d-m-Y', strtotime($data['statistical_date_start'] ?? ''));
$endDate = date('d-m-Y', strtotime($data['statistical_date_end'] ?? ''));
?>
<table class="table table-bordered" style="font-size: 12px" border="1">
    <tbody>
        <tr>
            <td></td>
            <td colspan="6" style="font-size: 12px;">Cửa hàng: Kinh doanh linh kiện máy tính Gaming.</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="6" style="font-size: 12px;">Địa chỉ cửa hàng: Tòa Mitec, Yên Hòa, Cầu Giấy, Hà Nội, Việt Nam
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="6" style="font-size: 12px;">Người tạo thống kê: {{ Auth::user()->name ?? '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="6" style="font-size: 12px;">Ngày tạo thống kê: ngày {{ $data['day'] ?? '' }} tháng
                {{ $data['month'] ?? '' }} năm {{ $data['year'] ?? '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="6" style="font-size: 12px;">Báo cáo doanh thu từ {{ $startDate ?? '' }} đến
                {{ $endDate ?? '' }}</td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>
<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered" style="font-size: 13px;"
    width="80%">
    <thead class="thead-dark">
        <th style="text-align: center">STT</th>
        <th style="text-align: center">Tên sản phẩm</th>
        <th style="text-align: center">Số lượng</th>
        <th style="text-align: center">Đơn giá</th>
        <th style="text-align: center">Giảm giá</th>
        <th style="text-align: center">Thành tiền</th>
        <th style="text-align: center">Người mua</th>
        <tr></tr>
    </thead>
    <tbody>
        @foreach ($data['transactions'] as $transaction)
            @foreach ($transaction->orders as $order)
                <tr>
                    <td style="text-align: center">{{ $i++ }}</td>
                    <td>{{ $order->product->name ?? '' }}</td>
                    <td style="text-align: center">{{ $order->quantity ?? '' }}</td>
                    <td style="text-align: center">{{ number_format(($order->price ?? ''), 0, ',', '.') }} VNĐ</td>
                    <td style="text-align: center">
                        {{ isset($order->sale) && isset($order->price) && $order->sale > 0 ? number_format(($order->price * (100 - $order->sale)) / 100, 0, ',', '.') . ' VNĐ (-' . $order->sale . '%)' : 'Không giảm giá' }}
                    </td>
                    <td style="text-align: center">
                        {{ isset($order->sale) && isset($order->quantity) && isset($order->price) && $order->sale > 0 ? number_format($order->quantity * (($order->price * (100 - $order->sale)) / 100), 0, '.', '.') : number_format($order->quantity * $order->price, 0, ',', '.') }}
                        VNĐ</td>
                    <td style="text-align: center">{{ $transaction->user->name ?? '' }}</td>
                    <?php $total_earn_money = $total_earn_money + ($order->sale > 0 ? $order->quantity * (($order->price * (100 - $order->sale)) / 100) : $order->quantity * $order->price); ?>
                </tr>
            @endforeach
        @endforeach
        <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: center;font-weight: bold;font-size: 16px;">Tổng tiền:</td>
            <td style="text-align: center;font-weight: bold;font-size: 16px;">
                {{ number_format(($total_earn_money ?? ''), '0', ',', '.') }} VNĐ</td>
        </tr>
    </tbody>
</table>
