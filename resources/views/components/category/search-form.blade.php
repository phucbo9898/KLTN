@props(['options' => [], 'dataAttributes' => []])
@php use App\Enums\ActiveStatus; @endphp
<div class="">
    <form action="{{ url()->full() }}" method="GET">
        <div class="row">
            <div class="col-md-3 mt-3">
                <label for="name" class="col-form-label">@lang('Category Name')</label>
                <input type="text" autocomplete="off" name="name" class="form-control" value="{{ $options['name'] ?? '' }}">
            </div>
            <div class="col-md-3 mt-3">
                <label for="entertainment" class="col-form-label">@lang('Attribute')</label> <br>
                <select name="attribute" class="form-control">
                    <option value="">@lang('Choose attribute')</option>
                    @foreach ($dataAttributes as $dataAttribute)
                        <option value="{{ $dataAttribute->id ?? $options['attribute'] }}"
                        @if (isset($options['attribute']) && $dataAttribute->id == $options['attribute']) {{ 'selected' }} @endif>
                            @lang($dataAttribute->name)
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-3">
                <label class="col-form-label mr-3">@lang('Status')</label>
                @foreach (ActiveStatus::getValues() as $status)
                    <span class="mr-2">
                        <input id="{{ $status }}" {{ (isset($options['status']) && in_array($status, $options['status'])) ? "checked" : '' }} type="checkbox" name="status[]" value="{{ $status }}" >
                        <label for="">@lang(ActiveStatus::getStatusName($status))</label>
                    </span>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <button class="btn btn-info min-w-100" type="submit">@lang('Search')</button>
            </div>
        </div>
    </form>
</div>
