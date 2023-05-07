@extends('fe.layout.master')
@section('content')
    <style>
        .ellipsis {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .block-ellipsis {
            display: -webkit-box;
            max-width: 100%;
            height: 90px;
            margin: 0 auto;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                    <li class="active">@lang('Article')</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Main Blog Page Area -->
    <div class="li-main-blog-page pt-60 pb-55">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Main Content Area -->
                <div class="col-lg-12">
                    <div class="row li-main-content">
                        @foreach ($articles as $article)
                            <div class="col-lg-4 col-md-6">
                                <div class="li-blog-single-item pb-25">
                                    <div class="li-blog-banner">
                                        <a href="{{ route('article.detail', ['id' => $article->id]) }}">
                                            <img class="img-full" src="{{ asset($article->image) }}" alt="" style="height: 250px !important;">
                                        </a>
                                    </div>
                                    <div class="li-blog-content">
                                        <div class="li-blog-details">
                                            <h3 class="li-blog-heading pt-25"><a
                                                    href="{{ route('article.detail', ['id' => $article->id]) }}"
                                                    class="block-ellipsis">{{ $article->name }}</a></h3>
                                            <div class="li-blog-meta">
                                                <a class="author" href="#"><i
                                                        class="fa fa-user"></i>{{ isset($article->user->name) ? $article->user->name : 'Admin' }}
                                                </a>
                                                <a class="post-time list-article ml-3" href="#">
                                                    <i class="fa fa-calendar"></i>
                                                    <input type="hidden" class="convert-time" value="{{ date('Y-m-d h:i:s A', strtotime($article->created_at ?? '')) }}">
                                                    {{ $article->created_at }}
                                                </a>
                                            </div>
                                            <p class="block-ellipsis-description">{{ $article->description }}</p>
                                            <a class="read-more" href="{{ route('article.detail', $article->id) }}">
                                                @lang('See more ...')
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Begin Li's Pagination Area -->
                        <div class="col-lg-12">
                            <div class="li-paginatoin-area text-center pt-25">
                                <div class="row">
                                    <div class="col-2 mx-auto">
                                        {{ ($check_link == 1) ? $articles->links() : '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Li's Pagination End Here Area -->
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
