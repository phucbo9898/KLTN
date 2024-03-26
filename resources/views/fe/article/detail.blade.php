@extends('fe.layout.master')
@section('content')
    <style>
        .article_content img {
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>

    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                    <li><a href="{{ route('article.index') }}">@lang('Article')</a></li>
                    <li class="active">{{ $articleDetail->name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Main Blog Page Area -->
    <div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Blog Sidebar Area -->
                <div class="col-lg-3 order-lg-2 order-2">
                    <h4>
                        <u>
                            <center>@lang('Another articles'): </center>
                        </u>
                    </h4>
                    @foreach ($getListAnotherArticles as $anotherArticle)
                        <div style="margin-top: 20px">
                            <a href="{{ route('article.detail', $anotherArticle->id) }}">➤<b>{{ $anotherArticle->name }}</b></a>
                        </div>
                    @endforeach
                </div>
                <!-- Li's Blog Sidebar Area End Here -->
                <!-- Begin Li's Main Content Area -->
                <div class="col-lg-9 order-lg-1 order-1">
                    <div class="row li-main-content">
                        <div class="col-lg-12">
                            <div class="li-blog-single-item pb-30">
                                <div class="li-blog-banner">
                                    <a href="#"><img class="img-full" src="{{ asset($articleDetail->image) }}"alt=""></a>
                                </div>
                                <div class="li-blog-content">
                                    <div class="li-blog-details">
                                        <h3 class="li-blog-heading pt-25"><a href="#">{{ $articleDetail->name }}</a></h3>
                                        <div class="li-blog-meta">
                                            <a class="author" href="#"><i
                                                    class="fa fa-user"></i>{{ $articleDetail->user->name ?? '' ? $articleDetail->user->name : 'Admin' }}</a>
                                            <a class="post-time list-article ml-3" href="#">
                                                <input type="hidden" class="convert-time" value="{{ date('Y-m-d h:i:s A', strtotime($articleDetail->created_at ?? '')) }}">
                                                {{ $articleDetail->created_at }}
                                            </a>
                                        </div>
                                        <!-- Begin Blog Blockquote Area -->
                                        <div class="li-blog-blockquote">
                                            <blockquote>
                                                <p>{{ $articleDetail->description }}</p>
                                            </blockquote>
                                        </div>
                                        <!-- Blog Blockquote Area End Here -->
                                        <div class="article_content">
                                            <p>{!! $articleDetail->content !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Li's Main Content Area End Here -->
            </div>
        </div>
    </div>
    <!-- Li's Main Blog Page Area End Here -->
@endsection
@section('javascript')
    <script>
        $(function() {
            $('.list-article').find('.convert-time').each(function () {
                var a = moment.tz($(this).val(), Intl.DateTimeFormat().resolvedOptions().timeZone)
                console.log(a)
                $(this).parent('a').html('<i class="fa fa-calendar"></i>' + a.format('YYYY-MM-DD HH:mm:ss'))
            });
        })
    </script>
@endsection
