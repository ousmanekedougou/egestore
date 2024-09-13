@extends('layouts.app',['title' => 'comment ça marche'])
<meta name="msapplication-TileImage" content="{{asset('../assets/img/favicons/mstile-150x150.png')}}">
@section('main-content')
<div class="content" style="padding-left:6rem ;padding-right:6rem ;margin-top:-15px;">
  <h2 class="text-bold mb-5 page-title-sticky-top">Comment ça marche</h2>
  <div class="row gx-xl-8 gx-xxl-11">
    <div class="col-xl-5 p-xxl-7">
      <div class="ms-xxl-3 d-none d-xl-block position-sticky" style="top: 30%">
        <img class="d-dark-none img-fluid" src="../assets/img/spot-illustrations/timeline.png" alt="" />
        <img class="d-light-none img-fluid" src="../assets/img/spot-illustrations/timeline-dark.png" alt="" />
      </div>
    </div>
    <div class="col-xl-7 scrollbar" style="margin-top: -4rem;">
      <div>
        <h4 class="py-3 border-y mb-5 ms-8">Comptes commerçant</h4>
        <div class="timeline-basic mb-9">

          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-clipboard text-success fs-9"></span></div><span class="timeline-bar border-end border-dashed"></span>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Creation de votre compte</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>4:33pm</p>
                </div>
                <h6 class="fs-10 fw-normal mb-3">by <a class="fw-semibold" href="#!">John N. Ward</a></h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-3">
                  Pour creer un compte commerçant, clicker sur ce lien et enregistre les informations demande.
                  Tout en acceptant nos termes et politiques de confidentialites.
                </p>
                <p class="fs-9 text-body-secondary w-sm-60 mb-3">
                  Apres la validation de ces informations vous serez rediriger sur une page qui vous demande un code de validation que vous recevrez sur votre adresse email que vous 
                  avez renseigner lors de votre inscription.
                </p>
                <p class="fs-9 text-body-secondary w-sm-60 mb-5">
                  En fin apres cette etape vous accederez a la page de connexion pour les comptes commerçant.
                </p>
              </div>
            </div>
          </div>

          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-envelope text-danger fs-9"></span></div><span class="timeline-bar border-end border-dashed"></span>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Vos agents commerçiaux</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>6:30pm</p>
                </div>
                <h6 class="fs-10 fw-normal mb-3">Sérvices</h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-3">
                  Pour une fléxibilité de vos taches commerçiaux nous avons integres une possibilité d'ajouter des comptes agents dans votre compte
                  commerçant.
                </p>
                <p class="fs-9 text-body-secondary w-sm-60 mb-3">
                  Apres l'ajout d'un agent il recevra un email qui lui demandera d'activer son compte en cliquant sur un lient.
                </p>
                <p class="fs-9 text-body-secondary w-sm-60 mb-5">
                  L'agent commerçial aura des limtes dans l'application tel que la possibilités d'ajouter un agent, mais il feras tout 
                  les autres taches.
                </p>
              </div>
            </div>
          </div>

          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-envelope text-danger fs-9"></span></div><span class="timeline-bar border-end border-dashed"></span>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Géstion de vos produits</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>9:33pm</p>
                </div>
                <h6 class="fs-10 fw-normal false">Sérvices</h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-3">
                  Le sérvice géstion des produits s'effectue par une organisation par catégories et sous-catégories.
                  De ce fait vous ajouter les produit en les mettant dans leurs catégories respectifs.
                </p>
                <p class="fs-9 text-body-secondary w-sm-60 mb-3">
                  Une catégorie s'ajoute comme suit le nom de la catégorie, le status (Visible / Cacher) et le type (Commercial / Location).
                  <br>
                  Les sous-catégorie s'ajoutent de la même procedure que les catégories.
                </p>
                <p class="fs-9 text-body-secondary w-sm-60 mb-3">
                  Pour ajouter des produits vous passer par la listes des sous-categories dans la sidebar de droite, vous 
                  clicker sur le bouton ajouter un produit en suite renseigner les information du produit dans le formulaire
                  qui s'affiche et en fin enregistre le produit.
                </p>
                <p class="fs-9 text-warning w-sm-60 mb-5">
                  Remarque : Un produit, une categorie et une sous-categorie ne s'ajoutent qu'une seul a la fois.
                </p>
              </div>
            </div>
          </div>

          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-envelope text-danger fs-9"></span></div><span class="timeline-bar border-end border-dashed"></span>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Géstion de vos clients</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>9:33pm</p>
                </div>
                <h6 class="fs-10 fw-normal false">Sérvices</h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-3">
                  Vous avez la possibilité d'enrégistre et de gerer des clients fidèles ou abonnés. L'objéctif de ce sérvice
                  est de vous pérmettre d'avoir une facturation automatique et un gain de temps des commandes ou achats de vos clients.
                </p>

                <p class="fs-9 text-body-secondary w-sm-60 mb-3">
                  Un client fidèles est un client dont l'inscription est éfféctuée par vous en tant qu'administrateur de votre
                  entreprise en renséignant son prenom et nom, son adresse email, et son numero de téléphone. <br>
                </p>

                <p class="fs-9 text-body-secondary w-sm-60 mb-5">
                  Par contre le client abonné est un client qui s'abonne sur votre compte commerçant via son compte client.
                </p>

              </div>
            </div>
          </div>

          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-envelope text-danger fs-9"></span></div><span class="timeline-bar border-end border-dashed"></span>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Les systémes de ventes</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>9:33pm</p>
                </div>
                <h6 class="fs-10 fw-normal false">Sérvices</h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-3">
                  Nous faisons tout notre possible pour numeriser toutes les taches manuéles de votre entreprise.Ainsi nous avons 
                  integres quelques systémes de ventes tel que:
                  
                  <li class="fs-9 fw-normal mb-2">
                    Un systéme de résérvation de bon de commande qui s'oppere par enregistre le client beneficiare du bon 
                    en suite lui ajouer les produits pour chaque commande effectue, c'est la manoeuvre avec la géstion des produit de vente.
                  </li>
                  <li class="fs-9 fw-normal mb-2">
                    Un systéme enregistrement de facture a crédit, avec ce sérvice vos clients fidéls ou abonnés pourront prendre une 
                    commande a crédit et le paye par tranche ou au complet selon votre delais, il est tracable automatique et fléxible.
                  </li>
                  <li class="fs-9 fw-normal mb-2">
                    Un systéme enregistrement de facture par dépots d'une somme dans votre entreprise.
                    C'est tout a fait le contraire de " la commande a crédit ". 
                    Ici le client une fois inscrit dépose son argent dans votre magasin ou boutique avec l'objéctif de le recuperé par des commande
                    de produits.
                  </li>

                  <li class="fs-9 fw-normal">
                    Un systéme de commande sous reserve, ce sérvice vous facilite la géstion des commande de vos clients tout n'aiant pas 
                    les produit dans votre entreprise. 
                  </li>

                </p>

              </div>
            </div>
          </div>

          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-video text-info fs-9"></span></div>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Autres options</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>9:33pm</p>
                </div>
                <h6 class="fs-10 fw-normal false">Sérvices</h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-3">
                </p>
              </div>
            </div>
          </div>

          

        </div>
        <h4 class="py-3 border-y mb-5 ms-8">Compte clients</h4>
        <div class="timeline-basic mb-9">
          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-swatchbook text-primary fs-9"></span></div><span class="timeline-bar border-end border-dashed"></span>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Creation de compte client</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>1:30pm</p>
                </div>
                <h6 class="fs-10 fw-normal mb-3">by <a class="fw-semibold" href="#!">Comptes</a></h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-5">
                  Pour creer un compte client cliquer sur ce lien et renseigner les information demander tout en acceptanty notre politique et ternmes de 
                  confidentialites. <br>
                  Apres avoir valider l'inscription vous serez rediriger sur une page de validation de compte avec un code a entrer. <br>
                  Veillez verifier votre adress email d'inscription et recuperer le code de validation du compte.
                </p>
              </div>
            </div>
          </div>
          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-skull-crossbones text-danger fs-9"></span></div><span class="timeline-bar border-end border-dashed"></span>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">La particularite de KStore</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>8:32pm</p>
                </div>
                <h6 class="fs-10 fw-normal mb-3">Services</h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-5">
                  KStore est une application de gestion d'entreprise commercial, ce qui fait que vous aurez une multitude
                  de services commercial dans votre profile avec une diversite des produits.
                  Ainsi pour chaque entreprise vous pouvez acceder ses produits et faire vos achats. 
                </p>
              </div>
            </div>
          </div>
          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-stethoscope text-primary fs-9"></span></div><span class="timeline-bar border-end border-dashed"></span>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Un systeme d'abonnement</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>9:30pm</p>
                </div>
                <h6 class="fs-10 fw-normal mb-3">Services</h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-5">
                  Le systeme d'abonnement avec les entreprise au choix permet de faciliter et d'automatiser les echanges 
                  commerciaux entre les clients et les fournisseurs de produits.
                  Avec l'abonnement le client est considerer comme un client fidel de l'entreprise et beneficie des privileges de ce service.
                </p>
              </div>
            </div>
          </div>
          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-utensils text-success fs-9"></span></div><span class="timeline-bar border-end border-dashed"></span>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Les systemes de ventes</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>8:30pm</p>
                </div>
                <h6 class="fs-10 fw-normal mb-3">Service</h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-1">
                  Un client a plusieurs options pour faire des achats avec une entreprise dans l'application KStore.

                  <li class="fs-9 fw-normal mb-2">
                    Vous avez l'option des commande a credit, avec un accord entre vous et le fournisseur vous pouvez faire une
                    commande a credit via votre compte client.
                    Cette demande de commande sera valider par le fournisseur en question apres votre reservation avec l'etiquette (facture a credit)
                  </li>

                  <li class="fs-9 fw-normal mb-2">
                    Il est aussi intégrer l'option de la commande par dépôt,
                    Il consiste de déposer votre argent dans l'entreprise commercial de votre choix qui sera récupéré par des commandes de produits.
                  </li>

                </p>
              </div>
            </div>
          </div>
          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-rocket text-info fs-9"></span></div>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Launching Phoenix</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>10:33pm</p>
                </div>
                <h6 class="fs-10 fw-normal false">by <a class="fw-semibold" href="#!">John N. Ward</a></h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-0"></p>
              </div>
            </div>
          </div>
        </div>
        <h4 class="py-3 border-y mb-5 ms-8">Les moyens de paiement</h4>
        <div class="timeline-basic mb-9">
          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-screwdriver-wrench text-warning fs-9"></span></div><span class="timeline-bar border-end border-dashed"></span>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Mobiles et bancaire</h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>8:32pm</p>
                </div>
                <h6 class="fs-10 fw-normal mb-3">Service</h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-5">
                  Pour une facilité de paiement nous avons intégré des moyens de paiement mobile et bancaire notamment :
                  Wave, Orange Money,
                </p>
              </div>
            </div>
          </div>
          <div class="timeline-item">
            <div class="row g-3">
              <div class="col-auto">
                <div class="timeline-item-bar position-relative">
                  <div class="icon-item icon-item-md rounded-7 border border-translucent"><span class="fa-solid fa-paperclip text-info fs-9"></span></div>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mb-2">
                    <h6 class="lh-sm mb-0 me-2 text-body-secondary timeline-item-title">Termes & Politique de confidentialites</h6>
                    <h6 class="mb-0 fs-9"><span class="fa-solid fa-file-pdf me-1 text-body-tertiary"></span><a href="{{ route('utilisateur.terme') }}">lien referenciel</a></h6>
                  </div>
                  <p class="text-body-quaternary fs-9 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>10:33pm</p>
                </div>
                <h6 class="fs-10 fw-normal false"></h6>
                <p class="fs-9 text-body-secondary w-sm-60 mb-0"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

<script src="{{asset('assets/polyfill.io/v3/polyfill.min58be.js?features=window.scroll')}}"></script>