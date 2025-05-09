   <!-- Bootstrap core JavaScript -->
   <script src="/assets_page/vendor/jquery/jquery.min.js"></script>
      <script src="/assets_page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="/assets_page/vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="/assets_page/vendor/sidebar/hc-offcanvas-nav.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="/assets_page/js/osahan.js"></script>

      <!-- ======= sweetalert ============ -->

  
	<script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML" async>
	</script>
      <!-- ======= sweetalert ============ -->

   </body>
</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(!empty(session()->get('failed'))) { ?>
  <script type="text/javascript">
  Swal.fire({
   icon: 'warning',
   title: '{{ session()->get('failed') }}',
   showConfirmButton: false,
   timer: 2000
 })
  </script>
 <?php } session()->forget('failed'); ?>

 
 <?php if(!empty(session()->get('success'))) { ?>
	<script type="text/javascript">
	Swal.fire({
	 icon: 'success',
	 title: '{{ session()->get('success') }}',
	 showConfirmButton: false,
	 timer: 2000,
	 
   })
	</script>
   <?php } session()->forget('success'); ?>

   <div class="osahan-menu-fotter fixed-bottom bg-dark text-center m-3 shadow rounded py-2">
      <div class="row m-0">
        <a href="/pages/home" class="text-white col small text-decoration-none p-2 disabled" >
          <p class="h5 m-0"><i class="fa-sharp fa-solid fa-house" style="color:white;"></i></p>Home
        </a>
        <a href="/pages/add_meter_first_step" class="text-white col small text-decoration-none p-2 disabled">
          <p class="h5 m-0"><i class="fa-solid fa-plus"></i></p>
          Add Meter
        </a>
        {{-- <a href="/pages/records" class="text-white col small text-decoration-none p-2 disabled">
          <p class="h5 m-0"><i class="icofont-bag"></i></p>
          Rejected Meters
        </a> --}}
        <a href="/pages/account" class="text-white col small text-decoration-none p-2 disabled">
          <p class="h5 m-0"><i class="icofont-user"></i></p>
          Account
        </a>
      </div>
    </div>