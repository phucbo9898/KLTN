<!-- Begin Header Area -->
<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left" style="display: flex;
                                                        justify-content: space-between;
                                                        width: 360px;">
                        <ul class="phone-wrap">
                            <li><span>@lang('Phone Number'):</span><a href="#">&nbsp;0969908298</a></li>
                        </ul>
                        <ul class="phone-wrap">
                            <li><span>Email:&nbsp;</span><a href="mailto://phucbo9898@gmail.com">phucbo9898@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->
{{--                            @if(Auth::check())--}}
{{--                                <li>--}}
{{--                                    <img src="{{Auth::user()->avatar}}" alt="">--}}
{{--                                    {{Auth::user()->name}}--}}
{{--                                </li>--}}
{{--                            @endif--}}
                            <li>
                                <div class="ht-setting-trigger">
                                    @if(Auth::check())
                                        <img src="{{Auth::user()->avatar}}" alt="" style="width: 20px; object-fit: cover;">
                                        {{Auth::user()->name}}
                                    @else
                                        <i class="fa fa-user">&nbsp;@lang('Account')</i>
                                    @endif
                                </div>
                                <div class="setting ht-setting">
                                    <ul class="ht-setting-list">
                                        @if(Auth::check())
                                            <li><a href="{{route('admin.home')}}">@lang('Admin Page')</a></li>
                                            <li><a href="{{route('favorite-product.index')}}">@lang('Favorite Product')</a></li>
                                            <li><a href="{{route('history-user.index')}}">@lang('Purchase history')</a></li>
                                            <li><a href="">@lang('Logout')</a></li>
                                        @else
                                            <li><a href="{{route('get.login')}}">@lang('Login')</a></li>
                                            <li><a href="{{route('get.register')}}">@lang('Register')</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            <!-- Setting Area End Here -->

                            <!-- Begin Language Area -->
                            {{--                            <li>--}}
                            {{--                                <a href="{!! route('user.change-language', ['en']) !!}"><img src="{{asset('images/global.png')}}" alt="global" style="margin-right:5px"></a>--}}
                            {{--                                <a href="{!! route('user.change-language', ['vi']) !!}"><img src="{{asset('images/vietnam.png')}}" alt="vn"></a>--}}
                            {{--                            </li>--}}
                            <!-- Language Area End Here -->
                        </ul>
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
                        <a href="{{route('home')}}">
                            <img src="{{asset('images/logo-fe.png')}}" alt="" style="width: 75px;">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="#" class="hm-searchbox" method="GET">
                        <select class="nice-select select-search-category" name="searh_category_id">
                            <option value="0">@lang('All')</option>
                            {{--                            @foreach($categories_searh as $category)--}}
                            {{--                                <option value="{{$category->id}}">{{$category->c_name}}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                        <input type="text" placeholder="@lang('Enter search value ...')" name="searh_key">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            {{--                            @if(Auth::check())--}}
                            {{--                            <li class="hm-wishlist">--}}
                            {{--                                <a href="#" data-toggle="modal" data-target="#exampleModal">--}}
                            {{--                                    <span class="cart-item-count wishlist-item-count">{{Auth::user()->NofiticationReceive->count()}}</span>--}}
                            {{--                                    <i class="fa fa-bell-o"></i>--}}
                            {{--                                </a>--}}

                            {{--                            </li>--}}
                            {{--                            @endif--}}
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <a href="#">
                                    <div class="hm-minicart-trigger">
                                        <span class="item-icon"></span>
                                        <span class="item-text"><span class="price_total_cart"></span> @lang('VND')
                                            <span class="cart-item-count cart-item-count-number"></span>
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
                                    <a href="#">@lang('Article')</a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') }}">@lang('Introduce')</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">@lang('Contact')</a>
                                </li>
                                <!-- Begin Header Bottom Menu Information Area -->
                                <li class="hb-info f-right p-0 d-sm-none d-lg-block">
                                    <span>@lang('Mitec Building, Yen Hoa, Cau Giay, Hanoi, Vietnam')</span>
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
                <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{--        @if(Auth::check())--}}
            {{--        <div class="modal-body">--}}
            {{--            @if(Auth::user()->NofiticationReceive->count()>0)--}}
            {{--                @foreach(Auth::user()->NofiticationReceive->sortByDesc('created_at') as $nofitication)--}}
            {{--                    <div style="display: flex">--}}
            {{--                        <div class="col-sm-1">--}}
            {{--                            <a href="{{route('feature.user.delete.nofication',$nofitication->id)}}">Xóa</a>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-sm-11">--}}
            {{--                            <div><b>{{$nofitication->created_at}}</b></div>--}}
            {{--                            {!!$nofitication->nof_content!!}--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <hr style="margin: 15px 0px"/>--}}
            {{--                @endforeach--}}
            {{--            @else--}}
            {{--                <div style="display: flex">--}}
            {{--                    Không có thông báo gì cả !!!--}}
            {{--                </div>--}}
            {{--                <hr style="margin: 15px 0px"/>--}}
            {{--            @endif--}}
            {{--        </div>--}}
            {{--        @endif--}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal nofition --}}
