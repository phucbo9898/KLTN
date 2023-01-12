@extends('fe.layout.master')
@section('content')
    @php use App\Enums\StatusTransaction; @endphp
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Lịch sử mua hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    {{-- History user --}}
    <h4>
        <center class="mt-20">LỊCH SỬ MUA HÀNG</center>
    </h4>
    <div class="col-sm-10 mx-auto">
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
                <th>ID</th>
                <th style="width: 20%">Địa chỉ giao hàng</th>
                <th>Số điện thoại</th>
                <th style="width: 20%">Ghi chú</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày mua</th>
                <th>Hủy đơn hàng</th>
            </thead>

            @if ($count > 0)
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->address }}</td>
                            <td>{{ $transaction->phone }}</td>
                            <td>{{ $transaction->note }}</td>
                            <td>{{ number_format($transaction->total, 0, ',', '.') }} VNĐ</td>
                            <td>
                                @if ($transaction->status == 'completed')
                                    <span class="badge badge-success" style="font-size: 14px;width: 136px;">Đã nhận hàng</span>
                                @endif
                                @if ($transaction->status == 'processing')
                                    <a href="{{ route('history-user.transaction.paid', ['change-status', $transaction->id]) }}"
                                        id="appect_receive_products"><span class="badge badge-warning text-white" style="font-size: 14px;width: 136px;">Đã gửi
                                            hàng</span></a>
                                @endif
                                @if ($transaction->status == 'pending')
                                  <span class="badge badge-danger" style="font-size: 14px;width: 136px;">Chưa xử lý</span>
                                @endif
                                    @if ($transaction->status == 'canceled')
                                        <span class="badge badge-danger" style="font-size: 14px;width: 136px;">Đã hủy đơn hàng</span>
                                    @endif
                            </td>
                            <td>{{ $transaction->created_at }}</td>
                            <td>
                                <a href="{{ route('history-user.get.order.item', $transaction->id) }}" class="js_order_item badge badge-info"
                                   data-id="{{ $transaction->id }}" data-toggle="modal"
                                   data-target="#showOrderItem" style="font-size: 14px;width: 113.11px;">
                                    Xem chi tiết
                                </a>
                                <a href="{{ route('history-user.transaction.paid', ['cancel-order', $transaction->id]) }}" id="">
                                    <span class="badge badge-danger text-white" style="font-size: 14px;width: 113.11px;">Hủy đơn hàng</span>
                                </a>
                            </td>
                            {{-- custom modal by me --}}
                            <div class="modal fade" id="showOrderItem" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng #<span
                                                    class="modal_id_transacrion"></span></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Chưa có dữ liệu hoặc bị lỗi !!!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end custom modal by me --}}
                        </tr>
                    @endforeach
                </tbody>
            @else
                <tbody>
                    <td colspan="8">
                        <span>
                            @lang('No orders have arisen yet')
                        </span>
                    </td>
                </tbody>
            @endif
        </table>
    </div>

    {{-- End History user --}}
@endsection
@section('javascript')
    <script>
        $(function() {
            $("#appect_receive_products").click(function(event) {
                event.preventDefault();
                url = $(this).attr("href");
                swal({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn đã thực sự nhận được những sản phẩm được gửi từ bên chúng tôi chưa !!",
                    icon: "info",
                    buttons: ["Không", {
                        text: "Đồng ý",
                        value: true,
                        visible: true,
                        className: "bg-success",
                        closeModal: true
                    }],
                    successMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        swal("Thành công", "Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi !",
                            'success').then(function() {
                            window.location.href = url;
                        });
                    }
                });
            });
            $(".js_order_item").click(function(event) {
                event.preventDefault();
                var id = $(this).attr('data-id');
                var url = $(this).attr('href');
                $.ajax({
                    method: "GET",
                    url: url
                }).done(function(result) {
                    if (result) {
                        $(".modal_id_transacrion").text(id);
                        $(".modal-body").html('').append(result);
                    }
                });
            });
        });
    </script>
@endsection
