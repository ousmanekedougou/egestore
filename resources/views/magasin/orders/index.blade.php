@extends('layouts.app',['title' => 'commande'])

@section('main-content')
<div class="content">
  <div class="mb-9">
    <div class="row g-3 mb-4">
      <div class="col-auto">
        <h2 class="mb-0">Commandes</h2>
      </div>
    </div>
    <div id="orderTable" data-list='{"valueNames":["order","total","customer","payment_status","fulfilment_status","delivery_type","date"],"page":10,"pagination":true}'>
      <div class="mb-4">
        <div class="row g-3">
          <div class="col-auto">
            <div class="search-box">
              <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Rechercher un commande" aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
              </form>
            </div>
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
                <th class="sort white-space-nowrap align-middle pe-3" scope="col" data-sort="order" style="width:5%;">COMMANDES</th>
                <th class="sort align-middle text-end" scope="col" data-sort="total" style="width:60%;">TOTAL</th>
                <th class="sort align-middle ps-8" scope="col" data-sort="customer" style="width:28%; min-width: 250px;">CLIENTS</th>
                <th class="sort align-middle text-start pe-3" scope="col" data-sort="fulfilment_status" style="width:20%; min-width: 100px;">TELEPHONE</th>
                <th class="sort align-middle pe-3 text-center" scope="col" data-sort="payment_status" style="width:12%; min-width: 200px;">BON DE COMMANDE</th>
                <th class="sort align-middle pe-3" scope="col" data-sort="payment_status" style="width:10%;">STATUS</th>
                <th class="sort align-middle text-start pe-3" scope="col" data-sort="delivery_type" style="width:30%;">LIVRAISON</th>
                <th class="sort align-middle text-center pe-3" scope="col" data-sort="date">DATE</th>
                <th class="sort align-middle text-end pe-0" scope="col" data-sort="date">ACTIONS</th>
              </tr>
            </thead>
            <tbody class="list" id="order-table-body">
              @foreach($orders as $order)
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <td class="fs-9 align-middle px-0 py-3">
                    <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"order":2453,"total":87,"customer":{"avatar":"/team/32.webp","name":"Carry Anna"},"payment_status":{"label":"Complete","type":"badge-phoenix-success","icon":"check"},"fulfilment_status":{"label":"Cancelled","type":"badge-phoenix-secondary","icon":"x"},"delivery_type":"Cash on delivery","date":"Dec 12, 12:56 PM"}' /></div>
                  </td>
                  <td class="order align-middle white-space-nowrap py-0"><a class="fw-semibold" href="{{ route('magasin.commande.show',$order->id) }}"> Nº {{ $order->order }}</a></td>
                  <td class="total align-middle text-center fw-semibold text-body-highlight"><b>{{ $order->amount }}</b></td>
                  <td class="customer align-middle white-space-nowrap ps-8">
                    <a class="d-flex align-items-center text-body" href="{{ route('magasin.commande.show',$order->id) }}">
                      <div class="avatar avatar-m"><img class="rounded-circle" src="@if($order->user_id != '' ) {{Storage::url($order->user->image)}} @else {{asset('assets/img/team/avatar.webp')}} @endif" alt="" /></div>
                      <h6 class="mb-0 ms-3 text-body">@if($order->user_id == '' && $order->client_id == '') {{ $order->name }} @elseif($order->user_id != '') {{ $order->user->name }} @elseif($order->client_id != '') {{ $order->client->name }} @endif</h6>
                    </a>
                  </td>
                  <td class="fulfilment_status align-middle white-space-nowrap text-start fw-bold text-body-tertiary">@if($order->user_id == '' && $order->client_id == '') {{ $order->phone }} @elseif($order->user_id != '') {{ $order->user->phone }} @elseif($order->client_id != '') {{ $order->client->phone }} @endif</td>
                  <td class="total align-middle text-center fw-semibold text-body-highlight">@if($order->bon_commande != ''){{ $order->bon_commande }} @else Pas de bon @endif</td>
                  <td class="payment_status align-middle white-space-nowrap text-start fw-bold text-body-tertiary">
                    <span class="badge badge-phoenix fs-10  @if($order->status == 1) badge-phoenix-success @elseif($order->status == 2) badge-phoenix-info @else badge-phoenix-warning @endif">
                      <span class="badge-label">@if($order->status == 1) Terminé @elseif($order->status == 2) Traitement @else Annulé @endif</span>
                      <span class="ms-1" 
                        @if($order->status == 1)
                          data-feather="check" 
                        @elseif($order->status == 2)
                          data-feather="chevrons-right"
                        @else 
                        data-feather="x"
                        @endif
                        style="height:12.8px;width:12.8px;">
                      </span>
                      
                      
                    </span>
                  </td>
                  <td class="delivery_type align-middle white-space-nowrap text-body fs-9 text-start">Cash on delivery</td>
                  <td class="date align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 text-end">{{date('d-m-Y', strtotime( $order->date ))}}</td>
                  <td class=" align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 text-end">
                    <a href="{{ route('magasin.commande.edit',$order->slug) }}" target="_blank" class="me-2 text-success" data-fa-transform="shrink-3"><span data-feather="file-text" ></span></a>
                    <span class="me-2 text-info" data-bs-toggle="modal" data-bs-target="#OrderState-{{ $order->id }}" data-feather="shopping-bag" data-fa-transform="shrink-3"></span>
                    @if($order->status != 1)
                      <span class="me-2 text-danger" data-bs-toggle="modal" data-bs-target="#DeleteCompte-{{ $order->id }}" data-feather="trash-2" data-fa-transform="shrink-3"></span>
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
              <h5 class="modal-title text-danger" id="exampleModalLabel">Suppresion de commande</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
            </div>
            <form action="{{ route('magasin.commande.destroy',$order->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-3"> Etes vous sure de bien vouloire supprimer cette commande {{$order->name}} </p>
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
              <h5 class="modal-title" id="exampleModalLabel">Status de la commande</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
            </div>
            <form action="{{ route('magasin.commande.update',$order->id) }}" method="post">
              @csrf
              {{ method_field('PUT') }}
              <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-3"> Commande Nº {{ $order->order }} de  {{$order->name}} </p>
                <p class="text-body-tertiary lh-lg mb-3">
                  <h6 class="mb-2">Selectionner un status</h6>
                  <select class="form-select mb-4 @error('status') is-invalid @enderror" name="status" id="status"aria-label="delivery type">
                    <option value="1" @if($order->status == 1) selected="" @endif>Terminé</option>
                    <option value="2" @if($order->status == 2) selected="" @endif>Traitement</option>
                    <option value="3" @if($order->status == 3) selected="" @endif>Annulé</option>
                  </select>
                  @error('status')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </p>
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