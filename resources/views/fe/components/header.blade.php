<?php
use App\Enums\UserType;
?>
<style>
    .nav-link:hover {
        color: inherit !important;
    }
</style>

<!-- Begin Header Area -->
<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left" style="display: flex; justify-content: space-between; width: 410px;">
                        <ul class="phone-wrap">
                            <li><span style="font-size: 15px !important;">@lang('Phone Number'):</span>&nbsp;0969908298</li>
                        </ul>
                        <ul class="phone-wrap">
                            <li><span style="font-size: 15px !important;">Email:&nbsp;</span><a href="mailto://phucbo9898@gmail.com" style="font-size: 15px !important;">phucbo9898@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="navbar-nav ml-auto float-right">
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#">
                                    @if (Auth::check())
                                        <img src="{{ asset(Auth::user()->avatar) ?? asset('unimg.jpg') }}" alt=""
                                             style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%">
                                        {{ Auth::user()->name }}
                                    @else
                                        <i class="fa fa-user">&nbsp;@lang('Account')</i>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width: 105px !important;">
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                        @if(Auth::user()->role == UserType::ADMIN || Auth::user()->role == UserType::SYSTEMADMIN)
                                            <a href="{{ route('admin.home') }}" class="dropdown-item dropdown-footer btn btn-danger btn-hover text-left">@lang('Admin Page')</a>
                                        @endif
                                        <a href="{{ route('profile.index') }}" class="dropdown-item dropdown-footer btn btn-danger btn-hover text-left">@lang('Profile')</a>
                                        <a href="{{ route('favorite-product.index') }}" class="dropdown-item dropdown-footer btn btn-danger btn-hover text-left">@lang('Favorite Product')</a>
                                        <a href="{{ route('history-user.index') }}" class="dropdown-item dropdown-footer btn btn-danger btn-hover text-left">@lang('Purchase history')</a>
                                        <a href="{{ route('get.logout') }}" class="dropdown-item dropdown-footer btn btn-danger btn-hover text-left">@lang('Logout')</a>
                                    @else
                                        <a href="{{ route('get.login') }}" class="dropdown-item dropdown-footer btn btn-danger btn-hover text-left">@lang('Login')</a>
                                        <a href="{{ route('get.register') }}" class="dropdown-item dropdown-footer btn btn-danger btn-hover text-left">@lang('Register')</a>
                                    @endif
                                </div>
                            </li>
                        </ul>
{{--                        <ul class="ht-menu">--}}
{{--                            <!-- Begin Setting Area -->--}}
{{--                            <li>--}}
{{--                                <div class="ht-setting-trigger">--}}
{{--                                    @if (Auth::check())--}}
{{--                                        <img src="{{ asset(Auth::user()->avatar) }}" alt=""--}}
{{--                                            style="width: 20px; object-fit: cover;">--}}
{{--                                        {{ Auth::user()->name }}--}}
{{--                                    @else--}}
{{--                                        <i class="fa fa-user">&nbsp;@lang('Account')</i>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="setting ht-setting">--}}
{{--                                    <ul class="ht-setting-list">--}}
{{--                                        @if (Auth::check())--}}
{{--                                            @if(Auth::user()->role == UserType::ADMIN)--}}
{{--                                                <li><a href="{{ route('admin.home') }}">@lang('Admin Page')</a></li>--}}
{{--                                            @elseif(Auth::user()->role == UserType::SYSTEMADMIN)--}}
{{--                                                <li><a href="{{ route('admin.home') }}">@lang('Admin Page')</a></li>--}}
{{--                                            @endif--}}
{{--                                            <li><a href="{{ route('profile.index') }}">@lang('Profile')</a></li>--}}
{{--                                            <li><a href="{{ route('favorite-product.index') }}">@lang('Favorite Product')</a></li>--}}
{{--                                            <li><a href="{{ route('history-user.index') }}">@lang('Purchase history')</a></li>--}}
{{--                                            <li><a href="{{ route('get.logout') }}">@lang('Logout')</a></li>--}}
{{--                                        @else--}}
{{--                                            <li><a href="{{ route('get.login') }}">@lang('Login')</a></li>--}}
{{--                                            <li><a href="{{ route('get.register') }}">@lang('Register')</a></li>--}}
{{--                                        @endif--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="{!! route('change-language', ['en']) !!}" style="margin-right: 5px;">--}}
{{--                                    <img class="flag-language" src="{{ asset('images/en-flag-32x48.png') }}"--}}
{{--                                        alt="">--}}
{{--                                </a>--}}
{{--                                <a href="{!! route('change-language', ['vi']) !!}">--}}
{{--                                    <img class="flag-language" src="{{ asset('images/vi-flag-32x48.png') }}"--}}
{{--                                        alt="">--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <!-- Setting Area End Here -->--}}

{{--                            <!-- Begin Language Area -->--}}
{{--                            --}}{{--                            <li> --}}
{{--                            --}}{{--                                <a href="{!! route('user.change-language', ['en']) !!}"><img src="{{asset('images/global.png')}}" alt="global" style="margin-right:5px"></a> --}}
{{--                            --}}{{--                                <a href="{!! route('user.change-language', ['vi']) !!}"><img src="{{asset('images/vietnam.png')}}" alt="vn"></a> --}}
{{--                            --}}{{--                            </li> --}}
{{--                            <!-- Language Area End Here -->--}}
{{--                        </ul>--}}
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo-fe.png') }}" alt="" style="width: 75px;">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="{{ route('search.index') }}" class="hm-searchbox" method="GET">
                        <select class="nice-select select-search-category" name="search_category_id">
                            <option value="0">@lang('All')</option>
                            @foreach ($categories_search as $category)
                                <option value="{{ $category->id }}" {{ request()->get('search_category_id') && request()->get('search_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="search_key" value="{{ request()->get('search_key') ? request()->get('search_key') : '' }}">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            @if (Auth::check())
                                <li class="hm-wishlist">
                                    <a href="#" data-toggle="modal" data-target="#exampleModal">
                                        <span
                                            class="cart-item-count wishlist-item-count">{{ Auth::user()->notificationReceivers->count() }}</span>
                                        <i class="fa fa-bell-o"></i>
                                    </a>
                                </li>
                            @endif
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <a href="{{ route('shopping.cart.index') }}">
                                    <div class="hm-minicart-trigger">
                                        <span class="item-icon"></span>
                                        <span class="item-text"><span
                                                class="price_total_cart">{{ \Cart::subtotal(0, ',', '.') }}</span>
                                            @lang('VND')
                                            <span
                                                class="cart-item-count cart-item-count-number">{{ \Cart::count() }}</span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu hb-menu-2 d-xl-block">
                        <nav>
                            <ul>
                                <li class="dropdown-holder">
                                    <a href="{{ route('home') }}">@lang('Home')</a>

                                </li>
                                <li class="megamenu-holder">
                                    <a href="{{ route('article.index') }}">@lang('Article')</a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') }}">@lang('Introduce')</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">@lang('Contact')</a>
                                </li>
                                <!-- Begin Header Bottom Menu Information Area -->
                                <li class="hb-info f-right p-0 d-sm-none d-lg-block">
                                    <span class="text-white">@lang('Mitec Building, Yen Hoa, Cau Giay, Hanoi, Vietnam')</span>
                                </li>
                                <!-- Header Bottom Menu Information Area End Here -->
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
<!-- Header Area End Here -->
{{-- Modal nofition --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('Notification')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if (Auth::check())
                <div class="modal-body">
                    @if (Auth::user()->notificationReceivers->count() > 0)
                        @foreach (Auth::user()->notificationReceivers->sortByDesc('created_at') as $nofitication)
                            <div style="display: flex">
                                <div class="col-sm-2">
                                    <a href="{{ route('feature-user.delete.nofication', $nofitication->id) }}">@lang('Delete')</a>
                                </div>
                                <div class="col-sm-10">
                                    <div><b>{{ $nofitication->created_at }}</b></div>
                                    {!! $nofitication->content !!}
                                </div>
                            </div>
                            <hr style="margin: 15px 0px" />
                        @endforeach
                    @else
                        <div style="display: flex">
                            @lang('No notification at all') !!!
                        </div>
                        <hr style="margin: 15px 0px" />
                    @endif
                </div>
            @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal nofition --}}
