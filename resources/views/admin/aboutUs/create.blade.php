@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->
        <div class="row page-meta">
            <div id="flLoginForm" class="col-lg-12 layout-spacing">
                @include('partial.message')
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4></h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{route('aboutUs.store')}}" method="post" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-md-12">
                                <label for="title" class="form-label">Our Mission Title</label>
                                <input type="text" class="form-control" value="{{$aboutUs->our_mission_title??''}}" name="our_mission_title" id="formGroupExampleInput" placeholder="Enter Title" required>
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Our Mission Description</label>
                                <textarea id="editor" name="our_mission_description">{{$aboutUs->our_mission_description??''}}</textarea>
                            </div>
                            <div class="col-md-12" id="imageUploadSection">
                                <label for="image" class="form-label">Our Mission Image</label>
                                <input class="form-control file-upload-input imageInput" name="our_mission_image" type="file" id="formFile" @if(empty($aboutUs->our_mission_image)) required @endif>
                                <img class="imageAboutPreview" class="@if(empty($aboutUs->our_mission_image)) d-none @endif" src="{{!empty($aboutUs->our_mission_image)?asset($aboutUs->our_mission_image):'#'}}" alt="Preview Image" style="max-width: 200px; max-height: 200px;">
                            </div>



                            <div class="col-md-12">
                                <label for="title" class="form-label">Souls Title</label>
                                <input type="text" class="form-control" value="{{$aboutUs->souls_title??''}}" name="souls_title" id="formGroupExampleInput" placeholder="Enter Title" required>
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Souls Description</label>
                                <textarea id="souls_editor" name="souls_description">{{$aboutUs->souls_description??''}}</textarea>
                            </div>
                            <div class="col-md-12" id="imageUploadSection">
                                <label for="image" class="form-label">Souls Image</label>
                                <input class="form-control file-upload-input imageInput" name="souls_image" type="file" id="formFile"  @if(empty($aboutUs->souls_image)) required @endif>
                                <img class="imageAboutPreview" class="@if(empty($aboutUs->souls_image)) d-none @endif" src="{{!empty($aboutUs->souls_image)?asset($aboutUs->souls_image):'#'}}" alt="Preview Image" style="max-width: 200px; max-height: 200px;">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('styles')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/src/plugins/css/light/table/datatable/dt-global_style.css')}}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/src/plugins/css/dark/table/datatable/dt-global_style.css')}}">     --}}
<style>
.ck-editor__editable_inline {
    min-height: 200px;
}
</style>
@endsection
@push('scripts')
<!-- Add this jQuery code within a <script> tag at the end of your Blade template -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log('Editor was initialized', editor);  
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#souls_editor'))
                .then(editor => {
                    console.log('Editor was initialized', editor);  
                })
                .catch(error => {
                    console.error(error);
                });
            $('.imageInput').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    var $imagePreview = $(this).closest('#imageUploadSection').find('.imageAboutPreview');
                    console.log($imagePreview);
                    reader.onload = function() {
                        $imagePreview.attr('src', reader.result).css('display', 'block');
                    };
                    reader.readAsDataURL(file);
                }
            }); 
        });
    </script>
    
@endpush