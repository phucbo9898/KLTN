@extends('cms.layout.master')

@section('title', 'Danh sách danh mục sản phẩm')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Danh sách danh mục sản phẩm</h3>
            </div>
            @if (isset($categories))
                <div class="card-header">
                    <div class="form-group">
                        <x-category.search-form :options="$options ?? ''" :dataAttributes="$dataAttributes ?? ''"/>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped" id="dataTable">
                        <thead class="thead-dark">
                        <th style="width: 5%">ID</th>
                        <th>Tên loại sản phẩm</th>
                        <th style="width: 11%; text-align: center;">Trạng thái</th>
                        <th>Thuộc tính</th>
                        <th>Hành động</th>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td style="text-align: center;">{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td style="text-align: center"><a
                                        href="{{ route('admin.category.handle', ['status', $category->id]) }}"
                                        class="badge badge-{{ $category->status == 'active' ? 'success' : 'danger' }}">{{ $category->status == 'active' ? 'Công khai' : 'Riêng tư' }}</a>
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($category->attributes as $attribute)
                                            <li>{{ $attribute->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}"
                                       class="btn btn-success btn-circle"><i class="fas fa-edit"></i></a>
                                    &nbsp;
                                    <a class="btn_delete_sweet btn btn-danger btn-circle"
                                       href="{{ route('admin.category.handle', ['delete', $category->id]) }}"
                                       data-id="{{ $category->id }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            @endif
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {
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
        $(".btn_delete_sweet").click(function (e) {
            e.preventDefault();
            url = $(this).attr('href');
            id = $(this).attr('data-id');
            swal({
                title: "Bạn có chắc chắn?",
                text: "Bạn có chắc chắn muốn xóa loại sản phẩm ID=" + id +
                    " không ? Điều này sẽ ảnh hưởng đến liên kết dữ liệu ! Bạn có thể chuyển trạng thái sang private để ngừng hiển thị sản phẩm ở giao diện khách hàng !! Xin cảm ơn !!!",
                icon: "info",
                buttons: ["Không", "Có"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Thành công", "Hệ thống chuẩn bị xóa loại sản phẩm mang ID =" + id + " !",
                            'success').then(function () {
                            window.location.href = url;
                        });
                    }
                });
        });
    </script>
@endsection
