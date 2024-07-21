@extends('layouts.app',['title' => 'magasin-affichage des commande'])

@section('main-content')
<div class="content">
        <div class="mb-9">
          <h2 class="mb-0">Commande <span> Nº {{ $order->order }}</span></h2>
          <div class="d-sm-flex flex-between-center mb-3">
            <p class="text-body-secondary lh-sm mb-0 mt-2 mt-sm-0">
              Client : <a class="fw-bold" href="#!" style="margin-right: 15px;">  @if($order->user_id == '') {{ $order->name }} @else {{ $order->user->name }} @endif</a>
              Telepone : <a class="fw-bold" href="#!"> @if($order->user_id == '') {{ $order->phone }} @else {{ $order->user->phone }} @endif</a>
            </p>
            <div class="d-flex"><button class="btn btn-link pe-3 ps-0 text-body"><span class="fas fa-print me-2"></span>Print</button><button class="btn btn-link px-3 text-body"><span class="fas fa-undo me-2"></span>Refund</button>
              <div class="dropdown"><button class="btn text-body dropdown-toggle dropdown-caret-none ps-3 pe-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">More action<span class="fas fa-chevron-down ms-2"></span></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row g-5 gy-7">
            <div class="col-12 col-xl-8 col-xxl-9">
              <div id="orderTable" data-list='{"valueNames":["products","color","size","price","quantity","total"],"page":10}'>
                <div class="table-responsive scrollbar">
                  <table class="table fs-9 mb-0 border-top border-translucent">
                    <thead>
                      <tr>
                        <th class="sort white-space-nowrap align-middle fs-10" scope="col"></th>
                        <th class="sort white-space-nowrap align-middle" scope="col" style="min-width:200px;" data-sort="products">PRODUCTS</th>
                        <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:100px;">PRICE</th>
                        <th class="sort align-middle text-end ps-4" scope="col" data-sort="quantity" style="width:100px;">QUANTITY</th>
                        <th class="sort align-middle text-end ps-4" scope="col" data-sort="total" style="width:100px;">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody class="list" id="order-table-body">
                      @foreach(unserialize($order->products) as $product)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="align-middle white-space-nowrap py-2"><a class="d-block border border-translucent rounded-2" href="../landing/product-details.html"><img src="{{Storage::url($product[0])}}" alt="" width="53" /></a></td>
                          <td class="products align-middle py-0"><a class="fw-semibold line-clamp-2 mb-0" href="../landing/product-details.html">{{$product[1]}}</a></td>
                          <td class="price align-middle text-body fw-semibold text-end py-0 ps-4">{{$product[2]}}</td>
                          <td class="quantity align-middle text-end py-0 ps-4 text-body-tertiary">{{$product[3]}}</td>
                          <td class="total align-middle fw-bold text-body-highlight text-end py-0 ps-4" style="width: 100%;">{{$product[2] * $product[3]}} CFA</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="d-flex flex-between-center py-3 border-bottom border-translucent mb-6">
                <p class="text-body-emphasis fw-semibold lh-sm mb-0">Montant total :</p>
                <p class="text-body-emphasis fw-bold lh-sm mb-0">{{ $order->amount }}</p>
              </div>
            </div>
            <div class="col-12 col-xl-4 col-xxl-3">
              <div class="row">
                {{--
                  <div class="col-12">
                    <div class="card mb-3">
                      <div class="card-body">
                        <h3 class="card-title mb-4">Résumé</h3>
                        <div>
                          <div class="d-flex justify-content-between">
                            <p class="text-body fw-semibold">Nombre d'articles :</p>
                            <p class="text-body-emphasis fw-semibold">{{ $order->count() }}</p>
                          </div>
                          <div class="d-flex justify-content-between">
                            <p class="text-body fw-semibold">Discount :</p>
                            <p class="text-danger fw-semibold">-$59</p>
                          </div>
                          <div class="d-flex justify-content-between">
                            <p class="text-body fw-semibold">Tax :</p>
                            <p class="text-body-emphasis fw-semibold">$126.20</p>
                          </div>
                          <div class="d-flex justify-content-between">
                            <p class="text-body fw-semibold">Subtotal :</p>
                            <p class="text-body-emphasis fw-semibold">$665</p>
                          </div>
                          <div class="d-flex justify-content-between">
                            <p class="text-body fw-semibold">Shipping Cost :</p>
                            <p class="text-body-emphasis fw-semibold">$30</p>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between border-top border-translucent border-dashed pt-4">
                          <h4 class="mb-0">Total :</h4>
                          <h4 class="mb-0">$695.20</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                --}}
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="card-title mb-4">Statut de la commande</h3>
                      <h6 class="mb-2">Payment status</h6><select class="form-select mb-4" aria-label="delivery type">
                        <option value="cod">Processing</option>
                        <option value="card">Canceled</option>
                        <option value="paypal">Completed</option>
                      </select>
                      <h6 class="mb-2">Fulfillment status</h6><select class="form-select" aria-label="delivery type">
                        <option value="cod">Unfulfilled</option>
                        <option value="card">Fulfilled</option>
                        <option value="paypal">Pending</option>
                      </select>
                    </div>
                  </div>
                </div>
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