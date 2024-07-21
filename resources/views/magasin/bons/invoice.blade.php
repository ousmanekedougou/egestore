@extends('layouts.app',['title' => 'magasin-facture bon de comande'])

@section('main-content')
<div class="content">
   
  <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5 pb-9 bg-body-emphasis dark__bg-gray-1200">
        <div class="container-small">
          <div class="d-flex justify-content-between align-items-end mb-4">
            <h2 class="mb-0">FACTURE</h2>
            <div>
              <button class="btn btn-phoenix-secondary me-2">
                <span class="fa-solid fa-download me-sm-2"></span>
                <a href="{{ route('magasin.commande.pdf',$order->slug) }}" class="d-none d-sm-inline-block">Telecherger</a>
              </button>
              <button class="btn btn-phoenix-primary">
                <span class="fa-solid fa-print me-sm-2"></span>
                <span class="d-none d-sm-inline-block">Imprimer</span>
              </button>
              <button class="btn btn-phoenix-success">
                <span class="fa-solid fa-share me-sm-2"></span>
                <span class="d-none d-sm-inline-block">Partager par email</span>
              </button>
            </div>
          </div>
          <div class="bg-body dark__bg-gray-1100 p-4 mb-4 rounded-2">
            <div class="row g-4">
              <div class="col-12 col-lg-3">
                <div class="row g-4 g-lg-2">
                  <div class="col-12 col-sm-6 col-lg-12">
                    <div class="row align-items-center g-0">
                      <div class="col-auto col-lg-6 col-xl-5">
                        <h6 class="mb-0 me-3">Invoice No :</h6>
                      </div>
                      <div class="col-auto col-lg-6 col-xl-7">
                        <p class="fs-9 text-body-secondary fw-semibold mb-0">{{ $order->num_invoice }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-lg-12">
                    <div class="row align-items-center g-0">
                      <div class="col-auto col-lg-6 col-xl-5">
                        <h6 class="me-2">Invoice Date :</h6>
                      </div>
                      <div class="col-auto col-lg-6 col-xl-7">
                        <p class="fs-9 text-body-secondary fw-semibold mb-0">{{date('d-m-Y', strtotime( $order->payment_created_at ))}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-5">
                <div class="row g-4 gy-lg-5">
                  <div class="col-12 col-lg-8">
                    <h6 class="mb-2 me-3">Vendu par :</h6>
                    <p class="fs-9 text-body-secondary fw-semibold mb-0">{{$authName}}<br />{{$order->magasin->adresse}}</p>
                  </div>
                  <div class="col-12 col-lg-4">
                    <h6 class="mb-2"> PAN No :</h6>
                    <p class="fs-9 text-body-secondary fw-semibold mb-0">XVCJ963782008</p>
                  </div>
                  <div class="col-12 col-lg-4">
                    <h6 class="mb-2"> Bon de commande </h6>
                    <p class="fs-9 text-body-secondary fw-semibold mb-0">@if($order->bon_commande != '') {{$order->bon_commande}} @else Pas de bon @endif</p>
                  </div>
                  <div class="col-12 col-lg-4">
                    <h6 class="mb-2"> Commande No :</h6>
                    <p class="fs-9 text-body-secondary fw-semibold mb-0">{{$order->order}}</p>
                  </div>
                  <div class="col-12 col-lg-4">
                    <h6 class="mb-2"> Commande Date :</h6>
                    <p class="fs-9 text-body-secondary fw-semibold mb-0">{{date('d-m-Y', strtotime( $order->date ))}}</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="row g-4">
                  <div class="col-12 col-lg-6">
                    <h6 class="mb-2"> Adresse de facturation:</h6>
                    <div class="fs-9 text-body-secondary fw-semibold mb-0">
                      <p class="mb-2">{{$order->magasin->name}},</p>
                      <p class="mb-2">{{$order->magasin->adresse}}</p>
                      <p class="mb-2">{{$order->magasin->email}}</p>
                      <p class="mb-0">{{$order->magasin->phone}}</p>
                    </div>
                  </div>
                  <div class="col-12 col-lg-6">
                    <h6 class="mb-2"> Adresse de livraison:</h6>
                    <div class="fs-9 text-body-secondary fw-semibold mb-0">
                      <p class="mb-2">@if($order->user_id == '' && $order->client_id == '') {{ $order->name }} @elseif($order->user_id != '') {{ $order->user->name }} @elseif($order->client_id != '') {{ $order->client->name }} @endif,</p>
                      <p class="mb-2">@if($order->user_id == '' && $order->client_id == '') {{ $order->adresse }} @elseif($order->user_id != '') {{ $order->user->adresse }} @elseif($order->client_id != '') {{ $order->client->adresse }} @endif</p>
                      <p class="mb-2">@if($order->user_id == '' && $order->client_id == '') {{ $order->email }} @elseif($order->user_id != '') {{ $order->user->email }} @elseif($order->client_id != '') {{ $order->client->email }} @endif</p>
                      <p class="mb-0">@if($order->user_id == '' && $order->client_id == '') {{ $order->phone }} @elseif($order->user_id != '') {{ $order->user->phone }} @elseif($order->client_id != '') {{ $order->client->phone }} @endif</p>
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
                    <th scope="col" style="min-width: 360px;">Designation</th>
                    <th class="text-end" scope="col" style="width: 100px;"></th>
                    <th class="text-end" scope="col" style="width: 100px;"></th>
                    <th class="text-end" scope="col" style="width: 100px;"></th>
                    <th class="text-end" scope="col" style="width: 80px;">Quantites</th>
                    <th class="text-end" scope="col" style="width: 100px;"></th>
                    <th class="text-end" scope="col" style="width: 150px;">Prix unitaire</th>
                    <th class="text-end" scope="col" style="width: 100px;"></th>
                    <th class="text-end" scope="col" style="min-width: 100px;">Prix total</th>
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
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="align-middle text-center text-body-highlight fw-semibold">{{$product[3]}}</td>
                      <td></td>
                      <td class="align-middle text-center fw-semibold">{{$product[2]}}</td>
                      <td></td>
                      <td class="align-middle text-end fw-semibold">{{$product[2] * $product[3]}} CFA</td>
                      <td class="border-0"></td>
                    </tr>
                  @endforeach
                  {{--
                  <tr class="bg-body-secondary">
                    <td></td>
                    <td class="align-middle fw-semibold" colspan="9">Subtotal</td>
                    <td class="align-middle text-end fw-bold">$398</td>
                    <td></td>
                  </tr>
                  --}}

                  <tr>
                    <td class="border-0"></td>
                  </tr>

                  {{--
                  <tr>
                    <td class="border-0"></td>
                    <td colspan="6"></td>
                    <td class="align-middle fw-bold ps-15" colspan="3">Shipping Cost</td>
                    <td class="align-middle text-end fw-semibold" colspan="1">$50</td>
                    <td class="border-0"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td colspan="6"></td>
                    <td class="align-middle fw-bold ps-15" colspan="2">Discount/Voucher</td>
                    <td class="align-middle text-end fw-semibold text-danger" colspan="2">-$50</td>
                    <td></td>
                  </tr>
                  --}}

                  <tr class="bg-body-secondary">
                    <td class="align-middle ps-4 fw-bold text-body-highlight" colspan="3">Grand Total</td>
                    <td class="align-middle fw-bold text-body-highlight" colspan="7">Trois cent vingt-huit USD</td>
                    <td class="align-middle text-end fw-bold">{{ $order->amount }}</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="text-end py-9 border-bottom"><img class="mb-3" src="../../../assets/img/logos/phoenix-mart.png" alt="" />
              <h4>Signataire autorisé</h4>
            </div>
            <div class="text-center py-4 mb-9">
              <p class="mb-0">Merci d'avoir choisi notre boutique</p>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <button class="btn btn-primary"><span class="fa-solid fa-bag-shopping me-2"></span>Browse more items</button>
            <div>
              <button class="btn btn-phoenix-secondary me-2">
                <span class="fa-solid fa-download me-sm-2"></span>
                <span class="d-none d-sm-inline-block">Telecherger</span>
              </button>
              <button class="btn btn-phoenix-primary">
                <span class="fa-solid fa-print me-sm-2"></span>
                <span class="d-none d-sm-inline-block">Imprimer</span>
              </button>
              <button class="btn btn-phoenix-success">
                <span class="fa-solid fa-share me-sm-2"></span>
                <span class="d-none d-sm-inline-block">Partager par email</span>
              </button>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->





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
