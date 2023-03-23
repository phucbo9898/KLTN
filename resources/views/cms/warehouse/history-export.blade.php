@extends('cms.layout.master')

@section('title', 'Lịch sử nhập hàng')

@section('content')
    <style>
        .rating .active {
            color: #ff9705 !important;
        }
    </style>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Lịch sử xuất hàng</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <x-product-history.search-form :options="$options ?? ''" :categories="$categories ?? ''"/>
                </div>
                <table class="table table-hover table-striped table-list" id="dataTable">
                    <thead class="thead-dark">
                    <th style="width: 20px">ID</th>
                    <th style="width:28%">Tên sản phẩm</th>
                    <th style="width: 185px">Loại sản phẩm</th>
                    <th style="width: 125px">Ảnh</th>
                    <th style="width: 150px;">Số lượng hàng xuất</th>
                    <th style="width: 15%;">Thời gian xuất</th>
                    </thead>
                    <tbody>
                    @if (isset($productHistory))
                        @foreach ($productHistory as $history)
                            <tr>
                                <td>{{ $history->id }}</td>
                                <td>
                                    <b>{{ isset($history->product->name) ? $history->product->name : 'Đã bị xóa' }}</b><br/>
                                </td>
                                <td>{{ isset($history->product->category->name) ? $history->product->category->name : 'Đã bị xóa' }}
                                </td>
                                <td style="text-align: center;">
                                    @if (isset($history->product->image))
                                        <img style="width:80px;height:80px"
                                             src="{{ asset($history->product->image) }}" alt="No Avatar"/>
                                    @else
                                        <img style="width:80px;height:80px" src="{{ asset('noimg.png') }}"
                                             alt="No Avatar"/>
                                    @endif
                                </td>
                                <td style="text-align: center">{{ $history->number_export }} sản phẩm</td>
                                <td style="text-align: center">
                                    <input type="hidden" class="convert-time"
                                           value="{{ date('Y-m-d h:i:s A', strtotime($history->time_export ?? '')) }}">
                                    {{ $history->time_export ?? '' }}
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
        $('.table-list').find('.convert-time').each(function () {
            var a = moment.tz($(this).val(), Intl.DateTimeFormat().resolvedOptions().timeZone)
            console.log(a)
            $(this).parent('td').html(a.format('YYYY-MM-DD HH:mm:ss'))
        });
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
@endsection
