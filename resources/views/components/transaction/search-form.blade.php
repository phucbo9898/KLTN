@props(['options' => []])
@php use App\Enums\StatusTransaction; @endphp
<div class="">
    <form action="{{ url()->full() }}" method="GET">
        <div class="row">
            <div class="col-md-3 mt-3">
                <label for="name" class="col-form-label">@lang('Customer Name')</label>
                <input type="text" autocomplete="off" name="name" class="form-control" value="{{ $options['name'] ?? '' }}">
            </div>
            <div class="col-md-3 mt-3">
                <label for="name" class="col-form-label">@lang('Trading code')</label>
                <input type="text" autocomplete="off" name="code" class="form-control" value="{{ $options['code'] ?? '' }}">
            </div>
            <div class="col-md-3 mt-3">
                <label for="entertainment" class="col-form-label">@lang('Status')</label> <br>
                <select name="status" class="form-control">
                    <option value="">@lang('Choose status')</option>
                    @foreach (StatusTransaction::getValues() as $status)
                        <option value="{{ $status }}"
                        @if (isset($options['status']) && $status == $options['status']) {{ 'selected' }} @endif>
                            @lang($status)
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-3">
                <label for="entertainment" class="col-form-label">@lang('Trạng thái thanh toán')</label> <br>
                <select name="status_payment" class="form-control">
                    <option value="">@lang('Choose Trading code')</option>
                    <option value="Paуment received" {{ ($options['status_payment'] ?? '') == 'Paуment received' ? 'selected' : '' }}>Đã thanh toán</option>
                    <option value="Paуment not received" {{ ($options['status_payment'] ?? '') == 'Paуment not received' ? 'selected' : '' }}>Chưa thanh toán</option>
                </select>
            </div>
            <div class="col-md-3 mt-3">
                <label for="entertainment" class="col-form-label">@lang('Loại thanh toán')</label> <br>
                <select name="type_payment" class="form-control">
                    <option value="">@lang('Choose Trading code')</option>
                    <option value="momo" {{ ($options['type_payment'] ?? '') == 'momo' ? 'selected' : '' }}>Thanh toán qua Momo</option>
                    <option value="vnpay" {{ ($options['type_payment'] ?? '') == 'vnpay' ? 'selected' : '' }}>Thanh toán qua VNPay</option>
                    <option value="normal" {{ ($options['type_payment'] ?? '') == 'normal' ? 'selected' : '' }}>Thanh toán khi nhận hàng</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <button class="btn btn-info min-w-100" type="submit">@lang('Search')</button>
            </div>
        </div>
    </form>
</div>
