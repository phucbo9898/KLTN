@props(['options' => [], 'categories' => []])
@php use App\Enums\ActiveStatus; @endphp
<div class="">
    <form action="{{ url()->full() }}" method="GET">
        <div class="row">
            <div class="col-md-3 mt-3">
                <label for="name" class="col-form-label">@lang('Product Name')</label>
                <input type="text" autocomplete="off" name="name" class="form-control" value="{{ $options['name'] ?? '' }}">
            </div>
            <div class="col-md-3 mt-3">
                <label for="entertainment" class="col-form-label">@lang('Category Name')</label> <br>
                <select name="category_id" class="form-control">
                    <option value="">@lang('Choose category')</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id ?? $options['category_id'] }}"
                        @if (isset($options['category_id']) && $category->id == $options['category_id']) {{ 'selected' }} @endif>
                            @lang($category->name)
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mt-3">
                <label for="name" class="col-form-label">@lang('Start date')</label>
                <input type="date" autocomplete="off" name="start_time" class="form-control" value="@if(isset($options['start_time'])){{ date('Y-m-d', strtotime($options['start_time']))}}@endif">
            </div>
            <div class="col-md-3 mt-3">
                <label for="name" class="col-form-label">@lang('End date')</label>
                <input type="date" autocomplete="off" name="end_time" class="form-control" value="@if(isset($options['end_time'])){{ date('Y-m-d', strtotime($options['end_time']))}}@endif">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <button class="btn btn-info min-w-100" type="submit">@lang('Search')</button>
            </div>
        </div>
    </form>
</div>
