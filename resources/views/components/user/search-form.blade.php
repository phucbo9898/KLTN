@props(['options' => []])
@php use App\Enums\UserType; @endphp
<div class="">
    <form action="{{ url()->full() }}" method="GET">
        <div class="row">
            <div class="col-md-3 mt-3">
                <label for="name" class="col-form-label">@lang('User Name')</label>
                <input type="text" autocomplete="off" name="name" class="form-control" value="{{ $options['name'] ?? '' }}">
            </div>
            <div class="col-md-3 mt-3">
                <label for="name" class="col-form-label">@lang('Email')</label>
                <input type="text" autocomplete="off" name="email" class="form-control" value="{{ $options['email'] ?? '' }}">
            </div>
            <div class="col-md-3 mt-3">
                <label for="entertainment" class="col-form-label">@lang('Role')</label> <br>
                <select name="role" class="form-control">
                    <option value="">@lang('Choose role')</option>
                    @foreach (UserType::getValues() as $role)
                        <option value="{{ $role }}"
                        @if (isset($options['role']) && $role == $options['role']) {{ 'selected' }} @endif>
                            @lang(UserType::getUserType($role))
                        </option>
                    @endforeach
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
