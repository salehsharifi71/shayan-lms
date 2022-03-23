@extends('layouts.sites')
@section('title')  @endsection
@section('headMeta') <style>.footer-area{display:none}</style> @endsection
@section('publicContent')

    <!-- Start Page Title Area -->
    <section class="page-title-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>

                        @lang('info.classNotFound')
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
    <iframe id="showClass" allow="microphone *; camera *; display-capture *" allowfullscreen="" data-hj-allow-iframe="" mozallowfullscreen="" msallowfullscreen="" oallowfullscreen="" src="{{$url}}" webkitallowfullscreen=""></iframe>

    <!-- End Contact Info Area -->
@endsection
