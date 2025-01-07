@extends('layouts.app',['title' => 'commande des fournisseurs'])
@section('headSection')
<link href="{{asset('vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet" /> 
@endsection
@section('main-content')
<div class="content">
  <div class="mb-9">
    <div class="row g-3 mb-4">
      <div class="col-auto">
        <h2 class="mb-1">Les commandes reçue </h2>
      </div>
    </div>
    <div id="orderTable" data-list='{"valueNames":["order","total","customer","payment_status","fulfilment_status","delivery_type","date"],"page":10,"pagination":true}'>
      <div class="mb-4">
        <div class="row g-3">
          <div class="col-auto">
            <div class="search-box">
              <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Rechercer des reservations pro-format" aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
              </form>
            </div>
          </div>
          <div class="col-auto">
            
          </div>
        </div>
      </div>
      <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
        <div class="table-responsive scrollbar mx-n1 px-1">
          <table class="table table-sm fs-9 mb-0">
            <thead>
              <tr>
                <th class="white-space-nowrap fs-9 align-middle ps-0" style="width:26px;">
                  <div class="form-check mb-0 fs-8"><input class="form-check-input" id="checkbox-bulk-order-select" type="checkbox" data-bulk-select='{"body":"order-table-body"}' /></div>
                </th>
                <th class="sort white-space-nowrap align-middle pe-3" scope="col" data-sort="order" style="width:5%;">Nº COMMANDES</th>
                <th class="sort align-middle text-start" scope="col" data-sort="total" style="width:30%;">TOTAL</th>
                <th class="sort align-middle text-start ps-8" scope="col" data-sort="customer" style="width:108%; min-width: 50px;">MAGASIN</th>
                <th class="sort align-middle text-start ps-8" scope="col" data-sort="bon_commande" style="width:108%; min-width: 50px;">BON DE COMMANDE</th>
                <th class="sort align-middle pe-3" scope="col" data-sort="payment_status" style="width:10%;">STATUS</th>
                <th class="sort align-middle text-start pe-3" scope="col" data-sort="delivery_type" style="width:30%;">METHODES</th>
                <th class="sort align-middle text-center pe-3" scope="col" data-sort="date">LIVRAISON</th>
                <th class="sort align-middle text-center pe-3" scope="col" data-sort="date">DATE DEMANDE</th>
                <th class="sort align-middle text-center pe-3" scope="col" data-sort="date">DATE LIVRAISON</th>
                <th class="sort align-middle text-end pe-0" scope="col" data-sort="date">ACTIONS</th>
              </tr>
            </thead>
            <tbody class="list" id="order-table-body">
              @foreach($orders as $order)
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <td class="fs-9 align-middle px-0 py-3">
                    <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"order":2453,"total":87,"customer":{"avatar":"/team/32.webp","name":"Carry Anna"},"payment_status":{"label":"Complete","type":"badge-phoenix-success","icon":"check"},"fulfilment_status":{"label":"Cancelled","type":"badge-phoenix-secondary","icon":"x"},"delivery_type":"Cash on delivery","date":"Dec 12, 12:56 PM"}' /></div>
                  </td>
                  <td class="order align-middle white-space-nowrap py-0"><a class="fw-semibold" href="{{ route('magasin.devis-produits.create',$order->slug) }}">Nº-{{ str_pad($order->order, 5, '0', STR_PAD_LEFT) }}</a></td>
                  <td class="total align-middle text-center fw-semibold text-body-highlight"><b>{{ number_format($order->amount,2, ',','.') }}</b></td>
                  <td class="customer align-middle white-space-nowrap ps-8">
                    <a class="d-flex align-items-center text-body" href="{{ route('magasin.devis-produits.create',$order->slug) }}">
                      <div class="avatar avatar-m"><img class="rounded-circle" src="@if($order->magasin->image != '') {{Storage::url($order->magasin->image)}} @else https://ui-avatars.com/api/?name={{ $order->magasin->name }} @endif" alt="" /></div>
                      <h6 class="mb-0 ms-3 text-body">{{ $order->magasin->name }}</h6>
                    </a>
                  </td>
                  <td class="bon_commande align-middle white-space-nowrap ps-8">
                    <a class="d-flex align-items-center text-body" href="{{ route('magasin.devis-produits.create',$order->slug) }}">
                      <h6 class="mb-0 ms-3 text-body">{{ $order->bon_commande }}</h6>
                    </a>
                  </td>
                  <td class="payment_status align-middle white-space-nowrap text-start fw-bold text-body-tertiary">
                    <span class="badge badge-phoenix fs-10 @if ($order->supply_order_products->count() > 0)   @if($order->status == 1) badge-phoenix-success @elseif($order->status == 2) badge-phoenix-info @else badge-phoenix-warning @endif @else badge-phoenix-secondary @endif">
                      <span class="badge-label">@if ($order->supply_order_products->count() > 0)  @if($order->status == 1) Terminé @elseif($order->status == 2) En cours @else Annulé @endif @else 0 Produits  @endif</span>
                      <span class="ms-1" 
                      @if ($order->supply_order_products->count() > 0) 
                        @if($order->status == 1)
                          data-feather="check" 
                        @elseif($order->status == 2)
                          data-feather="chevrons-right"
                        @else 
                        data-feather="x"
                        @endif
                      @endif
                      style="height:12.8px;width:12.8px;"></span>
                      
                      
                    </span>
                  </td>
                  <td class="delivery_type align-middle white-space-nowrap text-body fs-9 text-center">
                    @if ($order->supply_order_products->count() > 0) 
                      @if ($order->methode == 1)
                        <span class="text-info">Wave</span>
                      @elseif ($order->methode == 2)
                        <span class="text-warning">Orange Money</span>
                      @elseif ($order->methode == 3)
                        <span class="text-success">En cache</span>
                      @else
                        Non paye
                      @endif
                    @else
                    0 commande
                    @endif
                  </td>
                  <td class="livraison align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 text-start">
                    <span class="badge badge-phoenix fs-10 @if ($order->supply_order_products->count() > 0)   @if($order->status == 1) badge-phoenix-success @elseif($order->status == 2) badge-phoenix-info @else badge-phoenix-warning @endif @else badge-phoenix-secondary @endif">
                      <span class="badge-label">@if ($order->supply_order_products->count() > 0)  @if($order->delivery == 1) Livraison reçue @elseif($order->delivery == 2) En cours @else Annulé @endif @else 0 produits  @endif</span>
                        <span class="ms-1" 
                          @if ($order->supply_order_products->count() > 0) 
                            @if($order->status == 1)
                              data-feather="check" 
                            @elseif($order->status == 2)
                              data-feather="chevrons-right"
                            @else 
                            data-feather="x"
                            @endif
                          @endif
                          style="height:12.8px;width:12.8px;"
                        >
                        </span>
                    </span>
                  </td>
                  <td class="date align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 text-start">{{date('d-m-Y', strtotime( $order->created_at ))}}</td>
                  <td class="date align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 text-start">{{date('d-m-Y', strtotime( $order->date ))}}</td>
                  <td class=" align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 text-end">
                    @if($order->status == 1)
                      <a target="_blank" href="{{ route('magasin.devis.edit',$order->slug) }}" class="me-2 text-success" data-fa-transform="shrink-3"><span class="fa fa-file-alt fs-8" ></span></a>
                    @elseif($order->status != 1)
                      @if ($order->supply_order_products->count() > 0)
                        <span class="me-2 text-info fa fa-shopping-bag fs-7" data-bs-toggle="modal" data-bs-target="#OrderState-{{ $order->id }}" data-fa-transform="shrink-3"></span>
                      @endif
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
  </div>



    @foreach($orders as $order)
      <div class="modal fade" id="DeleteCompte-{{ $order->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel">Suppresion de la commande de devis</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
            </div>
            <form action="{{ route('magasin.devis.destroy',$order->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <input type="hidden" name="supply_id" value="{{ $order->supply->id }}">
              <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-3"> Etes vous sure de bien vouloire supprimer cette commande {{$order->bon_commande}} </p>
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


    @foreach($orders as $order)
      <div class="modal fade" id="OrderState-{{ $order->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Status de la commande de devis</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
            </div>
            <form action="{{ route('magasin.devis.status',$order->id) }}" method="post">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-3"> Commande devis Nº {{ $order->order }} de  {{$order->name}} </p>
                <p class="text-body-tertiary lh-lg mb-3">
                  <h6 class="mb-2">Selectionner un status</h6>
                  <select onchange="enableBrand(this)" class="form-select mb-4 @error('status') is-invalid @enderror" name="status" id="status"aria-label="delivery type">
                    <option value=""></option>
                    <option value="1" @if($order->status == 1) selected="" @endif>Terminé</option>
                    <option value="2" @if($order->status == 2) selected="" @endif>En cours</option>
                    <option value="3" @if($order->status == 3) selected="" @endif>Annulé</option>
                  </select>
                  @error('status')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </p>
                <div class="mb-3 text-start d-none" id="clientNone" data-id="{{ $order->id }}">
                  <label class="form-label" for="email">Methode de paiement</label> <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input text-primary @error('methode') is-invalid @enderror" @if($order->methode == 1) checked="" @endif id="inlineRadioA-{{ $order->id }}" type="radio" name="methode" value=" 1 ">
                    <label class="form-check-label text-primary" for="inlineRadioA-{{ $order->id }}" style="margin-top: 2px;">Wave</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input text-warning @error('methode') is-invalid @enderror" @if($order->methode == 2) checked="" @endif id="inlineRadioB-{{ $order->id }}" type="radio" name="methode" value=" 2 ">
                    <label class="form-check-label text-warning" for="inlineRadioB-{{ $order->id }}" style="margin-top: 2px;">Orange Money</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input text-success @error('methode') is-invalid @enderror" @if($order->methode == 3) checked="" @endif id="inlineRadioC-{{ $order->id }}" type="radio" name="methode" value=" 3 ">
                    <label class="form-check-label text-success" for="inlineRadioC-{{ $order->id }}" style="margin-top: 2px;">Cache</label>
                  </div>
                  @error('methode')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">Enregistre le status</button>
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
<script src="{{asset('vendors/flatpickr/flatpickr.min.js')}}"></script>
<script>
    function enableBrand(answer){
      if (answer.value == 1) {
          document.getElementById('clientNone').classList.remove('d-none')
      }else{
          document.getElementById('clientNone').classList.add('d-none')
      }
    }
</script>
@endsection