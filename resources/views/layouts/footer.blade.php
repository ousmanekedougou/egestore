      @if(!Auth::guard('admin') && !Auth::guard('magasin') && !Auth::guard('agent'))
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-body-highlight dark__bg-gray-1100 py-9">
          <div class="container-small">
            <div class="row justify-content-between gy-4">
              <div class="col-12 col-lg-4">
                <div class="d-flex align-items-center mb-3"><img src="../../../assets/img/icons/logo.png" alt="E-Gstore" width="27" />
                  <p class="logo-text ms-2">E-Gstore</p>
                </div>
                <p class="text-body-tertiary mb-1 fw-semibold lh-sm fs-9">E-Gstore is an admin dashboard template with fascinating features and amazing layout. The template is responsive to all major browsers and is compatible with all available devices and screen sizes.</p>
              </div>
              <div class="col-6 col-md-auto">
                <h5 class="fw-bolder mb-3">About E-Gstore</h5>
                <div class="d-flex flex-column"><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">Careers</a><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">Affiliate Program</a><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">Privacy Policy</a><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">Terms & Conditions</a></div>
              </div>
              <div class="col-6 col-md-auto">
                <h5 class="fw-bolder mb-3">Stay Connected</h5>
                <div class="d-flex flex-column"><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">Blogs</a><a class="mb-1 fw-semibold fs-9 d-flex" href="#!"><span class="fab fa-facebook-square text-primary me-2 fs-8"></span><span class="text-body-secondary">Facebook</span></a><a class="mb-1 fw-semibold fs-9 d-flex" href="#!"><span class="fab fa-twitter-square text-info me-2 fs-8"></span><span class="text-body-secondary">Twitter</span></a></div>
              </div>
              <div class="col-6 col-md-auto">
                <h5 class="fw-bolder mb-3">Customer Service</h5>
                <div class="d-flex flex-column"><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">Help Desk</a><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">Support, 24/7</a><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">Community of E-Gstore</a></div>
              </div>
              <div class="col-6 col-md-auto">
                <h5 class="fw-bolder mb-3">Payment Method</h5>
                <div class="d-flex flex-column"><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">Cash on Delivery</a><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">Online Payment</a><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">PayPal</a><a class="text-body-tertiary fw-semibold fs-9 mb-1" href="#!">Installment</a></div>
              </div>
            </div>
          </div><!-- end of .container-->
        </section><!-- <section> close ============================-->
        <!-- ============================================-->
      @endif


     