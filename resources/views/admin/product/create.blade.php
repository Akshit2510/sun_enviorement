@extends('layouts.app')
@section('content')
<div class="container-xxl p-0">
    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->
    <div class="row layout-top-spacing">
        @include('partial.message')
        <div class="col-lg-12 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" >
                        </div>
                        <div class="form-group mb-4">
                            <label for="product_url">Product URL</label>
                            <input type="text" class="form-control" name="product_url" id="product_url" placeholder="Enter Product URL">
                        </div>
                        <div class="form-group mb-4">
                            <label for="short_description">Short Description</label>
                            <input type="text" class="form-control" name="short_description" id="short_description" placeholder="Enter Short Description">
                        </div>
                        <div class="form-group mb-4">
                            <label for="long_description">Long Description</label>
                            <textarea class="form-control" name="long_description" id="long_description" placeholder="Enter Long Description"></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group mb-4" id="imageUploadSection">
                            <label for="image">Select Image:</label>
                            <input class="form-control file-upload-input imageInput mb-3" name="image" type="file" id="image" required>
                            <img class="imagePreview" class="d-none" alt="Preview Image" style="max-width: 200px; max-height: 200px;display:none;">
                        </div>
                        
                        <input type="submit" value="Submit" name="time" class="btn btn-primary">
                        <a href="{{route('product.index')}}" name="Back" class="btn btn-primary">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    .image-preview {
        display: inline-block;
        margin-right: 10px;
        position: relative;
    }
    
</style>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
           
        $('.imageInput').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                var $imagePreview = $(this).closest('#imageUploadSection').find('.imagePreview');
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