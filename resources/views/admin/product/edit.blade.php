@extends('layouts.app')
@section('content')
<div class="container-xxl p-0">
    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->
    <div class="row layout-top-spacing">
        @include('partial.message')
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="old_image" value="{{ $product->image }}">
                        <div class="form-group mb-4">
                            <label for="category">Category</label>
                            <select class="form-control" name="category_id">
                                <option>Select category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ $product->name }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="product_url">Product URL</label>
                            <input type="text" class="form-control" name="product_url" id="product_url" placeholder="Enter Product URL" value="{{ $product->product_url }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="short_description">Short Description</label>
                            <input type="text" class="form-control" name="short_description" id="short_description" placeholder="Enter Short Description" value="{{ $product->short_description }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="long_description">Long Description</label>
                            <textarea class="form-control" name="long_description" id="long_description" placeholder="Enter Long Description">{{ $product->long_description }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option>Select status</option>
                                <option value="active" @if($product->status == 'active') selected="selected" @endif>Active</option>
                                <option value="inactive" @if($product->status == 'inactive') selected="selected" @endif>Inactive</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="availability">Availability</label>
                            <select class="form-control" name="availability">
                                <option>Select availability</option>
                                <option value="instock" @if($product->availability == 'instock') selected="selected" @endif>In stock</option>
                                <option value="outstock" @if($product->availability == 'outstock') selected="selected" @endif>Out stock</option>
                            </select>
                        </div>
                        <div class="form-group mb-4" id="imageUploadSection">
                            <label for="image">Select Image:</label>
                            <input class="form-control file-upload-input imageInput mb-3" name="image" type="file" id="image">
                            <img class="imagePreview" class="d-none" alt="Preview Image" style="max-width: 200px; max-height: 200px;display:none;">
                        </div>
                        <div class="form-group mb-4" id="specificationSection">
                            <div class="row">
                                <div class="col-md-6 text-start">
                                    <label for="specifications">Specifications</label>
                                </div>
                                <div class="col-md-6 text-end">
                                <button type="button" class="btn btn-primary text-end" id="addSpecification"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div id="specificationContainer">
                                @foreach($product->specifications as $index => $specification)
                                <div class="row specificationRow mb-2">
                                    <div class="col-md-5">
                                        <select class="form-control" name="specifications[{{ $index }}][name]">
                                            <option>Select specification</option>
                                            @foreach($productSpecifications as $productSpecification)
                                            <option value="{{ $productSpecification->id }}" @if($specification->id == $productSpecification->id) selected="selected" @endif>{{ $productSpecification->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="specifications[{{ $index }}][value]" placeholder="Enter value" value="{{ $specification->description }}">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeSpecification"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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

        var specificationIndex = {{ $product->specifications->count() }};
        $('#addSpecification').on('click', function() {
            var newRow = `<div class="row specificationRow mb-2">
                            <div class="col-md-5">
                                <select class="form-control" name="specifications[${specificationIndex}][name]">
                                    <option>Select specification</option>
                                    @foreach($productSpecifications as $productSpecification)
                                    <option value="{{ $productSpecification->id }}">{{ $productSpecification->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="specifications[${specificationIndex}][value]" placeholder="Enter value">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger removeSpecification"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </div>
                        </div>`;
            $('#specificationContainer').append(newRow);
            specificationIndex++;
        });

        $(document).on('click', '.removeSpecification', function() {
            $(this).closest('.specificationRow').remove();
        });
    });
</script>
@endpush
