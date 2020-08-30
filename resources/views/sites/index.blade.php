@extends('layouts.sites')
@section('style')

    <meta name="robots" content="index,follow" />
    <meta name="googlebot-news" content="snippet">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$organizer->title}}" />
    <meta property="og:image" content="https://{{env('APP_LTE')}}/assets/media/logos/logo-letter-1.png" />
    <meta name="twitter:title" content="{{$organizer->title}}" />
    <meta name="twitter:image" content="https://{{env('APP_LTE')}}/assets/media/logos/logo-letter-1.png" />

@endsection
@section('siteContent')
    @inject('stringService', 'App\Services\StringService')

                <!--begin::Forms Widget 2-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                       {!! $organizer->description !!}
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Forms Widget 2-->
    <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
        <div class="alert-icon">
										<span class="svg-icon svg-icon-primary svg-icon-xl">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Tools/Compass.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
													<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
        </div>
        <div class="alert-text">@lang('info.activeProgram')</div>
    </div>
<div class="row">
    @foreach($meetings as $meeting)
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body text-center pt-4">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ki ki-bold-more-hor"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">
                                <li class="navi-header font-weight-bold py-4">
                                    <span class="font-size-lg">Choose Label:</span>
                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                                </li>
                                <li class="navi-separator mb-3 opacity-70"></li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																				<span class="navi-text">
																					<span class="label label-xl label-inline label-light-success">Customer</span>
																				</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																				<span class="navi-text">
																					<span class="label label-xl label-inline label-light-danger">Partner</span>
																				</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																				<span class="navi-text">
																					<span class="label label-xl label-inline label-light-warning">Suplier</span>
																				</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																				<span class="navi-text">
																					<span class="label label-xl label-inline label-light-primary">Member</span>
																				</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																				<span class="navi-text">
																					<span class="label label-xl label-inline label-light-dark">Staff</span>
																				</span>
                                    </a>
                                </li>
                                <li class="navi-separator mt-3 opacity-70"></li>
                                <li class="navi-footer py-4">
                                    <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                        <i class="ki ki-plus icon-sm"></i>Add new</a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>
                </div>
                <!--end::Toolbar-->
                <!--begin::User-->
                <div class="mt-7">
                    <div class="symbol symbol-circle symbol-lg-75">
                        <img src="/metronic/theme/html/demo2/dist/assets/media/users/300_14.jpg" alt="image">
                    </div>
                    <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                        <span class="font-size-h3 font-weight-boldest">JB</span>
                    </div>
                </div>
                <!--end::User-->
                <!--begin::Name-->
                <div class="my-2">
                    <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">John Beans</a>
                </div>
                <!--end::Name-->
                <!--begin::Label-->
                <span class="label label-inline label-lg label-light-warning btn-sm font-weight-bold">Active</span>
                <!--end::Label-->
                <!--begin::Buttons-->
                <div class="mt-9 mb-6">
                    <a href="#" class="btn btn-md btn-icon btn-light-facebook btn-pill mx-2">
                        <i class="socicon-facebook"></i>
                    </a>
                    <a href="#" class="btn btn-md btn-icon btn-light-twitter btn-pill mx-2">
                        <i class="socicon-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-md btn-icon btn-light-linkedin btn-pill mx-2">
                        <i class="socicon-linkedin"></i>
                    </a>
                </div>
                <!--end::Buttons-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    @endforeach
</div>

@endsection
