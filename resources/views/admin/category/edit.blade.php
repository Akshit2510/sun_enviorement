@extends('layouts.app')
@section('content')
<div class="container-xxl p-0">
    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('bannerImages.index')}}">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->
    <div class="row layout-top-spacing">
        @include('partial.message')
        <div class="col-lg-12 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <form action="{{route('category.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$category['id']}}">
                        <div class="form-group  mb-4">
                            <label for="Title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title"  required="required" value="{{$category['title']}}">
                        </div>

                        
                        <div class="form-group mb-4">
                            <label for="banner_images">Category </label>
                            <select class="form-control" name="sub_category_id">
                                <option value="">Please select category</option>
                                <?php 
                                    if(!empty($sub_category)){
                                        foreach ($sub_category as $key => $value) { ?>
                                            <option value="{{$value['id']}}" @if($value['id'] == $category['sub_category_id']) selected="selected" @endif>{{$value['title']}}</option>
                                            
                                <?php   }
                                    }
                                ?>
                            </select>
                        </div>

                        
                        <div class="form-group mb-4">
                            <label for="banner_images">Status </label>
                            <select class="form-control" name="status">
                                <option value="1" @if($category['status'] == 1) selected="selected" @endif>Active</option>
                                <option value="0" @if($category['status'] == 0) selected="selected" @endif>Inactive</option>
                            </select>
                        </div>
                        
                        <input type="submit" value="Submit" name="time" class="btn btn-primary">
                        <a href="{{route('category.index')}}" name="Back" class="btn btn-primary">Back</a>

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

@endpush