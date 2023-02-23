@if(isset($errors) && $errors->any())
    <x-alert type="danger" class="header-message">
        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </x-alert>
@endif

@if (session()->get('success'))
    <x-alert type="success" class="header-message">
        {{ session()->get('success') }}
    </x-alert>
@endif
@if (session()->get('error'))
    <x-alert type="danger" class="header-message">
        {{ session()->get('error') }}
    </x-alert>
@endif

@if (session()->get('sameValue'))
    <x-alert type="danger" class="header-message">
        {{ session()->get('sameValue') }}
    </x-alert>
@endif
