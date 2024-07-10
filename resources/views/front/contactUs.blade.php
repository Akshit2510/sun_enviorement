@extends('front.layouts.main')
@section('content')

<section class="section novi-background breadcrumbs-custom bg-image context-dark" style="background-image: url({{ asset('assets/front/images/slide7.jpg') }});">
    <div class="breadcrumbs-custom-inner">
        <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
                <h6 class="breadcrumbs-custom-subtitle title-decorated">Contact Us</h6>
                <h2 class="text-uppercase breadcrumbs-custom-title">Contact Us</h2>
            </div>
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Contact Us</li>
            </ul>
        </div>
    </div>
</section>
<section class="section novi-background section-sm">
    <div class="container">
        <div class="layout-bordered">
            <div class="layout-bordered-item wow-outer">
                <div class="layout-bordered-item-inner wow slideInUp">
                    <div class="icon novi-icon icon-lg mdi mdi-phone text-primary"></div>
                    <ul class="list-0">
                        <li><a class="link-default" href="tel:#">1-800-1234-678</a></li>
                        <li><a class="link-default" href="tel:#">1-800-9876-098</a></li>
                    </ul>
                </div>
            </div>
            <div class="layout-bordered-item wow-outer">
                <div class="layout-bordered-item-inner wow slideInUp">
                    <div class="icon novi-icon icon-lg mdi mdi-email text-primary"></div><a class="link-default" href="mailto:#">info@demolink.org</a>
                </div>
            </div>
            <div class="layout-bordered-item wow-outer">
                <div class="layout-bordered-item-inner wow slideInUp">
                    <div class="icon novi-icon icon-lg mdi mdi-map-marker text-primary"></div><a class="link-default" href="#">2130 Fulton Street San Diego, CA 94117-1080 USA</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section novi-background bg-gray-100">
    <div class="range justify-content-xl-between">
        <div class="cell-xl-6 align-self-center container">
            <div class="row">
                <div class="col-lg-9 cell-inner">
                    <div class="section-lg">
                        <h3 class="text-uppercase wow-outer"><span class="wow slideInDown">Contact Us</span></h3>
                        <!-- RD Mailform-->
                        <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="{{ route('save.contactUs') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row row-10">
                                <div class="col-md-6 wow-outer">
                                    <div class="form-wrap wow fadeSlideInUp">
                                        <label class="form-label-outside" for="contact-first-name">First Name</label>
                                        <input class="form-input" id="contact-first-name" type="text" name="first_name" value="{{ old('first_name') }}">
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 wow-outer">
                                    <div class="form-wrap wow fadeSlideInUp">
                                        <label class="form-label-outside" for="contact-last-name">Last Name</label>
                                        <input class="form-input" id="contact-last-name" type="text" name="last_name" value="{{ old('last_name') }}">
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 wow-outer">
                                    <div class="form-wrap wow fadeSlideInUp">
                                        <label class="form-label-outside" for="contact-email">E-mail</label>
                                        <input class="form-input" id="contact-email" type="email" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 wow-outer">
                                    <div class="form-wrap wow fadeSlideInUp">
                                        <label class="form-label-outside" for="contact-phone">Phone</label>
                                        <input class="form-input" id="contact-phone" type="text" name="phone" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 wow-outer">
                                    <div class="form-wrap wow fadeSlideInUp">
                                        <label class="form-label-outside" for="contact-message">Your Message</label>
                                        <textarea class="form-input" id="contact-message" name="message">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="group group-middle">
                                <div class="wow-outer"> 
                                    <button class="button button-primary button-winona wow slideInRight" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="cell-xl-5 height-fill wow fadeIn">
            <iframe width="900" height="400" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q='sun environment'&output=embed" style="margin-top: 5%; margin-bottom: 5%;"></iframe>
        </div>
    </div>
</section>
@endsection