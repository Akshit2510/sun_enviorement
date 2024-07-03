<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shri Hari Ashram</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/splide.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">
    @yield('styles')
</head>

<body>

    @include('front.layouts.header')

    @yield('content')
    
    @include('front.layouts.footer')


    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/splide.min.js')}}"></script>
    <script src="{{ asset('assets/js/fancybox.umd.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    @stack('scripts')
    <script>
        //----------------- Splide Slider js code start here -----------------
        $(document).ready(function() {

            let bannerSilder = new Splide('#bannerSplideSlider', {
                type: 'slide',
                drag: false,
                perPage: 1,
                perMove: 1,
                gap: 0,
                arrows: false,
                autoplay: true,
                interval: 4000,
                pauseOnHover: false,
            });
            bannerSilder.mount();
        });


        $(document).ready(function() {
            let darshanSilder = new Splide('#darshanSplideSlider', {
                type: 'loop',
                drag: false,
                perPage: 4,
                perMove: 1,
                gap: 20,
                pagination: false,
                autoplay: true,
                interval: 4000,
                pauseOnHover: false,
                breakpoints: {
                    991: {
                        perPage: 3,
                    },
                    575: {
                        perPage: 2,
                    },
                },
            });
            darshanSilder.mount();
        });


        $(document).ready(function() {
            $('.antarSplideSlider').each(function() {
                new Splide(this, {
                    type: 'loop',
                    drag: false,
                    perPage: 3,
                    perMove: 1,
                    gap: 20,
                    pagination: false,
                    pauseOnHover: false,
                    breakpoints: {
                        575: {
                            perPage: 2,
                        },
                    },
                }).mount();
            });

        });
        //----------------- Splide Slider js code end here -----------------
    </script>
    
</body>

</html>