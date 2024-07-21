@extends('layouts.app')

@section('main-content')
  <section class="py-0" style="margin-bottom: -6rem;">
    <div class="bg-holder" style="background-image:url(assets/img/bg/bg-24.png);background-position:center;background-size:auto;"></div>
    <!--/.bg-holder-->
    <div class="container-lg position-relative">
      <div class="row flex-center">
        <div class="col-12 col-sm-9 col-xl-7 px-4 px-xxl-6 text-center pt-10">
          <h1 class="display-3 fw-bolder lh-sm text-body-highlight mb-4">Multiple Demos for You</h1>
          <p class="mb-10">6 predefined layout options to cater the modern web application needs. The Flexible layout with easily customizable and ready-to-use UI components to help you design modern web apps faster.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="overflow-hidden rotating-earth-container pb-5 pb-md-0">
    <div class="container-small px-lg-7 px-xxl-3">
    <h2 class="text-body-highlight fw-normal mb-6 text-center">Packed with</h2>
      <div class="row">
        <div class="col-sm-4 text-center">
          <a href="{{ route('magasin.login') }}">
            <img class="mb-4 d-dark-none" src="../../assets/img/icons/lightning-speed.png" alt="" />
            <img class="mb-4 d-light-none" src="../../assets/img/icons/lightning-speed-dark.png" alt="" />
            <h4 class="mb-2">Compte Boutique</h4>
            <p>Grow fast with Phoenix!</p>
          </a>
        </div>
        <div class="col-sm-4 text-center">
          <a href="{{ route('agent.login') }}">
            <img class="mb-4 d-dark-none" src="../../assets/img/icons/best-statistics.png" alt="" />
            <img class="mb-4 d-light-none" src="../../assets/img/icons/best-statistics-dark.png" alt="" />
            <h4 class="mb-2">Compte agents</h4>
            <p>Get all reports at hand!</p>
          </a>
        </div>
        <div class="col-sm-4 text-center">
          <a href="{{ route('login') }}">
            <img class="mb-4 d-dark-none" src="../../assets/img/icons/all-night.png" alt="" />
            <img class="mb-4 d-light-none" src="../../assets/img/icons/all-night-dark.png" alt="" />
            <h4 class="mb-2">Compte Clients</h4>
            <p>Security Assured: Ensure</p>
          </a>
        </div>
      </div>
    </div>
  </section>


   
@endsection