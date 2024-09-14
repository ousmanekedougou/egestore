@extends('layouts.app',['title' => 'affichage des commandes sous reserve'])

@section('main-content')
<div class="content">
    <div class="mb-9">
      <div class="row g-3 mb-4">
        <div class="col-auto">
          <h2 class="mb-3">Bagages sous reserve</h2>
          <div class="d-sm-flex flex-between-center mb-3">
            <p class="text-body-secondary lh-sm mb-0 mt-2 mt-sm-0">
              Client : <a class="fw-bold" href="#!" style="margin-right: 15px;">  @if($reserve->user_id == '') {{ $reserve->name }} @else {{ $reserve->user->name }} @endif</a>
              Telepone : <a class="fw-bold" href="#!"> @if($reserve->user_id == '') {{ $reserve->phone }} @else {{ $reserve->user->phone }} @endif</a>
            </p>
          </div>
        </div>
      </div>
      <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
        <div class="mb-4">
          <div class="d-flex flex-wrap gap-3">
            <div class="search-box">
              <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Rechercher un produit" aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
              </form>
            </div>
            <div class="ms-xxl-auto">
              @if($reserve->status == 1)
              <h4 class="mb-0">Cette commande de sous reservation a ete paye</h4>
              @elseif($reserve->status == 2)
                <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                  <span class="fas fa-plus me-2"></span>Ajouter un produit
                </button>
              @else
                <h4 class="mb-0">Cette commande de sous reservation a ete anuler</h4>
              @endif
            </div>
          </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
          <div class="table-responsive scrollbar mx-n1 px-1">
            <table class="table fs-9 mb-0">
              <thead>
                <tr>
                  <th class="sort white-space-nowrap align-middle fs-10" scope="col" style="width:70px;"></th>
                  <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">PRODUITS</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">REFERENCES</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">QUANTITES</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">PRIX UNITAIRE</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">PRIX TOTAL</th>
                  <th class="sort align-middle ps-4" scope="col" data-sort="time" style="width:50px;">DATE</th>
                  <th class="sort text-end align-middle pe-0 ps-4" scope="col">ACTIONS</th>
                </tr>
              </thead>
              <tbody class="list" id="products-table-body">
                @foreach($reserve->bagages as $product)
                  <tr class="position-static">
                    <td class="align-middle white-space-nowrap py-0">
                      <a class="d-block border border-translucent rounded-2" target="_blank" href="{{ route('magasin.reserve.edit',$product->id) }}">
                        <img src="
                        @if($product->image == '') https://ui-avatars.com/api/?name={{$product->name}} @else {{Storage::url($product->image)}} @endif
                        
                        
                        " alt="" width="53" />
                      </a>
                    </td>
                    <td class="product align-middle ps-4"><a class="fw-semibold line-clamp-3 mb-0" target="_blank" href="{{ route('magasin.reserve.edit',$product->slug) }}">{{ $product->name }}</a></td>
                    <td class="price align-middle white-space-nowrap text-center fw-bold text-body-tertiary ps-4">{{ $product->reference }}</td>
                    <td class="price align-middle white-space-nowrap text-center fw-bold text-body-tertiary ps-4">{{ $product->quantity }}</td>
                    <td class="price align-middle white-space-nowrap text-center fw-bold text-body-tertiary ps-4">{{ $product->getPrice() }}</td>
                    <td class="price align-middle white-space-nowrap text-center fw-bold text-body-tertiary ps-4">{{ number_format($product->amount,2, ',','.') }} CFA</td>
                    <td class="time align-middle white-space-nowrap text-body-tertiary text-opacity-85 ps-4">{{date('d-m-Y', strtotime( $product->created_at ))}}</td>
                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                      <span class="me-2 text-success" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight-{{ $product->id }}" aria-controls="offcanvasRight-{{ $product->id }}" data-feather="edit-3" data-fa-transform="shrink-3"></span>
                      <span class="me-2 text-danger" data-bs-toggle="modal" data-bs-target="#DeleteCompte-{{ $product->id }}" data-feather="trash-2" data-fa-transform="shrink-3"></span>
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
            <h5 id="offcanvasRightLabel">Ajouter un produit</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <form method="POST" action="{{ route('magasin.bagage.store') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="reserve_id" value="{{ $reserve->id }}">
              <input type="hidden" name="type" value="1">
              <div class="mb-3 text-start">
                  <label class="form-label" for="name">Titre du produit</label>
                  <input id="name" type="text" placeholder="Titre du produit" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="mb-3 text-start">
                  <label class="form-label" for="reference">Reference du produit</label>
                  <input id="reference" type="text" placeholder="Reference du produit" class="form-control @error('reference') is-invalid @enderror" name="reference" value="{{ old('reference') }}" required autocomplete="reference" autofocus>

                  @error('reference')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="mb-3 text-start">
                  <label class="form-label" for="price">Prix du produit</label>
                  <input id="price" type="numeric" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Prix du produit" required autocomplete="price">

                  @error('price')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3 text-start">
                  <label class="form-label" for="quantity">Quantite du produit</label>
                  <input id="quantity" type="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" placeholder="Quantite du produit" required autocomplete="quantity">

                  @error('quantity')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="mb-3 text-start">
                <label class="form-label" for="image">Image du produit</label>
                <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file" value="{{ old('image') }}" autocomplete="image"/>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer ce produit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @foreach($reserve->bagages as $product)
      <div class="card-body p-0">
        <div class="p-4 code-to-copy">
          <!-- Right Offcanvas-->
          <div class="offcanvas offcanvas-end" id="offcanvasRight-{{ $product->id }}" tabindex="-1" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasRightLabel">Modification de produit</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <form method="POST" action="{{ route('magasin.bagage.update',$product->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <input type="hidden" name="reserve_id" value="{{ $reserve->id }}">
                <input type="hidden" name="type" value="1">
                <div class="mb-3 text-start">
                    <label class="form-label" for="name">Titre du produit</label>
                    <input id="name" type="text" placeholder="Titre du produit" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $product->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label" for="reference">Reference du produit</label>
                    <input id="reference" type="text" placeholder="Reference du produit" class="form-control @error('reference') is-invalid @enderror" name="reference" value="{{ old('reference') ?? $product->reference }}" required autocomplete="reference" autofocus>

                    @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label" for="price">Prix du produit</label>
                    <input id="price" type="numeric" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $product->price }}" placeholder="Prix du produit" required autocomplete="price">

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label" for="quantity">Quantite du produit</label>
                    <input id="quantity" type="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') ?? $product->quantity }}" placeholder="Quantite du produit" required autocomplete="quantity">

                    @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 text-start">
                  <label class="form-label" for="image">Image du produit</label>
                  <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file" value="{{ old('image') ?? $product->image }}"  autocomplete="image"/>
                  @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer ce produit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach


    @foreach($reserve->bagages  as $product)
      <div class="modal fade" id="DeleteCompte-{{ $product->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel">Suppresion de produit</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
            </div>
            <form action="{{ route('magasin.bagage.destroy',$product->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-3"> Etes vous sure de bien vouloire supprimer le produit {{$product->name}} </p>
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