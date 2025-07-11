@extends('layouts.app',['title' => 'page des icons de service'])
@section('headSection')
<script src="{{ asset('assets/js/config.js') }}"></script>
@endsection
@section('main-content')
  
  <div class="content">
    <h2 class="mb-2 lh-sm">Les icons pour vos catégories</h2>
    <div class="mb-9">
      <div class="card border mb-3" data-list='{"valueNames":["icon-list-item"]}'>
        <div class="card-header border-bottom bg-body">
          <div class="row flex-between-center g-2">
            <div class="col-auto">
              <h4 class="mb-0">Liste des icons</h4>
            </div>
            <div class="col-auto col-sm-6">
              <div class="text-end"><input class="form-control d-inline-block rounded-3 search" type="search" placeholder="Rechercher une icon" style="width: 250px;" /></div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row list" id="icon-list">
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">activity</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="activity"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="activity" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">airplay</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="airplay"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="airplay" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">alert-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="alert-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="alert-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">alert-octagon</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="alert-octagon"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="alert-octagon" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">alert-triangle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="alert-triangle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="alert-triangle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">align-center</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="align-center"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="align-center" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">align-justify</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="align-justify"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="align-justify" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">align-left</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="align-left"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="align-left" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">align-right</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="align-right"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="align-right" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">anchor</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="anchor"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="anchor" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">aperture</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="aperture"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="aperture" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">archive</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="archive"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="archive" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-down-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-down-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-down-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-down-left</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-down-left"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-down-left" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-down-right</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-down-right"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-down-right" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-down</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-down"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-down" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-left-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-left-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-left-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-left</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-left"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-left" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-right-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-right-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-right-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-right</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-right"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-right" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-up-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-up-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-up-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-up-left</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-up-left"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-up-left" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-up-right</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-up-right"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-up-right" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">arrow-up</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="arrow-up"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="arrow-up" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">at-sign</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="at-sign"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="at-sign" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">award</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="award"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="award" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">bar-chart-2</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="bar-chart-2"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="bar-chart-2" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">bar-chart</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="bar-chart"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="bar-chart" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">battery-charging</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="battery-charging"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="battery-charging" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">battery</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="battery"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="battery" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">bell-off</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="bell-off"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="bell-off" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">bell</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="bell"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="bell" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">bluetooth</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="bluetooth"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="bluetooth" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">bold</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="bold"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="bold" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">book-open</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="book-open"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="book-open" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">book</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="book"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="book" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">bookmark</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="bookmark"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="bookmark" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">box</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="box"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="box" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">briefcase</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="briefcase"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="briefcase" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">calendar</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="calendar"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="calendar" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">camera-off</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="camera-off"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="camera-off" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">camera</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="camera"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="camera" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">cast</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="cast"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="cast" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">check-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="check-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="check-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">check-square</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="check-square"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="check-square" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">check</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="check"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="check" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">chevron-down</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="chevron-down"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="chevron-down" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">chevron-left</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="chevron-left"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="chevron-left" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">chevron-right</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="chevron-right"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="chevron-right" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">chevron-up</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="chevron-up"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="chevron-up" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">chevrons-down</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="chevrons-down"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="chevrons-down" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">chevrons-left</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="chevrons-left"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="chevrons-left" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">chevrons-right</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="chevrons-right"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="chevrons-right" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">chevrons-up</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="chevrons-up"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="chevrons-up" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">chrome</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="chrome"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="chrome" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">clipboard</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="clipboard"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="clipboard" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">clock</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="clock"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="clock" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">cloud-drizzle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="cloud-drizzle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="cloud-drizzle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">cloud-lightning</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="cloud-lightning"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="cloud-lightning" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">cloud-off</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="cloud-off"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="cloud-off" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">cloud-rain</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="cloud-rain"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="cloud-rain" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">cloud-snow</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="cloud-snow"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="cloud-snow" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">cloud</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="cloud"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="cloud" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">code</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="code"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="code" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">codepen</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="codepen"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="codepen" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">codesandbox</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="codesandbox"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="codesandbox" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">coffee</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="coffee"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="coffee" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">columns</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="columns"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="columns" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">command</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="command"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="command" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">compass</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="compass"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="compass" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">copy</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="copy"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="copy" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">corner-down-left</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="corner-down-left"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="corner-down-left" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">corner-down-right</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="corner-down-right"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="corner-down-right" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">corner-left-down</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="corner-left-down"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="corner-left-down" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">corner-left-up</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="corner-left-up"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="corner-left-up" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">corner-right-down</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="corner-right-down"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="corner-right-down" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">corner-right-up</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="corner-right-up"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="corner-right-up" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">corner-up-left</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="corner-up-left"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="corner-up-left" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">corner-up-right</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="corner-up-right"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="corner-up-right" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">cpu</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="cpu"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="cpu" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">credit-card</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="credit-card"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="credit-card" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">crop</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="crop"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="crop" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">crosshair</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="crosshair"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="crosshair" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">database</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="database"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="database" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">delete</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="delete"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="delete" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">disc</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="disc"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="disc" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">divide-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="divide-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="divide-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">divide-square</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="divide-square"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="divide-square" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">divide</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="divide"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="divide" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">dollar-sign</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="dollar-sign"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="dollar-sign" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">download-cloud</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="download-cloud"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="download-cloud" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">download</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="download"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="download" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">dribbble</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="dribbble"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="dribbble" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">droplet</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="droplet"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="droplet" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">edit-2</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="edit-2"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="edit-2" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">edit-3</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="edit-3"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="edit-3" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">edit</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="edit"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="edit" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">external-link</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="external-link"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="external-link" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">eye-off</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="eye-off"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="eye-off" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">eye</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="eye"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="eye" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">facebook</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="facebook"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="facebook" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">fast-forward</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="fast-forward"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="fast-forward" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">feather</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="feather"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="feather" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">figma</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="figma"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="figma" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">file-minus</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="file-minus"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="file-minus" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">file-plus</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="file-plus"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="file-plus" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">file-text</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="file-text"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="file-text" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">file</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="file"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="file" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">film</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="film"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="film" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">filter</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="filter"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="filter" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">flag</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="flag"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="flag" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">folder-minus</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="folder-minus"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="folder-minus" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">folder-plus</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="folder-plus"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="folder-plus" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">folder</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="folder"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="folder" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">framer</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="framer"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="framer" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">frown</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="frown"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="frown" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">gift</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="gift"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="gift" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">git-branch</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="git-branch"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="git-branch" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">git-commit</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="git-commit"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="git-commit" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">git-merge</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="git-merge"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="git-merge" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">git-pull-request</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="git-pull-request"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="git-pull-request" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">github</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="github"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="github" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">gitlab</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="gitlab"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="gitlab" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">globe</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="globe"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="globe" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">grid</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="grid"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="grid" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">hard-drive</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="hard-drive"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="hard-drive" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">hash</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="hash"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="hash" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">headphones</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="headphones"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="headphones" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">heart</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="heart"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="heart" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">help-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="help-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="help-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">hexagon</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="hexagon"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="hexagon" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">home</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="home"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="home" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">image</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="image"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="image" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">inbox</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="inbox"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="inbox" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">info</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="info"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="info" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">instagram</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="instagram"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="instagram" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">italic</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="italic"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="italic" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">key</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="key"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="key" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">layers</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="layers"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="layers" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">layout</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="layout"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="layout" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">life-buoy</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="life-buoy"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="life-buoy" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">link-2</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="link-2"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="link-2" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">link</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="link"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="link" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">linkedin</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="linkedin"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="linkedin" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">list</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="list"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="list" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">loader</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="loader"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="loader" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">lock</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="lock"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="lock" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">log-in</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="log-in"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="log-in" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">log-out</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="log-out"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="log-out" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">mail</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="mail"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="mail" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">map-pin</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="map-pin"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="map-pin" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">map</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="map"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="map" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">maximize-2</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="maximize-2"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="maximize-2" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">maximize</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="maximize"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="maximize" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">meh</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="meh"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="meh" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">menu</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="menu"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="menu" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">message-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="message-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="message-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">message-square</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="message-square"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="message-square" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">mic-off</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="mic-off"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="mic-off" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">mic</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="mic"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="mic" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">minimize-2</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="minimize-2"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="minimize-2" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">minimize</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="minimize"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="minimize" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">minus-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="minus-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="minus-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">minus-square</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="minus-square"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="minus-square" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">minus</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="minus"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="minus" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">monitor</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="monitor"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="monitor" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">moon</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="moon"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="moon" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">more-horizontal</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="more-horizontal"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="more-horizontal" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">more-vertical</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="more-vertical"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="more-vertical" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">mouse-pointer</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="mouse-pointer"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="mouse-pointer" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">move</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="move"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="move" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">music</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="music"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="music" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">navigation-2</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="navigation-2"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="navigation-2" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">navigation</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="navigation"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="navigation" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">octagon</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="octagon"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="octagon" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">package</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="package"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="package" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">paperclip</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="paperclip"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="paperclip" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">pause-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="pause-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="pause-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">pause</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="pause"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="pause" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">pen-tool</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="pen-tool"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="pen-tool" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">percent</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="percent"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="percent" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">phone-call</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="phone-call"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="phone-call" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">phone-forwarded</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="phone-forwarded"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="phone-forwarded" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">phone-incoming</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="phone-incoming"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="phone-incoming" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">phone-missed</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="phone-missed"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="phone-missed" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">phone-off</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="phone-off"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="phone-off" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">phone-outgoing</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="phone-outgoing"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="phone-outgoing" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">phone</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="phone"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="phone" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">pie-chart</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="pie-chart"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="pie-chart" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">play-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="play-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="play-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">play</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="play"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="play" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">plus-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="plus-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="plus-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">plus-square</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="plus-square"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="plus-square" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">plus</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="plus"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="plus" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">pocket</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="pocket"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="pocket" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">power</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="power"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="power" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">printer</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="printer"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="printer" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">radio</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="radio"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="radio" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">refresh-ccw</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="refresh-ccw"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="refresh-ccw" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">refresh-cw</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="refresh-cw"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="refresh-cw" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">repeat</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="repeat"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="repeat" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">rewind</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="rewind"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="rewind" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">rotate-ccw</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="rotate-ccw"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="rotate-ccw" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">rotate-cw</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="rotate-cw"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="rotate-cw" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">rss</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="rss"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="rss" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">save</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="save"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="save" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">scissors</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="scissors"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="scissors" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">search</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="search"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="search" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">send</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="send"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="send" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">server</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="server"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="server" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">settings</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="settings"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="settings" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">share-2</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="share-2"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="share-2" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">share</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="share"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="share" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">shield-off</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="shield-off"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="shield-off" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">shield</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="shield"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="shield" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">shopping-bag</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="shopping-bag"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="shopping-bag" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">shopping-cart</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="shopping-cart"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="shopping-cart" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">shuffle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="shuffle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="shuffle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">sidebar</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="sidebar"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="sidebar" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">skip-back</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="skip-back"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="skip-back" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">skip-forward</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="skip-forward"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="skip-forward" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">slack</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="slack"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="slack" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">slash</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="slash"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="slash" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">sliders</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="sliders"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="sliders" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">smartphone</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="smartphone"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="smartphone" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">smile</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="smile"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="smile" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">speaker</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="speaker"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="speaker" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">square</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="square"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="square" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">star</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="star"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="star" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">stop-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="stop-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="stop-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">sun</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="sun"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="sun" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">sunrise</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="sunrise"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="sunrise" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">sunset</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="sunset"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="sunset" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">tablet</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="tablet"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="tablet" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">tag</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="tag"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="tag" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">target</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="target"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="target" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">terminal</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="terminal"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="terminal" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">thermometer</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="thermometer"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="thermometer" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">thumbs-down</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="thumbs-down"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="thumbs-down" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">thumbs-up</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="thumbs-up"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="thumbs-up" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">toggle-left</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="toggle-left"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="toggle-left" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">toggle-right</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="toggle-right"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="toggle-right" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">tool</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="tool"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="tool" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">trash-2</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="trash-2"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="trash-2" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">trash</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="trash"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="trash" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">trello</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="trello"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="trello" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">trending-down</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="trending-down"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="trending-down" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">trending-up</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="trending-up"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="trending-up" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">triangle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="triangle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="triangle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">truck</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="truck"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="truck" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">tv</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="tv"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="tv" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">twitch</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="twitch"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="twitch" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">twitter</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="twitter"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="twitter" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">type</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="type"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="type" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">umbrella</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="umbrella"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="umbrella" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">underline</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="underline"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="underline" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">unlock</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="unlock"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="unlock" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">upload-cloud</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="upload-cloud"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="upload-cloud" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">upload</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="upload"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="upload" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">user-check</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="user-check"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="user-check" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">user-minus</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="user-minus"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="user-minus" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">user-plus</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="user-plus"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="user-plus" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">user-x</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="user-x"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="user-x" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">user</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="user"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="user" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">users</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="users"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="users" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">video-off</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="video-off"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="video-off" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">video</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="video"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="video" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">voicemail</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="voicemail"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="voicemail" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">volume-1</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="volume-1"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="volume-1" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">volume-2</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="volume-2"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="volume-2" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">volume-x</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="volume-x"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="volume-x" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">volume</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="volume"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="volume" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">watch</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="watch"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="watch" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">wifi-off</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="wifi-off"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="wifi-off" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">wifi</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="wifi"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="wifi" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">wind</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="wind"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="wind" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">x-circle</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="x-circle"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="x-circle" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">x-octagon</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="x-octagon"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="x-octagon" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">x-square</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="x-square"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="x-square" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">x</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="x"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="x" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">youtube</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="youtube"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="youtube" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">zap-off</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="zap-off"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="zap-off" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">zap</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="zap"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="zap" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">zoom-in</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="zoom-in"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="zoom-in" /></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6"><span class="icon-list-item d-none">zoom-out</span>
              <div class="border rounded-2 p-3 mb-4 text-center bg-body-emphasis dark__bg-gray-1000 shadow-sm"><span class="text-body fs-5" data-feather="zoom-out"></span><input class="form-control form-control-sm mt-3 text-center w-100 text-dark dark__text-gray-100 bg-body-secondary dark__bg-gray-1100" type="text" readonly="readonly" value="zoom-out" /></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
      <div class="toast align-items-center text-white bg-dark border-0" id="icon-copied-toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex" data-bs-theme="dark">
          <div class="toast-body p-3"></div><button class="btn-close me-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>
    @include('layouts.footer_admin')
  </div>
@endsection