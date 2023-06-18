@if ($transactions)
    <?php $i = 1;
    $total_earn_money = 0;
    ?>
    <input type="hidden" name="count" value="{{ $count ?? '' }}">
    <div id="data-statistical-date-start" data-statistical-date-start="{{ $statistical_date_start ?? '' }}"></div>
    <div id="data-statistical-date-end" data-statistical-date-end="{{ $statistical_date_end ?? '' }}"></div>
    <table class="table table-hover table-bordered" id="list-statistic">
        <thead class="thead-dark" style="text-align: left !important;">
            <th scope="col">STT</th>
            <th scope="col" style="">Mã đơn hàng</th>
            <th scope="col">Người mua</th>
            <th scope="col">Loại thanh toán</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Ngày đặt</th>
        </thead>
        <tbody>
            <tr></tr>
            @foreach ($transactions as $transaction)
{{--                @foreach ($transaction->orders as $order)--}}
                    <tr style="text-align: left !important;">
                        <td style="text-align: center !important;">{{ $i++ }}</td>
                        <td>{{ $transaction->payment_code ?? '' }}</td>
{{--                        <td>{{ $order->product->name ?? '' }}</td>--}}
                        <td>{{ $transaction->customer_name ?? '' }}</td>

                        <td style="text-align: center !important;">{{ $transaction->type_payment ?? '' }}</td>
                        <td>{{ number_format($transaction->total ?? '', 0, ',', '.') }} VNĐ</td>
                        <td>
                            <input type="hidden" class="convert-time" value="{{ date('Y-m-d h:i:s A', strtotime($transaction->created_at ?? '')) }}">
                            {{ $transaction->created_at ?? '' }}
                        </td>
                        <?php $total_earn_money = $total_earn_money +
                            $transaction->total; ?>
                    </tr>
{{--                @endforeach--}}
            @endforeach
            @if($count > 0)
                <tr>
                    <td colspan="5" style="text-align: right;font-weight: bold;font-size: 20px;">Tổng tiền:</td>
                    <td colspan="2" style="text-align: left;font-weight: bold;font-size: 20px;">
                        {{ number_format($total_earn_money, '0', ',', '.') }} VNĐ</td>
                </tr>
            @else
                <tr>
                    <td colspan="8">Không có dữ liệu !!!</td>
                </tr>
            @endif
        </tbody>
    </table>
    <script>
        $(document).ready(function () {
            $('#list-statistic').find('.convert-time').each(function () {
                var a = moment.tz($(this).val(), Intl.DateTimeFormat().resolvedOptions().timeZone)
                console.log(Intl.DateTimeFormat().resolvedOptions().timeZone)
                console.log(a.format('YYYY-MM-DD HH:mm:ss'))
                $(this).parent('td').html(a.format('YYYY-MM-DD HH:mm:ss'))
            })
        })
    </script>
@endif
