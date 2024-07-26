@extends('layouts.app',['title' => 'magasin-acceuil'])
{{ProductStockAlert()}}
{{ProductStockVide()}}
@section('main-content')
  <div class="content">
    <div class="pb-5">
      <div class="row g-4">
        <div class="col-12 col-xxl-6">
          <div class="mb-8">
            <h2 class="mb-2">Ecommerce Dashboard</h2>
            <h5 class="text-body-tertiary fw-semibold">Here’s what’s going on at your business right now</h5>
          </div>
          <div class="row align-items-center g-4">
            <div class="col-12 col-md-auto">
              <div class="d-flex align-items-center"><span class="fa-stack" style="min-height: 46px;min-width: 46px;"><span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light" data-fa-transform="down-4 rotate--10 left-4"></span><span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success" data-fa-transform="up-4 right-3 grow-2"></span><span class="fa-stack-1x fa-solid fa-star text-success " data-fa-transform="shrink-2 up-8 right-6"></span></span>
                <div class="ms-3">
                  <h4 class="mb-0">57 new orders</h4>
                  <p class="text-body-secondary fs-9 mb-0">Awating processing</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-auto">
              <div class="d-flex align-items-center"><span class="fa-stack" style="min-height: 46px;min-width: 46px;"><span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-warning-light" data-fa-transform="down-4 rotate--10 left-4"></span><span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-warning" data-fa-transform="up-4 right-3 grow-2"></span><span class="fa-stack-1x fa-solid fa-pause text-warning " data-fa-transform="shrink-2 up-8 right-6"></span></span>
                <div class="ms-3">
                  <h4 class="mb-0">5 orders</h4>
                  <p class="text-body-secondary fs-9 mb-0">On hold</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-auto">
              <div class="d-flex align-items-center"><span class="fa-stack" style="min-height: 46px;min-width: 46px;"><span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-danger-light" data-fa-transform="down-4 rotate--10 left-4"></span><span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-danger" data-fa-transform="up-4 right-3 grow-2"></span><span class="fa-stack-1x fa-solid fa-xmark text-danger " data-fa-transform="shrink-2 up-8 right-6"></span></span>
                <div class="ms-3">
                  <h4 class="mb-0">15 products</h4>
                  <p class="text-body-secondary fs-9 mb-0">Out of stock</p>
                </div>
              </div>
            </div>
          </div>
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
                <th class="sort text-end align-middle pe-1 ps-4" scope="col">PANIERS</th>
              </tr>
            </thead>
            <tbody class="list" id="products-table-body">
              @foreach($products as $product)
                <tr class="position-static @if($product->quantity > 0 && $product->quantity < 10 ) bg-warning  @elseif($product->quantity == 0) bg-danger @endif">
                  <td class="align-middle white-space-nowrap py-0"><a class="d-block border border-translucent rounded-2" target="_blank" href="{{ route('magasin.produit.edit',$product->id) }}"><img src="{{Storage::url($product->image)}}" alt="" width="53" /></a></td>
                  <td class="product align-middle ps-4"><a class="fw-semibold line-clamp-3 mb-0 @if( $product->quantity < 10 ) text-white @endif" target="_blank" href="{{ route('magasin.produit.edit',$product->slug) }}">{{ $product->name }}</a></td>
                  <td class="price align-middle white-space-nowrap text-center fw-bold @if( $product->quantity < 10 ) text-white @else text-body-tertiary  @endif ps-4">{{ $product->reference }}</td>
                  <td class="price align-middle white-space-nowrap text-center fw-bold @if( $product->quantity < 10 ) text-white @else text-body-tertiary  @endif ps-4">{{ $product->quantity }}</td>
                  <td class="price align-middle white-space-nowrap text-center fw-bold @if( $product->quantity < 10 ) text-white @else text-body-tertiary  @endif ps-4">{{ $product->getPrice() }}</td>
                  
                  <td class="align-middle white-space-nowrap text-end pe-3 ps-4 btn-reveal-trigger">
                    @if($product->quantity > 0)
                      <a href="{{ route('magasin.panier.store') }}" onclick="event.preventDefault(); document.getElementById('ajouterAuPanier-{{ $product->id }}').submit();"><span class="me-2 @if( $product->quantity < 10 ) text-white @else text-warning  @endif" data-feather="shopping-cart" data-fa-transform="shrink-3"></span></a>
                      <form id="ajouterAuPanier-{{ $product->id }}" action="{{ route('magasin.panier.store') }}" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                      </form>
                    @else
                    <span class="text-white" style="margin-right: 4px;">Indisponible</span>
                    @endif
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