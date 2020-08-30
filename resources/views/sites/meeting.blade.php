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
                       {!! $organizer->description !!}
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Forms Widget 2-->

@endsection
