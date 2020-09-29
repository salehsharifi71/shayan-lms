@extends('layouts.panel')
@section('title') @if($id=='0' ) @lang('info.addNewArticle') @else @lang('info.editArticle') @endif | @endsection
@section('subheader')  @if($id=='0' ) @lang('info.addNewArticle') @else @lang('info.editArticle') @endif @endsection
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

@endsection
@section('panelContent')
<div class="col-md-12">
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <center>


                    <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url(@if($article->thumb){{$article->thumb}}@else assets/media/stock-600x400/img-70.jpg @endif)">
                        <div class="image-input-wrapper" style="width: 300px;height: 200px"></div>

                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change ">
                            <i class="flaticon-edit icon-sm text-muted"></i>
                            <input type="file" name="thumb" accept=".png, .jpg, .jpeg"/>
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
                    <input type="text" name="title" value="{{$article->title}}" class="form-control " required="">
                </div>
                <div class="form-group">
                    <label for="kt-ckeditor-1">@lang('info.inputDescription') <span class="text-danger">*</span></label><br>

                    <textarea name="description" id="kt-ckeditor-1">{!! $article->description!!}</textarea>
                </div>

                <div class="form-group" @if($user->role==0) style="display: none" @endif>
                    <label for="meta_description">@lang('info.inputDescription') seo<span class="text-danger">*</span></label><br>

                    <textarea class="form-control" name="meta_description" id="meta_description">{!! $article->meta_description!!}</textarea>
                </div>

                <div class="form-group">
                    <label>@lang('info.publishDate') <span class="text-danger">*</span></label>
                    <input type="text" id="mydate" name="publishDate" value="{{ jdate($article->created_at)->format('%Y/%m/%d') }}" class="form-control initial-value-example" required="">
                </div>

                    <button type="submit" class="btn btn-success btn-lg " > @lang('info.save')</button>
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
                altFormat: "YYYY/MM/DD HH:mm",
                observer: true,
                format: 'YYYY/MM/DD HH:mm',
                initialValue: false,
                initialValueType: 'persian',
                autoClose: true,
                timePicker: {
                enabled: true,
                    meridiem: {
                    enabled: true
                }
            }
            });
        });



    </script>

@endsection