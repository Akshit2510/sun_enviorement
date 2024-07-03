@extends('front.layouts.main')
@section('content')
<section class="banner-section inner-banner-section">
    @if(!empty($page->cover_image))
        <div class="banner-image-box"><img src="{{asset($page->cover_image)}}" alt=""></div>
    @else
        <div class="banner-image-box"><img src="{{asset('assets/images/banner-1.jpg')}}" alt=""></div>
    @endif
</section>



<section class="haridam-section comn-padding">
    <div class="container">
        <h1 class="comn-title"><span>{{$page->main_title}}</span>{{$page->title}}</h1>
        <div class="gujarati-text">{!! $page->description !!}</div>
        <div class="haridam-gallery-row">
            @foreach ($page->images as $image)
                <div class="haridam-gallery-card">
                    <a href="{{asset($image->image)}}" data-fancybox="haridamGallery">
                        <img src="{{asset($image->image)}}" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@if(!empty($page->youtube_link))
<section class="comn-padding video-section">
    <div class="container">
        <div class="video-card">
            <iframe width="100%" height="100%" src="{{$page->youtube_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen></iframe>
        </div>
    </div>
</section>
@endif

@endsection
@push('scripts')
<script>
    Fancybox.bind("[data-fancybox='haridamGallery']", {});
</script>
@endpush