@extends('layouts.app')

@section('main-content')
<section class="section overflow-hidden py-0">
  <div class="bg-holder opacity-50" style="background-image:url(assets/img/bg/26.png);background-position:14%;background-size: contain; height:150%;" data-gsap-parallax='{"y":"-40%"}'></div>
  <div class="container-small position-relative py-8">
    <div class="row align-items-center gx-xxl-13">
      <div class="col-lg-6 mb-6 z-1"><img class="mw-100" src="assets/img/sections/63.webp" alt="" /></div>
      <div class="col-lg-6">
        <h1 class="text-light fw-normal mb-4 text-center text-lg-start">Coded for<br class="d-none d-lg-block d-xl-none" /><span class="text-primary-light ms-2 fw-bolder">any screen size<img class="mb-2 ms-2" src="assets/img/icons/thumbs-up.png" alt=""/></span></h1>
        <p class="text-light text-center text-lg-start">Built with all top-notch technologies, this admin dashboard is fully responsive, and the clean codebase helps it to stay intact without breaking down the layout around any device or screen size or web browser.</p>
      </div>
    </div>
  </div>
</section>


@endsection