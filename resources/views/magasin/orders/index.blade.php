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
                <th class="sort align-middle pe-3" scope="col" data-sort="payment_status" style="width:10%;">STATUS</th>
                <th class="sort align-middle text-start pe-3" scope="col" data-sort="delivery_type" style="width:30%;">PAIEMENT</th>
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
                  <td class="order align-middle white-space-nowrap py-0"><a class="fw-semibold" href="{{ route('magasin.commande.show',$order->id) }}"> Nº-{{ str_pad($order->order, 5, '0', STR_PAD_LEFT) }}</a></td>
                  <td class="total align-middle text-center fw-semibold text-body-highlight"><b>{{ $order->amount }} CFA</b></td>
                  <td class="customer align-middle white-space-nowrap ps-8">
                    <a class="d-flex align-items-center text-body" href="{{ route('magasin.commande.show',$order->id) }}">
                      <div class="avatar avatar-m"><img class="rounded-circle" src="@if($order->user_id != '' ) {{Storage::url($order->user->image)}} @else {{asset('assets/img/team/avatar.webp')}} @endif" alt="" /></div>
                      <h6 class="mb-0 ms-3 text-body">@if($order->user_id == '' && $order->client_id == '') {{ $order->name }} @elseif($order->user_id != '') {{ $order->user->name }} @elseif($order->client_id != '') {{ $order->client->name }} @endif</h6>
                    </a>
                  </td>
                  <td class="fulfilment_status align-middle white-space-nowrap text-start fw-bold text-body-tertiary">@if($order->user_id == '' && $order->client_id == '') {{ $order->phone }} @elseif($order->user_id != '') {{ $order->user->phone }} @elseif($order->client_id != '') {{ $order->client->phone }} @endif</td>
                  <td class="payment_status align-middle white-space-nowrap text-start fw-bold text-body-tertiary">
                    <span class="badge badge-phoenix fs-10  @if($order->status == 1) badge-phoenix-success @elseif($order->status == 2) badge-phoenix-info @elseif($order->status == 3) badge-phoenix-warning @endif">
                      <span class="badge-label">@if($order->status == 1) Terminé @elseif($order->status == 2) En cours @elseif($order->status == 3) Annulé @endif</span>
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
                  <td class="delivery_type align-middle white-space-nowrap text-body fs-9 text-center fw-bold"> <span class="@if($order->type == 1) text-success @elseif($order->type == 2) text-warning @else text-info @endif"> @if($order->type == 1) Payé @elseif($order->type == 2) A crédit @else Non payé @endif </span></td>
                  <td class="date align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 text-end">{{date('d-m-Y', strtotime( $order->date ))}}</td>
                  <td class=" align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 text-end">
                    <span target="_blank" class="me-2 text-success" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop-{{ $order->id }}" aria-controls="offcanvasTop" data-fa-transform="shrink-3"><span data-feather="file-text" ></span></span>
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
                    <option value="2" @if($order->status == 2) selected="" @endif>En cours</option>
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


    @foreach($orders as $order)
      <div class="offcanvas offcanvas-top h-auto" id="offcanvasTop-{{ $order->id }}" tabindex="-1" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
          <h2 id="offcanvasTopLabel" class="mb-0">FACTURE</h2>
          <button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <!-- <section> begin ============================-->
          <section class="pt-5 pb-9 bg-body-emphasis dark__bg-gray-1200 border-top">
            <div class="container-small">
              <div class="d-flex justify-content-between align-items-end mb-4">
                <h2 class="mb-0"></h2>
                <div>
                  <button class="btn btn-phoenix-secondary">
                    <span class="fa-solid fa-print me-sm-2"></span>
                    <span class="d-none d-sm-inline-block">Imprimer</span>
                  </button>
                </div>
              </div>
              <div class="bg-body dark__bg-gray-1100 p-4 mb-4 rounded-2">
                <div class="row g-4">
                  <div class="col-12 col-lg-3">
                    <div class="row g-4 g-lg-2">
                      <div class="col-12 col-sm-6 col-lg-12 mb-3">
                        <div class="row align-items-center g-0">
                          <div class="col-auto col-lg-6 col-xl-5">
                            <p class="fs-9 text-body-secondary fw-semibold mb-0">
                              <img class="bg-red" class="rounded-circle" src="@if ($order->logo != '') {{(Storage::url($order->magasin->logo))}} @else https://ui-avatars.com/api/?name={{$order->magasin->name}} @endif" alt="" />
                            </p>
                          </div>
                          <div class="col-auto col-lg-6 col-xl-7">
                            <h6 class="mb-0 me-3">{{ $order->magasin->name }}</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 col-lg-12">
                        <div class="row align-items-center g-0">
                          <div class="col-auto col-lg-6 col-xl-5">
                            <h6 class="mb-0 me-3">Facture No :</h6>
                          </div>
                          <div class="col-auto col-lg-6 col-xl-7">
                            <p class="fs-9 text-body-secondary fw-semibold mb-0">#FLR978282</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 col-lg-12">
                        <div class="row align-items-center g-0">
                          <div class="col-auto col-lg-6 col-xl-5">
                            <h6 class="me-3">Date :</h6>
                          </div>
                          <div class="col-auto col-lg-6 col-xl-7">
                            <p class="fs-9 text-body-secondary fw-semibold mb-0">19.06.2019</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-lg-5">
                    <div class="row g-4 gy-lg-5">
                      <div class="col-12 col-lg-8">
                        <h6 class="mb-2 me-3">Vendu par :</h6>
                        <p class="fs-9 text-body-secondary fw-semibold mb-0">
                          @if (Auth::guard('magasin')->user())
                            {{ Auth::guard('magasin')->user()->admin_name }}
                          @elseif (Auth::guard('agant')->user())
                            Agent : {{ Auth::guard('agent')->user()->name }}
                          @endif
                        </p>
                      </div>
                      <div class="col-12 col-lg-4">
                        <h6 class="mb-2"> RCCM :</h6>
                        <p class="fs-9 text-body-secondary fw-semibold mb-0">XVCJ963782008</p>
                      </div>
                      <div class="col-12 col-lg-4">
                        <h6 class="mb-2"> NINEA :</h6>
                        <p class="fs-9 text-body-secondary fw-semibold mb-0">IX9878123TC</p>
                      </div>
                      <div class="col-12 col-lg-4">
                        <h6 class="mb-2"> Commande No :</h6>
                        <p class="fs-9 text-body-secondary fw-semibold mb-0">A-8934792734</p>
                      </div>
                      <div class="col-12 col-lg-4">
                        <h6 class="mb-2">Date commande:</h6>
                        <p class="fs-9 text-body-secondary fw-semibold mb-0">19.06.2019</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-lg-4">
                    <div class="row g-4">
                      <div class="col-12 col-lg-6">
                        <h6 class="mb-2"> Le client :</h6>
                        <div class="fs-9 text-body-secondary fw-semibold mb-0">
                          <p class="mb-2">{{ $order->name }},</p>
                          <p class="mb-2">{{ $order->email }}</p>
                          <p class="mb-0">{{ $order->phone }}</p>
                          <p class="mb-2">{{ $order->adresse }}</p>
                        </div>
                      </div>
                      <div class="col-12 col-lg-6">
                        <h6 class="mb-2"> Le fournisseur :</h6>
                        <div class="fs-9 text-body-secondary fw-semibold mb-0">
                          <p class="mb-2">{{ $order->magasin->name }},</p>
                          <p class="mb-2">{{ $order->magasin->email }},</p>
                          <p class="mb-0">{{ $order->magasin->phone }},</p>
                          <p class="mb-2">{{ $order->magasin->adresse }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="px-0">
                <div class="table-responsive scrollbar">
                  <table class="table fs-9 text-body mb-0">
                    <thead class="bg-body-secondary">
                      <tr>
                        <th scope="col" style="width: 24px;"></th>
                        <th scope="col" style="min-width: 60px;">SL NO.</th>
                        <th scope="col" style="min-width: 360px;">Produits</th>
                        <th class="ps-5" scope="col" style="min-width: 150px;">Couleurs</th>
                        <th scope="col" style="width: 60px;">Tailles</th>
                        <th class="text-end" scope="col" style="width: 80px;">Quantites</th>
                        <th class="text-end" scope="col" style="width: 100px;">Prix</th>
                        <th class="text-end" scope="col" style="min-width: 60px;">Total</th>
                        <th scope="col" style="width: 24px;"></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach(unserialize($order->products) as $product)
                      <tr>
                        <td class="border-0"></td>
                        <td class="align-middle">1</td>
                        <td class="align-middle">
                          <p class="line-clamp-1 mb-0 fw-semibold">{{$product[1]}}</p>
                        </td>
                        <td class="align-middle ps-5">@if($product[4] != ''){{$product[4]}} @else Null @endif</td>
                        <td class="align-middle text-body-tertiary fw-semibold">@if($product[5] != ''){{$product[5]}} @else Null @endif</td>
                        <td class="align-middle text-end text-body-highlight fw-semibold">{{$product[2]}}</td>
                        <td class="align-middle text-end fw-semibold">{{$product[3]}}</td>
                        <td class="align-middle text-end fw-semibold">{{$product[2] * $product[3]}}</td>
                        <td class="border-0"></td>
                      </tr>
                    @endforeach
                      <tr class="bg-body-secondary">
                        <td class="align-middle ps-4 fw-bold text-body-highlight" colspan="3">Grand Total</td>
                        <td class="align-middle fw-bold text-body-highlight" colspan="3">Three Hundred and Ninenty Eight USD</td>
                        <td></td>
                        <td class="align-middle text-end fw-bold">{{ $order->amount }}</td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="text-end py-9 border-bottom"><img class="mb-3" src="../../../assets/img/logos/phoenix-mart.png" alt="" />
                  <h4>Authorized Signatory</h4>
                </div>
              </div>
              <div class="d-flex justify-content-between mt-4"><button class="btn btn-primary"><span class="fa-solid fa-bag-shopping me-2"></span>Browse more items</button>
                <div><button class="btn btn-phoenix-secondary"><span class="fa-solid fa-print me-sm-2"></span><span class="d-none d-sm-inline-block">Imprimer</span></button></div>
              </div>
            </div><!-- end of .container-->
          </section><!-- <section> close ============================-->
          <!-- ============================================-->
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