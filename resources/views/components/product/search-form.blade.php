@props(['options' => [], 'categories' => []])
@php use App\Enums\ActiveStatus; @endphp
<div class="">
{{--    @dd($options['filter_price'])--}}
    <form action="{{ url()->full() }}" method="GET">
        <div class="row">
            <div class="col-md-3 mt-3">
                <label for="name" class="col-form-label">@lang('Product Name')</label>
                <input type="text" autocomplete="off" name="name" class="form-control" value="{{ $options['name'] ?? '' }}">
            </div>
            <div class="col-md-3 mt-3">
                <label for="entertainment" class="col-form-label">@lang('Category Name')</label> <br>
                <select name="category_id" class="form-control select2-blue">
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
                <label for="name" class="col-form-label">@lang('Filter by price')</label>
                <select name="filter_price" class="form-control">
                    <option value=""></option>
                    <option value="asc" {{ ($options['filter_price'] ?? '') == 'asc' ? 'selected' : '' }}>Sắp xếp tăng dần</option>
                    <option value="desc" {{ ($options['filter_price'] ?? '') == 'desc' ? 'selected' : '' }}>Sắp xếp giảm dần</option>
                </select>
            </div>
            <div class="col-md-3 mt-3">
                <label for="name" class="col-form-label">@lang('Filter by sold')</label>
                <select name="filter_sold" class="form-control">
                    <option value=""></option>
                    <option value="asc">Sắp xếp tăng dần</option>
                    <option value="desc">Sắp xếp giảm dần</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-3">
                <label class="col-form-label mr-2">@lang('Status')</label>
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
