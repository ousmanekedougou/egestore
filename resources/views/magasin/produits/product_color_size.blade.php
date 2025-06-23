@extends('layouts.app',['title' => 'Gestion des couleurs & tailles des produits'])
  @section('headSection')
  <link href="{{asset('assets/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
  @endsection
@section('main-content')
  <div class="content">
  <div class="row g-3 mb-4">
    <div class="col-auto">
      <h2 class="mb-0">Gestion des couleurs et tailles du produit {{ $product->name }}</h2>
    </div>
  </div>
  <div class="mt-3 mx-lg-n4 mb-9">
    <div class="row g-3">

      <div class="col-12 col-xl-6 col-xxl-7">
        <div class="card todo-list">
          <div class="card-header border-bottom-0 pb-0">
            <div class="row justify-content-between align-items-center mb-4">
              <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                  <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                    <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Les couleures de ce produit</label>
                    <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#Addcolor">
                      <span data-feather="plus" class="me-1"></span>Ajouter une couleur
                    </button>
                  </div>
              </div>
            </div>
          </div>
          <div class="card-body py-0 scrollbar to-do-list-body">
            @foreach ($getColors as $color)
              <div class="d-flex hover-actions-trigger py-3 border-top"><input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-0" data-event-propagation-prevent="data-event-propagation-prevent" />
                <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                    <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                      <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">{{ $color->name }}</label>
                      <span class="ms-auto fs-10">
                          <span class="me-3 text-success fs-7" data-feather="edit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditColor-{{ $color->id }}" aria-controls="offcanvasEditColor-{{ $color->id }}" data-fa-transform="shrink-3"></span>
                          <span class="me-2 text-danger fs-7" data-feather="trash-2" data-bs-toggle="modal" data-bs-target="#DeleteColor-{{ $color->id }}" data-fa-transform="shrink-3"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                    <div class="d-flex lh-1 align-items-center"><a class="text-body-tertiary fw-bold fs-10 me-2" href="#!"><span class="fas fa-paperclip me-1"></span>2</a>
                      <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">12 Nov, 2021</p>
                      <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                        <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">12:00 PM</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-12 col-xl-6 col-xxl-7">
        <div class="card todo-list">
          <div class="card-header border-bottom-0 pb-0">
            <div class="row justify-content-between align-items-center mb-4">
              <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                  <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                    <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Designing the dungeon</label>
                    <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#AddSize">
                      <span data-feather="plus" class="me-1"></span>Ajouter une taille
                    </button>
                  </div>
              </div>
            </div>
          </div>
          <div class="card-body py-0 scrollbar to-do-list-body">
            @foreach ($getSizes as $size)
            <div class="d-flex hover-actions-trigger py-3 border-top"><input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-0" data-event-propagation-prevent="data-event-propagation-prevent" />
              <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                  <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                    <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">{{ $size->name }}</label>
                    <span class="ms-auto fs-10">
                        <span class="me-3 text-success fs-7" data-feather="edit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightEditSize-{{ $size->id }}" aria-controls="offcanvasRightEditSize-{{ $size->id }}" data-fa-transform="shrink-3"></span>
                        <span class="me-2 text-danger fs-7" data-feather="trash-2" data-bs-toggle="modal" data-bs-target="#DeleteSize-{{ $size->id }}" data-fa-transform="shrink-3"></span>
                    </span>
                  </div>
                </div>
                <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                  <div class="d-flex lh-1 align-items-center"><a class="text-body-tertiary fw-bold fs-10 me-2" href="#!"><span class="fas fa-paperclip me-1"></span>2</a>
                    <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">12 Nov, 2021</p>
                    <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                      <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">12:00 PM</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="modal fade" id="Addcolor" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter les couleurs pour ce produit</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
        </div>
        <form method="POST" action="{{ route('magasin.option.store') }}">
          <div class="modal-body">
            <p class="text-body-tertiary lh-lg mb-0">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <div class="mb-3 text-start">
                <label class="form-label" for="colors">Entrer les couleurs du produits</label>
                <input id="colors" type="text" placeholder="Entrer les couleurs du produits" class="form-control text-body-quaternary text-monospace @error('colors') is-invalid @enderror" name="colors" value="{{ old('colors') }}" required autocomplete="colors" autofocus>

                @error('colors')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Enregistrer les couleurs</button>
            <button class="btn btn-outline-warning" type="button" data-bs-dismiss="modal">Anuller</button>
          </div>
        </form>
      </div>
    </div>
  </div>
                    
  <div class="modal fade" id="AddSize" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter les tailles pour ce produit</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
        </div>
        <form method="POST" action="{{ route('magasin.option.create') }}">
          <div class="modal-body">
            <p class="text-body-tertiary lh-lg mb-0">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <div class="mb-3 text-start">
                <label class="form-label" for="sizes">Entrer les tailles du produit</label>
                <input id="sizes" type="text" placeholder="Entrer les tailles du produit" class="form-control text-body-quaternary text-monospace @error('sizes') is-invalid @enderror" name="sizes" value="{{ old('sizes') }}" required autocomplete="sizes" autofocus>

                @error('sizes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Enregistrer les tailles</button>
            <button class="btn btn-outline-warning" type="button" data-bs-dismiss="modal">Anuller</button>
          </div>
        </form>
      </div>
    </div>
  </div>

     @foreach($getColors as $color)
      <div class="card-body p-0">
        <div class="p-4 code-to-copy">
          <!-- Right Offcanvas-->
          <div class="offcanvas offcanvas-end" id="offcanvasEditColor-{{ $color->id }}" tabindex="-1" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasRightLabel">Modifier la couleur {{ $color->name }}</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <form method="POST" action="{{ route('magasin.option.update',$color->id) }}">
              @csrf
              {{ method_field('PUT') }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mb-3 text-start">
                    <label class="form-label" for="name">Nom de la couleur</label>
                    <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $color->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 text-start">
                  <label class="form-label" for="email">Status de la couleur</label> <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input text-success @error('visible') is-invalid @enderror" @if($color->visible == 1) checked="" @endif id="inlineRadioA-{{ $color->id }}" type="radio" name="visible" value=" 1 ">
                    <label class="form-check-label text-success" for="inlineRadioA-{{ $color->id }}">Visible</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input text-warning @error('visible') is-invalid @enderror" @if($color->visible == 0) checked="" @endif id="inlineRadioB-{{ $color->id }}" type="radio" name="visible" value=" 0 ">
                    <label class="form-check-label text-warning" for="inlineRadioB-{{ $color->id }}">Cacher</label>
                  </div>
                  @error('visible')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer les modifications</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach

    @foreach($getColors as $color)
      <div class="modal fade" id="DeleteColor-{{ $color->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel">Suppresion de couleur</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
            </div>
            <form action="{{ route('magasin.option.destroy',$color->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-3"> Etes vous sure de bien vouloire supprimer la couleur {{$color->name}} </p>
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


    <!-- Debut du taritement des tailles -->

        @foreach($getSizes as $size)
      <div class="card-body p-0">
        <div class="p-4 code-to-copy">
          <!-- Right Offcanvas-->
          <div class="offcanvas offcanvas-end" id="offcanvasRightEditSize-{{ $size->id }}" tabindex="-1" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasRightLabel">Modifier la taille {{ $size->name }}</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <form method="POST" action="{{ route('magasin.option.edit',$size->id) }}">
              @csrf
              {{ method_field('PUT') }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mb-3 text-start">
                    <label class="form-label" for="name">Nom de la taille</label>
                    <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $size->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 text-start">
                  <label class="form-label" for="email">Status de la taille</label> <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input text-success @error('visible') is-invalid @enderror" @if($size->visible == 1) checked="" @endif id="inlineRadioA-{{ $size->id }}" type="radio" name="visible" value=" 1 ">
                    <label class="form-check-label text-success" for="inlineRadioA-{{ $size->id }}">Visible</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input text-warning @error('visible') is-invalid @enderror" @if($size->visible == 0) checked="" @endif id="inlineRadioB-{{ $size->id }}" type="radio" name="visible" value=" 0 ">
                    <label class="form-check-label text-warning" for="inlineRadioB-{{ $size->id }}">Cacher</label>
                  </div>
                  @error('visible')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer les modifications</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach

    @foreach($getSizes as $size)
      <div class="modal fade" id="DeleteSize-{{ $size->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel">Suppresion de taille</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
            </div>
            <form action="{{ route('magasin.option.deleteSize',$size->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-3"> Etes vous sure de bien vouloire supprimer la taille {{$size->name}} </p>
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

@section('footerSection')
<script src="{{ asset('assets/js/bootstrap-tagsinput.js') }}"></script> 

<script type="text/javascript">
  $("#colors").tagsinput();
  $("#sizes").tagsinput();
</script>
@endsection