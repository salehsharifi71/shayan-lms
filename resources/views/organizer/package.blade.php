@extends('layouts.panel')
@section('title') @lang('info.changePackage') | @endsection
@section('subheader') @lang('info.changePackage') @endsection
@section('panelContent')
    @inject('stringService', 'App\Services\StringService')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
											<span class="card-icon">
												<i class="flaticon2-chart text-primary"></i>
											</span>
                <h3 class="card-label">@lang('info.availablePackage')</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-center m-0 position-relative">
                <!-- begin: Custom background-->
                <div class="d-none d-lg-block  position-absolute w-100 h-100"></div>
                <!-- end: Custom background-->
                <div class="col-11" style="display: block;">
                    <div class="row">
                        @foreach($packages as $package)

                        <!-- begin: Pricing-->
                        <div class="@if ($loop->index == 0) offset-lg-3 col-12 col-lg-3 bg-white p-0 @elseif ($loop->index == 1) col-12 col-lg-3 bg-white border-x-0 border-x-lg border-y border-y-lg-0 p-0 @else col-12 col-lg-3 bg-white mb-10 mb-lg-0 p-0 @endif">
                            <div class="py-15 px-0 px-lg-5 text-center">
                                <div class="d-flex flex-center mb-7">
																<span style="height:100px;" class="svg-icon svg-icon-5x svg-icon-primary">
																	<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Home/Flower3.svg-->
																	<img src="assets/media/svg/package/{{$package->logo}}.svg">
                                                                    <!--end::Svg Icon-->
																</span>
                                </div>
                                <h4 class="font-size-h3 mb-10 text-dark">{{$package->title}}</h4>
                                <div class="d-flex flex-column pb-7 text-dark-50">
                                    <span>{{$package->description}}</span>
                                </div>
                                <span class="font-size-h1 font-weight-boldest text-dark">{{$stringService->prettyNumber(number_format($package->price))}}
                                    <div class="d-flex flex-column pb-7 text-dark-50 ">
                                    <span class="font-size-h6">@lang('info.packagePerYear')</span>
                                </div>
                                </span>
                                <!--begin::Mobile Pricing Table-->
                                <div class="d-lg-none" style="width: 100%">

                                    <div class="py-3">
                                        <span class="font-weight-boldest">@lang('info.pUser')</span>
                                        <span>{{$stringService->prettyNumber(number_format($package->userLimit))}} نفر</span>
                                    </div>
                                    <div class="bg-gray-100 py-3">
                                        <span class="font-weight-boldest">@lang('info.wage')</span>
                                        <span>{{$stringService->prettyNumber($package->wage)}} %</span>
                                    </div>
                                    <div class="py-3">
                                        <span class="font-weight-boldest">@lang('info.pTicket')</span>
                                        <span>{{$package->support}}</span>
                                    </div>
                                    <div class="bg-gray-100 py-3">
                                        <span class="font-weight-boldest">@lang('info.pTel')</span>
                                        <span>@if($package->telsupport){{$package->telsupport}} @else <i class="flaticon-close"></i> @lang('info.dontHave') @endif</span>
                                    </div>
                                    <div class="py-3">
                                        <span class="font-weight-boldest">@lang('info.pDomainTitle')</span>
                                        <span>@if($package->domain) @lang('info.pDomain') @else @lang('info.pSubDomain')  @endif</span>
                                    </div>

                                </div>
                                <!--end::Mobile Pricing Table-->
                                <div class="mt-7">
                                    @if($organizer->packagesite_id==$package->id)
                                        <button type="button" class="btn btn-success text-uppercase font-weight-bolder px-15 py-3" disabled><i class="flaticon2-check-mark"></i> @lang('info.activePackage') </button>
                                    @else
                                        <button type="button" class="btn btn-success text-uppercase font-weight-bolder px-15 py-3">@lang('info.pBuy')</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end: Pricing-->
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mx-0 mb-15 d-none d-lg-flex">
                <div class="col-11">
                    <!-- begin: Bottom Table-->

                        <div class="row bg-gray-100 py-5 font-weight-bold text-center">
                            <div class="col-3 text-left px-5 font-weight-boldest">@lang('info.pUser')</div>
                            @foreach( $packages as $package) <div class="col-3">{{$stringService->prettyNumber(number_format($package->userLimit))}} نفر</div>@endforeach
                        </div>

                    <div class="row bg-white py-5 font-weight-bold text-center">
                        <div class="col-3 text-left px-5 font-weight-boldest">@lang('info.wage')</div>
                        @foreach( $packages as $package) <div class="col-3">{{$stringService->prettyNumber($package->wage)}} %</div>@endforeach
                    </div>
                    <div class="row bg-gray-100 py-5 font-weight-bold text-center">
                        <div class="col-3 text-left px-5 font-weight-boldest">@lang('info.pTicket')</div>
                        @foreach( $packages as $package) <div class="col-3">{{$package->support}}</div>@endforeach
                    </div>
                    <div class="row bg-white py-5 font-weight-bold text-center">
                        <div class="col-3 text-left px-5 font-weight-boldest">@lang('info.pTel')</div>
                        @foreach( $packages as $package) <div class="col-3">@if($package->telsupport){{$package->telsupport}} @else <i class="flaticon-close"></i> @lang('info.dontHave') @endif</div>@endforeach
                    </div>
                    <div class="row bg-gray-100 py-5 font-weight-bold text-center">
                        <div class="col-3 text-left px-5 font-weight-boldest">@lang('info.domain')</div>
                        @foreach( $packages as $package) <div class="col-3">@if($package->domain) @lang('info.pDomain') @else @lang('info.pSubDomain')  @endif</div>@endforeach
                    </div>





                    <!-- end: Bottom Table-->
                </div>
            </div>


            <div class="alert alert-custom alert-notice alert-light-info fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">

                    @lang('info.packageAlert')
                </div>

            </div>


        </div>
    </div>
        </div>
    </div>
@endsection

@section('footerScript')

    <script src="assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.9"></script>

    <script src="assets/js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.9"></script>
    <script>


        // Class definition

        var KTCkeditor = function () {
            // Private functions
            var demos = function () {
                ClassicEditor.defaultConfig = {
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            '|',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'insertTable',
                            '|',
                            'undo',
                            'redo'
                        ]
                    },
                    image: {
                        toolbar: [
                            'imageStyle:full',
                            'imageStyle:side',
                            '|',
                            'imageTextAlternative'
                        ]
                    },
                    table: {
                        contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
                    },
                    language: 'en'
                };
                ClassicEditor
                    .create( document.querySelector( '#kt-ckeditor-1' ) )
                    .then( editor => {
                    console.log( editor );
            } )
                .catch( error => {
                    console.error( error );
            } );
            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();


        var avatar5 = new KTImageInput('kt_image_5');



    </script>

@endsection