@extends('fe.layout.master')
@section('content')
    <section class="product-area li-trending-product li-trending-product-2 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Tab Menu Area -->
                <div class="col-lg-12 pt-60 pb-55">
                    <div class="li-section-title d-flex justify-content-between">
                        <h2>
                            <span style="text-transform: uppercase;">@lang('Information Profile')</span>
                        </h2>
                        <div class="card-header-actions">
                            <button class="btn btn-success onclick-button" type="button">@lang('Change Password')</button>
                        </div>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                    <div class="card-body">
                        <form action="{{ route('profile.update', ['id' => $profile->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="">
                            @if (Session::has('error-user'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Lỗi!</strong> @lang(Session::get('error-user')).
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('error-password'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Lỗi!</strong> @lang(Session::get('error-password')).
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('error-update'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Lỗi!</strong> @lang(Session::get('error-update')).
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Thành công!</strong> @lang(Session::get('success')) !!!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> @lang(Session::get('error')) !!!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="my-5">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="img text-center">
                                                <img src="{{ $profile->avatar ?? '' }}" id="img-preview" alt="" class="mb-2 image-profile">
                                            </div>
                                            <input type="file" name="avatar" id="upload-btn" class="form-control" value="{{ old('avatar') ?? ($profile->avatar ?? '') }}">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>

                                <div class="p-2"></div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 text-right">
                                            <label for="">@lang('Name')</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="name" value="{{ $profile->name ?? '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 text-right">
                                            <label for="">@lang('Email')</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="email" value="{{ $profile->email ?? '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 text-right">
                                            <label for="">@lang('Address')</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="address" value="{{ $profile->address ?? '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 text-right">
                                            <label for="">@lang('Phone Number')</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="phone" value="{{ $profile->phone ?? '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-hide">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3 text-right">
                                                <label for="">{{ __('Current Password') }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="password" name="current_password" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3 text-right">
                                                <label for="">{{ __('New Password') }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="password" name="new_password" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row pt-4">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-primary btn-submit-cancel" type="submit" id="submit">@lang('Save')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Tab Menu Content Area End Here -->
                </div>
                <!-- Tab Menu Area End Here -->
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $(document).on("change", "#upload-btn", function (e) {
                const image = document.getElementById('img-preview');
                console.log(image)
                if (e.target.files.length) {
                    const src = URL.createObjectURL(e.target.files[0]);
                    image.src = src;
                }
            });
            $('.onclick-button').on('click', function () {
                $('.d-hide').toggleClass('d-show');
            })
        })
    </script>
@endsection
