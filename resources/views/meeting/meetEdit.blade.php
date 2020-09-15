@extends('layouts.panel')
@section('title') @if($id==0 ) @lang('info.addNewClass') @else @lang('info.editClass') @endif | @endsection
@section('subheader')  @if($id==0 ) @lang('info.addNewClass') @else @lang('info.editClass') @endif @endsection
@section('style')
<style>
    .bootstrap-timepicker-widget{
        direction: ltr;
    }
    .pwt-btn-calendar{
        display: none!important;
    }
</style>
<link href="assets/css/pdate/persian-datepicker.min.css" rel="stylesheet" type="text/css" />
<!-- {{ $meet->title }}-->

@endsection
@section('panelContent')
<div class="col-md-12">
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data" onchange="calcPrice()">
                @csrf
                <center>


                    <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url(@if($meet->logo){{$meet->logo}}@else assets/media/stock-600x400/img-70.jpg @endif)">
                        <div class="image-input-wrapper" style="width: 300px;height: 200px"></div>

                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change ">
                            <i class="flaticon-edit icon-sm text-muted"></i>
                            <input type="file" name="logo" accept=".png, .jpg, .jpeg"/>
                            <input type="hidden" name="profile_avatar_remove"/>
                        </label>

                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel ">
  <i class="ki ki-bold-close icon-xs text-muted"></i>
 </span>

                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove ">
  <i class="ki ki-bold-close icon-xs text-muted"></i>
 </span>
                    </div>


                </center>
                <div class="form-group">
                    <label>@lang('info.title') <span class="text-danger">*</span></label>
                    <input type="text" name="title" value="{{$meet->title}}" class="form-control " required="">
                </div>
                <div class="form-group">
                    <label for="kt-ckeditor-1">@lang('info.inputDescription') <span class="text-danger">*</span></label><br>

                    <textarea name="description" id="kt-ckeditor-1">{!! $meet->description!!}</textarea>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label>@lang('info.meetUserPrice')</label>--}}
                    {{--<input type="tel" name="userPrice" value="{{$meet->userPrice}}" class="form-control form-control-solid" >--}}
                    {{--<span class="text-muted">@lang('info.meetUserPriceDes')</span>--}}
                {{--</div>--}}

                <div class="form-group">
                    <label>@lang('info.signUpKind') <span class="text-danger">*</span></label>
                    <select class="form-control" id="exampleSelect1" name="signUpKind">
                        <option value="1" @if($meet->signUpKind == 1) selected @endif>دوره خصوصی</option>
                        <option value="2" @if($meet->signUpKind == 2) selected @endif>ثبت نام آنلاین دوره</option>
                    </select>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-12">@lang('info.startTime') <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <div class="input-group timepicker">
                                    <input style="direction: ltr;" class="form-control" id="kt_timepicker_1" readonly="readonly" placeholder="" name="openTime" value="{{$meet->openTime}}" type="text">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="flaticon-time"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-12">@lang('info.closeTime') <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <div class="input-group timepicker">
                                    <input style="direction: ltr;" class="form-control" id="kt_timepicker_2" readonly="readonly" placeholder="" name="closeTime" value="{{$meet->closeTime}}" type="text">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="flaticon-time"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @if($id==0)
                <div class="alert alert-warning" role="alert">
                    @lang('info.staticSettingDes')
                </div>

                <div class="form-group">
                    <label>@lang('info.startAt') <span class="text-danger">*</span></label>
                    <input type="text" id="mydate" name="start_at" value="{{ jdate($meet->start_at)->format('%Y/%m/%d') }}" class="form-control initial-value-example" required="">
                </div>
                <div class="form-group">
                    <label>@lang('info.clength') <span class="text-danger">*</span></label>
                    <select class="form-control"  name="clength" id="clength">
                        <option value="1" @if($meet->clength == 1) selected @endif>یک هفته</option>
                        <option value="2" @if($meet->clength == 2) selected @endif>یک ماه</option>
                        <option value="3" @if($meet->clength == 3) selected @endif>یک سال</option>
                    </select>

                </div>

                <div class="form-group">
                    <label>@lang('info.maxOnlineUser') <span class="text-danger">*</span></label>
                    <div class="col-md-12" style="direction: ltr;">
                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                            <span class="input-group-btn input-group-prepend">
                                {{--<button class="btn btn-secondary bootstrap-touchspin-down" type="button">-</button>--}}
                            </span>
                            <input id="kt_touchspin_3" type="text" class="form-control"  value="{{$meet->maxUser}}" name="maxUser">
                            <span class="input-group-addon bootstrap-touchspin-postfix input-group-append">
                                <span class="input-group-text"></span>
                            </span>
                            <span class="input-group-btn input-group-append">
                                <button class="btn btn-secondary bootstrap-touchspin-up" type="button">+</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>@lang('info.otherPossibilities')</label>
                    <div class="checkbox-list">
                        <label class="checkbox">
                            <input type="checkbox" id="isActiveMic" name="isActiveMic" @if($meet->isActiveMic==1) checked @endif>
                            <span></span>@lang('info.isActiveMic')
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" id="isActiveWebcam" name="isActiveWebcam" @if($meet->isActiveWebcam==1) checked @endif>
                            <span></span>@lang('info.isActiveWebcam')
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" id="isActiveHalfPrice" name="isActiveHalfPrice" @if($meet->isActiveHalfPrice==1) checked @endif>
                            <span></span>@lang('info.isActiveHalfPrice')
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" id="isActiveRecording" name="isActiveRecording" @if($meet->isActiveRecording==1) checked @endif>
                            <span></span>@lang('info.isActiveRecording')
                        </label>
<span class="text-muted">@lang('info.otherPossibilitiesHint')</span>
                    </div>
                </div>


                    <div  class="text-center">
                       @lang('info.calcPrice') : <span id="calcPrice" style="font-size:25px">۱۰۰۰۰۰</span> @lang('info.priceUnit')
                        <br>
                        <button type="submit" class="btn btn-success btn-lg font-weight-bold font-size-h5" style="width: 180px;"> @lang('info.save')</button>
                    </div>
                @else
                    <button type="submit" class="btn btn-success btn-lg " > @lang('info.save')</button>
                @endif
            </form>
        </div>
    </div>
    </div>

@endsection

@section('footerScript')

    <script src="assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.9"></script>

    <script src="assets/js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.9"></script>

    <script src="assets/js/pdate/persian.date.min.js"></script>
    <script src="assets/js/pdate/persian.datepicker.min.js"></script>
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
                $('#kt_timepicker_1 , #kt_timepicker_2').timepicker({
                    minuteStep: 1,
                    defaultTime: '',
                    showSeconds: false,
                    showMeridian: false,
                    snapToStep: true
                });

                $('#kt_touchspin_3').TouchSpin({
                    buttondown_class: 'btn btn-secondary',
                    buttonup_class: 'btn btn-secondary',

                    min: 5,
                    max: 1000,
                    step: 5,
                    decimals: 0,
                    boostat: 5,
                    maxboostedstep: 10,
                    prefix: '@lang('info.person')'
                });

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


        $(document).ready(function() {
            $("#mydate").persianDatepicker({
                altField: '#mydate',
                altFormat: "YYYY/MM/DD",
                observer: true,
                format: 'YYYY/MM/DD',
                initialValue: false,
                initialValueType: 'persian',
                autoClose: true,
                minDate: 'today',
            });
        });
        @if($id==0)
function calcPrice() {
    var userPrice={{env('USER_PRICE')}};
    var userMic={{env('USER_MIC')}};
    var userWebCam={{env('USER_WC')}};
    var userHalfPrice={{env('USER_HALF_PRICE')}};
    var userRec={{env('USER_REC')}};
    var maxUser=document.getElementById("kt_touchspin_3").value;
    var clength=document.getElementById("clength").value;
    var isActiveMic=$('#isActiveMic').is(":checked");
    var isActiveWebcam=$('#isActiveWebcam').is(":checked");
    var isActiveHalfPrice=$('#isActiveHalfPrice').is(":checked");
    var isActiveRecording=$('#isActiveRecording').is(":checked");

    if(isActiveMic)
        userPrice=userPrice+userMic;

    if(isActiveWebcam)
        userPrice=userPrice+userWebCam;

    if(isActiveHalfPrice)
        userPrice=userPrice+userHalfPrice;

    var monthPrice=userPrice * maxUser;

    if(isActiveRecording)
        monthPrice=monthPrice+userRec;
    var endPrice=monthPrice;
    if(clength==1){
        endPrice=endPrice/3;
    }
    if(clength==3){
        endPrice=endPrice*11;
    }
    endPrice=roundUp(endPrice);
    document.getElementById('calcPrice').innerHTML=fixNumbers(new Intl.NumberFormat().format(endPrice));


}
        function roundUp(value) {
            return (~~((value + 999) / 1000) * 1000);
        }
        @else
        function calcPrice() {

        }
        @endif

        function fixNumbers (str)
        {
            var persianNumbers = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
            // if(typeof str == 'string')
            // {
            for(var i=0; i<10; i++)
            {
                while (str.toString().indexOf(i)!=-1){
                    str = str.toString().replace(i,persianNumbers[i]);
                }
            }
            // }
            return str;
        }


    </script>

@endsection