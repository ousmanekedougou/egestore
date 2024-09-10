

<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from webartinfo.com/templatemonster/billig/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jul 2024 16:08:06 GMT -->
<head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Facture de {{ $authName }}</title>
      <meta content="#" name="description">
      <meta content="#" name="keywords">
      <!-- Favicons -->
      <link href="assets/img/logo.png" rel="icon">
      <link href="assets/img/logo.png" rel="apple-touch-icon">
      <!-- Fontawesome -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
      <!-- Vendor CSS Files -->
      <link href="{{asset('assets/css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Template Main CSS File -->
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
   </head>
   <body class="bg-light">
      <body data-new-gr-c-s-check-loaded="14.995.0" data-gr-ext-installed="">
         <!-- Container --> 
         <div class="container-fluid Billig-container shadow-sm" id="print">
            <!-- Header -->
            <header>
               <div class="row align-items-center">
                  <div class="col-7 text-start mb-3 mb-sm-0">
                     <img id="logo" src="@if($order->magasin->logo == '') https://ui-avatars.com/api/?name={{$order->magasin->name}} @else {{(Storage::url($order->magasin->logo))}} @endif" title="{{$order->magasin->name}}" alt="{{$order->magasin->name}}">
                  </div>
                  <div class="col-5 text-end">
                     <h4 class="mb-0 text-uppercase">Facture</h4>
                     <p class="mb-0"><strong> Facture - Nº : </strong>{{ str_pad($order->order, 5, '0', STR_PAD_LEFT) }}</p>
                  </div>
               </div>
               <hr>
            </header>
            <!-- Main Content -->
            <main>
               <div class="row">
                  <div class="col-6"><strong>Date:</strong> {{date('d-m-Y', strtotime( $order->payment_created_at ))}}</div>
                  <div class="col-6 text-end"> <strong>BC :</strong> {{$order->bon_commande }}</div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-6 text-end order-sm-1">
                     <strong>Payez à : {{$authName}}, </strong>
                     <address>
                        {{$order->magasin->phone}}<br>
                        {{$order->magasin->adresse}}
                        <strong>Facture @if($order->type == 1 && $order->status == 1) paye @elseif($order->type == 2) à crédit @endif</strong>
                     </address>
                  </div>
                  <div class="col-6 order-sm-0">
                     <strong>Facturé à : @if($order->user_id == '' && $order->client_id == '') {{ $order->name }} @elseif($order->user_id != '') {{ $order->user->name }} @elseif($order->client_id != '') {{ $order->client->name }} @endif</strong>,
                     <address>
                        Telephone : @if($order->user_id == '' && $order->client_id == '') {{ $order->phone }} @elseif($order->user_id != '') {{ $order->user->phone }} @elseif($order->client_id != '') {{ $order->client->phone }} @endif<br>
                        
                        @if($order->type == 2)
                          @if($order->client_id != '')
                            Vérsement éfféctuer  : {{number_format($order->client->amount,2, ',','.') }}  CFA
                          @endif
                        @endif
                        
                     </address>
                  </div>
               </div>
               <div class="card">
                  <div class="card-body p-0">
                     <div class="table-responsive">
                        <table class="table mb-0">
                           <thead>
                           <tr>
                              <td class="col-3 border-0"><strong>Designations</strong></td>
                              <td></td>
                              <td class="col-1 border-0 text-center"><strong>Quantites</strong></td>
                              <td class="col-2 border-0 text-end"><strong>Prix unitaire</strong></td>
                              <td class="col-2 text-end border-0"><strong>Prix total</strong></td>
                           </tr>
                        </thead>
                           <tbody>
                            @foreach(unserialize($order->products) as $product)
                              <tr>
                                 <td class="col-3">{{$product[1]}}</td>
                                 <td></td>
                                 <td class="col-1 text-center">{{$product[3]}}</td>
                                 <td class="col-2 text-end">{{number_format($product[2],2, ',','.') }} CFA</td>
                                 <td class="col-2 text-end">{{number_format($product[2] * $product[3],2, ',','.') }} CFA</td>
                              </tr>
                            @endforeach
                            {{--
                              <tr>
                                 <td colspan="4" class="bg-light-2 text-end"><strong>Sub Total:</strong></td>
                                 <td class="bg-light-2 text-end">$1500.00</td>
                              </tr>
                            --}}
                            @if($order->type == 2)
                              @if($order->client_id != '')
                                <tr>
                                  <td colspan="4" class="bg-light-2 text-end"><strong>Vérsement éfféctuer :</strong></td>
                                  <td class="bg-light-2 text-end"> {{number_format($order->client->amount,2, ',','.') }} CFA</td>
                                </tr>
                              @endif
                            @endif
                              <tr>
                                 <td colspan="4" class="bg-light-2 text-end border-0"><strong>Total:</strong></td>
                                 <td class="bg-light-2 text-end border-0"> {{ $order->amount }} CFA</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </main>
            <!-- Footer -->
            <footer class="text-center mt-4">
               <p class="text-1"><strong> Merci d'avoir choisi notre boutique </strong></p>
                {{--
                  <div class="text-end py-9 border-bottom mb-4">
                    @if($order->status == 1)
                    <img class="mb-1" src="{{asset('assets/img/logos/payer.png')}}" alt="" />
                    @endif
                    <h6>Signataire autorisé</h6>
                  </div>
                --}}
               <div class="btn-group btn-group-sm d-print-none"> 
                  <a href="#" id="print_Button" onclick="printDiv()" class="btn btn-light border text-black-50 shadow-none ml-3"><i class="fa fa-print"></i> Imprimer
                  </a> <a href="#" class="btn btn-light border text-black-50 shadow-none mr-3"><i class="fa fa-download"></i> Télécharger</a> </div>
            </footer>
         </div>
      </body>
   <div id="preloader"></div>
   <!-- Vendor JS Files -->
   <script src="{{asset('assets/js/jquery/jquery.min.js')}}"></script>    
   <!-- Template Main JS File -->
   <script src="{{asset('assets/js/main.js')}}"></script>
   <script type="text/javascript">
        function printDiv(){
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
   </body>

<!-- Mirrored from webartinfo.com/templatemonster/billig/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jul 2024 16:08:10 GMT -->
</html>















{{-- 
  @extends('layouts.app',['title' => 'magasin-facture des commande'])
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
                      <tr class="bg-body-secondary">
                        <td></td>
                        <td class="align-middle fw-semibold" colspan="9">Subtotal</td>
                        <td class="align-middle text-end fw-bold">$398</td>
                        <td></td>
                      </tr>

                      <tr>
                        <td class="border-0"></td>
                      </tr>

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

                      <tr class="bg-body-secondary">
                        <td class="align-middle ps-4 fw-bold text-body-highlight" colspan="3">Grand Total</td>
                        <td class="align-middle fw-bold text-body-highlight" colspan="7">Trois cent vingt-huit USD</td>
                        <td class="align-middle text-end fw-bold">{{ $order->amount }}</td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="text-end py-9 border-bottom">
                  <img class="mb-3" src="{{asset('assets/img/logos/payer.png')}}" alt="" />
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

--}}