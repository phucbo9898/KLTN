@if ($orders)
    <?php $i = 1; ?>
    <table class="table table-hover">
        <thead class="thead-dark">
            <th scope="col">STT</th>
            <th scope="col" style="">Tên sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
                <tr>
                    <th scope="col">#{{ $i++ }}</th>
                    <td>{{ $order->product->name }}</td>
                    @if ($order->product->image)
                        <td><img style="width:80px;height:60px"
                                src="{{ asset($order->product->image) }}" /></td>
                    @else
                        <td><img style="width:80px;height:60px" src="{{ asset('noimg.png') }}" /></td>
                    @endif

                    @if ($order->sale > 0)
                        <td>{{ number_format($order->price * ((100 - $order->sale) / 100), 0, ',', '.') }} VNĐ
                            (-{{ $order->sale }}%)<br />
                            <span style="text-decoration: line-through;">{{ number_format($order->price, 0, ',', '.') }}
                                VNĐ</span>
                        </td>
                    @else
                        <td>{{ number_format($order->price, 0, ',', '.') }} VNĐ/ 1 sản phẩm</td>
                    @endif
                    <td>{{ $order->quantity }}</td>
                    @if ($order->sale > 0)
                        <td>{{ number_format($order->price * ((100 - $order->sale) / 100) * $order->quantity, 0, ',', '.') }}
                            VNĐ</td>
                    @else
                        <td>{{ number_format($order->price * $order->quantity, 0, ',', '.') }} VNĐ</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
