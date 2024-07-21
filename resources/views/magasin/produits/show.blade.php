@extends('layouts.app',['title' => 'magasin-affichage des produits'])

@section('main-content')
<div class="content">
   
  <!-- ============================================-->
  <!-- <section> begin ============================-->
  <section class="py-0">
      <div class="row g-5 mb-5 mb-lg-8" data-product-details="data-product-details">
        <div class="col-12 col-lg-6">
          <div class="row g-3 mb-3">
            <div class="col-12 col-md-2 col-lg-12 col-xl-2">
              <div class="swiper-products-thumb swiper swiper theme-slider overflow-visible" id="swiper-products-thumb"></div>
            </div>
            <div class="col-12 col-md-10 col-lg-12 col-xl-10">
              <div class="d-flex align-items-center border border-translucent rounded-3 text-center p-5 h-100">
                <div class="swiper swiper theme-slider" data-thumb-target="swiper-products-thumb" data-products-swiper='{"slidesPerView":1,"spaceBetween":16,"thumbsEl":".swiper-products-thumb"}'></div>
              </div>
            </div>
          </div>
          <div class="d-flex">
            <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight-{{ $product->id }}" aria-controls="offcanvasRight-{{ $product->id }}" class="btn btn-sm btn-outline-primary rounded-pill w-100 me-3 px-2 px-sm-4 fs-9 fs-sm-8">
              <span data-feather="edit-3" class="me-2"></span>Modifier ce produit
            </button>
            <button  class="btn btn-sm btn-warning rounded-pill w-100 fs-9 fs-sm-8">
              <span data-feather="shopping-cart" class=" me-2"></span>Ajouter au panier
            </button>
          </div>
        </div>
        <div class="col-12 col-lg-5">
          <div class="d-flex flex-column justify-content-between h-100">
            <div>
              <div class="d-flex flex-wrap">
                <div class="me-2"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></div>
                <p class="text-primary fw-semibold mb-2">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">{{$product->sub_category->category->name}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$product->sub_category->name}}</a></li>
                  </ol>  
                </p>
              </div>
              <div class="d-flex flex-wrap align-items-start mb-3"><span class="badge text-bg-success fs-9 rounded-pill me-2 fw-semibold">#1 Meilleur vendeur</span><a class="fw-semibold" href="#!">{{$product->name}}</a></div>
              <div class="d-flex flex-wrap align-items-center">
                <h1 class="me-3">{{$product->getPrice()}}</h1>
                <p class="text-body-quaternary text-decoration-line-through fs-6 mb-0 me-3">{{$product->getPrice()}}</p>
              </div>
              <p class="text-success fw-semibold fs-7 mb-2">Dans le stock {{ $product->quantity }}</p>
              <p class="mb-2 text-body-secondary">
                {{$product->desc}}
              </p>
              <p class="text-danger-dark fw-bold mb-5 mb-lg-0">Special offer ends in {{$product->created_at}}</p>
            </div>
            <div>
              <div class="mb-3">
                <p class="fw-semibold mb-2 text-body">Color : <span class="text-body-emphasis" data-product-color="data-product-color">Blue</span></p>
                <div class="d-flex product-color-variants" data-product-color-variants="data-product-color-variants">
                  <div class="rounded-1 border border-translucent me-2 active" data-variant="Blue" data-products-images='["../../../assets/img/products/details/blue_front.png","../../../assets/img/products/details/blue_back.png","../../../assets/img/products/details/blue_side.png"]'><img src="../../../assets/img/products/details/blue_front.png" alt="" width="38" /></div>
                  <div class="rounded-1 border border-translucent me-2" data-variant="Red" data-products-images='["../../../assets/img/products/details/red_front.png","../../../assets/img/products/details/red_back.png","../../../assets/img/products/details/red_side.png"]'><img src="../../../assets/img/products/details/red_front.png" alt="" width="38" /></div>
                  <div class="rounded-1 border border-translucent me-2" data-variant="Green" data-products-images='["../../../assets/img/products/details/green_front.png","../../../assets/img/products/details/green_back.png","../../../assets/img/products/details/green_side.png"]'><img src="../../../assets/img/products/details/green_front.png" alt="" width="38" /></div>
                  <div class="rounded-1 border border-translucent me-2" data-variant="Purple" data-products-images='["../../../assets/img/products/details/purple_front.png","../../../assets/img/products/details/purple_back.png","../../../assets/img/products/details/purple_side.png"]'><img src="../../../assets/img/products/details/purple_front.png" alt="" width="38" /></div>
                  <div class="rounded-1 border border-translucent me-2" data-variant="Silver" data-products-images='["../../../assets/img/products/details/silver_front.png","../../../assets/img/products/details/silver_back.png","../../../assets/img/products/details/silver_side.png"]'><img src="../../../assets/img/products/details/silver_front.png" alt="" width="38" /></div>
                  <div class="rounded-1 border border-translucent me-2" data-variant="Yellow" data-products-images='["../../../assets/img/products/details/yellow_front.png","../../../assets/img/products/details/yellow_back.png","../../../assets/img/products/details/yellow_side.png"]'><img src="../../../assets/img/products/details/yellow_front.png" alt="" width="38" /></div>
                  <div class="rounded-1 border border-translucent me-2" data-variant="Orange" data-products-images='["../../../assets/img/products/details/orange_front.png","../../../assets/img/products/details/orange_back.png","../../../assets/img/products/details/orange_side.png"]'><img src="../../../assets/img/products/details/orange_front.png" alt="" width="38" /></div>
                </div>
              </div>
              {{--
                <div class="row g-3 g-sm-5 align-items-end">
                  <div class="col-12 col-sm-auto">
                    <p class="fw-semibold mb-2 text-body">Size : </p>
                    <div class="d-flex align-items-center"><select class="form-select w-auto">
                        <option value="44">44</option>
                        <option value="22">22</option>
                        <option value="18">18</option>
                      </select><a class="ms-2 fs-9 fw-semibold" href="#!">Size chart</a></div>
                  </div>
                  <div class="col-12 col-sm">
                    <p class="fw-semibold mb-2 text-body">Quantity : </p>
                    <div class="d-flex justify-content-between align-items-end">
                      <div class="d-flex flex-between-center" data-quantity="data-quantity"><button class="btn btn-phoenix-primary px-3" data-type="minus"><span class="fas fa-minus"></span></button><input class="form-control text-center input-spin-none bg-transparent border-0 outline-none" style="width:50px;" type="number" min="1" value="2" /><button class="btn btn-phoenix-primary px-3" data-type="plus"><span class="fas fa-plus"></span></button></div><button class="btn btn-phoenix-primary px-3 border-0"><span class="fas fa-share-alt fs-7"></span></button>
                    </div>
                  </div>
                </div>
              --}}
            </div>
          </div>
        </div>
      </div>
    </div><!-- end of .container-->
  </section><!-- <section> close ============================-->
  <!-- ============================================-->


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
            <input type="hidden" name="sub_category_id" value="{{ $product->sub_category->id }}">
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

            <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer ce produit</button>
          </form>
        </div>
      </div>
    </div>
  </div>


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