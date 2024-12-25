@extends('layouts.app',['title' => 'sous-categories'])

@section('main-content')
  <div class="content">

    <div class="mb-9">
      <div class="row g-2 mb-4">
        <div class="col-auto">
          <h2 class="mb-0">Les sous-categories de la categorie {{ $cateorie->name }}</h2>
        </div>
      </div>
      <div id="products" data-list='{"valueNames":["customer","email","total-orders","total-spent","city","last-seen","last-order"],"page":10,"pagination":true}'>
        <div class="mb-4">
          <div class="row g-3">
            <div class="col-auto">
              <div class="search-box">
                <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Rechercher une sous-categorie" aria-label="Search" />
                  <span class="fas fa-search search-box-icon"></span>
                </form>
              </div>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                  <span class="fas fa-plus me-2"></span>Ajouter une sous-categorie
              </button>
            </div>
          </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
          <div class="table-responsive scrollbar-overlay mx-n1 px-1">
            <table class="table table-sm fs-9 mb-0">
              <thead>
                <tr>
                  <th class="sort align-middle pe-5" scope="col" data-sort="customer" style="width:10%;">SOUS-CATEGORIES</th>
                  <th class="sort align-middle text-end" scope="col" data-sort="total-orders" style="width:10%">Visibilite</th>
                  <th class="sort align-middle text-end ps-3" scope="col" data-sort="total-spent" style="width:10%">ACTIONS</th>
                </tr>
              </thead>
              <tbody class="list" id="customers-table-body">
                @foreach($cateorie->sub_categories as $category)
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <td class="customer align-middle white-space-nowrap pe-5">
                    <a class="d-flex align-items-center text-body-emphasis" href="#">
                      <p class="mb-0 ms-3 text-body-emphasis fw-bold">{{ $category->name }}</p>
                    </a>
                  </td>
                  <td class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                    @if($category->visible == 1) <span class="badge badge-phoenix badge-phoenix-success">Visible</span> @else <span class="badge badge-phoenix badge-phoenix-warning">Cacher</span> @endif
                  </td>
                  <td class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                    <span class="me-2 text-success fa fa-edit fs-7" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight-{{ $category->id }}" aria-controls="offcanvasRight-{{ $category->id }}" data-fa-transform="shrink-3"></span>
                    <span class="me-2 text-danger fa fa-trash fs-7" data-bs-toggle="modal" data-bs-target="#DeleteCompte-{{ $category->id }}" data-fa-transform="shrink-3"></span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
            <div class="col-auto d-flex">
              <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p><a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </div>
            <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
              <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="card-body p-0">
      <div class="p-4 code-to-copy">
        <!-- Right Offcanvas-->
        <div class="offcanvas offcanvas-end" id="offcanvasRight" tabindex="-1" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Ajouter une sous-categorie</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <form method="POST" action="{{ route('magasin.sous-categorie.store') }}">
              @csrf
              <input type="hidden" name="category_id" value="{{ $cateorie->id }}">
              <div class="mb-3 text-start">
                  <label class="form-label" for="name">Nom de la sous-categorie</label>
                  <input id="name" type="text" placeholder="Nom de la sous-categorie" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              {{--  
                <div class="mb-3 text-start">
                  <label class="form-label" for="type">Selecetionner le type de cette categorie</label>
                  <select class="form-select @error('type') is-invalid @enderror" name="type" aria-label="Default select example">
                    <option selected=""></option>
                    <option value="1">Commercial</option>
                    <option value="2">Location de materiel</option>
                  </select>

                  @error('type')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              --}}
              
              <div class="mb-3 text-start">
                <label class="form-label" for="email">Status de la sous-categories</label> <br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-success @error('visible') is-invalid @enderror"  id="inlineRadio1" type="radio" name="visible" value=" 1 ">
                  <label class="form-check-label text-success" for="inlineRadio1">Visible</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-warning @error('visible') is-invalid @enderror"  id="inlineRadio2" type="radio" name="visible" value=" 0 ">
                  <label class="form-check-label text-warning" for="inlineRadio2">Cacher</label>
                </div>
                @error('visible')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer la sous-categories</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @foreach($cateorie->sub_categories as $category)
    <div class="card-body p-0">
      <div class="p-4 code-to-copy">
        <!-- Right Offcanvas-->
        <div class="offcanvas offcanvas-end" id="offcanvasRight-{{ $category->id }}" tabindex="-1" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Modifier la sous-categorie {{ $category->name }}</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <form method="POST" action="{{ route('magasin.sous-categorie.update',$category->id) }}">
            @csrf
            {{ method_field('PUT') }}
              <div class="mb-3 text-start">
                  <label class="form-label" for="name">Nom de la sous-categorie</label>
                  <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $category->name }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              {{--  
                <div class="mb-3 text-start">
                  <label class="form-label" for="type">Selecetionner le type de cette categorie</label>
                  <select class="form-select @error('type') is-invalid @enderror" name="type" aria-label="Default select example">
                    <option value="1" @if($category->type == 1) selected @endif>Commercial</option>
                    <option value="2" @if($category->type == 2) selected @endif>Location de materiel</option>
                  </select>

                  @error('type')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              --}}
              <div class="mb-3 text-start">
                <label class="form-label" for="email">Status de la sous-categories</label> <br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-success @error('visible') is-invalid @enderror" @if($category->visible == 1) checked="" @endif id="inlineRadioA-{{ $category->id }}" type="radio" name="visible" value=" 1 ">
                  <label class="form-check-label text-success" for="inlineRadioA-{{ $category->id }}">Visible</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-warning @error('visible') is-invalid @enderror" @if($category->visible == 0) checked="" @endif id="inlineRadioB-{{ $category->id }}" type="radio" name="visible" value=" 0 ">
                  <label class="form-check-label text-warning" for="inlineRadioB-{{ $category->id }}">Cacher</label>
                </div>
                @error('visible')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer la sous-categorie</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    @foreach($cateorie->sub_categories as $category)
      <div class="modal fade" id="DeleteCompte-{{ $category->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel">Suppresion de sous-categorie</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
            </div>
            <form action="{{ route('magasin.sous-categorie.destroy',$category->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-3"> Etes vous sure de bien vouloire supprimer la sous-categorie {{$category->name}} </p>
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