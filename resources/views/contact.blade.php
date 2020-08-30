@extends('layouts.public')
@section('publicContent')

    <!-- Start Page Title Area -->
    <section class="page-title-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('info.contactUs')</h2>
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
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class="icofont-email"></i>
                        </div>
                        <h3>@lang('info.email')</h3>
                        <p><a href="mailto:@lang('info.emailAdmin')">@lang('info.emailAdmin')</a></p>
                        <p><a href="mailto:@lang('info.emailSupport')">@lang('info.emailSupport')</a></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class="icofont-google-map"></i>
                        </div>
                        <h3>@lang('info.visitHere')</h3>
                        <p>@lang('info.visitAddress')</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class="icofont-phone"></i>
                        </div>
                        <h3>@lang('info.callUs')</h3>
                        <p><a href="tel:@lang('info.callN1')">@lang('info.callN1')</a></p>
                        <p><a href="tel:@lang('info.callN2')">@lang('info.callN2')</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info Area -->

    <!-- Start Contact Area -->
    <section class="contact-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h2>@lang('info.sendMessage')</h2>
                <div class="bar"></div>
            </div>

            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12">
                    <img src="/assets/publicTheme/img/marketing.png" alt="image">
                </div>

                <div class="col-lg-6 col-md-12">
                    <form id="contactForm" method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" required data-error="Please enter your name" placeholder="@lang('info.placeholderName')">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" required data-error="Please enter your email" placeholder="@lang('info.email')">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="@lang('info.phone')">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="@lang('info.subject')">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="5" required data-error="Write your message" placeholder="@lang('info.yourMessage')"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="btn btn-primary">@lang('info.sendMessage')</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->

@endsection
