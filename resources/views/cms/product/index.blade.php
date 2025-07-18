@extends('cms.layout.master')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <style>
        .rating .active {
            color: #ff9705 !important;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sản phẩm - Danh sách</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Sản phẩm - Danh sách</li>
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
                        <x-product.search-form :options="$options ?? ''" :categories="$categories ?? ''" />
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('create_product_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Thành công !</strong> {{ Session::get('create_product_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::has('edit_product_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Thành công !</strong> {{ Session::get('edit_product_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::has('delete_product_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Thành công !</strong> {{ Session::get('delete_product_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-hover table-striped" id="dataTable">
                        <thead class="thead-dark">
                            <th>ID</th>
                            <th>Sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Ảnh</th>
                            <th style="width: 11%;">Trạng thái</th>
                            <th>Nổi bật</th>
                            <th style="width: 12%;">Hành động</th>
                        </thead>
                        <tbody>
                            @if (isset($products))
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <b>{{ $product->name }}</b><br />
                                            <ul style="padding:0px">
                                                <li>Số lượng tồn kho: {{ $product->quantity > 0 ? $product->quantity : 0 }}</li>
                                                @if ($product->sale)
                                                    <li>Đang giảm giá ( -{{ $product->sale }}% )</li>
                                                @else
                                                    <li>Không giảm giá</li>
                                                @endif
                                                <li>Giá: {{ number_format($product->price, 0, ',', '.') }} VNĐ</li>
                                                <li>
{{--                                                    <?php--}}
{{--                                                    $point = 0;--}}
{{--                                                    if ($product->number_of_reviewers > 0) {--}}
{{--                                                        $point = round($product->total_star / $product->number_of_reviewers);--}}
{{--                                                    }--}}
{{--                                                    ?>--}}
{{--                                                    Đánh giá: <span class="rating">--}}
{{--                                                        @for ($i = 1; $i <= 5; $i++)--}}
{{--                                                            <i class="fa fa-star {{ $i <= $point ? 'active' : '' }}"--}}
{{--                                                                style="color:#999"></i>--}}
{{--                                                        @endfor--}}
{{--                                                        @if ($product->number_of_reviewers > 0)--}}
{{--                                                            {{ $point }} sao--}}
{{--                                                        @else--}}
{{--                                                            Chưa đánh giá--}}
{{--                                                        @endif--}}
{{--                                                    </span>--}}
                                                    <span>Số lượng đã bán: {{ $product->qty_pay > 0 ? $product->qty_pay : 0 }}</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>{{ $product->Category->name }}</td>
                                        <td>
                                            @if ($product->image)
                                                <img style="width:80px;height:80px" src="{{ asset($product->image) }}"
                                                    alt="No Avatar" />
                                            @else
                                                <img style="width:80px;height:80px" src="{{ asset('noimg.png') }}"
                                                    alt="No Avatar" />
                                            @endif
                                        </td>
                                        <td style="text-align: center"><a
                                                href="{{ route('admin.product.handle', ['status', $product->id]) }}"
                                                class="badge badge-{{ $product->status == 'active' ? 'success' : 'danger' }}">{{ $product->status == 'active' ? 'Công khai' : 'Riêng tư' }}</a>
                                        </td>
                                        <td style="text-align: center"><a
                                                href="{{ route('admin.product.handle', ['hot', $product->id]) }}"
                                                class="badge badge-{{ $product->hot == 'yes' ? 'success' : 'secondary' }}">{{ $product->hot == 'yes' ? 'Có' : 'Không' }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', $product->id) }}"
                                                class="btn btn-success btn-circle"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.product.handle', ['delete', $product->id]) }}"
                                                data-id="{{ $product->id }}"
                                                class="btn_delete_sweet btn btn-danger btn-circle"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [
                    [0, "desc"]
                ],
                "language": {
                    "decimal": "",
                    "emptyTable": "Không có dữ liệu hiển thị trong bảng",
                    "info": "Đang hiển thị bản ghi _START_ đến _END_ trên _TOTAL_ bản ghi",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 bản ghi",
                    "infoFiltered": "(đã lọc từ _MAX_ bản ghi)",
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
                    text: "Bạn có chắc chắn muốn xóa sản phẩm ID=" + id +
                        " không ? Điều này sẽ ảnh hưởng đến liên kết dữ liệu !!",
                    icon: "info",
                    buttons: ["Không", "Có"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Thành công", "Hệ thống chuẩn bị xóa sản phẩm mang ID =" + id + " !", 'success')
                            .then(function() {
                                window.location.href = url;
                            });
                    }
                });
        });
    </script>
@endsection
