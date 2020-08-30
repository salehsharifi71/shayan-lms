@extends('layouts.sites')
@section('style')

    <meta name="robots" content="index,follow" />
    <meta name="googlebot-news" content="snippet">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$meeting->title}}" />
    <meta property="og:image" content="https://{{env('APP_LTE')}}/assets/media/logos/logo-letter-1.png" />
    <meta name="twitter:title" content="{{$meeting->title}}" />
    <meta name="twitter:image" content="https://{{env('APP_LTE')}}/assets/media/logos/logo-letter-1.png" />

@endsection
@section('title') {{$meeting->title}} | @endsection
@section('siteContent')
    @inject('stringService', 'App\Services\StringService')

                <!--begin::Forms Widget 2-->
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">{{$meeting->title}}</h3>
                        </div>
                    </div>
                    <!--begin::Body-->
                    <div class="card-body">
                       {!! $meeting->description !!}

                        <br>
                        <br>
                        @if(count($teachers)>0)
                            <h4>@lang('info.thisClassTeacher')</h4>

                            <br>
                        <div class="row">
                            @foreach($teachers as $teacher)
                                <div class="col-md-4">


                                    <div class="d-flex align-items-center mb-10" id="client{{$teacher->Client->id}}">
                                        <!--begin::Symbol-->
                                        <div class="symbol mr-3">
                                            <span class="symbol-label font-size-h5">{{$stringService->findSymbol($teacher->Client->name)}}</span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                            <span  class="text-dark text-hover-primary mb-1 font-size-lg">{{$teacher->Client->name}}</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                        <hr>
                       <i class="far fa-calendar-alt"></i> @lang('info.startAt') : {{$stringService->prettyNumber(jdate($meeting->start_at)->format('%d %B  %Y'))}} (
                       <i class="far fa-clock"></i> @lang('info.time') : {{$stringService->prettyNumber($meeting->openTime)}}  -  {{$stringService->prettyNumber($meeting->closeTime)}} )<br>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Forms Widget 2-->

@endsection
