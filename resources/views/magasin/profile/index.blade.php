@extends('layouts.app',['title' => 'magasin-profile'])

@section('main-content')
  <div class="content">
    <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
        <h2 class="mb-0">Profile</h2>
      </div>
      {{--
      <div class="col-auto">
        <div class="row g-2 g-sm-3">
          <div class="col-auto"><button class="btn btn-phoenix-danger"><span class="fas fa-trash-alt me-2"></span>Delete customer</button></div>
          <div class="col-auto"><button class="btn btn-phoenix-secondary"><span class="fas fa-key me-2"></span>Reset password</button></div>
        </div>
      </div>
      --}}
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
                  <h5 class="text-body-highlight mb-0">Telephone</h5>
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
           <li class="nav-item"><a class="nav-link text-nowrap active" id="personal-info-tab" data-bs-toggle="tab" href="#tab-personal-info" role="tab" aria-controls="tab-personal-info" aria-selected="true"><span class="fas fa-user me-2"></span>Informations Personnelles</a></li>
        </ul>
      </div>
      <div class="tab-content" id="profileTabContent">
        <div class="tab-pane fade show active" id="tab-personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
          <form method="POST" action="{{ route('magasin.profile.update',0) }}">
            @csrf
            @method('PUT')
            <div class="row g-3 mb-5">
              <div class="col-12 col-lg-6">
                <label class="form-label text-body-highlight fs-8 ps-0 text-lowercase lh-sm" for="admin_name">Votre Prenom et nom</label>
                <input id="admin_name" type="text" placeholder="Votre Prenom et nom" class="form-control @error('admin_name') is-invalid @enderror" name="admin_name" value="{{ old('admin_name') ?? Auth::guard('magasin')->user()->admin_name }}" required autocomplete="admin_name" autofocus>
                @error('admin_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-12 col-lg-6">
                <label class="form-label text-body-highlight fs-8 ps-0 text-lowercase  lh-sm" for="shop_name">Le nom de votre boutique</label>
                <input id="shop_name" type="text" placeholder="Le nom de votre boutique" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" value="{{ old('shop_name') ?? Auth::guard('magasin')->user()->name }}" required autocomplete="shop_name" autofocus>

                @error('shop_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-12 col-lg-6">
                <label class="form-label text-body-highlight fs-8 ps-0 text-lowercase lh-sm" for="email">adresse Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? Auth::guard('magasin')->user()->email }}" placeholder="email@gmail.com" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-12 col-lg-6">
                <label class="form-label text-body-highlight fw-bold fs-8 ps-0 text-lowercase lh-sm" for="phone">telePhone</label>
                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? Auth::guard('magasin')->user()->phone }}" placeholder="Votre numero de telephone" required autocomplete="phone">

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
             
              <div class="col-12 col-lg-6">
                <label class="form-label text-body-highlight fw-bold fs-8 ps-0 text-lowercase lh-sm" for="adresse">adresse de localisation</label>
                <input id="adresse" type="adresse" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') ?? Auth::guard('magasin')->user()->adresse }}" placeholder="Votre adresse de localisation" required autocomplete="adresse">
                  @error('adresse')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="col-12 col-lg-6" style="padding-left: 2rem;">
                <label class="form-label text-body-highlight fs-8 ps-0 text-lowercase lh-sm" for="visible">Visubilite</label> <br>
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
              
              <div class="col-12 col-lg-6">
                <label class="form-label text-body-highlight fw-bold fs-8 ps-0 text-lowercase lh-sm" for="password">modifier votre Mot de passe</label>
                <input id="password" type="password" placeholder="Votre mot de passe" class="form-icon-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">   
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-12 col-lg-6">
                <label class="form-label text-body-highlight fw-bold fs-8 ps-0 text-lowercase lh-sm" for="confirmPassword">Confirmer le mot de passe</label>
                <input id="password-confirm" type="password" class="form-icon-input form-control" placeholder="Confirmer votre mot de passe" name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-primary px-7">Enregistre les modifications</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection