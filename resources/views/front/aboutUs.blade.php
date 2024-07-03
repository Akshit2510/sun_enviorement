@extends('front.layouts.main')
@section('content')

<section class="section novi-background breadcrumbs-custom bg-image context-dark" style="background-image: url({{ asset('assets/front/images/slide7.jpg')}});">
        <div class="breadcrumbs-custom-inner">
          <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
              <h6 class="breadcrumbs-custom-subtitle title-decorated">About us</h6>
              <h2 class="text-uppercase breadcrumbs-custom-title">About us</h2>
            </div>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Home</a></li>
              <li class="active">About us</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- Working at CaseCraft-->
      <section class="section novi-background section-lg">
        <div class="container">
          <div class="row row-50 justify-content-center justify-content-lg-between flex-lg-row-reverse">
            <div class="col-md-10 col-lg-6 col-xl-5">
              <h3 class="text-uppercase">Who We Are</h3>
              <p class="about-subtitle">We Sun Environment are in the field of instrumentation. As environment is destroyed rapidly by the development of modern industry and continuous increase of population, environmental problem is raised to serious problem to our human being. To solve such social problem and makes better environment, has made and supplied various items that become basis in environment water analysis and Waste water analysis equipments (Laboratory & Process Instruments &amp; Chemical)..</p> 
              <a class="button button-lg button-primary button-winona" href="about-us.html">View Products</a>
            </div>
            <div class="col-md-10 col-lg-6 col-xl-6"><img class="img-responsive" src="{{ asset('assets/front/images/careers-1-570x388.jpg') }}" alt="" width="570" height="388"/>
            </div>
          </div>
        </div>
      </section>
      <!-- Advantages and Achievements-->
      <section class="section novi-background section-md text-center bg-gray-100">
        <div class="container">
          <h3 class="text-uppercase wow-outer"><span class="wow slideInUp">Why people Choose Us</span></h3>
          <p class="wow-outer"><span class="text-width-1 wow slideInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span></p>
          <div class="row row-50">
            <div class="col-6 col-md-3 wow-outer">
              <!-- Counter Minimal-->
              <article class="counter-minimal wow slideInUp" data-wow-delay=".1s">
                <div class="counter-minimal-icon box-chloe__icon novi-icon linearicons-users2"></div>
                <div class="counter-minimal-main">
                  <div class="counter">12</div>
                </div>
                <h5 class="counter-minimal-title">National Partners</h5>
              </article>
            </div>
            <div class="col-6 col-md-3 wow-outer">
              <!-- Counter Minimal-->
              <article class="counter-minimal wow slideInUp" data-wow-delay=".1s">
                <div class="counter-minimal-icon box-chloe__icon novi-icon linearicons-home-icon3"></div>
                <div class="counter-minimal-main">
                  <div class="counter">238</div>
                </div>
                <h5 class="counter-minimal-title">Properties</h5>
              </article>
            </div>
            <div class="col-6 col-md-3 wow-outer">
              <!-- Counter Minimal-->
              <article class="counter-minimal wow slideInUp" data-wow-delay=".1s">
                <div class="counter-minimal-icon box-chloe__icon novi-icon linearicons-star"></div>
                <div class="counter-minimal-main">
                  <div class="counter">19</div>
                </div>
                <h5 class="counter-minimal-title">Years of Experience</h5>
              </article>
            </div>
            <div class="col-6 col-md-3 wow-outer">
              <!-- Counter Minimal-->
              <article class="counter-minimal wow slideInUp" data-wow-delay=".1s">
                <div class="counter-minimal-icon box-chloe__icon novi-icon linearicons-apartment"></div>
                <div class="counter-minimal-main">
                  <div class="counter">54</div>
                </div>
                <h5 class="counter-minimal-title">Qualified Brokers</h5>
              </article>
            </div>
          </div>
        </div>
      </section> 

@endsection