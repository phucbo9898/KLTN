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
        <table class="table table-hover table-striped table-list">
            <thead class="thead-dark">
                <th>ID</th>
                <th>MGD</th>
                <th style="width: 20%">Địa chỉ giao hàng</th>
                <th style="width: 20%">Ghi chú</th>
                <th>Trạng thái đơn hàng</th>
                <th>Trạng thái thanh toán</th>
                <th>Ngày mua</th>
                <th>Tổng tiền</th>
                <th>Hành động</th>
            </thead>

            @if ($count > 0)
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ ($transactions->currentPage() - 1) * $transactions->perPage() + $loop->index + 1 }}</td>
                            <td>{{ $transaction->payment_code }}</td>
                            <td>{{ $transaction->address }}</td>
                            <td>{{ $transaction->note }}</td>
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
                                  <span class="badge badge-info" style="font-size: 14px;width: 136px;">Chưa xử lý</span>
                                @endif
                                    @if ($transaction->status == 'canceled')
                                        <span class="badge badge-danger" style="font-size: 14px;width: 136px;">Đã hủy</span>
                                    @endif
                            </td>
                            <td>
                                @if ($transaction->status_payment == 'Paуment received')
                                    <span class="badge badge-success" style="font-size: 14px;width: 136px;">Đã thanh toán</span>
                                @else
                                    <span class="badge badge-warning" style="font-size: 14px;width: 136px;">Chưa thanh toán</span>
                                @endif
                            </td>

                            <td>
                                <input type="hidden" class="convert-time"
                                       value="{{ date('Y-m-d h:i:s A', strtotime($transaction->created_at ?? '')) }}">
                                {{ $transaction->created_at }}
                            </td>
                            <td>{{ number_format($transaction->total, 0, ',', '.') }} VNĐ</td>
                            <td>
                                <a href="{{ route('history-user.get.order.item', $transaction->id) }}" class="js_order_item badge badge-info"
                                   data-id="{{ $transaction->id }}" data-toggle="modal"
                                   data-target="#showOrderItem" style="">
{{--                                    Xem chi tiết--}}
                                    <i class="fa fa-eye fs-25"></i>

                                </a>
                                @if($transaction->status == 'pending')
                                    <a href="{{ route('history-user.transaction.paid', ['cancel-order', $transaction->id]) }}" id="" class="badge badge-danger btn-cancel">
                                        <i class="fa fa-ban fs-25"></i>
                                        {{-- <span class="badge badge-danger text-white" style="font-size: 14px;width: 113.11px;">Hủy đơn hàng</span>--}}
                                    </a>
                                @endif
                            </td>
                            {{-- custom modal by me --}}
                            <div class="modal fade" id="showOrderItem" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng #id <span
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
        @if($count > 0)
            <div class="col-lg-12 pb-15">
                <div class="li-paginatoin-area text-center pt-25">
                    <div class="row">
                        <div class="col-2 mx-auto">
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- End History user --}}
@endsection
@section('javascript')
    <script>
        $(function() {
            $('.table-list').find('.convert-time').each(function() {
                var a = moment.tz($(this).val(), Intl.DateTimeFormat().resolvedOptions().timeZone)
                console.log(a)
                $(this).parent('td').html(a.format('YYYY-MM-DD HH:mm:ss'))
            });

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
                console.log(id)
                console.log(url)
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
