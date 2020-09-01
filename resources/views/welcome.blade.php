@extends('layouts.public')
@section('headMeta')

    <meta name="robots" content="index,follow" />
    <meta name="googlebot-news" content="snippet">
    <link rel="canonical" href="https://{{env('APP_LTE')}}">
    <meta name="description" content="@lang('info.seoDes')" />
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@lang('info.baseTitle')" />
    <meta property="og:description" content="@lang('info.seoDes')" />
    <meta property="og:url" content="https://{{env('APP_LTE')}}" />
    <meta property="og:site_name" content="{{env('APP_LTE')}}" />
    <meta property="og:image" content="https://{{env('APP_LTE')}}/assets/media/logos/logo-letter-1.png" />
    <meta name="twitter:description" content="@lang('info.seoDes')" />
    <meta name="twitter:title" content="@lang('info.baseTitle')" />
    <meta name="twitter:image" content="https://{{env('APP_LTE')}}/assets/media/logos/logo-letter-1.png" />

@endsection
@section('publicContent')
    @inject('stringService', 'App\Services\StringService')
    <div class="main-banner saas-home">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row h-100 justify-content-center align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="saas-image">
                                <img src="/assets/publicTheme/img/saas-shape/arrow.png" class="wow fadeInDown" data-wow-delay="0.6s" alt="arrow" /><img src="/assets/publicTheme/img/saas-shape/box1.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="box1" />
                                <img src="/assets/publicTheme/img/saas-shape/boy1.png" class="wow fadeInLeft" data-wow-delay="0.6s" alt="boy1" /><img src="/assets/publicTheme/img/saas-shape/boy2.png" class="wow zoomIn" data-wow-delay="0.6s" alt="boy2" />
                                <img src="/assets/publicTheme/img/saas-shape/boy3.png" class="wow bounceIn" data-wow-delay="0.6s" alt="boy3" />
                                <img src="/assets/publicTheme/img/saas-shape/digital-screen.png" class="wow fadeInDown" data-wow-delay="0.6s" alt="digital-screen" />
                                <img src="/assets/publicTheme/img/saas-shape/filter1.png" class="wow zoomIn" data-wow-delay="0.6s" alt="filter1" />
                                <img src="/assets/publicTheme/img/saas-shape/filter2.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="filter2" />
                                <img src="/assets/publicTheme/img/saas-shape/filter3.png" class="wow rotateIn" data-wow-delay="0.6s" alt="filter3" /><img src="/assets/publicTheme/img/saas-shape/girl1.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="girl1" />
                                <img src="/assets/publicTheme/img/saas-shape/girl2.png" class="wow zoomIn" data-wow-delay="0.6s" alt="girl2" /><img src="/assets/publicTheme/img/saas-shape/monitor.png" class="wow zoomIn" data-wow-delay="0.6s" alt="monitor" />
                                <img src="/assets/publicTheme/img/saas-shape/main-image.png" class="wow zoomIn" data-wow-delay="0.6s" alt="main-image.png" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="hero-content pl-4">
                                <h1>@lang('info.description')</h1>
                                <p>@lang('info.descriptionLong')</p>
                                <a href="{{route('register')}}" class="btn btn-primary">@lang('info.freeSignUp')</a>
                                {{--<a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="video-btn popup-youtube"> Watch Video <i class="icofont-play-alt-3"></i></a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray shape-1"></div>
        <div class="shape1"><img src="/assets/publicTheme/img/shape1.png" alt="img" /></div>
        <div class="shape2"><img src="/assets/publicTheme/img/shape2.png" alt="img" /></div>
        <div class="shape3"><img src="/assets/publicTheme/img/shape3.png" alt="img" /></div>
        <div class="shape4 rotateme"><img src="/assets/publicTheme/img/shape4.png" alt="img" /></div>
    </div>
    <section class="features-area saas-features ptb-100">
        <div class="container">
            <div class="section-title">
                <h2>@lang('info.features')</h2>
                <div class="bar"></div>
                <p>@lang('info.featuresDes').</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-features">
                        <div class="icon"><i class="icofont-ui-video-chat"></i></div>
                        <h3>@lang('info.meeting')</h3>
                        <p>@lang('info.meetingDes').</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-features">
                        <div class="icon"><i class="icofont-video-cam"></i></div>
                        <h3>@lang('info.webinar')</h3>
                        <p>@lang('info.webinarDes').</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-features">
                        <div class="icon"><i class="icofont-student-alt"></i></div>
                        <h3>@lang('info.class')</h3>
                        <p>@lang('info.classDes').</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-features">
                        <div class="icon"><i class="icofont-heart-eyes"></i></div>
                        <h3>@lang('info.easyUse')</h3>
                        <p>@lang('info.easyUseDes').</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-features">
                        <div class="icon"><i class="icofont-responsive"></i></div>
                        <h3>@lang('info.responsive')</h3>
                        <p>@lang('info.responsiveDes').</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-features">
                        <div class="icon"><i class="icofont-globe"></i></div>
                        <h3>@lang('info.dedSite')</h3>
                        <p>@lang('info.dedSiteDes').</p>
                        </div>
                </div>
            </div>
        </div>
        <div class="shape7"><img src="/assets/publicTheme/img/shape7.png" alt="shape" /></div>
        <div class="shape3"><img src="/assets/publicTheme/img/shape3.png" alt="img" /></div>
        <div class="bg-gray shape-1"></div>
        <div class="shape6"><img src="/assets/publicTheme/img/shape6.png" alt="img" /></div>
        <div class="shape8 rotateme"><img src="/assets/publicTheme/img/shape8.svg" alt="shape" /></div>
        <div class="shape9"><img src="/assets/publicTheme/img/shape9.svg" alt="shape" /></div>
        <div class="shape10"><img src="/assets/publicTheme/img/shape10.svg" alt="shape" /></div>
        <div class="shape11 rotateme"><img src="/assets/publicTheme/img/shape11.svg" alt="shape" /></div>
    </section>
    <div class="cta-area">
        <div class="container">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-7 col-md-7"><p>@lang('info.wantSee')</p></div>
                <div class="col-lg-5 col-md-5 text-right"><a href="{{route('register')}}" class="btn btn-primary">@lang('info.freeSignUp')</a></div>
            </div>
        </div>
    </div>

    <section class="pricing-area ptb-100 bg-gray" id="pricing">
        <div class="container">
            <div class="section-title">
                <h2>@lang('info.pricing')</h2>
                <div class="bar"></div>
                <p>@lang('info.otherPossibilitiesHint') .</p>
                <p>@lang('info.customizePack') .</p>
            </div>
            <div class="row">
                {{--@foreach($packages as $package)--}}

                {{--<div class="col-lg-4 col-md-6 @if($loop->index==2) offset-lg-0 offset-md-3 @endif">--}}
                    {{--<div class="pricingTable">--}}
                        {{--<div style="position: absolute;top: -40px;left: calc(50% - 32px)"><img src="assets/media/svg/package/{{$package->logo}}.svg"></div>--}}
                        {{--<div class="price-Value"><span class="currency"></span>{{$stringService->prettyNumber(number_format($package->price))}}</div>--}}
                        {{--<span class="month" style="display:block">@lang('info.packagePerYear')</span>--}}
                        {{--<div class="pricingHeader"><h3 class="title">{{$package->title}}</h3></div>--}}
                        {{--<div class="pricing-content">--}}
                            {{--<ul>--}}
                                {{--@if($package->id==1)--}}
                                    {{--<li class="active">@lang('info.twoMFree')</li>--}}
                                {{--@endif--}}
                                    {{--<li class="active">--}}
                                        {{--<span class="font-weight-boldest">@lang('info.pUser') : </span>--}}
                                        {{--<span>{{$stringService->prettyNumber(number_format($package->userLimit))}} نفر</span>--}}
                                    {{--</li>--}}
                                    {{--<li class="active">--}}
                                        {{--<span class="font-weight-boldest">@lang('info.wage') : </span>--}}
                                        {{--<span>{{$stringService->prettyNumber($package->wage)}} %</span>--}}
                                    {{--</li>--}}
                                    {{--<li class="active">--}}
                                        {{--<span class="font-weight-boldest">@lang('info.pTicket') : </span>--}}
                                        {{--<span>{{$package->support}}</span>--}}
                                    {{--</li>--}}
                                    {{--<li class="active">--}}
                                        {{--<span class="font-weight-boldest">@lang('info.pTel') : </span>--}}
                                        {{--<span>@if($package->telsupport){{$package->telsupport}} @else <i class="flaticon-close"></i> @lang('info.dontHave') @endif</span>--}}
                                    {{--</li>--}}
                                    {{--<li class="active">--}}
                                        {{--<span class="font-weight-boldest">@lang('info.pDomainTitle') : </span>--}}
                                        {{--<span>@if($package->domain) @lang('info.pDomain') @else @lang('info.pSubDomain')  @endif</span>--}}
                                    {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<a href="{{route('register')}}" class="btn btn-primary">@lang('info.signUp')</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--@endforeach--}}
                @foreach($packages as $package)
                <div class="col-lg-4 col-md-6 @if($loop->index==2) offset-lg-0 offset-md-3 @endif ">
                    <div class="pricingTable">
                        <div class="pricing-icon">
                            <i class="{{$package['img']}}"></i>
                        </div>
                        <div class="price-Value"><span class="currency"></span>@if($package['price']==0) @lang('info.free') @else {{$stringService->prettyNumber(number_format($package['price']))}} @endif</div>
                        <span class="month" style="display:block">@if($package['price']==0) @lang('info.twoMFree') @else @lang('info.packagePerMonth') @endif</span>
                        <div class="pricingHeader"><h3 class="title">{{$package['title']}}</h3></div>
                        <div class="pricing-content">
                            <ul>

                                <li class="active">
                                    <span class="font-weight-boldest">@lang('info.pUser') : </span>
                                    <span>{{$stringService->prettyNumber(number_format($package['maxUser']))}} @lang('info.person')</span>
                                </li>
                                <li @if($package['isActiveMic']) class="active" @endif>
                                    <span>@lang('info.isActiveMic')</span>
                                </li>
                                <li @if($package['isActiveWebcam']) class="active" @endif>
                                    <span>@lang('info.isActiveWebcam')</span>
                                </li>
                                <li @if($package['isActiveHalfPrice']) class="active" @endif>
                                    <span>@lang('info.isActiveHalfPrice')</span>
                                </li>
                            </ul>
                        </div>
                        <a href="{{route('register')}}" class="btn btn-primary">@lang('info.signUp')</a>
                    </div>
                </div>
                @endforeach
            </div>

            {{--<div class="section-title"><br>--}}
                {{--<h2>@lang('info.pricingClass')</h2>--}}
                {{--<div class="bar"></div>--}}
                {{--<p>@lang('info.pricingClassDes').</p>--}}
            {{--</div>--}}
        </div>
    </section>

@endsection
