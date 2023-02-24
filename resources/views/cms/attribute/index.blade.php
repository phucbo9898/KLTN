@extends('cms.layout.master')

@section('title', 'Danh sách thuộc tính')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Danh sách thuộc tính</h3>
            </div>
            @if (isset($attributes))
                <div class="card-body">
                    <table class="table table-hover table-striped" id="dataTable">
                        <thead class="thead-dark">
                        <th>ID</th>
                        <th>Tên thuộc tính</th>
                        <th>Kiểu</th>
                        <th>Giá trị</th>
                        <th>Hành động</th>
                        </thead>
                        <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($attributes as $attribute)
                            <tr>
                                <td>{{ $stt++ }}</td>
                                <td>{{ $attribute->name }}</td>
                                <td>{{ $attribute->type }}</td>
                                <td>
                                    @if ($attribute->value)
                                        <ul>
                                            @foreach (explode(';', $attribute->value) as $attr)
                                                <li>{{ $attr }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.attribute.edit', $attribute->id) }}"
                                       class="btn btn-success btn-circle"><i class="fas fa-edit"></i></a>
                                    &nbsp;
                                    <a href="{{ route('admin.attribute.handle', ['delete', $attribute->id]) }}"
                                       data-id="{{ $attribute->id }}"
                                       class="btn_delete_sweet btn btn-danger btn-circle"><i
                                            class="fas fa-trash-alt"></i></a>
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
                text: "Bạn có chắc chắn muốn xóa thuộc tính ID=" + id + " không ? Xin cảm ơn !!!",
                icon: "info",
                buttons: ["Không", "Có"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Thành công", "Hệ thống chuẩn bị xóa thuộc tính mang ID =" + id + " !", 'success')
                            .then(function () {
                                window.location.href = url;
                            });
                    }
                });
        });
    </script>
@endsection
