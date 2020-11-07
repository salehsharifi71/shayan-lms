@extends('layouts.public')
@section('title')   {{$article->title}} | @endsection
@section('headMeta')
    <meta name="robots" content="index,follow" />
    <meta name="googlebot-news" content="snippet">
    <link rel="canonical" href="{{route('blogSingle',$article->slug)}}">
    <meta name="description" content="{{$article->meta_description}}" />
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@lang('info.baseTitle') | {{$article->title}}" />
    <meta property="og:description" content="{{$article->meta_description}}" />
    <meta property="og:url" content="{{route('blogSingle',$article->slug)}}" />
    <meta property="og:site_name" content="{{env('APP_LTE')}}" />
    <meta property="og:image" content="{{$article->thumb}}" />
    <meta name="twitter:description" content="{{$article->meta_description}}" />
    <meta name="twitter:title" content="@lang('info.baseTitle') | {{$article->title}}" />
    <meta name="twitter:image" content="{{$article->thumb}}" />

@endsection
@section('publicContent')
    @inject('stringService', 'App\Services\StringService')

    <!-- Start Page Title Area -->
    <section class="page-title-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>
                            {{$article->title}}


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

    <!-- Start Blog Details Area -->
    <section class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details">
                        <div class="article-img">
                            <img src="{{$article->thumb}}" alt="{{$article->title}}">
                            <div class="date">{{$stringService->prettyNumber(jdate($article->created_at)->format('%d'))}} <br> {{$stringService->prettyNumber(jdate($article->created_at)->format('%B'))}}</div>
                        </div>

                        <div class="article-content">


                            <h3>{{$article->title}}</h3>

                            {!! $article->description !!}
                            <div class="share-post">
                                <ul>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{route('blogSingle',$article->slug)}}" target="_blank"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/share?text=shayanLms&url={{route('blogSingle',$article->slug)}}" target="_blank"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{route('blogSingle',$article->slug)}}" target="_blank"><i class="icofont-linkedin"></i></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar-area">
                        <div class="widget widget_recent_posts">
                            <h3 class="widget-title"> @lang('info.blogLatest')</h3>
                            <div class="bar"></div>

                            <ul>
                                @foreach($articles as $article)
                                <li>
                                    <div class="recent-post-thumb">
                                        <a href="{{route('blogSingle',$article->slug)}}" title="{{$article->title}}">
                                            <img src="{{$article->thumb}}" alt="{{$article->title}}">
                                        </a>
                                    </div>

                                    <div class="recent-post-content">
                                        <h4><a href="{{route('blogSingle',$article->slug)}}" title="{{$article->title}}">{{$article->title}}</a></h4>
                                        <span class="date">{{$stringService->prettyNumber(jdate($article->created_at)->format('%d %B %Y'))}}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Details Area -->

@endsection
