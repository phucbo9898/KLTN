@extends('cms.layout.master')

@section('title', 'Danh sách giao dịch')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách giao dịch</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Giao Dịch</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="form-group">
                        <x-transaction.search-form :options="$options ?? ''"/>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('OutOfStock'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Thất bại !</strong> {{ Session::get('OutOfStock') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::has('stopDelete'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Thất bại !</strong> {{ Session::get('stopDelete') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-hover table-striped" id="dataTable" style="overflow-y: scroll; white-space: nowrap; font-size: 16px !important;">
                        <thead class="thead-dark">
                            <th style="width: 1%">STT</th>
                            <th style="width: 10%">Tên khách hàng</th>
                            <th style="width: 25%">Địa chỉ</th>
                            <th style="width: 10%">Số điện thoại</th>
                            <th style="width: 10%;">Trạng thái thanh toán</th>
                            <th style="width: 15%;">Loại thanh toán</th>
                            <th style="width: 12%">Tổng tiền</th>
                            <th style="width: 10%">Trạng thái</th>
                            <th style="width: 3%">MGD</th>
                            <th style="width: 1%">Hành động</th>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td style="text-align: center;">{{ $transaction->id }}</td>
                                    <td>{{ optional($transaction->user)->name }}</td>
                                    <td>{{ $transaction->address }}</td>
                                    <td>{{ $transaction->phone }}</td>
                                    <td style="text-align: center;">
                                        @if($transaction->type_payment != '')
                                            <span class="" style="font-size: 16px;width: 113.11px;">
                                            {{ $transaction->status_payment == 'Paуment received' ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                                        @else
                                            <span class=" d-none" style="font-size: 14px;width: 113.11px;">Chưa thanh toán</span>
                                        @endif
                                        </span>
                                    </td>
                                    <td class="get-payment">
{{--                                        {{ $transaction->type_payment }}--}}
                                        @if($transaction->type_payment == 'momo')
                                            <span class=" momo" style="font-size: 16px;width: 204.41px;">Thanh toán qua Momo</span>
                                        @elseif($transaction->type_payment == 'vnpay')
                                            <span class=" banking" style="font-size: 16px;width: 204.41px;">Thanh toán qua VNPay</span>
                                        @else
                                            <span class=" payment-normal" style="font-size: 16px;width: 204.41px;">Thanh toán khi nhận hàng</span>
                                        @endif
                                    </td>
                                    <td>{{ number_format($transaction->total, 0, ',', '.') }} VNĐ</td>
                                    <td style="text-align: center;">
                                        @if ($transaction->status == 'completed')
                                            <a href="#"><span class="badge badge-success" style="font-size: 14px; width: 95.96px;">Đã nhận hàng</span></a>
                                        @endif
                                        @if ($transaction->status == 'processing')
                                            <a href="{{ route('admin.transaction.paid', $transaction->id) }}"><span
                                                    class="badge badge-secondary text-white" style="font-size: 14px; width: 95.96px;">Đã gửi hàng</span></a>
                                        @endif
                                        @if ($transaction->status == 'pending')
                                            <a href="{{ route('admin.transaction.handle', ['send', $transaction->id]) }}"><span
                                                    class="badge badge-warning" style="font-size: 14px; width: 95.96px;">Đang xử lý</span></a>
                                        @endif
                                        @if($transaction->status == 'canceled')
                                            <span class="badge badge-danger" style="font-size: 14px; width: 95.96px;">Đã hủy</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{ $transaction->payment_code }}</td>
                                    <td style="width: 10%;">
                                        <a href="{{ route('admin.get.order.item', $transaction->id) }}"
                                            data-id="{{ $transaction->id }}"
                                            class="js_order_item btn btn-primary btn-circle" data-toggle="modal"
                                            data-target="#showOrderItem"> <i class="fas fa-eye"></i></a>

                                        <a href="{{ route('admin.get.export.transaction', $transaction->id) }}"
                                            class="btn btn-success btn-circle">
                                            <i class="fa-solid fa-print"></i>
                                        </a>
                                        @if($transaction->status == 'pending')
                                            <a href="{{ route('admin.transaction.handle', ['cancel', $transaction->id]) }}"
                                               data-id="{{ $transaction->id }}"
                                               class="btn_delete_sweet btn btn-danger btn-circle">
                                                <i class="fas fa-window-close"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.transaction.handle', ['delete', $transaction->id]) }}"
                                               data-id="{{ $transaction->id }}"
                                               class="btn_delete_sweet btn btn-danger btn-circle" style="visibility: hidden;">
                                                <i class="fas fa-window-close"></i>
                                            </a>
                                        @endif
                                    </td>

                                </tr>
                                {{-- custom modal by me --}}
                                <div class="modal fade" id="showOrderItem" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    Chi tiết đơn hàng #
                                                    <span class="modal_id_transaction"></span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('javascript')
    <script>
        $(function() {
            $(".js_order_item").click(function(event) {
                event.preventDefault();
                var id = $(this).attr('data-id');
                var url = $(this).attr('href');
                $.ajax({
                    method: "GET",
                    url: url
                }).done(function(result) {
                    if (result) {
                        $(".modal_id_transaction").text(id);
                        $(".modal-body").html('').append(result);

                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                "language": {
                    "decimal": "",
                    "emptyTable": "Không có dữ liệu hiển thị trong bảng",
                    "info": "Đang hiển thị bản ghi _START_ đến _END_ trên _TOTAL_ bản ghi",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 bản ghi",
                    "infoFiltered": "(đã lọc từ _MAX_ total bản ghi)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Hiển thị _MENU_ bản ghi",
                    "loadingRecords": "Đang tải...",
                    "processing": "Đang xử lý...",
                    "search": "Tìm kiếm:",
                    "zeroRecords": "Không có bản ghi nào được tìm thấy",
                    "paginate": {
                        "first": "Đầu",
                        "last": "Cuối",
                        "next": "Tiếp",
                        "previous": "Trước"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
            });
        });
    </script>
    <script>
        $(".btn_delete_sweet").click(function(e) {
            e.preventDefault();
            url = $(this).attr('href');
            id = $(this).attr('data-id');
            swal({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn có chắc chắn muốn hủy giao dịch ID=" + id +
                        " không ? Điều này sẽ ảnh hưởng đến liên kết dữ liệu !",
                    icon: "info",
                    buttons: ["Không", "Có"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Thành công", "Hệ thống chuẩn bị hủy giao dịch mang ID =" + id + " !", 'success').then(
                            function() {
                                window.location.href = url;
                            });
                    }
                });
        });
    </script>
@endsection
