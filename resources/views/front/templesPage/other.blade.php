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
        {!! $page->description !!}
        <div class="comn-nav-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($page->categories as $key => $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($key == 0) active @endif" id="{{$category->category_title}}-tab" data-bs-toggle="tab" data-bs-target="#{{$category->category_title}}-tab-pane" type="button" role="tab" aria-controls="{{$category->category_title}}-tab-pane" aria-selected="true">{{$category->category_title}}</button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach($page->categories as $key => $category)
                    <div class="tab-pane fade @if($key == 0) show active @endif" id="{{$category->category_title}}-tab-pane" role="tabpanel" aria-labelledby="{{$category->category_title}}-tab" tabindex="0">
                        <h1 class="comn-title"><span>{{$category->main_title}}</span>{{$category->title}}</h1>
                        <div class="haridam-gallery-row">
                            @foreach($category->images as $image)
                                <div class="haridam-gallery-card">
                                    <a href="{{asset($image->image)}}" data-fancybox="{{$category->category_title}}Gallery">
                                        <img src="{{asset($image->image)}}" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


@endsection
@push('scripts')
<script>
    @foreach($page->categories as $item)
        Fancybox.bind("[data-fancybox='{{ $item->category_title }}Gallery']", {});
    @endforeach
</script>
@endpush