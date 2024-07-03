@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
        <form method="POST" action="{{ route('homePageStore') }}" enctype="multipart/form-data">
            @csrf
            {{-- banner image section start --}}
            <div class="row page-meta">
                <!-- Banner Image Section -->
                <div id="flAutoSizing" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Banner Image Section</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="ml-3">
                                        <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                            Add Image
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Upload Banner Image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="banner_images">Select Image:</label>
                                                        <input type="file" class="form-control-file" id="banner_images" name="banner_images">
                                                        <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-dark" data-bs-dismiss="modal">Discard</button>
                                                    <button type="button" class="btn btn-primary" id="submit_banner_image">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"> 
                                    <table id="banner_table" class="table zero-config">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bannerImages as $item)  
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($item->image) }}" alt="Banner Image" style="max-width: 200px; height: auto;">
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-danger bannerDeleteBtn" id="{{$item->id}}">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- banner image section end --}}
            {{-- <hr> --}}
            {{-- Daily Darshan Image Section start --}}
            <div class="row">
                <!-- Banner Image Section -->
                <div id="flAutoSizing" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Daily Darshan Image Section</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="">
                                        <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#dailyDarshanUploadModal">
                                          Add Image
                                        </button>
                                    </div>
                                    <div class="modal fade" id="dailyDarshanUploadModal" tabindex="-1" role="dialog" aria-labelledby="dailyDarshanUploadModal" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="dailyDarshanUploadModal">Upload Daily Darshan Image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="daily_darshan_images">Select Image:</label>
                                                        <input type="file" class="form-control-file" id="daily_darshan_images" name="daily_darshan_images">
                                                        <img id="dailyDarshanImagePreview" src="#" alt="Preview" style="display: none; max-width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-dark" data-bs-dismiss="modal">Discard</button>
                                                    <button type="button" class="btn btn-primary" id="submit_daily_darshan_image">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <table id="dailyDarshanTable" class="table zero-config">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Loop through daily darshan images and display in table rows -->
                                        @foreach ($dailyDarshanImages as $darshanImage)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($darshanImage->image) }}" alt="Daily Darshan Image" style="max-width: 200px; height: auto;">
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger darshanDeleteBtn" id="{{ $darshanImage->id }}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Daily Darshan Image section end --}}
            {{-- guru section start --}}
            {{-- <hr> --}}
            <div class="row">
                <!-- Banner Image Section -->
                <div id="flAutoSizing" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>  Guru Section </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row g-3">
                                <div class="">
                                    <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#uploadguruModal">
                                        Add record
                                    </button>
                                </div>
                                <div class="modal fade" id="uploadguruModal" tabindex="-1" role="dialog" aria-labelledby="uploadguruModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="uploadguruModalLabel"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="gurus">Enter Title:</label>
                                                    <input type="text" class="form-control" id="gurus_title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="gurus">Select Image:</label>
                                                    <input type="file" class="form-control-file image" name="gurus">
                                                    <img class="imagePreview" src="#" alt="Preview" style="display: none; max-width: 100%; height: auto;">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-dark" data-bs-dismiss="modal">Discard</button>
                                                <button type="button" class="btn btn-primary" id="submit_guru">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <table id="guru_table" class="table zero-config">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gurus as $item)  
                                        <tr>
                                            <td>
                                                {{$item->title}}
                                            </td>
                                            <td>
                                                <img src="{{ asset($item->image) }}" alt="Banner Image" style="max-width: 200px; height: auto;">
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger guruDeleteBtn" id="{{$item->id}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- guru section end --}}
            {{-- <hr> --}}
            {{-- about section start --}}
            <div class="row">
                <!-- Banner Image Section -->
                <div id="flAutoSizing" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4> About Section </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div id="imageUploadSection">
                                        <input type="file" class="imageInput" name="about_image" accept="image/*">
                                        <img class="imageAboutPreview" class="@if(empty($home->about_image)) d-none @endif" src="{{!empty($home->about_image)?asset($home->about_image):'#'}}" alt="Preview Image" style="max-width: 200px; max-height: 200px;">
                                    </div>
                                </div>
                                
                                <!-- CKEditor Section -->
                                <div class="col-6">
                                    <div id="ckeditorSection">
                                        <textarea id="editor" name="about_title">{{$home->about_title??''}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-6 h2">
                About Section 
                </div>
            </div>
            <hr>
            <div class="row"> 
                <div class="col-6">
                    <div id="imageUploadSection">
                        <input type="file" class="imageInput" name="about_image" accept="image/*">
                        <img class="imageAboutPreview" class="@if(empty($home->about_image)) d-none @endif" src="{{!empty($home->about_image)?asset($home->about_image):'#'}}" alt="Preview Image" style="max-width: 200px; max-height: 200px;">
                    </div>
                </div>
                
                <!-- CKEditor Section -->
                <div class="col-6">
                    <div id="ckeditorSection">
                        <textarea id="editor" name="about_title">{{$home->about_title??''}}</textarea>
                    </div>
                </div>
            </div> --}}
            {{-- about section end --}}
            {{-- antar_varse_image section start  --}}
            {{-- <hr> --}}
            <div class="row">
                <!-- Banner Image Section -->
                <div id="flAutoSizing" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>  Antar Varse Image Section </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div id="imageUploadSection">
                                        <input type="file" class="imageInput" name="antar_varse_image" accept="image/*">
                                        <img class="imageAboutPreview" class="@if(empty($home->antar_varse_image)) d-none @endif" src="{{!empty($home->antar_varse_image)?asset($home->antar_varse_image):'#'}}" alt="Preview Image" style="max-width: 200px; max-height: 200px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- antar_varse_image section end  --}}
            
            <button type="submit" class="btn btn-primary">Submit</button>
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
            // Banner image section
            // $('#add_banner_image').click(function() {
            //     $('#uploadModal').modal('show');
            // });
            $('#banner_images').change(function() {
                readURL(this);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result);
                        $('#imagePreview').show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#submit_banner_image').click(function() {
                var formData = new FormData();
                formData.append('banner_images', $('#banner_images')[0].files[0]);

                var csrfToken = $('meta[name="csrf-token"]').attr('content');   
                formData.append('_token', csrfToken); // Append CSRF token
                $.ajax({
                    url: '{{ route("upload.banner.image") }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#uploadModal').modal('hide');
                        // Handle success response
                        if (response.success) {
                            // Append the uploaded image to the table
                            var imagePath = response.image_path;
                            var itemId = response.id; // Assuming you have an 'id' property in the response
                            var imageElement = '<img src="' + imagePath + '" alt="Banner Image" style="max-width: 200px; height: auto;">';
                            var deleteBtn = '<a href="#" class="btn btn-danger bannerDeleteBtn" id="' + itemId + '">Delete</a>';
                            var newRow = '<tr><td>' + imageElement + '</td><td>' + deleteBtn + '</td></tr>';
                            $('#banner_table tbody').append(newRow);
                            $('.zero-config').DataTable().reload();
                        } else {
                            // Handle unsuccessful response
                            console.error('Upload failed');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error 
                    }
                });
            });
            $(document).on('click', '.bannerDeleteBtn', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                var $btn = $(this);
                var itemId = $(this).attr('id'); // Get the ID of the item to delete
                var deleteUrl = '{{ route("delete.banner.image", ":itemId") }}'; // URL template
        
                // Replace the placeholder with the actual item ID
                deleteUrl = deleteUrl.replace(':itemId', itemId);
                // Send an AJAX request to delete the banner image
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Handle success response
                            console.log(response);
                            // Remove the corresponding table row
                            $btn.closest('tr').remove(); 
                        } else {
                            // Handle unsuccessful response if needed
                            console.log('Deletion failed');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            });

            //about section
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log('Editor was initialized', editor);  
                })
                .catch(error => {
                    console.error(error);
                });

            // Image preview
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


            // Daily Darshan section
            $('#add_daily_darshan_image').click(function() {
                $('#dailyDarshanUploadModal').modal('show');
            });

            // Preview the selected daily darshan image
            $('#daily_darshan_images').change(function() {
                readDailyDarshanURL(this);
            });

            function readDailyDarshanURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#dailyDarshanImagePreview').attr('src', e.target.result);
                        $('#dailyDarshanImagePreview').show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Submit the form to upload daily darshan image via AJAX
            $('#submit_daily_darshan_image').click(function() {
                var formData = new FormData();
                formData.append('daily_darshan_images', $('#daily_darshan_images')[0].files[0]);

                var csrfToken = $('meta[name="csrf-token"]').attr('content');   
                formData.append('_token', csrfToken); // Append CSRF token

                $.ajax({
                    url: '{{ route("upload.daily_darshan.image") }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#dailyDarshanUploadModal').modal('hide');
                        // Handle success response
                        if (response.success) {
                            // Append the uploaded image to the table
                            var imagePath = response.image_path;
                            var itemId = response.id; // Assuming you have an 'id' property in the response
                            var imageElement = '<img src="' + imagePath + '" alt="Daily Darshan Image" style="max-width: 200px; height: auto;">';
                            var deleteBtn = '<a href="#" class="btn btn-danger darshanDeleteBtn" id="' + itemId + '">Delete</a>';
                            var newRow = '<tr><td>' + imageElement + '</td><td>' + deleteBtn + '</td></tr>';
                            $('#dailyDarshanTable tbody').append(newRow);
                        } else {
                            // Handle unsuccessful response
                            console.error('Upload failed');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            });

            // Delete the daily darshan image via AJAX
            $(document).on('click', '.darshanDeleteBtn', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                var $btn = $(this);
                var itemId = $(this).attr('id'); // Get the ID of the item to delete
                var deleteUrl = '{{ route("delete.daily_darshan.image", ":itemId") }}'; // URL template

                // Replace the placeholder with the actual item ID
                deleteUrl = deleteUrl.replace(':itemId', itemId);
                // Send an AJAX request to delete the daily darshan image
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Handle success response
                            console.log(response);
                            // Remove the corresponding table row
                            $btn.closest('tr').remove(); 
                        } else {
                            // Handle unsuccessful response if needed
                            console.log('Deletion failed');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            });
            $('#add_guru').click(function() {
                $('#uploadguruModal').modal('show');
            });

            //dynamic image preview for all
            $('.image').change(function() {
                readDynamicURL(this);
            });

            function readDynamicURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var $imagePreview = $(input).closest('.form-group').find('.imagePreview');
                        $imagePreview.attr('src', e.target.result);
                        $imagePreview.show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            //dynamic image preview for all end
            $(document).on('click', '#submit_guru', function() {
                // Find the closest modal containing the submit button
                var modal = $(this).closest('.modal');

                // Find the title and image fields within the modal
                var title = modal.find('#gurus_title').val();
                var image = modal.find('.image')[0].files[0]; 
                
                // Create FormData object to send the form data
                var formData = new FormData();
                formData.append('title', title);
                formData.append('image', image);

                // Send AJAX POST request
                var csrfToken = $('meta[name="csrf-token"]').attr('content');   
                formData.append('_token', csrfToken); // Append CSRF token

                $.ajax({
                    url: '{{ route("upload.guru") }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#uploadguruModal').modal('hide');
                        if (response.success) {
                            // Append the uploaded image to the table
                            var imageData = response.data;
                            var imagePath = imageData.image;
                            var itemTitle = imageData.title;
                            var itemId = imageData.id; // Assuming you have an 'id' property in the response
                            var imageElement = '<img src="' + imagePath + '" alt="Guru Image" style="max-width: 200px; height: auto;">';
                            var deleteBtn = '<a href="#" class="btn btn-danger guruDeleteBtn" id="' + itemId + '">Delete</a>';
                            var newRow = '<tr><td>'+itemTitle+'</td><td>' + imageElement + '</td><td>' + deleteBtn + '</td></tr>';
                            $('#guru_table tbody').append(newRow);
                        } else {
                            // Handle unsuccessful response
                            console.error('Upload failed');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            });
            $(document).on('click', '.guruDeleteBtn', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                var $btn = $(this);
                var itemId = $(this).attr('id'); // Get the ID of the item to delete
                var deleteUrl = '{{ route("delete.guru", ":itemId") }}'; // URL template

                // Replace the placeholder with the actual item ID
                deleteUrl = deleteUrl.replace(':itemId', itemId);
                // Send an AJAX request to delete the daily darshan image
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Handle success response
                            console.log(response);
                            // Remove the corresponding table row
                            $btn.closest('tr').remove(); 
                        } else {
                            // Handle unsuccessful response if needed
                            console.log('Deletion failed');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            });
           
        });
        $('.zero-config').DataTable({
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 5 
            });
    </script>
    
@endpush