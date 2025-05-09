@include("inc_admin.header")

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }
</style>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->

            <div class="row">
                <div class="col-12">

                    <div class="page-title-box d-sm-flex align-items-center justify-content-between  mt-1">
                        <h4 class="mb-sm-0">Upload Error Records</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">BMR</a></li>
                                <li class="breadcrumb-item active">Upload Error Records</li>
                            </ol>
                        </div>

                    </div>
                    <!-- <div class="mx-5 mt-2 page-title-box" style="display: flex;justify-content:space-between">
                        <h4>Project Name : project name</h4>
                        <h4>Project Lead : project lead</h4>
                        <h4>Module Name : module name</h4>
                    </div> -->

                </div>


            </div>

            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation" action="/bmrs/upload_error_records" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body row">

                                <div class="mb-3 mt-4 col-4">
                                    <label class="form-label" for="product-title-input">Upload Error Records<span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <input type="file" class="form-control" id="product-title-input" name="error_record" value="" placeholder="Upload file" accept="text/plain" required>
                                </div>
                                <div class="mb-3 mt-5 col-4">
                                    {{-- <button type="submit" class="btn btn-success w-sm">Submit</button> --}}
                                    <button class="btn btn-success w-sm"  onclick="Swal.fire({icon: 'info',title: 'Please Wait, Uploading',showConfirmButton: false,timer: 500000})" class="btn btn-success btn-sm" type="submit" name="importSubmit">Upload</button>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </form>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>


{{-- @include("inc_admin.footer") --}}


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(!empty(session()->get('failed'))) { ?>
  <script type="text/javascript">
  Swal.fire({
   icon: 'warning',
   title: '{{ session()->get('failed') }}',
   showConfirmButton: false,
   timer: 5000
 })
  </script>
 <?php } session()->forget('failed'); ?>


 <?php if(!empty(session()->get('success'))) { ?>
	<script type="text/javascript">
	Swal.fire({
	 icon: 'success',
	 title: '{{ session()->get('success') }}',
	 showConfirmButton: false,
	 timer: 5000,

   })
	</script>
   <?php } session()->forget('success'); ?>



