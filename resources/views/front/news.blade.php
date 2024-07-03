@extends('front.layouts.main')
@section('content')
<section class="banner-section inner-banner-section">
    @if(!empty($page->cover_image))
        <div class="banner-image-box"><img src="{{asset($page->cover_image)}}" alt=""></div>
    @else
        <div class="banner-image-box"><img src="{{asset('assets/images/banner-1.jpg')}}" alt=""></div>
    @endif
</section>

<section class="activities-section comn-padding">
    <div class="container">
        <div class="comn-title-row">
            <h2 class="comn-title"><span>Activities</span>Recent Activities</h2>
        </div>
    </div>
    <div class="activities-row">
        @if(isset($recentActivities[0]))
        <div class="activities-row-leftside">
            <img src="{{asset($recentActivities[0]->image)}}" alt="">
            <div class="activities-data-box">
                <aside>{{$recentActivities[0]->title}}</aside>
                <p>{{$recentActivities[0]->description}}</p>
                <button class="comn-btn"><span><i class="fa-solid fa-plus"></i></span>Read More</button>
            </div>
        </div>
        @endif
        <div class="activities-row-rightside">
            @if(isset($recentActivities[1]))
            <div class="activities-comn-box">
                <div class="activities-pattern"><img src="images/activities-pattern.png" alt=""></div>
                <div class="activities-image"><img src="{{asset($recentActivities[1]->image)}}" alt=""></div>
                <div class="activities-data-box">
                    <aside>{{$recentActivities[1]->title}}</aside>
                    <p>{{$recentActivities[1]->description}}</p>
                    <button class="comn-btn"><span><i class="fa-solid fa-plus"></i></span>Read More</button>
                </div>
            </div>
            @endif
            @if(isset($recentActivities[2]))
            <div class="activities-comn-box">
                <div class="activities-pattern"><img src="images/activities-pattern.png" alt=""></div>
                <div class="activities-image"><img src="{{asset($recentActivities[2]->image)}}" alt=""></div>
                <div class="activities-data-box">
                    <aside>{{$recentActivities[2]->title}}</aside>
                    <p>{{$recentActivities[2]->description}}</p>
                    <button class="comn-btn"><span><i class="fa-solid fa-plus"></i></span>Read More</button>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="antar-section comn-padding pt-0">
    <div class="container">
        <div class="activities-row-rightside news-activities-row">
            @foreach($news as $item)
            <div class="activities-comn-box">
                <div class="activities-image"><img src="{{asset($item->image)}}" alt=""></div>
                <div class="activities-data-box">
                    <aside>{{$item->title}}</aside>
                    <p>{{$item->sub_title}}</p>
                    <button class="comn-btn"><span><i class="fa-solid fa-plus"></i></span>Read More</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
    Fancybox.bind("[data-fancybox='haridamGallery']", {});
</script>
@endpush