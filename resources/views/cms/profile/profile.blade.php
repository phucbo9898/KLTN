@extends('cms.layout.master')

@section('title', 'Thông tin người dùng')

@section('content')
    <style>
        .d-hide {
            max-height: 0;
            overflow: hidden;
        }

        .d-hide.d-show {
            max-height: 100vh;
            transition: all 2s;
        }

        .image-profile {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            -o-object-fit: cover;
            object-fit: cover;
        }
    </style>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header d-flex">
                <h3>Thông tin người dùng</h3>
                <button class="btn btn-success onclick-button ml-3" type="button">@lang('Change Password')</button>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update', ['id' => $profile->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-5">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 text-right">
                                </div>
                                <div class="col-md-6">
                                    <div class="img text-center">
                                        <img src="{{ $profile->avatar }}" id="img-preview" alt="" class="mb-2 image-profile">
                                    </div>
                                    <input type="file" name="avatar" id="upload-btn" class="form-control" value="{{ old('avatar') ?? ($profile->avatar ?? '') }}">
                                </div>
                            </div>
                        </div>

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
                                        <label for="">@lang('Current Password')</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="password" name="current_password" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 text-right">
                                        <label for="">@lang('New Password')</label>
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
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
