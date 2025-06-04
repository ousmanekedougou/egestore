<nav class="navbar navbar-vertical navbar-expand-lg">
    <script>
        var navbarStyle = window.config.config.phoenixNavbarStyle;
        if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">Gestion des achats</p>
                    <hr class="navbar-vertical-line" /><!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.autres-magasins.index') }} " href="{{ route('magasin.autres-magasins.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="briefcase" class="ms-1 me-1 fa-lg"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Autres magasins</span></span></div>
                        </a>
                    </div><!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.fournisseurs.create') }} " href="{{ route('magasin.fournisseurs.create') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="gift" class="ms-1 me-1 fa-lg"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Mes fournisseurs</span></span></div>
                        </a>
                    </div><!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.devis.index') }} " href="{{ route('magasin.devis.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="box" class="ms-1 me-1 fa-lg"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Devis de commandes reçues</span></span></div>
                        </a>
                    </div><!-- parent pages-->
                    
                    @if(Auth::guard('magasin')->user())
                        <p class="navbar-vertical-label">Gestion des agents</p>
                        <hr class="navbar-vertical-line" /><!-- parent pages-->
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1 {{ set_active_roote('magasin.agent.index') }} " href="{{ route('magasin.agent.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="user-check" class="ms-1 me-1 fa-lg"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Agents</span></span></div>
                            </a>
                        </div><!-- parent pages-->
                    @endif
                    <p class="navbar-vertical-label">Mes categories</p>
                    <hr class="navbar-vertical-line" /><!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.categorie.index') }}" href="{{ route('magasin.categorie.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="menu"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Catégories</span></span></div>
                        </a>
                    </div><!-- parent pages-->

                    <p class="navbar-vertical-label">Gestion des commandes</p>
                    <hr class="navbar-vertical-line" /><!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.commande.index') }}" href="{{ route('magasin.commande.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="shopping-bag"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Commandes</span></span></div>
                        </a>
                    </div><!-- parent pages-->

                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.reserve.index') }}" href="{{ route('magasin.reserve.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="file-plus"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Réservations</span></span></div>
                        </a>
                    </div><!-- parent pages-->

                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.bon.index') }}" href="{{ route('magasin.bon.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="file-text"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Bons de commandes</span></span></div>
                        </a>
                    </div><!-- parent pages-->

                    <p class="navbar-vertical-label">Gestion des clients</p>
                    <hr class="navbar-vertical-line" /><!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ set_active_roote('magasin.client.index') }}" href="{{ route('magasin.client.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="bell"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Abonnés</span></span></div>
                        </a>
                        <a class="nav-link label-1 {{ set_active_roote('magasin.agent.client') }}" href="{{ route('magasin.client.create') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="users"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Fideles clients</span></span></div>
                        </a>
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

                </li>
                {{--  
                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">Produits par catégorie</p>
                    <hr class="navbar-vertical-line" /><!-- parent pages-->
                    @foreach(allCategorieCommercial() as $category)
                        <div class="nav-item-wrapper">
                            <a class="nav-link dropdown-indicator label-1" href="#nv-e-commerce-{{ $category->id }}" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-e-commerce">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-indicator-icon">
                                        <span class="fas fa-caret-right"></span>
                                    </div><span class="nav-link-icon"><span data-feather="{{ $category->icon }}"></span></span><span class="nav-link-text">{{$category->name}}</span>
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
                --}}

                {{--
                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">Location par catégorie</p>
                    <hr class="navbar-vertical-line" /><!-- parent pages-->
                    @foreach(allCategorieLocation() as $category)
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
                --}}

                <p class="navbar-vertical-label">Vos avis</p>
                <div class="nav-item-wrapper">
                    <a class="nav-link label-1" href="#" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="git-merge"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Idées & Suggéstions</span></span></div>
                    </a>
                </div><!-- parent pages-->
            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <a href="{{ route('magasin.icons') }}" target="_blank" class="{{ set_active_roote('magasin.autres-magasins.index') }} btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center">
            <span data-feather="grid" class="fs-8"></span>
            <span class="navbar-vertical-footer-text ms-2">Sérvices icons</span>
        </a>
    </div>
</nav>



