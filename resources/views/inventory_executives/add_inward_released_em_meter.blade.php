@include("inc_admin.header")

<link href="/assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

<script src="jquery-3.6.3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;
?>
<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }
</style>
<?php

$unique_sd_pincodes = $data['unique_sd_pincodes'];
$contractors  = $data['contractors'];
$em_meters  = $data['em_meters'];


?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Inward Released EM Meter</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                <li class="breadcrumb-item active">Inward Released EM Meter</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation" action="create_inward_released_em_meter" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">SD Code <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <select class="form-control" name="sd_pincode" id="sd_pincode">
                                                <option value="">Select SD Code</option>
                                                @foreach($unique_sd_pincodes as $unique_sd_pincode)
                                                <option value="{{$unique_sd_pincode->sd_pincode}}">{{$unique_sd_pincode->sd_pincode}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">SO Code <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <select class="form-control" name="so_pincode" id="so_pincode">
                                                <option value=""></option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-title-input">Select Contractor <span class="mandatory_star">*<sup><i>required</i></sup></span></label>

                                        <select class="form-control" name="contractor_id" required>
                                                <option value="" readonly>Select Contractor</option>
                                                @foreach($contractors as $contractor)
                                                <option value="{{$contractor->id}}">{{$contractor->name}}</option>

    @endforeach
                                        </select>
                                    </div>

                                </div>





                                <div class="col-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="product-title-input">Type of Meters <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                        <select name="meter_type" class="form-control" required>
                                            <option value="Single Phase">Single Phase</option>
                                            <option value="Three Phase">Three Phase</option>

                                        </select>

                                    </div>
                                </div>
                            </div>
                                <div class="row">

                                    <div class="row form-group multiple-form-group input-group">
                                        <div class="col-md-10">
                                            <label class="form-label" for="product-title-input">Serial No. <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                        <input type="number" name="serial_no[]" class="form-control" required>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="form-label" for="product-title-input"></label>
                                        <p class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-add">+</button>
                                        </p>
                                        </div>
                                    </div>
                                        {{-- <div class="col-2 mt-3"> <button type="button" class="btn btn-success btn-add mt-2">+</button></div> --}}

                                    </div>

                                <!-- <div class="row form-group multiple-form-group input-group">
    <div class="col-md-4">
    <input type="text" name="abc[]" class="form-control">
    </div>
    <div class="col-md-4">
    <input type="text" name="xyz[]" class="form-control">
    </div>
    <div class="col-md-2">
    <span class="input-group-btn">
        <button type="button" class="btn btn-success btn-add">+</button>
    </span>
    </div>
</div>-->
                                <!-- <div class="mb-3">
                                    <input type="number" class="form-control" id="product-title-input" name="name" value="" placeholder="Enter Section Name" required>
                                </div>
                                -->

                            </div>
                            <!-- end card -->



                            <div class="text-end mb-3">
                                <button type="submit" class="btn btn-success w-sm">Submit</button>
                            </div>
                        </div>
                        <!-- end col -->

                    </div>
                    </div>
                    <!-- end row -->

            </form>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>




<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">View Inward EM Meter Stocks</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">EM Meter Stocks</a></li>
                                <li class="breadcrumb-item active">EM Meter Table</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>


                        </div>
            <!-- end page title -->
   <div class="card">
                            <div class="card-body">
            <table class="table">
  <thead>
    <tr>

      <th scope="col">Id</th>
      <th scope="col">Serial No</th>
      <th scope="col">SD Pincode</th>
      <th scope="col">SO Pincode</th>

      <th scope="col">Contractor</th>
      <th scope="col">Meter Type</th>


      <th scope="col">Created By</th>
      <th scope="col">Created At</th>

    </tr>
  </thead>
  <tbody>

    @foreach($em_meters as $em_meter)
    <?php
    $count = 0;
    $count++;
    ?>

 <tr>
   <th scope="row">{{$count}}</th>

    <td>{{$em_meter->serial_no}}</td>
    <td>{{$em_meter->sd_pincode}}</td>
    <td>{{$em_meter->so_pincode}}</td>
    <?php
    $created_by_detail = Admin::where('id', $em_meter->contractor_id)->first();
   ?>
       <td>{{ucwords($created_by_detail->name)}}</td>

    <td>{{$em_meter->meter_type}}</td>

    <?php
    $created_by_detail = Admin::where('id', $em_meter->created_by)->first();
   ?>
       <td>{{ucwords($created_by_detail->name)}}</td>

    <td>{{$em_meter->created_at}}</td>

 </tr>
     @endforeach




  </tbody>
</table>
        </div>
        </div>
        </div>
        <!-- container-fluid -->
    </div>






<script>
    (function ($) {
    $(function () {

    var addFormGroup = function (event) {
    event.preventDefault();

    var $formGroup = $(this).closest('.form-group');
    var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
    var $formGroupClone = $formGroup.clone();

    $(this)
    .toggleClass('btn-success btn-add btn-danger btn-remove')
    .html('–');

    $formGroupClone.find('input').val('');
    $formGroupClone.find('.concept').text('Phone');
    $formGroupClone.insertAfter($formGroup);

    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
    if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
    $lastFormGroupLast.find('.btn-add').attr('disabled', true);
    }
    };

    var removeFormGroup = function (event) {
    event.preventDefault();

    var $formGroup = $(this).closest('.form-group');
    var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
    if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
    $lastFormGroupLast.find('.btn-add').attr('disabled', false);
    }

    $formGroup.remove();
    };

    var selectFormGroup = function (event) {
    event.preventDefault();

    var $selectGroup = $(this).closest('.input-group-select');
    var param = $(this).attr("href").replace("#","");
    var concept = $(this).text();

    $selectGroup.find('.concept').text(concept);
    $selectGroup.find('.input-group-select-val').val(param);

    }

    var countFormGroup = function ($form) {
    return $form.find('.form-group').length;
    };

    $(document).on('click', '.btn-add', addFormGroup);
    $(document).on('click', '.btn-remove', removeFormGroup);
    $(document).on('click', '.dropdown-menu a', selectFormGroup);

    });
    })(jQuery);
    </script>

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

<script type="text/javascript">
    $(document).ready(function () {
        $('#sd_pincode').on('change', function () {
            var sd_pincode = this.value;
            $('#so_pincode').html('');
            $.ajax({
                url: '{{ route('get_sd_pincode') }}?sd_pincode='+sd_pincode,
                type: 'get',
                success: function (res) {
                    $('#so_pincode').html('<option value="">Select SO Pincode</option>');
                    $.each(res, function (key, value) {

                        $('#so_pincode').append('<option value="' + value
                            .so_code + '">' + value.so_code + '</option>');
                    });
                    // $('#city').html('<option value="">Select City</option>');
                }
            });
        });
        });
</script>


