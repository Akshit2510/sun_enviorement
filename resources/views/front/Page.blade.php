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
        @if(isset($page->main_title) && !empty($page->main_title))
            <h1 class="comn-title"><span>{{$page->main_title}}</span>{{$page->title}}</h1>
        @endif
        {!! $page->description !!}
        <div class="comn-nav-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($page->categories as $key => $category)
                    @php
                        $slug = \Illuminate\Support\Str::slug($category->category_title);    
                    @endphp
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($key == 0) active @endif" id="{{$slug}}-tab" data-bs-toggle="tab" data-bs-target="#{{$slug}}-tab-pane" type="button" role="tab" aria-controls="{{$slug}}-tab-pane" aria-selected="true">{{$category->category_title}}</button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach($page->categories as $key => $category)
                    @php
                        // Generate slug from the category title
                        $slug = \Illuminate\Support\Str::slug($category->category_title);
                    @endphp
                    
                    @if($category->is_story)
                    <div class="tab-pane fade @if($key == 0) show active @endif" id="{{$slug}}-tab-pane" role="tabpanel" aria-labelledby="{{$slug}}-tab" tabindex="0">
                        <h1 class="comn-title"><span>{{$category->main_title}}</span>{{$category->title}}</h1>
                        <div class="gujarati-text">{!! $category->description !!}</div>
                        @foreach($category->stories as $index=>$story)
                            <div class="comn-padding @if($index==0) pt-0 @endif w-100">
                                <div class="row align-items-center @if(($index+1)%2==0) flex-row-reverse @endif">
                                    <div class="col-sm-5"><img src="{{asset($story->image)}}" class="prasang-image" alt=""></div>
                                    <div class="col-sm-7">
                                        <div class="mt-3 mt-sm-0 ps-md-3 gujarati-text">
                                            <p class="gujarati-text">{!! $story->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($index < count($category->stories) - 1)
                                <hr class="comn-hr">
                            @endif
                        @endforeach
                    </div>
                    @else 
                    <div class="tab-pane fade @if($key == 0) show active @endif" id="{{$slug}}-tab-pane" role="tabpanel" aria-labelledby="{{$slug}}-tab" tabindex="0">
                        <h1 class="comn-title"><span>{{$category->main_title}}</span>{{$category->title}}</h1>
                        <div class="gujarati-text">{!! $category->description !!}</div>
                        <div class="haridam-gallery-row">
                            @foreach($category->images as $image)
                                <div class="haridam-gallery-card">
                                    <a href="{{asset($image->image)}}" data-fancybox="{{$slug}}Gallery">
                                        <img src="{{asset($image->image)}}" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                @endforeach
                
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
    @foreach($page->categories as $item)
        @php
            $slug = \Illuminate\Support\Str::slug($item->category_title);
        @endphp
        Fancybox.bind("[data-fancybox='{{ $slug }}Gallery']", {});
    @endforeach
</script>
@endpush