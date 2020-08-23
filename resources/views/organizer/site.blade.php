@extends('layouts.panel')
@section('title') @lang('info.orgSite') | @endsection
@section('subheader') @lang('info.orgSite') @endsection
@section('panelContent')
    <div class="col-md-12">
    <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
        <div class="alert-icon">
										<span class="svg-icon svg-icon-primary svg-icon-xl">
											<img src="assets/media/svg/package/{{$organizer->Packagesite->logo}}.svg">
										</span>
        </div>
        <div class="alert-text">
            <div class="row">
                <div class="col-md-6">
            @lang('info.currentPackage') :‌
<Strong>{{$organizer->Packagesite->title}}</Strong><br>
            @lang('info.credit') :‌
            @if($organizer->expireAt < Carbon\Carbon::now())
                <span class="badge badge-danger">@lang('info.expired')</span>
            @else
                <span class="badge badge-success">      {{ \Carbon\Carbon::parse($organizer->expireAt)->diffForHumans() }}</span>

            @endif
                </div>
                <div class="col-md-6 text-center">
                    @if($organizer->expireAt < Carbon\Carbon::now()->addMonthsNoOverflow(1))
                    <a href="{{route('orgPackage')}}" class="btn btn-outline-success">
                        <i class="flaticon2-refresh-button"></i> @lang('info.renew')
                    </a>
                    @endif
                    <a href="{{route('orgPackage')}}" class="btn btn-success">
                        <i class="flaticon2-box-1"></i> @lang('info.changePackage')
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-12">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">@lang('info.editSite')</h3>

            </div>
            <div class="col-md-12">
                <br>

            <form method="post" action="" enctype="multipart/form-data">
                @csrf
                <center>


                    <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url(@if($organizer->logo){{$organizer->logo}}@else assets/media/stock-600x400/img-70.jpg @endif)">
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
                    <label>@lang('info.title')</label>
                    <input type="text" name="title" value="{{$organizer->title}}" class="form-control form-control-solid" required>
                </div>
                <div class="form-group">
                    <label>@lang('info.domain')</label>
                    @if($organizer->Packagesite->id==1)
                        <input type="text" style="text-align: left" name="domain" value="{{$organizer->domain}}" class="form-control form-control-solid" required>
<input type="text" disabled value=".{{env('APP_LTE')}}" style="direction: ltr;width: 110px;display: block;margin: -27px 10px 0 10px;border: none;background-color: unset;">
                        <br>
                        <i class="flaticon-exclamation-1"></i>
                        <span class="text-muted">@lang('info.changePackageDomain')</span>
                    @else
                        <input type="text" style="text-align: left" name="domain" value="{{$organizer->domain}}" class="form-control form-control-solid" required>
                    @endif
                </div>
                <div class="form-group">
                    <label>@lang('info.inputDescription')</label><br>

                    <textarea name="description" id="kt-ckeditor-1">{!! $organizer->description!!}</textarea>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="@lang('info.save')" class="btn btn-success">

                </div>
            </form>
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