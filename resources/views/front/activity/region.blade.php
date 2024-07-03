@extends('front.layouts.main')
@section('content')
<section class="banner-section inner-banner-section">
    @if(!empty($region->cover_image))
        <div class="banner-image-box"><img src="{{asset($region->cover_image)}}" alt=""></div>
    @else
        <div class="banner-image-box"><img src="{{asset('assets/images/banner-1.jpg')}}" alt=""></div>
    @endif
</section>

<section class="haridam-section">
    <div class="container">
        <div class="row align-items-center comn-padding">
            <div class="col-lg-7">
                <h1 class="comn-title"><span>{{$region->main_title}}</span>{{$region->title}}</h1>
                {!! $region->description !!}
                <div class="table-responsive comn-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>States</th>
                                <th>Regions</th>
                                <th>Districts</th>
                                <th>Taluka / Block</th>
                                <th>Cities / Villages</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalRegions = 0;
                                $totalDistricts = 0;
                                $totalTalukas = 0;
                                $totalCities = 0;    
                            @endphp
                            @foreach($region->regionState as $item)
                            @php
                                $totalRegions += $item->region;
                                $totalDistricts += $item->district;
                                $totalTalukas += $item->taluka;
                                $totalCities += $item->city;
                            @endphp     
                            <tr>
                                <td>{{$item->state}}</td>
                                <td>{{$item->region}}</td>
                                <td>{{$item->district}}</td>
                                <td>{{$item->taluka}}</td>
                                <td>{{$item->city}}</td>
                            </tr>
                            @endforeach
                            
                            <tr>
                                <td><b>Total</b></td>
                                <td><b>{{$totalRegions}}</b></td>
                                <td><b>{{$totalDistricts}}</b></td>
                                <td><b>{{$totalTalukas}}</b></td>
                                <td><b>{{$totalCities}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="about-data-box">
                    <img src="{{asset($region->image)}}" class="mb-0" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="comn-padding video-section">
    <div class="container">
        <div class="table-responsive comn-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Regions</th>
                        <th>Area</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($region->regionData as $index=>$item)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$item->region}}</td>
                        <td>{{$item->area}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>


@endsection
@push('scripts')
<script>
    
</script>
@endpush