{{-- Main Sidebar Container --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- Brand Logo --}}
    <a href="{{ route('admin.home') }}" class="brand-link">
        <img src="{{ asset('admin_lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"> Admin page </span>
    </a>

    <!--Sidebar -->
    <div class="sidebar">
        {{-- Sidebar user(optional) --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="{{asset('noimg.png')}}" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin -
                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>@lang('Trang chủ')</p>
                    </a>
                </li>

                {{-- Tab transaction --}}
                <li class="nav-item has-treeview {{ request()->is('home*') ? 'menu-open' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->is('home*') ? 'active' : '' }}">
                        <i class="fas fa-home" style="margin-left: 4px;"> </i>
                        <p style="margin-left: 8px;">@lang('Chuyển hướng')</p>
                    </a>
                </li>
                {{-- End tab transaction --}}
                {{-- Tab Slide --}}
                <li class="nav-item has-treeview {{ request()->is('admin/slide*') ? 'menu-open' : '' }}">
                    <a class="nav-link {{ request()->is('admin/slide*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-window-maximize"></i>
                        <p>
                            @lang('Slide')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.slide.index') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/slide') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Danh sách')</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.slide.create') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/slide/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Thêm')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Entab Slide --}}
                {{-- Tab category --}}
                <li class="nav-item has-treeview {{ request()->is('admin/category*') ? 'menu-open' : '' }}">
                    <a class="nav-link {{ request()->is('admin/category*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-cubes"></i>
                        {{-- <i class=""></i> --}}
                        <p>
                            @lang('Loại sản phẩm')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('admin.category.index') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/category') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Danh sách')</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.category.create') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/category/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Thêm')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Entab Category --}}

                {{-- Tab Attribute --}}
                <li class="nav-item has-treeview {{ request()->is('admin/attribute*') ? 'menu-open' : '' }}">
                    <a class="nav-link {{ request()->is('admin/attribute*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-flask"></i>
                        <p>
                            @lang('Thuộc tính')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('admin.attribute.index') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/attribute') ? 'active' : '' }}">

                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Danh sách')</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.attribute.create') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/attribute/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Thêm')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End tab Attribute --}}
                {{-- Tab product --}}
                <li class="nav-item has-treeview {{ request()->is('admin/product*') ? 'menu-open' : '' }}">
                    <a class="nav-link {{ request()->is('admin/product*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-desktop"></i>
                        <p>
                            @lang('Sản phẩm')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('admin.product.index') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/product') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Danh sách')</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.product.create') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/product/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Thêm')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End tab product --}}
                {{-- Tab warehouse --}}
                <li class="nav-item has-treeview {{ request()->is('admin/warehouse*') ? 'menu-open' : '' }}">
                    <a class="nav-link {{ request()->is('admin/warehouse*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-archive"></i>
                        <p>
                            @lang('Kho hàng')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('admin.warehouse.import') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/warehouse') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Nhập hàng')</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.warehouse.history') }}"
                                style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/warehouse/history') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Lịch sử nhập hàng')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End tab warehouse --}}
                {{-- Tab article --}}
                <li class="nav-item has-treeview {{ request()->is('admin/article*') ? 'menu-open' : '' }}">
                    <a class="nav-link {{ request()->is('admin/article*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-newspaper"></i>
                        <p>
                            @lang('Bài viết')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('admin.article.index') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/article') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Danh sách')</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.article.create') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/article/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Thêm')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End tab article --}}

                {{-- Tab transaction --}}
                <li class="nav-item has-treeview {{ request()->is('admin/transaction*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.transaction.index') }}"
                        class="nav-link {{ request()->is('admin/transaction*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>@lang('Giao dịch')</p>
                    </a>
                </li>
                {{-- End tab transaction --}}
                {{-- Tab transaction --}}
                <li class="nav-item has-treeview {{ request()->is('admin/comment*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.comment.index') }}"
                        class="nav-link {{ request()->is('admin/comment*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-american-sign-language-interpreting"></i>
                        <p>@lang('Đánh giá sản phẩm')</p>
                    </a>
                </li>
                {{-- End tab transaction --}}
                {{-- Tab transaction --}}
                <li class="nav-item has-treeview {{ request()->is('admin/statistics*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.statistics.index') }}"
                        class="nav-link {{ request()->is('admin/statistics*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-print"></i>
                        <p>@lang('Báo cáo thống kê')</p>
                    </a>
                </li>
                {{-- End tab transaction --}}
                {{-- Tab transaction --}}
                <li class="nav-item has-treeview {{ request()->is('admin/user*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.user.index') }}"
                        class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            @lang('Thành viên')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('admin.user.index') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Danh sách')</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user.create') }}" style="margin-left: 15%;padding-left: 0px;"
                                class="nav-link {{ request()->is('admin/user/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('Thêm')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End tab transaction --}}
                {{-- Tab setting --}}
                <li class="nav-item has-treeview {{ request()->is('admin/setting*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.setting.index') }}"
                        class="nav-link {{ request()->is('admin/setting*') ? 'active' : '' }}">
                        <i class="fa fa-cog"></i>
                        <p>@lang('Thiết lập website')</p>
                    </a>
                </li>
                {{-- End tab setting --}}
                {{-- Start Multi level --}}
                {{-- <li class="nav-header">MULTI LEVEL EXAMPLE</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Level 1
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Level 2
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
              </a>
            </li>
          </ul>
        </li> --}}
                {{-- End Multi level --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
