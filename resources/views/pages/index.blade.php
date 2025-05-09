@include("inc_pages.header")

@php
// if (!session()->has('lat')) {
//     echo "<script>window.location.href = '" . URL::to('/pages') . "';</script>";
// }
@endphp


      <!-- Osahan Index -->
      <body>
      <div class="osahan-index">
         <div class="bg-success d-flex align-items-center justify-content-center vh-100">
            <a  href="/pages/home"><img class="index-osahan-logo" src="/assets_admin/images/vishvin/logo.jpg" alt="">
            </a>
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
      </nav> --}}
      @include("inc_pages.footer")
<script>
      $(document).ready(function () {
         // Handler for .ready() called.
         window.setTimeout(function () {
             location.href = '{{URL::to('/pages/home')}}';
         }, 2500);
     });
   </script>
