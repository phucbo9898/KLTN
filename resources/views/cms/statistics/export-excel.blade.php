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
<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered" id="list-statistic" style="font-size: 13px;"
    width="80%">
    <thead class="thead-dark">
        <th style="text-align: center">STT</th>
        <th style="text-align: center">Mã đơn hàng</th>
        <th style="text-align: center">Người mua</th>
        <th style="text-align: center">Loại thanh toán</th>
        <th style="text-align: center">Tổng tiền</th>
        <th style="text-align: center">Ngày đặt</th>
        <tr></tr>
    </thead>
    <tbody>
        @foreach ($data['transactions'] as $transaction)
            <tr>
                <td style="text-align: center !important;">{{ $i++ }}</td>
                <td style="text-align: center !important;">{{ $transaction->payment_code ?? '' }}</td>
                <td style="text-align: center !important;">{{ $transaction->customer_name ?? '' }}</td>
                <td style="text-align: center !important;">{{ $transaction->type_payment ?? '' }}</td>
                <td style="text-align: center !important;">{{ number_format($transaction->total ?? '', 0, ',', '.') }} VNĐ</td>
                <td style="text-align: center !important;">
                    {{ $transaction->convert_time ?? '' }}
                </td>
                    <?php $total_earn_money = $total_earn_money +
                    $transaction->total; ?>
            </tr>
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
