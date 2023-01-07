{{--    @dd($data['statistical_date_start'])--}}
    <?php
    $i = 1;
    $total_earn_money = 0;
    $statistical_date_start = date('d-m-Y H:i:s', strtotime($data['statistical_date_start']));
    $statistical_date_end = date('d-m-Y H:i:s', strtotime($data['statistical_date_end']));
    ?>
    <center>
        <h3>BÁO CÁO DOANH THU</h3>
    </center>
    <div style="font-size: 14px">
        Cửa hàng: Kinh doanh linh kiện máy tính Gaming.<br />
        Địa chỉ cửa hàng: Trâu Quỳ, Gia Lâm, Hà Nội.<br />
        Người tạo thống kê: {{ Auth::user()->name }}<br />
    </div>
    <p style="font-size: 14px">
        Thống kê bán sản phẩm từ {{ $statistical_date_start }} đến {{ $statistical_date_end }}.
    </p>
    <p>
        {{-- @include('admin::components.listStatistical') --}}
    <table class="table table-bordered" style="font-size: 13px; border: 1px solid black;">
        <thead class="thead-dark">
            <th>STT</th>
            <th style="">Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Giảm giá</th>
            <th>Thành tiền</th>
            <th>Người mua</th>
            <tr></tr>
        </thead>
        <tbody>
            @foreach ($data['transactions'] as $transaction)
                @foreach ($transaction->orders as $order)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ number_format($order->price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $order->sale > 0 ? number_format(($order->price * (100 - $order->sale)) / 100, 0, ',', '.') . ' VNĐ (-' . $order->sale . '%)' : 'Không giảm giá' }}
                        </td>
                        <td>{{ $order->sale > 0 ? number_format($order->quantity * (($order->price * (100 - $order->sale)) / 100), 0, '.', '.') : number_format($order->quantity * $order->price, 0, ',', '.') }}
                            VNĐ</td>
                        <td>{{ $transaction->user->name }}</td>
                            <?php $total_earn_money = $total_earn_money + ($order->sale > 0 ? $order->quantity * (($order->price * (100 - $order->sale)) / 100) : $order->quantity * $order->price); ?>
                    </tr>
                @endforeach
            @endforeach
            <tr>
                <td colspan="5" style="text-align: center;font-weight: bold;font-size: 16px;">Tổng tiền:</td>
                <td colspan="2" style="text-align: center;font-weight: bold;font-size: 16px;">
                    {{ number_format($total_earn_money, '0', ',', '.') }} VNĐ</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered" style="font-size: 13px;">
        <thead class="thead-dark">
            <th>STT</th>
            <th style="">Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Giảm giá</th>
            <th>Thành tiền</th>
            <th>Người mua</th>
            <tr></tr>
        </thead>
        <tbody>
            @foreach ($data['transactions'] as $transaction)
                @foreach ($transaction->orders as $order)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ number_format($order->price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $order->sale > 0 ? number_format(($order->price * (100 - $order->sale)) / 100, 0, ',', '.') . ' VNĐ (-' . $order->sale . '%)' : 'Không giảm giá' }}
                        </td>
                        <td>{{ $order->sale > 0 ? number_format($order->quantity * (($order->price * (100 - $order->sale)) / 100), 0, '.', '.') : number_format($order->quantity * $order->price, 0, ',', '.') }}
                            VNĐ</td>
                        <td>{{ $transaction->user->name }}</td>
                        <?php $total_earn_money = $total_earn_money + ($order->sale > 0 ? $order->quantity * (($order->price * (100 - $order->sale)) / 100) : $order->quantity * $order->price); ?>
                    </tr>
                @endforeach
            @endforeach
            <tr>
                <td colspan="5" style="text-align: center;font-weight: bold;font-size: 16px;">Tổng tiền:</td>
                <td colspan="2" style="text-align: center;font-weight: bold;font-size: 16px;">
                    {{ number_format($total_earn_money, '0', ',', '.') }} VNĐ</td>
            </tr>
        </tbody>
    </table>
    <div style="float: right; text-align: center">
        <span style="font-size: 13px">Hà Nội, ngày {{ $data['day'] }} tháng {{ $data['month'] }} năm
            {{ $data['year'] }}</span><br />
        Người xuất giao dịch<br />
        <br />
        <br />
        <span class="margin-top:20px">{{ Auth::user()->name }}</span>
    </div>
    </p>

