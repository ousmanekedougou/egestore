
<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
  <div class="collapse navbar-collapse justify-content-between">
    <div class="navbar-logo">
      <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
      <a class="navbar-brand me-1 me-sm-3" href="{{route('agent.home')}} ">
        <div class="d-flex align-items-center">
          <div class="d-flex align-items-center"><img src="@if(Auth::guard('agent')->user()->magasin->logo == '') https://ui-avatars.com/api/?name={{Auth::guard('agent')->user()->magasin->name}} @else {{(Storage::url(Auth::guard('agent')->user()->magasin->logo))}} @endif" width="27" />
            <p class="logo-text ms-2 d-none d-sm-block">{{Auth::guard('agent')->user()->magasin->name}}</p>
          </div>
        </div>
      </a>
      <nav class="ecommerce-navbar navbar-expand navbar-light bg-body-emphasis justify-content-between">
        <div class="container-small d-flex flex-between-center" data-navbar="data-navbar">
          <div class="dropdown"><button class="btn text-body ps-0 pe-5 text-nowrap dropdown-toggle dropdown-caret-none" data-category-btn="data-category-btn" data-bs-toggle="dropdown"><span class="fas fa-bars me-2"></span>Toutes vos categories</button>
            <div class="dropdown-menu border border-translucent py-0 category-dropdown-menu">
              <div class="card border-0 scrollbar" style="max-height: 657px;">
                <div class="card-body p-6 pb-3">
                  <div class="row gx-7 gy-5 mb-5">
                    @foreach(allCategorieCommercial() as $category)
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="d-flex align-items-center mb-3"><span class="text-primary me-2 {{ $category->icon }} fs-9" style="stroke-width:3;"></span>
                          <h6 class="text-body-highlight mb-0 text-nowrap">{{$category->name}}</h6>
                        </div>
                        <div class="ms-n2">
                            @foreach($category->sub_categories as $subcategory)
                              @if($subcategory->visible == 1)
                                <a class="text-body-emphasis d-block mb-1 text-decoration-none bg-body-highlight-hover px-2 py-1 rounded-2 {{ set_active_roote('magasin.produit.show') }}" href="{{ route('magasin.produit.show',$subcategory->slug) }}">{{$subcategory->name}}</a>
                              @endif
                            @endforeach
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <div class="text-center border-top border-translucent pt-3"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <ul class="navbar-nav navbar-nav-icons flex-row">
      <li class="nav-item">
        <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Changement de thème"><span class="icon" data-feather="moon"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Changement de thème"><span class="icon" data-feather="sun"></span></label></div>
      </li>

      <li class="nav-item">
        <a class="nav-link px-2 icon-indicator icon-indicator-primary" href="{{ route('magasin.panier.index') }}" role="button">
          <span class="text-body-tertiary" data-feather="shopping-cart" style="height:20px;width:20px;"></span>
          <span class="icon-indicator-number">{{ Cart::content()->count() }}</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link px-2 icon-indicator icon-indicator-success" href="#" style="min-width: 2.25rem" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside">
          <span class="far fa-bell" style="height:20px;width:20px;"></span>
          <span class="icon-indicator-number">{{ OrderNotification()->count() }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
          <div class="card position-relative border-0">
            <div class="card-header p-2">
              <div class="d-flex justify-content-between">
                <h5 class="text-body-emphasis mb-0">Notifications de commandes</h5>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="scrollbar-overlay" style="height: 27rem;">
                @foreach (OrderNotification() as $orderNotify)
                  <div class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                    <a href="{{ route('magasin.devis-produits.notify',$orderNotify->slug) }}">
                      <div class="d-flex align-items-center justify-content-between position-relative">
                        <div class="d-flex">
                          <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="@if($orderNotify->magasin->image != '') {{Storage::url($orderNotify->magasin->image)}} @else https://ui-avatars.com/api/?name={{ $orderNotify->magasin->name }} @endif" alt="" /></div>
                          <div class="flex-1 me-sm-3">
                            <h4 class="fs-9 text-body-emphasis">{{ $orderNotify->magasin->name }}</h4>
                            <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span class='me-1 fs-10'>💬</span>BC : {{ $orderNotify->bon_commande }}<span class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">{{date('d-m-Y', strtotime( $orderNotify->date ))}}</span></p>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="card-footer p-0 border-top border-translucent border-0">
              <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a class="fw-bolder" href="#">@if(OrderNotification()->count() == 0) Pas de nouvelles commandes @endif</a></div>
            </div>
          </div>
        </div>
      </li>
      


      <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-l ">
            <img class="rounded-circle " src="@if(Auth::guard('agent')->user()->image == '') https://ui-avatars.com/api/?name={{Auth::guard('agent')->user()->name}} @else {{(Storage::url(Auth::guard('agent')->user()->image))}} @endif" alt="" />
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border" aria-labelledby="navbarDropdownUser">
          <div class="card position-relative border-0">
            <div class="card-body p-0">
              <div class="text-center pt-4 pb-3">
                <div class="avatar avatar-xl ">
                  <img class="rounded-circle " src="@if(Auth::guard('agent')->user()->image == '') https://ui-avatars.com/api/?name={{Auth::guard('agent')->user()->name}} @else {{(Storage::url(Auth::guard('agent')->user()->image))}} @endif" alt="" />
                </div>
                <h6 class="mt-2 text-body-emphasis">{{ Auth::guard('agent')->user()->name }}</h6>
              </div>
            </div>
            <div class="overflow-auto scrollbar" style="height: 3rem;">
              <ul class="nav d-flex flex-column mb-2 pb-1">
                <li class="nav-item"><a class="nav-link px-3" href="{{ route('agent.profile.index') }}"> <span class="me-2 text-body" data-feather="user"></span><span>Profile</span></a></li>
              </ul>
            </div>
            <div class="card-footer p-0 border-top border-translucent">
              <div class="px-3 pb-3"> 
                <a class="btn btn-phoenix-secondary d-flex flex-center w-100 mt-3" href="{{ route('agent.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                  <span class="me-2" data-feather="log-out"> </span>Se deconecter
                </a>
                <form id="logout-form" action="{{ route('agent.logout') }}
                    "method="POST" class="d-none">
                    @csrf
                </form>
              </div>
            </div>
          </div>
        </div>
      </li>
      
    </ul>
  </div>
</nav>




