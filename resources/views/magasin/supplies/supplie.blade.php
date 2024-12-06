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
          <div class="col-6 col-sm-4 col-md-3 col-lg-3">
              <button type="button" style="float: right;" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <span class="fas fa-plus me-2"></span>Ajouter un fornisseur
              </button>
          </div>
        </div>
      </div>
      <div class="container-small">
        
        <div class="row gx-3 gy-5">
          @foreach ($supplies as $supplie)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 hover-actions-trigger btn-reveal-trigger">
              <div class="border border-translucent d-flex flex-center rounded-3 mb-3 p-4" style="height:180px;">
                <img class="mw-100 rounded-4" src="@if($supplie->logo == '') https://ui-avatars.com/api/?name=@if ($supplie->magasin_id != '') {{ $supplie->magasin->name }} @else {{ $supplie->name }} @endif @else {{(Storage::url($supplie->logo))}} @endif" alt="@if ($supplie->magasin_id != '') {{ $supplie->magasin->name }} @else {{ $supplie->name }} @endif" /></div>
              <h5 class="mb-2"> @if ($supplie->magasin_id != '') {{ $supplie->magasin->name }} @else {{ $supplie->name }} @endif</h5>
              <a class="btn btn-link p-0" href="#!">A propos<span class="fas fa-chevron-right ms-1 fs-10"></span></a>
              <div class="hover-actions top-0 end-0 mt-2 me-3">
                <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal p-2 lh-1 bg-body-highlight rounded-1" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-9"></span></button>
                  <div class="dropdown-menu dropdown-menu-end py-0">
                    <a class="dropdown-item text-danger" href="{{ route('magasin.fournisseurs.destroy',$supplie->id) }}">Retirer comme fournisseur</a>
                  @if ($supplie->magasin_id == '')
                    <a class="dropdown-item text-primary" href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight-{{ $supplie->id }}" aria-controls="offcanvasRight">Modifier</a>
                  @endif
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>


    <div class="card-body p-0">
      <div class="p-4 code-to-copy">
        <!-- Right Offcanvas-->
        <div class="offcanvas offcanvas-end" id="offcanvasRight" tabindex="-1" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Ajouter un nouveau fournisseur</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <form method="POST" action="{{ route('magasin.autres-magasins.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="mb-3 text-start">
                  <label class="form-label" for="name">Nom du fournisseur </label>
                  <input id="name" type="text" placeholder="Nom du fournisseur" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3 text-start">
                  <label class="form-label" for="email">Email du fournisseur</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email du fournisseur" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3 text-start">
                  <label class="form-label" for="phone">Numero de telephone du fournisseur</label>
                  <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Numero de telephone du fournisseur" required autocomplete="phone">

                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3 text-start">
                  <label class="form-label" for="registre_com">Registre de commerce </label>
                  <input id="registre_com" type="text" placeholder="Registre de commerce" class="form-control @error('registre_com') is-invalid @enderror" name="registre_com" value="{{ old('registre_com') }}" required autocomplete="registre_com" autofocus>

                  @error('registre_com')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3 text-start">
                  <label class="form-label" for="ninea">Ninea </label>
                  <input id="ninea" type="text" placeholder="Ninea" class="form-control @error('ninea') is-invalid @enderror" name="ninea" value="{{ old('ninea') }}" required autocomplete="ninea" autofocus>

                  @error('ninea')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3 text-start">
                <label class="form-label" for="logo">Logo du fournisseur</label>
                <input class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" type="file" value="{{ old('logo') }}" required autocomplete="logo"/>
                @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer ce fournisseur</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @foreach($supplies as $supplie)
    <div class="card-body p-0">
      <div class="p-4 code-to-copy">
        <!-- Right Offcanvas-->
        <div class="offcanvas offcanvas-end" id="offcanvasRight-{{ $supplie->id }}" tabindex="-1" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Modifier {{ $supplie->name }}</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <form method="POST" action="{{ route('magasin.autres-magasins.update',$supplie->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3 text-start">
                  <label class="form-label" for="name">Nom du fournisseur </label>
                  <input id="name" type="text" placeholder="Nom du fournisseur" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $supplie->name }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3 text-start">
                  <label class="form-label" for="email">Email du fournisseur</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $supplie->email }}" placeholder="Email du fournisseur" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3 text-start">
                  <label class="form-label" for="phone">Numero de telephone du fournisseur</label>
                  <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $supplie->phone }}" placeholder="Numero de telephone du fournisseur" required autocomplete="phone">

                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3 text-start">
                  <label class="form-label" for="registre_com">Registre de commerce </label>
                  <input id="registre_com" type="text" placeholder="Registre de commerce" class="form-control @error('registre_com') is-invalid @enderror" name="registre_com" value="{{ old('registre_com') ?? $supplie->registre_com }}" required autocomplete="registre_com" autofocus>

                  @error('registre_com')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3 text-start">
                  <label class="form-label" for="ninea">Ninea </label>
                  <input id="ninea" type="text" placeholder="Ninea" class="form-control @error('ninea') is-invalid @enderror" name="ninea" value="{{ old('ninea') ?? $supplie->ninea }}" required autocomplete="ninea" autofocus>

                  @error('ninea')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3 text-start">
                <label class="form-label"  for="logo">Logo du fournisseur</label>
                <img class="rounded-circle" src="{{Storage::url($supplie->logo)}}" alt="" width="38" style="float: right;"/>
                <input class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" type="file" value="{{ old('logo') ?? $supplie->logo }}" autocomplete="logo"/>
                @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer ce fournisseur</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach

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


    <footer class="footer position-absolute">
      <div class="row g-0 justify-content-between align-items-center h-100">
        <div class="col-12 col-sm-auto text-center">
          <p class="mb-0 mt-2 mt-sm-0 text-body">Thank you for creating with Phoenix<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2024 &copy;<a class="mx-1" href="https://themewagon.com/">Themewagon</a></p>
        </div>
        <div class="col-12 col-sm-auto text-center">
          <p class="mb-0 text-body-tertiary text-opacity-85">v1.16.0</p>
        </div>
      </div>
    </footer>

  </div>
@endsection
