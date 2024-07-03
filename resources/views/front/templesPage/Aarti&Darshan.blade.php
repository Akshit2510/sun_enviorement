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
        <h1 class="comn-title" style="font-family: 'Noto Sans Gujarati', sans-serif;">{{$aartiTiming->title}}</h1>
        <div class="row">
            <div class="col-lg-5">
                <div class="darshan-image"><img src="{{asset($aartiTiming->image)}}" alt=""></div>
            </div>
            <div class="col-lg-7">
                @foreach ($aartiTiming->aartiTimingData as $aartiTiming)
                    <div class="aarti-box"><span>{{$aartiTiming->title}}</span>
                        <p>{{$aartiTiming->value}}</p>
                    </div>
                @endforeach
                {{-- <div class="aarti-box"><span>મંગળા આરતી :</span>
                    <p>સવારે ૫:૪૫</p>
                </div>
                <div class="aarti-box"><span>શણગાર આરતી :</span>
                    <p>સવારે ૭:૧૫</p>
                </div>
                <div class="aarti-box"><span>રાજભોગ આરતી :</span>
                    <p>સવારે ૧૧:૩૦</p>
                </div>
                <div class="aarti-box"><span>સંધ્યા આરતી :</span>
                    <p>સાંજે ૭:૦૦</p>
                </div>
                <div class="aarti-box"><span>શયન આરતી :</span>
                    <p>રાત્રે ૧૦:૦૦</p>
                </div>
                <div class="aarti-box"><span>શ્રીઠાકોરજીના થાળ</span>
                    <p>સવારે ૧૦:૩૦ થી ૧૧:૩૦ &nbsp;||&nbsp; સાંજે ૭:૩૦ થી ૮:૨૦</p>
                </div>
                <div class="aarti-box"><span>નોંધ :</span>
                    <p>બપોરે ૧:૦૦ થી ૪:૦૦ તથા રાત્રે ૧૦:૦૦ થી સવારે ૫:૪૫ તથા થાળ દરમ્યાન શ્રીઠાકોરજીના દર્શન બંધ રહેશે.</p>
                </div> --}}
            </div>
        </div>
    </div>
</section>


@endsection
@push('scripts')
<script>
    Fancybox.bind("[data-fancybox='haridamGallery']", {});
</script>
@endpush