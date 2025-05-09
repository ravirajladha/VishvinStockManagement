@include("inc_pages.header")
   <body class="fixed-bottom-padding">
      <!-- <div class="theme-switch-wrapper">
         <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
         </label>
         <em>Enable Dark Mode!</em>
      </div> -->
      <div class="osahan-order_address">
         <div class="p-3 shadow-sm bg-white border-bottom">
            <div class="d-flex align-items-center">
               <a class="fw-bold text-success text-decoration-none" href="/pages/home">
               <i class="bi bi-arrow-left back-page"></i></a>
               <h5 class="fw-bold m-0 ms-3">Rejected Meters</h5>
               <!-- <button type="button" class="btn btn-outline-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button> -->
               <!-- <a class="btn btn-outline-success btn-sm ms-auto" href="/pages/records2">New Meters</a> -->
            </div>
         </div>
         <div class="p-3">
            <div class="form-check px-0 mb-3 position-relative border-custom-radio">
               <input type="radio" id="customRadioInline1" name="customRadioInline1" class="form-check-input" checked>
               <label class="form-check-label w-100" for="customRadioInline1">
                  
                  <div>
                     <div class="p-3 bg-white rounded shadow-sm w-100">
                        <div class="d-flex align-items-center mb-2">
                           <p class="mb-0 h6">Meter1</p>
                           <!-- <p class="mb-0 badge badge-success ms-auto"><a href="/pages/add2">New Details </a></p> -->

                           
                        </div>
                        <p class="small text-muted m-0">#1245, Sri Gowri Complex 8th Cross, 1st Main Rd, </p>
                        <p class="small text-muted m-0">Kengeri Satellite Town, Bengaluru, Karnataka 560060</p>
                        <p class="pt-2 m-0 text-end"><span class="small"><a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-decoration-none text-dark"></a></span></p>
                     </div>
                  </div>
               </label>
            </div>
            <div class="form-check px-0 position-relative border-custom-radio">
               <input type="radio" id="customRadioInline2" name="customRadioInline1" class="form-check-input">
               <label class="form-check-label w-100" for="customRadioInline2">
                  <div>
                     <div class="p-3 rounded bg-white shadow-sm w-100">
                        <div class="d-flex align-items-center mb-2">
                           <p class="mb-0 h6">Meter2</p>
                           <!-- <p class="mb-0 badge badge-success ms-auto"><a href="/pages/add2">New Details </a></p> -->

                        </div>
                        <p class="small text-muted m-0">#1245, Sri Gowri Complex 8th Cross, 1st Main Rd, </p>
                        <p class="small text-muted m-0">Punjab 141002, India</p>
                        <p class="pt-2 m-0 text-end">
                           <!-- <span class="small"><a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-decoration-none text-dark">New Details</a></span> -->
                        </p>
                     </div>
                  </div>
               </label>
            </div>
         </div>
      </div>
      <!-- continue -->
      <!-- <div class="fixed-bottom p-3">
         <a href="delivery_time.html" class="btn btn-success btn-lg btn-block">Continue</a>
      </div> -->
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Delivery Address</h5>
                  <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form class="">
                     <div class="form-row">
                        <div class="col-md-12 form-group mb-3">
                           <label class="form-label">Delivery Area</label>
                           <div class="input-group">
                              <input placeholder="Delivery Area" type="text" class="form-control">
                              <button id="button-addon2" type="button" class="btn btn-outline-secondary"><i class="icofont-pin"></i></button>
                           </div>
                        </div>
                        <div class="col-md-12 form-group mb-3"><label class="form-label">Complete Address</label><input placeholder="Complete Address e.g. house number, street name, landmark" type="text" class="form-control"></div>
                        <div class="col-md-12 form-group mb-3"><label class="form-label">Delivery Instructions</label><input placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall" type="text" class="form-control"></div>
                        <div class="mb-0 col-md-12 form-group">
                           <label class="form-label">Nickname</label>
                           <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                              <input type="radio" class="btn-check" name="btnradio" id="option1" autocomplete="off" checked>
                              <label class="btn btn-outline-secondary shadow-none" for="option1">Home</label>
                            
                              <input type="radio" class="btn-check" name="btnradio" id="option2" autocomplete="off">
                              <label class="btn btn-outline-secondary shadow-none" for="option2">Work</label>
                            
                              <input type="radio" class="btn-check" name="btnradio" id="option3" autocomplete="off">
                              <label class="btn btn-outline-secondary shadow-none" for="option3">Other</label>
                            </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="modal-footer p-0 border-0">
                  <div class="col-6 m-0 p-0">                 
                     <button type="button" class="btn border-top btn-lg w-100" data-bs-dismiss="modal">Close</button>
                  </div>
                  <div class="col-6 m-0 p-0">     
                     <button type="button" class="btn btn-success btn-lg w-100">Save changes</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      {{-- <nav id="main-nav">
         <ul class="second-nav">
            <li><a href="index.html"><i class="bi bi-eye-fill me-2"></i> Splash</a></li>
            <li>
               <a href="#"><i class="bi bi-lock-fill me-2"></i> Authentication</a>
               <ul>
                  <li> <a href="account-setup.html">Account Setup</a></li>
                  <li><a href="signin.html">Sign in</a></li>
                  <li><a href="signup.html">Sign up</a></li>
                  <li><a href="verification.html">Verification</a></li>
               </ul>
            </li>
            <li><a href="get_started.html"><i class="bi bi-file-check-fill me-2"></i> Get Started</a></li>
            <li><a href="landing.html"><i class="bi bi-airplane-fill me-2"></i> Landing</a></li>
            <li><a href="home.html"><i class="bi bi-house-fill me-2"></i> Homepage</a></li>
            <li><a href="notification.html"><i class="bi bi-bell-fill me-2"></i> Notification</a></li>
            <li><a href="search.html"><i class="bi bi-search me-2"></i> Search</a></li>
            <li><a href="listing.html"><i class="bi bi-card-list me-2"></i> Listing</a></li>
            <li><a href="picks_today.html"><i class="bi bi-lightning-fill me-2"></i> Trending</a></li>
            <li><a href="recommend.html"><i class="bi bi-hand-thumbs-up-fill me-2"></i> Recommend</a></li>
            <li><a href="fresh_vegan.html"><i class="bi bi-patch-check-fill me-2"></i> Most Popular</a></li>
            <li><a href="product_details.html"><i class="bi bi-box-fill me-2"></i> Product Details</a></li>
            <li><a href="cart.html"><i class="bi bi-basket-fill me-2"></i> Cart</a></li>
            <li><a href="order_address.html"><i class="bi bi-geo-alt-fill me-2"></i> Order Address</a></li>
            <li><a href="delivery_time.html"><i class="bi bi-calendar-week-fill me-2"></i> Delivery Time</a></li>
            <li><a href="order_payment.html"><i class="bi bi-cash me-2"></i> Order Payment</a></li>
            <li><a href="checkout.html"><i class="bi bi-bag-check-fill me-2"></i> Checkout</a></li>
            <li><a href="successful.html"><i class="bi bi-gift-fill me-2"></i> Successful</a></li>
            <li>
               <a href="#"><i class="bi bi-list-task me-2"></i> My Order</a>
               <ul>
                  <li><a href="complete_order.html">Complete Order</a></li>
                  <li><a href="status_complete.html">Status Complete</a></li>
                  <li><a href="progress_order.html">Progress Order</a></li>
                  <li><a href="status_onprocess.html">Status on Process</a></li>
                  <li><a href="canceled_order.html">Canceled Order</a></li>
                  <li><a href="status_canceled.html">Status Canceled</a></li>
                  <li><a href="review.html">Review</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><i class="bi bi-person-badge me-2"></i> My Account</a>
               <ul>
                  <li> <a href="my_account.html">My Account</a></li>
                  <li><a href="edit_profile.html">Edit Profile</a></li>
                  <li><a href="change_password.html">Change Password</a></li>
                  <li><a href="deactivate_account.html">Deactivate Account</a></li>
                  <li><a href="my_address.html">My Address</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><i class="bi bi-file-break-fill me-2"></i> Pages</a>
               <ul>
                  <li> <a href="promos.html">Promos</a></li>
                  <li><a href="promo_details.html">Promo Details</a></li>
                  <li><a href="terms_conditions.html">Terms & Conditions</a></li>
                  <li><a href="privacy.html">Privacy</a></li>
                  <li><a href="terms&conditions.html">Conditions</a></li>
                  <li> <a href="help_support.html">Help Support</a></li>
                  <li>  <a href="help_ticket.html">Help Ticket</a></li>
                  <li>  <a href="refund_payment.html">Refund Payment</a></li>
                  <li>  <a href="faq.html">FAQ</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><i class="bi bi-link-45deg me-2"></i> Navigation Link Example</a>
               <ul>
                  <li>
                     <a href="#">Link Example 1</a>
                     <ul>
                        <li>
                           <a href="#">Link Example 1.1</a>
                           <ul>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#">Link Example 1.2</a>
                           <ul>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li><a href="#">Link Example 2</a></li>
                  <li><a href="#">Link Example 3</a></li>
                  <li><a href="#">Link Example 4</a></li>
                  <li data-nav-custom-content>
                     <div class="custom-message">
                        You can add any custom content to your navigation items. This text is just an example.
                     </div>
                  </li>
               </ul>
            </li>
         </ul>
         <ul class="bottom-nav">
            <li class="email">
               <a class="text-success" href="home.html">
                  <p class="h5 m-0"><i class="icofont-home text-success"></i></p>
                  Home
               </a>
            </li>
            <li class="github">
               <a href="cart.html">
                  <p class="h5 m-0"><i class="icofont-cart"></i></p>
                  CART
               </a>
            </li>
            <li class="ko-fi">
               <a href="help_ticket.html">
                  <p class="h5 m-0"><i class="icofont-headphone"></i></p>
                  Help
               </a>
            </li>
         </ul>
      </nav>
       --}}
      @include("inc_pages.footer")

    