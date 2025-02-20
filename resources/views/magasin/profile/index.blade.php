@extends('layouts.app',['title' => 'profile'])

@section('main-content')
  <div class="content">
    <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
        <h2 class="mb-0">Profile</h2>
      </div>
    </div>
    <div class="row g-3 mb-6">
      <div class="col-12 col-lg-8">
        <div class="card h-100">
          <div class="card-body">
            <div class="border-bottom border-dashed pb-4">
              <div class="row align-items-center g-3 g-sm-5 text-center text-sm-start">

                <div class="col-12 col-sm-auto">
                  <input id="image" type="file" class="form-control d-none @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <label class="cursor-pointer avatar avatar-5xl" for="image">
                    <img class="rounded-circle" src="@if(Auth::guard('magasin')->user()->image == '') https://ui-avatars.com/api/?name={{Auth::guard('magasin')->user()->admin_name}} @else {{(Storage::url(Auth::guard('magasin')->user()->image))}} @endif" alt="" />
                  </label>
                </div>
                <div class="col-12 col-sm-auto flex-1">
                  <h3>{{Auth::guard('magasin')->user()->admin_name}}</h3>
                  <p class="text-body-secondary">Joined 3 months ago</p>
                  <div><a class="me-2" href="#!"><span class="fab fa-linkedin-in text-body-quaternary text-opacity-75 text-primary-hover"></span></a><a class="me-2" href="#!"><span class="fab fa-facebook text-body-quaternary text-opacity-75 text-primary-hover"></span></a><a href="#!"><span class="fab fa-twitter text-body-quaternary text-opacity-75 text-primary-hover"></span></a></div>
                </div>
                <div class="col-12 col-sm-auto">
                  <input id="logo" type="file" class="form-control d-none @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}" required autocomplete="logo">
                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <label class="cursor-pointer avatar avatar-4xl" for="logo">
                    <img class="rounded-circle" src="@if(Auth::guard('magasin')->user()->logo == '') https://ui-avatars.com/api/?name={{Auth::guard('magasin')->user()->name}} @else {{(Storage::url(Auth::guard('magasin')->user()->logo))}} @endif" alt="" />
                    <h6 class="text-center text-bold mt-2">Votre logo</h6>
                  </label>
                </div>
              </div>
            </div>
            <div class="d-flex flex-between-center pt-4">
              <div>
                <h6 class="mb-2 text-body-secondary">Total agents</h6>
                <h4 class="fs-7 text-body-highlight mb-0 text-center">{{Auth::guard('magasin')->user()->agents->count()}}</h4>
              </div>
              <div class="text-end">
                <h6 class="mb-2 text-body-secondary">Total clients abonnés</h6>
                <h4 class="fs-7 text-body-highlight mb-0 text-center">{{Auth::guard('magasin')->user()->users->count()}}</h4>
              </div>
              <div class="text-end">
                <h6 class="mb-2 text-body-secondary">Total clients enrégistrés</h6>
                <h4 class="fs-7 text-body-highlight mb-0 text-center">{{Auth::guard('magasin')->user()->clients->count()}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="border-bottom border-dashed">
              <h4 class="mb-3">Adresse par défaut<button class="btn btn-link p-0" type="button"> <span class="fas fa-edit fs-9 ms-3 text-body-quaternary"></span></button></h4>
            </div>
            <div class="pt-4 mb-7 mb-lg-4 mb-xl-7">
              <div class="row justify-content-between">
                <div class="col-auto">
                  <h5 class="text-body-highlight">Address</h5>
                </div>
                <div class="col-auto">
                  <p class="text-body-secondary">{{Auth::guard('magasin')->user()->adresse}}</p>
                </div>
              </div>
            </div>
            <div class="border-top border-dashed pt-4">
              <div class="row flex-between-center mb-2">
                <div class="col-auto">
                  <h5 class="text-body-highlight mb-0">Email</h5>
                </div>
                <div class="col-auto"><a class="lh-1" href="mailto:{{Auth::guard('magasin')->user()->email}}">{{Auth::guard('magasin')->user()->email}}</a></div>
              </div>
              <div class="row flex-between-center">
                <div class="col-auto">
                  <h5 class="text-body-highlight mb-0">Téléphone</h5>
                </div>
                <div class="col-auto"><a href="tel:{{Auth::guard('magasin')->user()->phone}}">{{Auth::guard('magasin')->user()->phone}}</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="scrollbar">
        <ul class="nav nav-underline fs-9 flex-nowrap mb-3 pb-1" id="myTab" role="tablist">
           <li class="nav-item"><a class="nav-link text-nowrap active" id="personal-info-tab" data-bs-toggle="tab" href="#tab-personal-info" role="tab" aria-controls="tab-personal-info" aria-selected="true"><span class="fas fa-user me-2"></span>Informations personnelles</a></li>
           <li class="nav-item"><a class="nav-link text-nowrap" id="coordonne-info-tab" data-bs-toggle="tab" href="#tab-coordonne-info" role="tab" aria-controls="tab-coordonne-info" aria-selected="true"><span class="fa fa-shopping-bag me-2"></span>Coordonnées du magasin</a></li>
           <li class="nav-item"><a class="nav-link text-nowrap" id="critere-info-tab" data-bs-toggle="tab" href="#tab-critere-info" role="tab" aria-controls="tab-critere-info" aria-selected="true"><span class="fab fa-readme me-2"></span>Critères du magasin</a></li>
           <li class="nav-item"><a class="nav-link text-nowrap" id="reseau-info-tab" data-bs-toggle="tab" href="#tab-reseau-info" role="tab" aria-controls="tab-reseau-info" aria-selected="true"><span class="fa fa-globe  me-2"></span>Réseaux sociaux</a></li>
        </ul>
      </div>
      <div class="tab-content" id="profileTabContent">

        <div class="tab-pane fade show mb-5 active" id="tab-personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
          <div class="col-12">
            <div class="card h-100">
              <div class="card-body">
                <form method="POST" action="{{ route('magasin.profile.update',Auth::guard('magasin')->user()->id) }}">
                  @csrf
                  @method('PUT')
                  <div class="row g-3 mb-5">
                    <div class="col-12 col-lg-6">
                      <label class="form-label text-body-highlight fs-8 ps-0 text-lowercase lh-sm" for="admin_name">Votre Prenom et nom</label>
                      <input id="admin_name" type="text" placeholder="Votre Prenom et nom" class="form-control @error('admin_name') is-invalid @enderror" name="admin_name" value="{{ old('admin_name') ?? Auth::guard('magasin')->user()->admin_name }}"  autocomplete="admin_name" autofocus>
                      @error('admin_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                      <label class="form-label text-body-highlight fs-8 ps-0 text-lowercase lh-sm" for="email">Votre adresse Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? Auth::guard('magasin')->user()->email }}" placeholder="email@gmail.com"  autocomplete="email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                      <label class="form-label text-body-highlight fw-bold fs-8 ps-0 text-lowercase lh-sm" for="phone">Votre numéro téléphone</label>
                      <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? Auth::guard('magasin')->user()->phone }}" placeholder="Votre numero de telephone"  autocomplete="phone">

                      @error('phone')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  
                    <div class="col-12 col-lg-6">
                      <label class="form-label text-body-highlight fw-bold fs-8 ps-0 text-lowercase lh-sm" for="adresse">Adrésse de localisation</label>
                      <input id="adresse" type="adresse" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') ?? Auth::guard('magasin')->user()->adresse }}" placeholder="Votre adresse de localisation"  autocomplete="adresse">
                        @error('adresse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col-12 col-lg-6">
                      <label class="form-label text-body-highlight fw-bold fs-8 ps-0 text-lowercase lh-sm" for="password">Votre mot de passe</label>
                      <input id="password" type="password" placeholder="Votre mot de passe" class="form-icon-input form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">   
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                      <label class="form-label text-body-highlight fw-bold fs-8 ps-0 text-lowercase lh-sm" for="confirmPassword">Confirmer le mot de passe</label>
                      <input id="password-confirm" type="password" class="form-icon-input form-control" placeholder="Confirmer votre mot de passe" name="password_confirmation"  autocomplete="new-password">
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary px-7">Enrégistrer les modifications</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade show mb-5 " id="tab-coordonne-info" role="tabpanel" aria-labelledby="coordonne-info-tab">
          <div class="col-12">
            <div class="card h-100">
              <div class="card-body">
                <form method="POST" action="{{ route('magasin.profile.update_coordoonne',Auth::guard('magasin')->user()->id) }}">
                  @csrf
                  @method('PUT')
                  <div class="row g-3 mb-5">
                    <div class="col-12 col-lg-6">
                      <label class="form-label text-body-highlight fs-8 ps-0 text-lowercase  lh-sm" for="shop_name">Le nom de votre magasin</label>
                      <input id="shop_name" type="text" placeholder="Le nom de votre magasin" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" value="{{ old('shop_name') ?? Auth::guard('magasin')->user()->name }}"  autocomplete="shop_name" autofocus>

                      @error('shop_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                      <label class="form-label text-body-highlight fw-bold fs-8 ps-0 text-lowercase lh-sm" for="shop_phone">Téléphone de votre magasin</label>
                      <input id="shop_phone" type="shop_phone" class="form-control @error('shop_phone') is-invalid @enderror" name="shop_phone" value="{{ old('shop_phone') ?? Auth::guard('magasin')->user()->shop_phone }}" placeholder="Téléphone de votre magasin"  autocomplete="shop_phone">

                      @error('shop_phone')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    
                    <div class="col-12 col-lg-6">
                      <label class="form-label text-body-highlight fs-8 ps-0 text-lowercase lh-sm" for="rccm">Registre de commerce de votre magasin</label>
                      <input id="rccm" type="text" placeholder="Registre de commerce" class="form-control @error('rccm') is-invalid @enderror" name="rccm" value="{{ old('rccm') ?? Auth::guard('magasin')->user()->registre_com }}"  autocomplete="rccm" autofocus>
                      @error('rccm')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                      <label class="form-label text-body-highlight fs-8 ps-0 text-lowercase  lh-sm" for="ninea">Ninea de votre magasin</label>
                      <input id="ninea" type="text" placeholder="NINEA" class="form-control @error('ninea') is-invalid @enderror" name="ninea" value="{{ old('ninea') ?? Auth::guard('magasin')->user()->ninea }}"  autocomplete="ninea" autofocus>

                      @error('ninea')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="col-12 col-lg-6">
                      <div class="row">
                        <div class="col-lg-9">
                          <label class="form-label text-body-highlight fs-8 ps-0 text-lowercase lh-sm" for="visible">Visibilité</label> <br>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input text-success @error('visible') is-invalid @enderror" @if(Auth::guard('magasin')->user()->visible == 1) checked="" @endif id="inlineRadioA" type="radio" name="visible" value=" 1 ">
                            <label class="form-check-label text-success" for="inlineRadioA">Publique</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input text-warning @error('visible') is-invalid @enderror" @if(Auth::guard('magasin')->user()->visible == 0) checked="" @endif id="inlineRadioB" type="radio" name="visible" value=" 0 ">
                            <label class="form-check-label text-warning" for="inlineRadioB">Privé</label>
                          </div>
                          @error('visible')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="col-lg-3">
                          <label class="form-label text-body-highlight fw-bold fs-8 ps-0 text-lowercase lh-sm" for="inv_at">Inventaire</label>
                          <input id="inv_at" type="numeric" class="form-control @error('inv_at') is-invalid @enderror" name="inv_at" value="{{ old('inv_at') ?? Auth::guard('magasin')->user()->inv_at }}"  autocomplete="inv_at">

                          @error('inv_at')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary px-7">Enrégistrer les modifications</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade show mb-5" id="tab-critere-info" role="tabpanel" aria-labelledby="critere-info-tab">
          <div class="col-12">
            <div class="card h-100">
              <div class="card-body">
                <form method="POST" action="{{ route('magasin.profile.update_critere',Auth::guard('magasin')->user()->id) }}">
                  @csrf
                  @method('PUT')
                  <h6 class="mb-4">Notre histoire</h6>
                  <textarea id="our_history" name="our_history" class="form-control @error('our_history') is-invalid @enderror mb-3" rows="4">
                    {!! $auth_about->our_history !!}
                  </textarea>
                  @error('our_history')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                  <h6 class="mb-4">Notre vision</h6>
                  <textarea id="our_vision" name="our_vision" class="form-control @error('our_vision') is-invalid @enderror mb-3" rows="4">{!! $auth_about->our_vision !!}</textarea>
                  @error('our_vision')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                  <h6 class="mb-4">Notre mission</h6>
                  <textarea id="our_mission" name="our_mission" class="form-control @error('our_mission') is-invalid @enderror mb-3" rows="4">{!! $auth_about->our_mission !!}</textarea>
                  @error('our_mission')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                  <h6 class="mb-4">Nos valeurs</h6>
                  <textarea id="our_values" name="our_values" class="form-control  @error('our_values') is-invalid @enderror mb-3" rows="4">{!! $auth_about->our_values !!}</textarea>
                  @error('our_values')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                  <button type="submit" class="btn btn-phoenix-primary w-100 mb-4">Enrégistrer les modifications</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade show mb-5" id="tab-reseau-info" role="tabpanel" aria-labelledby="reseau-info-tab">
          <div class="col-12">
            <div class="card h-100">
              <div class="card-body">
                <form method="POST" action="{{ route('magasin.profile.edit',0) }}">
                  @csrf
                  @method('PUT')

                  <div class="mb-6">
                    <h4 class="mb-4">Vos réseaux sociaux</h4>
                    <div class="row g-3">
                      <div class="col-12 col-sm-12">
                        <div class="form-icon-container">
                          <div class="form-floating">
                            <input class="form-control form-icon-input @error('facebook') is-invalid @enderror" value="{{ old('facebook') ?? $auth_reseau->facebook }}" name="facebook" id="facebook" type="text" placeholder="Facebook">
                            <label class="text-body-tertiary form-icon-label" for="facebook">Facebook</label>
                          </div>
                          <span class="fa-brands fa-facebook text-body fs-9 form-icon"></span>
                          @error('facebook')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 col-sm-12">
                        <div class="form-icon-container">
                          <div class="form-floating">
                            <input class="form-control form-icon-input @error('whatsapp') is-invalid @enderror" name="whatsapp" id="whatsapp" value="{{ old('whatsapp') ?? $auth_reseau->whatsapp }}" type="text" placeholder="whatsapp">
                            <label class="text-body-tertiary form-icon-label" for="whatsapp">whatsapp</label>
                          </div>
                          <span class="fa-brands fa-whatsapp text-body fs-9 form-icon"></span>
                          @error('whatsapp')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror 
                        </div>
                      </div>
                      <div class="col-12 col-sm-12">
                        <div class="form-icon-container">
                          <div class="form-floating">
                            <input class="form-control form-icon-input @error('instagram') is-invalid @enderror" value="{{ old('instagram') ?? $auth_reseau->instagram }}" name="instagram" id="instagram" type="text" placeholder="instagram">
                            <label class="text-body-tertiary form-icon-label" for="instagram">instagram</label>
                          </div>
                          <span class="fa-brands fa-instagram text-body fs-9 form-icon"></span>
                          @error('instagram')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 col-sm-12">
                        <div class="form-icon-container">
                          <div class="form-floating">
                            <input class="form-control form-icon-input @error('tiktok') is-invalid @enderror" value="{{ old('tiktok') ?? $auth_reseau->tiktok }}" name="tiktok" id="tiktok" type="text" placeholder="tiktok">
                            <label class="text-body-tertiary form-icon-label" for="tiktok">tiktok</label>
                          </div>
                          <span class="fa-brands fa-tiktok text-body fs-9 form-icon"></span>
                          @error('tiktok')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 col-sm-12">
                        <div class="form-icon-container">
                          <div class="form-floating">
                            <input class="form-control form-icon-input @error('twitter') is-invalid @enderror" value="{{ old('twitter') ?? $auth_reseau->twitter }}" name="twitter" id="twitter" type="text" placeholder="Twitter">
                            <label class="text-body-tertiary form-icon-label" for="twitter">Twitter</label>
                          </div>
                          <span class="fa-brands fa-twitter text-body fs-9 form-icon"></span>
                          @error('twitter')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 col-sm-12">
                        <div class="form-icon-container">
                          <div class="form-floating">
                            <input class="form-control form-icon-input @error('linkedin') is-invalid @enderror" value="{{ old('linkedin') ?? $auth_reseau->linkedin }}" name="linkedin" id="linkedin" type="text" placeholder="Linkedin">
                            <label class="text-body-tertiary form-icon-label" for="linkedin">linkedin</label>
                          </div>
                          <span class="fa-brands fa-linkedin-in text-body fs-9 form-icon"></span>
                          @error('linkedin')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 col-sm-12">
                        <div class="form-icon-container">
                          <div class="form-floating">
                            <input class="form-control form-icon-input @error('youtube') is-invalid @enderror" value="{{ old('youtube') ?? $auth_reseau->youtube }}" name="youtube" id="youtube" type="text" placeholder="youtube">
                            <label class="text-body-tertiary form-icon-label" for="youtube">youtube</label>
                          </div>
                          <span class="fa-brands fa-youtube text-body fs-9 form-icon"></span>
                          @error('youtube')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-phoenix-primary w-100 mb-4">Enrégistrer les modifications</button>
                </form>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>

    @include('layouts.footer_admin')


  </div>
@endsection
@section('footerSection')
@endsection