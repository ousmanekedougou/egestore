<nav class="navbar navbar-vertical navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
            <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">Pages</p>
                    <hr class="navbar-vertical-line" /><!-- parent pages-->
                    @if(Auth::guard('magasin')->user())
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.agent.index') }} " href="{{ route('magasin.agent.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="user" class="ms-1 me-1 fa-lg"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Agents</span></span></div>
                        </a>
                    </div><!-- parent pages-->
                    @endif

                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.categorie.index') }}" href="{{ route('magasin.categorie.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="figma"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Catégories</span></span></div>
                        </a>
                    </div><!-- parent pages-->

                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.commande.index') }}" href="{{ route('magasin.commande.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="shopping-bag"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Commandes</span></span></div>
                        </a>
                    </div><!-- parent pages-->

                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.reserve.index') }}" href="{{ route('magasin.reserve.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="git-merge"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Réservations</span></span></div>
                        </a>
                    </div><!-- parent pages-->

                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.bon.index') }}" href="{{ route('magasin.bon.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="git-merge"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Clients pour bons</span></span></div>
                        </a>
                    </div><!-- parent pages-->

                    <div class="nav-item-wrapper">
                        @if(AuthMagasinAgentVisible() == 1)
                            <a class="nav-link label-1 {{ set_active_roote('magasin.client.index') }}" href="{{ route('magasin.client.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="users"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Clients abonnés</span></span></div>
                            </a>
                        @else
                            <a class="nav-link label-1 {{ set_active_roote('magasin.agent.client') }}" href="{{ route('magasin.client.create') }}" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="users"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Mes clients</span></span></div>
                            </a>
                        @endif
                    </div><!-- parent pages-->
                    {{--
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="#" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="git-merge"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Locations</span></span></div>
                        </a>
                    </div><!-- parent pages-->
                    
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="#" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="git-merge"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Pointages</span></span></div>
                        </a>
                    </div><!-- parent pages-->
                    --}}

                    @if(Cart::count() > 0)
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="{{ route('magasin.panier.create') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center text-warning"><span class="nav-link-icon"><span data-feather="shopping-cart"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Vider le panier</span></span></div>
                        </a>
                    </div>
                    @endif

                </li>
                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">Produits par</p>
                    <hr class="navbar-vertical-line" /><!-- parent pages-->
                    @foreach(allCategorie() as $category)
                        <div class="nav-item-wrapper">
                            <a class="nav-link dropdown-indicator label-1" href="#nv-e-commerce-{{ $category->id }}" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-e-commerce">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-indicator-icon">
                                        <span class="fas fa-caret-right"></span>
                                    </div><span class="nav-link-icon"><span data-feather="shopping-cart"></span></span><span class="nav-link-text">{{$category->name}}</span>
                                </div>
                            </a>
                            <div class="parent-wrapper label-1">
                                <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-e-commerce-{{ $category->id }}">
                                    <li class="collapsed-nav-item-title d-none">{{$category->name}}</li>
                                    @foreach($category->sub_categories as $subcategory)
                                        @if($subcategory->visible == 1)
                                            <li class="nav-item">
                                                <a class="nav-link dropdown-indicator {{ set_active_roote('magasin.produit.show') }}" href="{{ route('magasin.produit.show',$subcategory->slug) }}">
                                                    <span class="nav-link-text">{{$subcategory->name}}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div><!-- parent pages-->
                    @endforeach
                </li>
                
            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer"><button class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-8"></span><span class="uil uil-arrow-from-right fs-8"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button></div>
</nav>



