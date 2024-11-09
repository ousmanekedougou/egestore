@extends('layouts.app',['title' => 'clients fideles'])

@section('main-content')
  <div class="content">
    <div class="mb-9">
      <div class="row g-2 mb-4">
        <div class="col-auto">
          <h2 class="mb-0">Mes clients fidèles</h2>
        </div>
      </div>
      <div id="products" data-list='{"valueNames":["customer","email","total-orders","total-spent","city","last-seen","last-order"],"page":10,"pagination":true}'>
        <div class="mb-4">
          <div class="row g-3">
            <div class="col-auto">
              <div class="search-box">
                <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="rechercher un client" aria-label="Search" />
                  <span class="fas fa-search search-box-icon"></span>
                </form>
              </div>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                  <span class="fas fa-plus me-2"></span>Ajouter un client
                </button>
            </div>
          </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
          <div class="table-responsive scrollbar-overlay mx-n1 px-1">
            <table class="table table-sm fs-9 mb-0">
              <thead>
                <tr>
                  <th class="sort align-middle pe-5" scope="col" data-sort="customer" style="width:10%;">CLIENTS</th>
                  <th class="sort align-middle pe-5" scope="col" data-sort="email" style="width:20%;">EMAIL</th>
                  <th class="sort align-middle text-end" scope="col" data-sort="total-orders" style="width:10%">TELEPHONES</th>
                  <th class="sort align-middle text-end" scope="col" data-sort="total-spent" style="width:15%">COMMANDES</th>
                  <th class="sort align-middle ps-7" scope="col" data-sort="city" style="width:25%;">VILLES</th>
                  <th class="sort align-middle text-end pe-0" scope="col" data-sort="last-order" style="width:10%;min-width: 150px;">STATUS</th>
                  <th class="sort align-middle text-end pe-0" scope="col" data-sort="last-order" style="width:10%;min-width: 150px;">MONTANT</th>
                  <th class="sort align-middle text-end pe-0" scope="col" data-sort="last-order" style="width:10%;min-width: 150px;">MT-ACTIFS</th>
                  <th class="sort align-middle text-end pe-0" scope="col" data-sort="last-seen" style="width:10%;min-width: 150px;">MT-CREDITS</th>
                  <th class="sort align-middle text-end pe-0" scope="col" data-sort="last-order" style="width:10%;min-width: 150px;">ACTIONS</th>
                </tr>
              </thead>
              <tbody class="list" id="customers-table-body">
                @foreach($clients as $client)
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <td class="customer align-middle white-space-nowrap pe-5"><a class="d-flex align-items-center text-body-emphasis" href="{{ route('magasin.client.edit',$client->id) }}">
                      <div class="avatar avatar-m"><img class="rounded-circle" src="https://ui-avatars.com/api/?name={{$client->name}}" alt="" /></div>
                      <p class="mb-0 ms-3 text-body-emphasis fw-bold">{{ $client->name }}</p>
                    </a></td>
                  <td class="email align-middle white-space-nowrap pe-5"><a class="fw-semibold" href="mailto:{{$client->email}}">{{$client->email}}</a></td>
                  <td class="total-orders align-middle white-space-nowrap fw-semibold text-center text-body-highlight">{{ $client->phone }}</td>
                  <td class="total-orders align-middle white-space-nowrap fw-semibold text-center text-body-highlight">{{ $client->getOrderCount($client->id) }}</td>
                  <td class="city align-middle white-space-nowrap text-body-highlight ps-7">Ville</td>
                  <td class="last-order align-middle white-space-nowrap text-body-tertiary text-end">
                    <span class="badge badge-phoenix fs-10 @if($client->account == 1) badge-phoenix-info @elseif($client->account == 2) badge-phoenix-warning @else badge-phoenix-success @endif"> 
                      @if($client->account == 1) Actif @elseif($client->account == 2) Passif @else Neutre @endif
                      <span class="ms-1" 
                        @if($client->account == 1)
                          data-feather="chevrons-right"
                        @elseif($client->account == 2)
                          data-feather="x"
                        @else 
                          data-feather="check" 
                        @endif
                        style="height:12.8px;width:12.8px;">
                      </span> 
                    </span>
                  </td>
                  <td class="last-order align-middle white-space-nowrap text-body-tertiary text-end">{{$client->getAmount()}}</td>
                  <td class="last-order align-middle white-space-nowrap text-body-tertiary text-end">{{$client->getDepot()}}</td>
                  <td class="last-order align-middle white-space-nowrap text-body-tertiary text-end">{{$client->getCredit()}}</td>
                  <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                    <span class="me-2 text-success" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight-{{ $client->id }}" aria-controls="offcanvasRight-{{ $client->id }}" data-feather="edit-3" data-fa-transform="shrink-3"></span>
                    @if($client->account == 3)
                      <span class="me-2 text-danger" data-bs-toggle="modal" data-bs-target="#DeleteCompte-{{ $client->id }}" data-feather="trash-2" data-fa-transform="shrink-3"></span>
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

    <div class="card-body p-0">
      <div class="p-4 code-to-copy">
        <!-- Right Offcanvas-->
        <div class="offcanvas offcanvas-end" id="offcanvasRight" tabindex="-1" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Ajouter un nouveau client</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <form method="POST" action="{{ route('magasin.client.store') }}">
              @csrf
              <div class="mb-3 text-start">
                  <label class="form-label" for="name">Prenom et nom du client</label>
                  <input id="name" type="text" placeholder="Prenom et nom du client" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>


              <div class="mb-3 text-start">
                  <label class="form-label" for="email">Adresse email du client</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email@gmail.com" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>


              <div class="mb-3 text-start">
                  <label class="form-label" for="phone">Numero de telephone du client</label>
                  <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Numero de telephone du client" required autocomplete="phone">

                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="mb-3 text-start">
                <label class="form-label" for="email">Status du montant du compte</label> <br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-success @error('account') is-invalid @enderror" onchange="enableBrand(this)"  id="inlineRadio1" type="radio" name="account" value=" 1 ">
                  <label class="form-check-label text-success mt-1" for="inlineRadio1">Actif</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-warning @error('account') is-invalid @enderror" onchange="enableBrand(this)"  id="inlineRadio2" type="radio" name="account" value=" 2 ">
                  <label class="form-check-label text-warning mt-1" for="inlineRadio2">Passif</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-primary @error('account') is-invalid @enderror" onchange="enableBrand(this)"  id="inlineRadio3" type="radio" name="account" value=" 3 ">
                  <label class="form-check-label text-primary mt-1" for="inlineRadio3">Neutre</label>
                </div>
                @error('account')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3 text-start d-none" id="clientNone">
                <label class="form-label" for="amount">Montant Actif/passif a deposer</label>
                <input id="amount" type="numeric" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" placeholder="Montant actif/passif a deposer" autocomplete="amount">

                @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer ce client</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @foreach($clients as $client)
      <div class="card-body p-0">
        <div class="p-4 code-to-copy">
          <!-- Right Offcanvas-->
          <div class="offcanvas offcanvas-end" id="offcanvasRight-{{ $client->id }}" tabindex="-1" aria-labelledby="offcanvasRightLabel-{{ $client->id }}">
            <div class="offcanvas-header">
              <h5 id="offcanvasRightLabel">Modification d'un client</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            
            <div class="offcanvas-body">
              <div class="row mb-3">
                <div class="col-xl-12 col-xxl-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row align-items-center g-3 mb-3">
                        <div class="col-12 col-sm-auto flex-1">
                          <div class="d-md-flex d-xl-block align-items-center justify-content-between mb-5">
                            <div class="d-flex align-items-center mb-3 mb-md-0 mb-xl-3">
                              <div class="avatar avatar-xl me-3"><img class="rounded-circle" src="https://ui-avatars.com/api/?name={{$client->name}}" alt="" /></div>
                              <div>
                                <h5>{{ $client->name }}</h5>
                                <div style="width: 100%;">
                                  <span class="badge badge-phoenix @if($client->account == 1) badge-phoenix-info @elseif($client->account == 2) badge-phoenix-warning @else badge-phoenix-success @endif mt-2 me-2">
                                    @if($client->account == 1) Compte actif @elseif($client->account == 2) Compte passif @else Compte neutre @endif
                                  </span>
                                  <span class="badge badge-phoenix badge-phoenix-secondary">
                                  @if($client->account == 1) Depot : {{ $client->getDepot() }} @elseif($client->account == 2) Credit  : {{ $client->getCredit() }} @else Montant  : {{ $client->getAmount() }} @endif
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          @if ($client->account == 2)
                          <div class="progress mb-2" style="height:5px">
                            <div class="progress-bar bg-primary-lighter" data-bs-theme="light" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0"> Montant @if($client->account == 1) actif depenser @elseif($client->account == 2) des reglages @endif</p>
                            <div>
                              <span class="d-inline-block lh-sm me-1" data-feather="money" style="height:16px;width:16px;"></span>
                              <span class="d-inline-block lh-sm"> {{ $client->getAmount() }}</span>
                            </div>
                          </div>

                          <div class="d-flex align-items-center justify-content-between bg-primary-lighter mt-3 p-1">
                            <p class="mb-0"> Il vous reste a paye </p>
                            <div>
                              <span class="d-inline-block lh-sm me-1" data-feather="money" style="height:16px;width:16px;"></span>
                              <span class="d-inline-block lh-sm"> {{ $client->credit - $client->amount }}</span>
                            </div>
                          </div>
                          @endif
                        </div>
                      </div>
                      @if ($client->account == 2)
                      <div class="table-responsive scrollbar">
                        <table class="reports-details-chart-table table table-sm fs-9 mb-0">
                          <thead>
                            <tr>
                              <th class="align-middle pe- text-body-tertiary fw-bold fs-10 text-uppercase text-nowrap" scope="col" style="width:35%;">Date de paiement</th>
                              <th class="align-middle text-end ps-4 text-body-tertiary fw-bold fs-10 text-uppercase" scope="col" style="width:30%;">Montant payer</th>
                            </tr>
                          </thead>
                          <tbody class="list" id="report-data-body">
                            @foreach ($client->payments as $payment)
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="align-middle white-space-nowrap fw-semibold text-body-highlight py-2">{{ date("d-m-Y", strtotime($payment->date)) }}</td>
                                <td class="align-middle text-end white-space-nowrap ps-4 fw-semibold text-body-highlight"><span class="badge badge-phoenix badge-phoenix-info">{{ $payment->getAmount() }}</span></td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <form method="POST" action="{{ route('magasin.client.update',$client->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3 text-start">
                    <label class="form-label" for="name">Prenom et nom du client</label>
                    <input id="name" type="text" placeholder="Prenom et nom du client" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $client->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label" for="email">Adresse email du client</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $client->email }}" placeholder="email@gmail.com" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label" for="phone">Numero de telephone du client</label>
                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $client->phone }}" placeholder="Numero de telephone du client" required autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 text-start">
                  @if($client->account == 2)
                    <label class="form-label mb-1" for="amount">Entrer la tranche de reglage</label>
                    <input id="amount" type="number" class="form-control  @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount')  }}" placeholder="Entrer la tranche de reglage" required autocomplete="amount">
                  @elseif($client->account == 3)
                    <div class="mb-2">
                      <label class="form-label" for="email">Status du montant du compte</label> <br>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input text-success @error('account') is-invalid @enderror" id="inlineRadioEditA-{{ $client->id }}" type="radio" name="account" value=" 1 ">
                        <label class="form-check-label text-success mt-1" for="inlineRadioEditA-{{ $client->id }}">Actif</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input text-warning @error('account') is-invalid @enderror" id="inlineRadioEditB-{{ $client->id }}" type="radio" name="account" value=" 2 ">
                        <label class="form-check-label text-warning mt-1" for="inlineRadioEditB-{{ $client->id }}">Passif</label>
                      </div>
                      @error('account')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
                    <div class="mb-3 text-start">
                      <label class="form-label" for="amount">Montant Actif/passif a deposer</label>
                      <input id="amount" type="numeric" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" placeholder="Montant actif/passif a deposer" autocomplete="amount">
                      
                      @error('amount')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  @endif
                </div>

                <button class="btn btn-primary w-100 mb-3" type="submit">Enreistrer les modification</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach


    @foreach($clients as $client)
      <div class="modal fade" id="DeleteCompte-{{ $client->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel">Suppresion de client</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
            </div>
            <form action="{{ route('magasin.client.destroy',$client->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-3"> Etes vous sure de bien vouloire supprimer le client {{$client->name}} </p>
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

<script>
   function enableBrand(answer){
        if (answer.value == 1 || answer.value == 2) {
            document.getElementById('clientNone').classList.remove('d-none')
        }else{
            document.getElementById('clientNone').classList.add('d-none')
        }
      }
</script>