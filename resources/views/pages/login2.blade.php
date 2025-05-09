@include("inc_pages.header")
<link rel="stylesheet" href="//cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
   <body class="fixed-bottom-padding">
      <!-- <div class="theme-switch-wrapper">
         <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
         </label>
         <em>Enable Dark Mode!</em>
      </div> -->
      <!-- home page -->
      <div class="osahan-home-page">
         <div class="shadow-sm bg-info p-3" style="border-radius:5px;">
            <div class="title d-flex align-items-center" >
               <a href="/pages/home" class="text-decoration-none text-dark d-flex align-items-center">
                  <img class="osahan-logo me-2" src="/assets_page/img/vishvin_logo_background.png">
                  <!-- <h4 class="font-weight-bold text-white m-0">Vishvin</h4> -->
               </a>
               <p class="ms-auto m-0">
                  <!-- <a href="notification.html" class="text-decoration-none bg-white p-1 rounded shadow-sm d-flex align-items-center">
                  <i class="text-dark bi bi-bell-fill"></i>
                  <span class="badge badge-danger p-1 ms-1 small">2</span>
                  </a> -->
               </p>
               <!-- <a class="toggle ms-3 text-white" href="#"><i class="bi bi-list "></i></a> -->
            </div>
            <!-- <a href="search.html" class="text-decoration-none"> -->
               <!-- <div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white py-1">
                  <div class="input-group-prepend">
                     <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
                  </div>
                  <input type="text" class="shadow-none border-0 form-control ps-0" placeholder="Search for Products.." aria-label="" aria-describedby="basic-addon1">
               </div>
            </a> -->
         </div>
         <!-- body -->
         <div class="osahan-body" style="padding-bottom:400px  ;">
            <!-- categories -->
            <div class="text-center position-absolute top-50 start-50 translate-middle">
               <h6 class="mb-2">Welcome User</h6>
               @php
               $count = 0
               @endphp
               @foreach($data['meter_main'] as $meter)
               {{$count++}}
               @endforeach
             <p>{{$data['lat']}}{{session()->get('user_lat')}}You have installed <span style="font-size:17px;">{{$count}}</span> Meters </p>
            </div>
            </div>

             <div class="row m-0" class="table-responsive-sm" >
               <div class="col ps-0 pe-1 py-1" class="table-responsive-sm" style="padding-top:500px;">
             <table id="example" class="display" style="width:100%" >
               <thead>
                   <tr>
                       <th>Sl. No.</th>
                       <th>Account ID</th>
                       <th>Created At</th>

                   </tr>
               </thead>
               <tbody>
                  <?php if($count>0){ ?>
                     @php
                     $count = 0
                     @endphp

                                    @foreach($data['meter_main'] as $meter)
                                    @php
                                    $count++
                                    @endphp
                   <tr>
                       <td>{{$count}}</td>
                       <td>{{$meter->account_id}}</td>
                       <td>{{$meter->created_at}}</td>

                       {{-- <td>61</td>
                       <td>2011-04-25</td>
                       <td>$320,800</td> --}}
                   </tr>
               @endforeach
<?php }else{ ?>
   <tr>
    <td>-- </td>
<td> --</td>
<td>--</td>
  </tr>

<?php  } ?>


                   {{--  <tr>
                       <td>Charde Marshall</td>
                       <td>Regional Director</td>
                       <td>San Francisco</td>
                       <td>36</td>
                       <td>2008-10-16</td>
                       <td>$470,600</td>
                   </tr>

                   <tr>
                       <td>Shad Decker</td>
                       <td>Regional Director</td>
                       <td>Edinburgh</td>
                       <td>51</td>
                       <td>2008-11-13</td>
                       <td>$183,000</td>
                   </tr>
                   <tr>
                       <td>Michael Bruce</td>
                       <td>Javascript Developer</td>
                       <td>Singapore</td>
                       <td>29</td>
                       <td>2011-06-27</td>
                       <td>$183,000</td>
                   </tr>
                   <tr>
                       <td>Donna Snider</td>
                       <td>Customer Support</td>
                       <td>New York</td>
                       <td>27</td>
                       <td>2011-01-25</td>
                       <td>$112,000</td>
                   </tr> --}}
               </tbody>
               <tfoot>
                   <tr>
                    <th>Sl. No.</th>
                    <th>Account ID</th>
                    <th>Created At</th>
                       {{-- <th>Age</th>
                       <th>Start date</th>
                       <th>Salary</th> --}}
                   </tr>
               </tfoot>
           </table>
         </div>
         </div>

               <!-- <div class="row m-0">
                  <div class="col ps-0 pe-1 py-1">
                     <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it">
                        <a href="#">
                           <img src="/assets_page/img/options.png" height="" width="" class="img-fluid px-2">
                           <p class="m-0 pt-2 text-muted text-center">Option</p>
                        </a>
                     </div>
                  </div>
                  <div class="col p-1">
                     <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it">
                        <a href="#">
                           <img src="/assets_page/img/options.png" class="img-fluid px-2">
                           <p class="m-0 pt-2 text-muted text-center">Option</p>
                        </a>
                     </div>
                  </div>
                  <div class="col p-1">
                     <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it">
                        <a href="#">
                           <img src="/assets_page/img/options.png" class="img-fluid px-2">
                           <p class="m-0 pt-2 text-muted text-center">Option</p>
                        </a>
                     </div>
                  </div>
                  <div class="col ps-0 pe-1 py-1">
                     <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it">
                        <a href="#">
                           <img src="/assets_page/img/options.png" class="img-fluid px-2">
                           <p class="m-0 pt-2 text-muted text-center">Option</p>
                        </a>
                     </div>
                  </div>
               </div> -->

            </div>


            <!-- Promos -->
            <!-- <div class="py-3 bg-white osahan-promos shadow-sm">
               <div class="d-flex align-items-center px-3 mb-2">
                  <h6 class="m-0">Promos for you</h6>
                  <a href="promos.html" class="ms-auto text-success">See more</a>
               </div>
               <div class="promo-slider">
                  <div class="osahan-slider-item m-2">
                     <a href="promo_details.html"><img src="/assets_page/img/promo1.jpg" class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                  </div>
                  <div class="osahan-slider-item m-2">
                     <a href="promo_details.html"><img src="/assets_page/img/promo2.jpg" class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                  </div>
                  <div class="osahan-slider-item m-2">
                     <a href="promo_details.html"><img src="/assets_page/img/promo3.jpg" class="img-fluid mx-auto rounded" alt="Responsive image"></a>
                  </div>
               </div>
            </div> -->
            <!-- Pick's Today -->
            <!-- <div class="title d-flex align-items-center mb-3 mt-3 px-3">
               <h6 class="m-0">Pick's Today</h6>
               <a class="ms-auto text-success" href="picks_today.html">See more</a>
            </div> -->
            <!-- pick today -->
            <!-- <div class="pick_today px-3">
               <div class="row">
                  <div class="col-6 pe-2">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="product_details.html" class="text-dark">
                              <div class="member-plan position-absolute"><span class="badge m-3 badge-danger">10%</span></div>
                              <div class="p-3">
                                 <img src="/assets_page/img/listing/v1.jpg" class="img-fluid item-img w-100 mb-3">
                                 <h6>Chilli</h6>
                                 <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$0.8/kg</h6>
                           <a href="cart.html" class="btn btn-success btn-sm ms-auto">+</a>
                           </div>
                           </div>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 ps-2">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="product_details.html" class="text-dark">
                              <div class="member-plan position-absolute"><span class="badge m-3 badge-danger">5%</span></div>
                              <div class="p-3">
                                 <img src="/assets_page/img/listing/v2.jpg" class="img-fluid item-img w-100 mb-3">
                                 <h6>Onion</h6>
                                 <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$1.8/kg</h6>
                           <a href="cart.html" class="btn btn-success btn-sm ms-auto">+</a>
                           </div>
                           </div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row pt-3">
                  <div class="col-6 pe-2">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="product_details.html" class="text-dark">
                              <div class="member-plan position-absolute"><span class="badge m-3 badge-warning">5%</span></div>
                              <div class="p-3">
                                 <img src="/assets_page/img/listing/v3.jpg" class="img-fluid item-img w-100 mb-3">
                                 <h6>Tomato</h6>
                                 <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$1/kg</h6>
                           <a class="ms-auto" href="cart.html">
                           <div class="input-group input-spinner ms-auto cart-items-number">
                           <div class="input-group-prepend">
                           <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                           </div>
                           <input type="text" class="form-control" value="1">
                           <div class="input-group-append">
                           <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                           </div>
                           </div>
                           </a>
                           </div>
                           </div>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 ps-2">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="product_details.html" class="text-dark">
                              <div class="member-plan position-absolute"><span class="badge m-3 badge-warning">15%</span></div>
                              <div class="p-3">
                                 <img src="/assets_page/img/listing/v4.jpg" class="img-fluid item-img w-100 mb-3">
                                 <h6>Cabbage</h6>
                                 <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$0.8/kg</h6>
                           <a href="cart.html" class="btn btn-success btn-sm ms-auto">+</a>
                           </div>
                           </div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row pt-3">
                  <div class="col-6 pe-2">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="product_details.html" class="text-dark">
                              <div class="member-plan position-absolute"><span class="badge m-3 badge-success">10%</span></div>
                              <div class="p-3">
                                 <img src="img/listing/v5.jpg" class="img-fluid item-img w-100 mb-3">
                                 <h6>Cauliflower</h6>
                                 <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$1.8/kg</h6>
                           <a href="cart.html" class="btn btn-success btn-sm ms-auto">+</a>
                           </div>
                           </div>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 ps-2">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="product_details.html" class="text-dark">
                              <div class="member-plan position-absolute"><span class="badge m-3 badge-success">10%</span></div>
                              <div class="p-3">
                                 <img src="img/listing/v6.jpg" class="img-fluid item-img w-100 mb-3">
                                 <h6>Carrot</h6>
                                 <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$0.8/kg</h6>
                           <a href="cart.html" class="btn btn-success btn-sm ms-auto">+</a>
                           </div>
                           </div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div> -->
            <!-- Most sales -->
            <!-- <div class="title d-flex align-items-center p-3">
               <h6 class="m-0">Recommend for You</h6>
               <a class="ms-auto text-success" href="recommend.html">26 more</a>
            </div> -->
            <!-- osahan recommend -->
            <!-- <div class="osahan-recommend px-3">
               <div class="row">
                  <div class="col-12 mb-3">
                     <a href="product_details.html" class="text-dark text-decoration-none">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                           <div class="recommend-slider rounded pt-2">
                              <div class="osahan-slider-item m-2 rounded">
                                 <img src="/assets_page/img/recommend/r1.jpg" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                              </div>
                              <div class="osahan-slider-item m-2 rounded">
                                 <img src="/assets_page/img/recommend/r2.jpg" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                              </div>
                              <div class="osahan-slider-item m-2 rounded">
                                 <img src="/assets_page/img/recommend/r3.jpg" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                              </div>
                           </div>
                           <div class="p-3 position-relative">
                              <h6 class="mb-1 font-weight-bold text-success">Fresh Orange
                              </h6>
                              <p class="text-muted">Orange Great Quality item from Jamaica.</p>
                              <div class="d-flex align-items-center">
                                 <h6 class="m-0">$8.8/kg</h6>
                     <a class="ms-auto" href="cart.html">
                     <div class="input-group input-spinner ms-auto cart-items-number">
                     <div class="input-group-prepend">
                     <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                     </div>
                     <input type="text" class="form-control" value="1">
                     <div class="input-group-append">
                     <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                     </div>
                     </div>
                     </a>
                     </div>
                     </div>
                     </div>
                     </a>
                  </div>
                  <div class="col-12 mb-3">
                     <a href="product_details.html" class="text-dark text-decoration-none">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                           <div class="recommend-slider rounded pt-2">
                              <div class="osahan-slider-item m-2">
                                 <img src="/assets_page/img/recommend/r4.jpg" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                              </div>
                              <div class="osahan-slider-item m-2">
                                 <img src="/assets_page/img/recommend/r5.jpg" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                              </div>
                              <div class="osahan-slider-item m-2">
                                 <img src="/assets_page/img/recommend/r6.jpg" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                              </div>
                           </div>
                           <div class="p-3 position-relative">
                              <h6 class="mb-1 font-weight-bold text-success">Green Apple</h6>
                              <p class="text-muted">Green Apple Premium item from Vietnam.</p>
                              <div class="d-flex align-items-center">
                                 <h6 class="m-0">$10.8/kg</h6>
                     <a class="ms-auto" href="cart.html">
                     <div class="input-group input-spinner ms-auto cart-items-number">
                     <div class="input-group-prepend">
                     <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                     </div>
                     <input type="text" class="form-control" value="1">
                     <div class="input-group-append">
                     <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                     </div>
                     </div>
                     </a>
                     </div>
                     </div>
                     </div>
                     </a>
                  </div>
                  <div class="col-12 mb-3">
                     <a href="product_details.html" class="text-dark text-decoration-none">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                           <div class="recommend-slider rounded pt-2">
                              <div class="osahan-slider-item m-2">
                                 <img src="/assets_page/img/recommend/r7.jpg" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                              </div>
                              <div class="osahan-slider-item m-2">
                                 <img src="/assets_page/img/recommend/r8.jpg" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                              </div>
                              <div class="osahan-slider-item m-2">
                                 <img src="/assets_page/img/recommend/r9.jpg" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                              </div>
                           </div>
                           <div class="p-3 position-relative">
                              <h6 class="mb-1 font-weight-bold text-success">Fresh Apple
                              </h6>
                              <p class="text-muted">Fresh Apple Premium item from Thailand.</p>
                              <div class="d-flex align-items-center">
                                 <h6 class="m-0">$12.8/kg</h6>
                     <a class="ms-auto" href="cart.html">
                     <div class="input-group input-spinner ms-auto cart-items-number">
                     <div class="input-group-prepend">
                     <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                     </div>
                     <input type="text" class="form-control" value="1">
                     <div class="input-group-append">
                     <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                     </div>
                     </div>
                     </a>
                     </div>
                     </div>
                     </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <!-- Footer -->
      {{-- <div class="osahan-menu-fotter fixed-bottom bg-dark text-center m-3 shadow rounded py-2">
         <div class="row m-0">
            <a href="/pages/home" class="text-white small col font-weight-bold text-decoration-none p-2 selected">
               <p class="h5 m-0"><i class="fa-sharp fa-solid fa-house" style="color:white;"></i></p>
               Home
            </a>
            <a href="/pages/add_meter_first_step" class="text-white col small text-decoration-none p-2">
               <p class="h5 m-0"><i class="fa-solid fa-plus"></i></p>
               Add Meter
            </a>
            <a href="/pages/records" class="text-white col small text-decoration-none p-2">
               <p class="h5 m-0"><i class="icofont-bag"></i></p>
              Rejected Meters
            </a>
            <a href="/pages/account" class="text-white col small text-decoration-none p-2">
               <p class="h5 m-0"><i class="icofont-user"></i></p>
               Account
            </a>
         </div>
      </div> --}}
      <!-- <nav id="main-nav">
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
            <li><a href="#"><i class="bi bi-card-list me-2"></i> Listing</a></li>
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
      </nav> -->
      @include("inc_pages.footer")
      <script type="text/javascript" src="//code.jquery.com/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="//cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script type="text/javascript" src="//cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script>
      $(document).ready(function() {
         $('#example').DataTable( {
             dom: 'Bfrtip',
             buttons: [
                 'copyHtml5',
                 'excelHtml5',
                 'csvHtml5',
                 'pdfHtml5'
             ]
         } );
     }


     );
      $(document).ready(function() {
         $('#tblSub1View').dataTable({
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
                    "bDestroy": true,
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0, 1]
                    }],
                    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "iDisplayLength": 10,
                });
     }


     );

</script>
