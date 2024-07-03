@extends('layouts.app')
@section('content')
<div class="container">

    <div class="container">
        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('news.index')}}">News</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->
        <div class="row layout-top-spacing">
            @include('partial.message')
            <div class="col-lg-12 col-12  layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                {{-- <h4>Form groups</h4> --}}
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="sub_title">Sub Title</label>
                                <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Enter Sub Title" required>
                            </div>
                            {{-- <div class="form-group mb-4" id="imageUploadSection">
                                <label for="cover_image">Cover Image</label>
                                <input class="form-control file-upload-input imageInput" name="cover_image" type="file" id="cover_image">
                                <img class="imageAboutPreview" class="d-none" alt="Preview Image" style="max-width: 200px; max-height: 200px;">
                            </div> --}}
                            <div class="form-group mb-4" id="imageUploadSection">
                                <label for="image">Image</label>
                                <input class="form-control file-upload-input imageInput" name="image" type="file" id="image" required>
                                <img class="imageAboutPreview" class="d-none" alt="Preview Image" style="max-width: 200px; max-height: 200px;display:none;">
                            </div>
                            <input type="submit" value="submit" name="time" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
    .image-preview {
        display: inline-block;
        margin-right: 10px;
        position: relative;
    }
    .delete-button {
        position: absolute;
        top: 0;
        right: 0;
        background-color: #fff;
        border: none;
        cursor: pointer;
    }
</style>
@endsection
@push('scripts')
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