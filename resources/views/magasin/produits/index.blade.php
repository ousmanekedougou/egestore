@extends('layouts.app',['title' => 'produits'])
<link href="{{asset('vendors/choices/choices.min.css')}}" rel="stylesheet" />
@section('main-content')
  <div class="content">

    <div class="mb-9">
      <div class="row g-3 mb-4">
        <div class="col-auto">
          <h2 class="mb-0">Produits de categorie {{$subcategory->category->name}}</h2>
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
              <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <span class="fas fa-plus me-2"></span>Ajouter un produit
              </button>
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
                  <th class="sort align-middle ps-3" scope="col" data-sort="tags" style="width:100px;">COULEUR</th>
                  <th class="sort align-middle ps-3" scope="col" data-sort="tags" style="width:100px;">TAILLES</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">QUANTITES</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">PRIX UNITAIRE</th>
                  <th class="sort align-middle ps-4" scope="col" data-sort="time" style="width:50px;">STATUS</th>
                  <th class="sort text-end align-middle pe-0 ps-4" scope="col">ACTIONS</th>
                </tr>
              </thead>
              <tbody class="list" id="products-table-body">
                @foreach($subcategory->products as $product)
                  <tr class="position-static @if($product->quantity > 0 && $product->quantity < 10 ) bg-warning  @elseif($product->quantity == 0) bg-danger @endif">
                    <td class="align-middle white-space-nowrap py-0"><a class="d-block border border-translucent rounded-2"  href="{{ route('magasin.produit.edit',$product->id) }}"><img src="{{Storage::url($product->image)}}" alt="" width="53" /></a></td>
                    <td class="product align-middle ps-4"><a class="fw-semibold line-clamp-3 mb-0 @if( $product->quantity < 10 ) text-white @endif"  href="{{ route('magasin.produit.edit',$product->slug) }}">{{ $product->name }}</a></td>
                    <td class="price align-middle white-space-nowrap text-center fw-bold @if( $product->quantity < 10 ) text-white @else text-body-tertiary  @endif ps-4">{{ $product->reference }}</td>
                    <td class="tags align-middle review ps-3" style="min-width:200px;">
                      @if($product->colors != '')
                        @foreach(unserialize($product->colors) as $colorGet)
                          <span class="badge badge-tag mb-1"> {{ $colorGet }} </span>
                        @endforeach
                      @else 
                        Null
                      @endif
                    </td>
                    <td class="tags align-middle review ps-3" style="min-width:100px;">
                      <span class="">@if($product->sizes != '') @foreach(unserialize($product->sizes) as $sizeGet) {{ $sizeGet }},  @endforeach @else Null @endif</span>
                    </td>
                    <td class="price align-middle white-space-nowrap text-center fw-bold @if( $product->quantity < 10 ) text-white @else text-body-tertiary  @endif ps-4">{{ $product->quantity }}</td>
                    <td class="price align-middle white-space-nowrap text-center fw-bold @if( $product->quantity < 10 ) text-white @else text-body-tertiary  @endif ps-4">{{ $product->getPrice() }}</td>
                    <td class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">
                      @if($product->visible == 1) <span class="badge badge-phoenix badge-phoenix-success">Visible</span> @else <span class="badge badge-phoenix badge-phoenix-warning">Cacher</span> @endif
                    </td>
                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                      @if($product->quantity > 0)
                        <a href="{{ route('magasin.panier.store') }}" onclick="event.preventDefault(); document.getElementById('ajouterAuPanier-{{ $product->id }}').submit();"><span class="me-2 @if( $product->quantity < 10 ) text-white @else text-warning  @endif" data-feather="shopping-cart" data-fa-transform="shrink-3"></span></a>
                        <form id="ajouterAuPanier-{{ $product->id }}" action="{{ route('magasin.panier.store') }}" method="POST" class="d-none">
                          @csrf
                          <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </form>
                      @else
                      <span class="text-white" style="margin-right: 4px;">Indisponible</span>
                      @endif
                      
                      <span class="me-2 @if( $product->quantity < 10 ) text-white @else text-success  @endif" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight-{{ $product->id }}" aria-controls="offcanvasRight-{{ $product->id }}" data-feather="edit-3" data-fa-transform="shrink-3"></span>
                      <span class="me-2 @if( $product->quantity < 10 ) text-white @else text-danger  @endif" data-bs-toggle="modal" data-bs-target="#DeleteCompte-{{ $product->id }}" data-feather="trash-2" data-fa-transform="shrink-3"></span>
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
            <form method="POST" action="{{ route('magasin.produit.store') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="sub_category_id" value="{{ $subcategory->id }}">
              
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
                <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file" value="{{ old('image') }}" required autocomplete="image"/>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="mb-3 text-start">
                <label class="form-label" for="desc">Description du produit </label>
                <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" value="{{ old('desc') }}" name="desc" required autocomplete="desc" rows="4"> </textarea>
                @error('desc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="mb-3 text-start">
                <label class="form-label" for="email">Status du produit</label> <br>
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

              <div class="mb-3 text-start">
                <label for="organizerMultiple">Couleurs</label>
                <select class="form-select @error('colors') is-invalid @enderror" autocomplete="colors" id="organizerMultiple" name="colors[]" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                  <option value="">Sélectionner les couleures pour ce produit</option>
                  @foreach(allColors() as $color)
                    <option value="{{ $color->name }}">{{$color->name}} 
                      <span class="text-danger" data-feather="circle" style="height: 70px; width: 70px;"></span>
                    </option>
                  @endforeach
                </select>
                @error('colors')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-4 text-start">
                <label for="organizerMultiple2">Tailles</label>
                <select class="form-select @error('sizes') is-invalid @enderror" autocomplete="sizes" id="organizerMultiple2" name="sizes[]" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                  <option value="">Sélectionner les tailles pour ce produit</option>
                  <option value="X">X</option>
                  <option value="XL">XL</option>
                  <option value="XXL">XXL</option>
                  <option value="25,5">25,5</option>
                </select>
                @error('sizes')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              @if(AuthMagasinAgentVisible() == 1)
                <div class="mb-3 text-start">
                  <label class="form-label" for="images">Ajouter des images similaires (facultatif)</label>
                  <input type="file" name="images[]" multiple="multiple" class="form-control form-control-sm mb-4" id="customFileSm"> 
                </div>
              @endif

              <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer ce produit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @foreach($subcategory->products as $product)
      <div class="card-body p-0">
        <div class="p-4 code-to-copy">
          <!-- Right Offcanvas-->
          <div class="offcanvas offcanvas-end" id="offcanvasRight-{{ $product->id }}" tabindex="-1" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasRightLabel">Modification de produit</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <form method="POST" action="{{ route('magasin.produit.update',$product->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <input type="hidden" name="sub_category_id" value="{{ $subcategory->id }}">
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
                  <img src="{{Storage::url($product->image)}}" alt="" width="38" style="float: right;"/>
                  <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file" value="{{ old('image') ?? $product->image }}"  autocomplete="image"/>
                  @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                @if($product->colors != '')
                <div class="mb-3 text-start">
                  <label for="organizerMultiple">Couleurs : @foreach(unserialize($product->colors) as $colorGet) <span class="text-primary fs-10 fw-4">{{ $colorGet }},</span> @endforeach</label>
                  <select class="form-select @error('colors') is-invalid @enderror" autocomplete="colors" id="organizerMultiple" name="colors[]" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                    <option value="">Sélectionner les couleures pour ce produit</option>
                    @foreach(allColors() as $color)
                      <option value="{{ $color->name }}">{{$color->name}} 
                        <span class="text-danger" data-feather="circle" style="height: 70px; width: 70px;"></span>
                      </option>
                    @endforeach
                  </select>
                  @error('colors')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                @endif
                @if($product->sizes != '')
                  <div class="mb-4 text-start">
                    <label for="organizerMultiple2">Tailles : @foreach(unserialize($product->sizes) as $sizeGet) <span class="text-info fs-10 fw-4">{{ $sizeGet }},</span> @endforeach</label>
                    <select class="form-select @error('sizes') is-invalid @enderror" autocomplete="sizes" id="organizerMultiple2" name="sizes[]" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                      <option value="">Sélectionner les tailles pour ce produit</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                    @error('sizes')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                @endif

                <div class="mb-3 text-start">
                  <label class="form-label" for="desc">Description du produit </label>
                  <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" required autocomplete="desc" rows="4"> {{ $product->desc}} </textarea>
                  @error('desc')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="mb-3 text-start">
                  <label class="form-label" for="email">Status du produit</label> <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input text-success @error('visible') is-invalid @enderror" @if($product->visible == 1) checked="" @endif id="inlineRadioA-{{ $product->id }}" type="radio" name="visible" value=" 1 ">
                    <label class="form-check-label text-success" for="inlineRadioA-{{ $product->id }}">Visible</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input text-warning @error('visible') is-invalid @enderror" @if($product->visible == 0) checked="" @endif id="inlineRadioB-{{ $product->id }}" type="radio" name="visible" value=" 0 ">
                    <label class="form-check-label text-warning" for="inlineRadioB-{{ $product->id }}">Cacher</label>
                  </div>
                  @error('visible')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                @if(AuthMagasinAgentVisible() == 1)
                  <div class="mb-3 text-start">
                    <label class="form-label" for="images">Modifier les images similaires (facultatif)</label> <br>
                      @if($product->images != '')
                        @foreach(json_decode($product->images, true) as $image)
                          <img src="{{Storage::url($image)}}" alt="" width="38" />
                        @endforeach
                      @endif
                      <input type="file" name="images[]" multiple="multiple" class="form-control form-control-sm mb-4" id="customFileSm"> 
                  </div>
                @endif

                <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer ce produit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach


    @foreach($subcategory->products as $product)
      <div class="modal fade" id="DeleteCompte-{{ $product->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel">Suppresion de produit</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
            </div>
            <form action="{{ route('magasin.produit.destroy',$product->id) }}" method="post">
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

<script src="{{asset('vendors/choices/choices.min.js')}}"></script>

