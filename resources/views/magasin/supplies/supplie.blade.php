@extends('layouts.app',['title' => 'Mes  fournisseurs'])
@section('main-content')
  <div class="content">

    <div class="mb-9">
      <div class="row g-2 mb-4">
        <div class="col-auto">
        <h2 class="mb-0">Mes  fournisseurs </h2>
        </div>
      </div>
      <div class="mb-4">
        <div class="row g-3">
          <div class="col-6 col-sm-4 col-md-3 col-lg-9">
            <div class="search-box" style="width: 100%;">
              <form class="position-relative">
                <input class="form-control search-input search" type="search" placeholder="Rechercher un fournisseur" aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="container-small">
        <div class="row gx-3 gy-5">
          @foreach ($supplies as $supplie)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
              <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;">
                <img class="mw-100 rounded-1" src="@if($supplie->magasin->logo == '') https://ui-avatars.com/api/?name={{ $supplie->magasin->name }} @else {{(Storage::url($supplie->magasin->logo))}} @endif" alt="{{ $supplie->magasin->name }}" /></div>
              <h5 class="mb-2"> {{ $supplie->magasin->name }}</h5>
              <p class="text-body-quaternary fs-9 mb-2 fw-semibold"> <span data-feather="shopping-bag" class="text-priamry"></span> {{ $supplie->supply_orders->count() }} Commandes </p>
              <a class="btn btn-link p-0" href="{{ route('magasin.fournisseurs.about',$supplie->slug) }}">A propos<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
              <div class="hover-actions top-0 end-0 mt-2 me-3">
                <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal p-2 lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                  <div class="dropdown-menu dropdown-menu-end py-0">
                    <a class="dropdown-item" href="{{ route('magasin.devis.show',$supplie->slug) }}">Voire les commandes</a>
                    <a class="dropdown-item text-danger" href="{{ route('magasin.fournisseurs.destroy',$supplie->id) }}">Retirer comme fournisseur</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>


    @foreach($supplies as $agent)
      <div class="modal fade" id="DeleteCompte-{{ $agent->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel">Suppresion de compte agent</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
            </div>
            <form action="{{ route('magasin.agent.destroy',$agent->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-3"> Etes vous sure de bien vouloire supprimer le compte de {{$agent->name}} </p>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" type="submit">Oui je veux bien</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Anuller</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endforeach


    @include('layouts.footer_admin')

  </div>
@endsection
