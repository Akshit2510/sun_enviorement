@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
         <!-- BREADCRUMB -->
         <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home Page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->
        <form method="POST" action="{{ route('homeAbout.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row page-meta">
                <!-- Banner Image Section -->
                <div id="flAutoSizing" class="col-lg-12 layout-spacing">
                    @include('partial.message')
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4> About Section </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area" style="padding: 20px;">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div id="imageUploadSection">
                                        <input type="file" class="imageInput form-control" name="about_image" accept="image/*">
                                        <img class="imageAboutPreview" class="@if(empty($home->about_image)) d-none @endif" src="{{!empty($home->about_image)?asset($home->about_image):'#'}}" alt="Preview Image" style="max-width: 200px; max-height: 200px;">
                                    </div>
                                </div>
                                
                                <!-- CKEditor Section -->
                                <div class="col-12">
                                    <div id="ckeditorSection">
                                        <textarea id="editor" name="about_title">{{$home->about_title??''}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
</div>
@endsection 
@section('styles')
<link href="{{ asset('backend_assets/src/assets/css/light/components/modal.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend_assets/src/assets/css/dark/components/modal.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/src/plugins/src/table/datatable/datatables.css')}}">
    
<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/src/plugins/css/light/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/src/plugins/css/dark/table/datatable/dt-global_style.css')}}">    
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

    <script src="{{ asset('backend_assets/src/plugins/src/table/datatable/datatables.js')}}"></script>
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