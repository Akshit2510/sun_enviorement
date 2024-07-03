@extends('layouts.app')

@section('content')
<div class="container-xxl p-0">
        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->
        <div class="row page-meta">
            @include('partial.message')
            <div id="flLoginForm" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Setting Information</h4>
                            </div>                                                                        
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form id="settingForm" class="row g-3" action="{{ route('setting.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="out_aim" class="form-label">Company Name:</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ get_config_new('company_name') }}" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="company_email" class="form-label">Company Email:</label>
                                <input type="email" class="form-control" id="company_email" name="company_email" value="{{ get_config_new('company_email') }}" required>
                            </div>
                
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="text" class="form-control" id="company_phone" name="company_phone" value="{{ get_config_new('company_phone') }}" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone 2:</label>
                                <input type="text" class="form-control" id="company_phone_2" name="company_phone_2" value="{{ get_config_new('company_phone_2') }}">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="Footer Message" class="form-label">Footer Message:</label>
                                <textarea class="form-control" name="footer_message" required>{{ get_config_new('footer_message') }}</textarea>
                            </div>
                
                            <div class="col-md-6">
                                <label for="fb_url" class="form-label">Facebook URL:</label>
                                <input type="text" class="form-control" id="fb_url" name="fb_url" value="{{ get_config_new('fb_url') }}" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="twitter_url" class="form-label">Twitter URL:</label>
                                <input type="text" class="form-control" id="twitter_url" name="twitter_url" value="{{ get_config_new('twitter_url') }}" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" class="form-control" id="company_address" name="address" value="{{ get_config_new('address') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Logo Image:</label>
                                <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                <img id="imagePreview" src="{{ url('/'. get_config_new('logo') )}}" alt="Image Preview" onerror="this.src='{{ url('/no_image.jpg') }}'"  style="max-width: 100px; margin-top: 10px;">
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Favicon Image:</label>
                                <input type="file" class="form-control" id="favicon" name="favicon" accept="image/*">
                                <img id="faviconimagePreview" src="{{ url('/'. get_config_new('favicon') )}}" alt="Image Preview" onerror="this.src='{{ url('/no_image.jpg') }}'"  style="max-width: 100px; margin-top: 10px;">
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

@endsection
@push('scripts')

<script>
$(document).ready(function(){
    
    // $('#settingForm').validate({
    //     rules: {
    //         favicon: {
    //             extension: "png|jpg|jpeg"
    //         },
    //         logo: {
    //             extension: "png|jpg|jpeg"
    //         },
    //         fb_url: {
    //             required: true,
    //             url: true
    //         },
    //         twitter_url: {
    //             required: true,
    //             url: true
    //         },
    //         company_name: {
    //             required: true
    //         },
    //         company_email: {
    //             required: true
    //         },
    //         company_phone: {
    //             required: true,
    //             digits: true
    //         },
    //         company_phone_2: {
    //             required: true,
    //             digits: true
    //         },
    //         footer_message: {
    //             required: true
    //         },
    //         company_address: {
    //             required: true
    //         }
    //     },
    //     messages: {
    //         favicon: {
    //             extension: "Please upload only jpg,png image files"
    //         },
    //         logo: {
    //             extension: "Please upload only jpg,png image files"
    //         },
    //         fb_url: {
    //             required: "Please enter a valid Facebook URL",
    //             url: "Please enter a valid URL"
    //         },
    //         twitter_url: {
    //             required: "Please enter a valid Twitter URL",
    //             url: "Please enter a valid URL"
    //         },
    //         company_name: {
    //             required: "Please enter company name"
    //         },
    //         company_email: {
    //             required: "Please enter company email"
    //         },
    //         company_phone: {
    //             required: "Please enter company phone number",
    //             digits: "Please enter only digits"
    //         },
    //         company_phone_2: {
    //             required: "Please enter company phone number 2",
    //             digits: "Please enter only digits"
    //         },
    //         footer_message: {
    //             required: "Please enter footer message"
    //         },
    //         company_address: {
    //             required: "Please enter company address"
    //         }
    //     },
    //     errorElement: "span",
    //     errorClass: "text-danger",
    //     errorPlacement: function(error, element) {
    //         if (element.attr("name") == "logo") {
    //             error.insertAfter("#imagePreview");
    //         } else {
    //             error.insertAfter(element);
    //         }
    //     },
    //     submitHandler: function(form) {
    //         // Form is valid, submit it
    //         $('#settingForm').submit();
    //     }
    // });

    $('#logo').change(function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#favicon').change(function() {
        freadURL(this);
    });

    function freadURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#faviconimagePreview').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
});
</script>
@endpush
