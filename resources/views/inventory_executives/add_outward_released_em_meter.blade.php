@include("inc_admin.header")


<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }
</style>
<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Inventory;
use App\Models\Admin;
?>
<?php

$em_meters  = $data['em_meters'];


?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Outward Released EM Meter</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                <li class="breadcrumb-item active">Outward Released EM Meter</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation" action="create_outward_released_em_meter" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Division Store Name <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="text" class="form-control" id="product-title-input" name="division" value="" placeholder="Enter Division Name" required>
                                        </div>
                                    </div>




                                    <div class="col-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Vishvin DC No <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="number" class="form-control" id="product-title-input" name="dc_no" required placeholder="Enter Vishvin DC No" required>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Type of Meters <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <select class="form-control" name="meter_type" required>
                                                <option value="single phase">Single Phase</option>
                                                <option value="three phase">Three Phase</option>

                                            </select>

                                        </div>
                                    </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-title-input">Serial No. <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                        <input type="number" class="form-control" id="product-title-input" name="serial_no" value="" placeholder="Serial No. / Barcode" required>
                                    </div>
                                </div>


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
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            </form>


        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
</div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">View Outward EM Meter Stocks</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">EM Meter Discharged</a></li>
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
      <th scope="col">DC No</th>
      <th scope="col">Division</th>


      <th scope="col">Discharged By</th>
      <th scope="col">Discharged At</th>

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
    <td>{{$em_meter->dc_no}}</td>
    <td>{{$em_meter->division}}</td>

    <?php
$created_by_detail = Admin::where('id', $em_meter->discharged_by)->first();
?>
  <td>{{ucwords($created_by_detail->name)}}</td>

    <td>{{$em_meter->discharged_at}}</td>

 </tr>
     @endforeach




  </tbody>
</table>
        </div>
        </div>
        </div>
        <!-- container-fluid -->
    </div>


<?php

?>
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
                            .so_pincode + '">' + value.so_pincode + '</option>');
                    });
                    // $('#city').html('<option value="">Select City</option>');
                }
            });
        });
        });
</script>
