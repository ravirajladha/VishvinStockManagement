@include("inc_admin.header")
<link href="/assets_admin/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="/assets_admin/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Inventory;
use App\Models\Admin;
?>
<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }
</style>
<?php
if(isset($data['warehouse_meters'])){
    $warehouse_meters  = $data['warehouse_meters'];
}

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Inward Meters Sl No. wise</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                <li class="breadcrumb-item active">Add Inward Meters Sl No. wise</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-header border-0 rounded">
                    <div class="justify-content-between" style="display: flex;">

                        <a href="/inventory_executives/add_meter_sl_number_wise" class="btn btn-dark add-btn"> Add Inward Meters Sl No. wise</a>
                        <a href="/inventory_executives/add_inward_mrt_rejected" class="btn btn-primary add-btn"> From MRT [Rejected ES Meters]</a>
                        <a href="/inventory_executives/add_inward_released_em_meter" class="btn btn-primary add-btn"> From Field [Released EM Meter]</a>


                    </div>
                </div>
            </div> --}}
            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation" action="add_meter_to_stock" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="row">

                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="product-title-input">Type of Meters</label>
                                                <select name="meter_type" class="form-control">
                                                    <option value="1">Single Phase</option>
                                                    <option value="2">Three Phase</option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="product-title-input">Select Division</label>
                                                <select name="division" class="form-control">
                                                    <option value="hubli">Hubli</option>
                                                    <option value="dharwad">Dharwad</option>
                                                    <option value="gadag">Gadag</option>
                                                    <option value="belgaum">Belgaum</option>
                                                    <option value="vijayapura">Vijayapura</option>


                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-title-input">Enter Lot Number</label>
                                                <input type="number" class="form-control" id="product-title-input" name="lot_no" value="" placeholder="Enter Lot Number" required>
                                            </div>
                                        </div>


                                        {{-- <div class="col-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="product-title-input">Add Box No</label>
                                                <input type="number" class="form-control" id="product-title-input" name="add_box_no" placeholder="Auto Fetch From Serial No." required>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-4">
                                            <div class="mb-4">
                                                <label class="form-label" for="product-title-input">From Serial No.</label>
                                                <input type="number" class="form-control" id="product-title-input" name="from_serial_no[]" placeholder="Auto Fetch From Serial No." required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-4">
                                                <label class="form-label" for="product-title-input">To Serial No.</label>
                                                <input type="number" class="form-control" id="product-title-input" name="to_serial_no[]" placeholder="Auto Fetch To Serial No." required>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-add">+</button>
                                        </span>
                                        </div> --}}
                                        <div class="row form-group multiple-form-group input-group">
                                            <div class="col-md-4">
                                                <label class="form-label" for="product-title-input">From Serial No.</label>
                                            <input type="number" name="from_serial_no[]" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="product-title-input">To Serial No.</label>
                                            <input type="number" name="to_serial_no[]" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-add">+</button>
                                            </span>
                                            </div>
                                        </div>






                                    </div>



                                </div>


                                <!-- end card -->



                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-success w-sm">Submit</button>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->





        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

</form>
</div>
</div>
</div>



<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">View Box Stocks</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Box Stock</a></li>
                                <li class="breadcrumb-item active">Box Stock Table</li>
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

      <th scope="col">Box No</th>
      <th scope="col">Meter Serial No</th>


      <th scope="col">Quantity</th>
      <th scope="col">Used</th>
      <th scope="col">Unused</th>

      <th scope="col">Created By</th>
      <th scope="col">Created At</th>

    </tr>
  </thead>
  <tbody>
@if(isset($warehouse_meters))
    @foreach($warehouse_meters as $warehouse_meter)
    <?php
    $count = 0;
    $count++;
    ?>

 <tr>
   <th scope="row"><?php echo $count; ?></th>

    <td>{{$warehouse_meter->serial_no}}</td>

    <td><?php if($warehouse_meter->meter_type==1){echo "Single Phase"; }else{echo "Three Phase"; } ?></td>
    <td>{{ucwords($warehouse_meter->division)}}</td>
    <td>{{$warehouse_meter->lot_no}}</td>

    <?php
    $str = $warehouse_meter->serial_no; // The string containing two numbers separated by a hyphen
    $nums = explode("-", $str); // Split the string into an array using the hyphen as a delimiter
    $num1 = (int)$nums[0]; // Convert the first number to an integer
    $num2 = (int)$nums[1]; // Convert the second number to an integer
    $diff = $num2 - $num1; // Calculate the difference between the two numbers
    $diff; // Output the difference, which should be 10
    ?>
    <td>{{$diff+1}}</td>

<?php
$used_count = 0;
 for($i=(int)$nums[0]; $i<=(int)$nums[1]; $i++){
    $check_status = Inventory::where('serial_no', $i)->where('status', 1)->first();

                                                    if(isset($check_status)){
                                                        $used_count++;
                                                    }

}
?>
 <td>{{$used_count}}</td>
 <td>{{($diff+1)- $used_count}}</td>



<?php
 $created_by_detail = Admin::where('id', $warehouse_meter->created_by)->first();
?>
    <td>{{ucwords($created_by_detail->name)}}</td>
    <td>{{$warehouse_meter->created_at}}</td>
 </tr>
     @endforeach
   @endif



  </tbody>
</table>
        </div>
        </div>
        </div>
        <!-- container-fluid -->
    </div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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

