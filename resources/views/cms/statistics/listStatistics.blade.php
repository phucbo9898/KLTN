@if ($transactions)
    <?php $i = 1;
    $total_earn_money = 0;
    ?>
    <input type="hidden" name="count" value="{{ $count ?? '' }}">
    <div id="data-statistical-date-start" data-statistical-date-start="{{ $statistical_date_start ?? '' }}"></div>
    <div id="data-statistical-date-end" data-statistical-date-end="{{ $statistical_date_end ?? '' }}"></div>
    @if($count > 0)
        <a href="#" class="btn btn-success mb-2" id="export_pdf" style="float:right;display:none">Xuất báo
            cáo</a>
    @else
        <a href="#" class="btn btn-success mb-2 d-none" id="export_pdf" style="float:right;display:none">Xuất báo
            cáo</a>
    @endif
    <table class="table table-hover table-bordered">
        <thead class="thead-dark" style="text-align: left !important;">
            <th scope="col">STT</th>
            <th scope="col" style="">Tên Sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Giảm giá</th>
            <th scope="col">Thành tiền</th>
            <th scope="col">Người mua</th>
            <th>Mã giao dịch</th>
        </thead>
        <tbody>
            <tr></tr>
            @foreach ($transactions as $transaction)
                @foreach ($transaction->orders as $order)
                    <tr style="text-align: left !important;">
                        <td style="text-align: center !important;">{{ $i++ }}</td>
                        <td>{{ $order->product->name ?? '' }}</td>
                        <td style="text-align: center !important;">{{ $order->quantity ?? '' }}</td>
                        <td>{{ number_format($order->price ?? '', 0, ',', '.') }} VNĐ</td>
                        <td>{{ isset($order->sale) && $order->sale > 0 ? $order->sale . "%" : 'Không giảm giá' }}
                        </td>
                        <td>{{ isset($order->sale) && isset($order->quantity) && isset($order->price) && $order->sale > 0 ? number_format($order->quantity * (($order->price * (100 - $order->sale)) / 100), 0, '.', '.') : number_format($order->quantity * $order->price, 0, ',', '.') }}
                            VNĐ</td>
                        <td>{{ $transaction->customer_name ?? '' }}</td>
                        <td>{{ $transaction->payment_code ?? '' }}</td>
                        <?php $total_earn_money = $total_earn_money + ($order->sale > 0 ? $order->quantity * (($order->price * (100 - $order->sale)) / 100) : $order->quantity * $order->price); ?>
                    </tr>
                @endforeach
            @endforeach
            @if($count > 0)
                <tr>
                    <td colspan="6" style="text-align: right;font-weight: bold;font-size: 20px;">Tổng tiền:</td>
                    <td colspan="3" style="text-align: left;font-weight: bold;font-size: 20px;">
                        {{ number_format($total_earn_money, '0', ',', '.') }} VNĐ</td>
                </tr>
            @else
                <tr>
                    <td colspan="8">Không có dữ liệu !!!</td>
                </tr>
            @endif
        </tbody>
    </table>
@endif
@section('javascript')
    $(function() {
        $("#export_pdf").click(function (event) {
            event.preventDefault();
            var user = $("#user_statistic").val();
            console.log(user)
            var statistical_date_start_pdf = $("#data-statistical-date-start").attr(
            'data-statistical-date-start');
            var statistical_date_end_pdf = $("#data-statistical-date-end").attr(
            'data-statistical-date-end');
            var url = "{{ route('admin.get.export.excel') }}";
            window.location.href = url + '?statistical_date_start_pdf=' + statistical_date_start_pdf +
            '&&' + 'statistical_date_end_pdf=' + statistical_date_end_pdf + '&&' + 'user=' + user;
        });
    })
@endsection
