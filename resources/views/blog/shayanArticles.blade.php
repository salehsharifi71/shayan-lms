@extends('layouts.public')
@section('title')   @lang('info.blog') | @endsection
@section('headMeta')
    <meta name="robots" content="index,follow" />
    <meta name="googlebot-news" content="snippet">
    <link rel="canonical" href="https://{{env('APP_LTE')}}/blog">
    <meta name="description" content="@lang('info.blogSeoDes')" />
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@lang('info.baseTitle') | @lang('info.blog')" />
    <meta property="og:description" content="@lang('info.blogSeoDes')" />
    <meta property="og:url" content="https://{{env('APP_LTE')}}/blog" />
    <meta property="og:site_name" content="{{env('APP_LTE')}}" />
    <meta property="og:image" content="https://{{env('APP_LTE')}}/assets/media/logos/logo-letter-1.png" />
    <meta name="twitter:description" content="@lang('info.blogSeoDes')" />
    <meta name="twitter:title" content="@lang('info.baseTitle') | @lang('info.blog')" />
    <meta name="twitter:image" content="https://{{env('APP_LTE')}}/assets/media/logos/logo-letter-1.png" />

@endsection
@section('publicContent')
    @inject('stringService', 'App\Services\StringService')

    <!-- Start Page Title Area -->
    <section class="page-title-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>
                            @lang('info.blog')


                    </h2>
                </div>
            </div>
        </div>

        <div class="shape1"><img src="/assets/publicTheme/img/shape1.png" alt="img"></div>
        <div class="shape2"><img src="/assets/publicTheme/img/shape2.png" alt="img"></div>
        <div class="shape3"><img src="/assets/publicTheme/img/shape3.png" alt="img"></div>
        <div class="shape6"><img src="/assets/publicTheme/img/shape6.png" alt="img"></div>
        <div class="shape8 rotateme"><img src="/assets/publicTheme/img/shape8.svg" alt="shape"></div>
        <div class="shape9"><img src="/assets/publicTheme/img/shape9.svg" alt="shape"></div>

    </section>
    <!-- End Page Title Area -->

    <!-- Start Contact Info Area -->
    <section class="contact-info-area ptb-100">
        <div class="container">
            <div class="row">

                @foreach($articles as $article)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-post">
                            <a href="{{route('blogSingle',$article->slug)}}" class="post-image" title="{{$article->title}}"><img src="{{$article->thumb}}" alt="{{$article->title}}"></a>

                            <div class="blog-post-content">
                                <ul>
                                    <li><i class="icofont-user-male"></i> محمدصالح شریفی</li>
                                    <li><i class="icofont-wall-clock" style="float: right;"></i> {{$stringService->prettyNumber(jdate($article->created_at)->format('%d %B %Y'))}}</li>
                                </ul>
                                <h3><a href="{{route('blogSingle',$article->slug)}}" title="{{$article->title}}">{{$article->title}}</a></h3>
                                <p>{{$stringService->getSlice($article->meta_description,90)}} </p>
                                <a href="{{route('blogSingle',$article->slug)}}" title="{{$article->title}}" class="read-more-btn">ادامه مطلب <i class="icofont-rounded-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area">
                            {{$articles->links()}}
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info Area -->
@endsection
