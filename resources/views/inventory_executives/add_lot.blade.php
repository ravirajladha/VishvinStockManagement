@include('inc_admin.header')
<link href="/assets_admin/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="/assets_admin/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets_admin/css/vendors/datatables.css">

<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Inventory;
use App\Models\Admin;
use App\Models\Zone_code;
use App\Models\Warehouse_meter;
?>

<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }

    .table th {
        font-weight: 600;
        height: 100px;
    }
</style>
<?php
if (isset($data['warehouse_meters'])) {
    $warehouse_meters = $data['warehouse_meters'];
}

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Lot No.</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                <li class="breadcrumb-item active">Add Lot No.</li>
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

            <form id="createproduct-form" autocomplete="off" class="needs-validation" action="create_lot_no"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="row">

                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="product-title-input">Type of
                                                    Meters <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                                <select name="meter_type" class="form-control" required>
                                                    <option value="1">Single Phase</option>
                                                    <option value="2">Three Phase</option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="product-title-input">Select
                                                    Division <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                                {{-- <select name="division" class="form-control">
                                                    <option value="hubli">Hubli</option>
                                                    <option value="dharwad">Dharwad</option>
                                                    <option value="gadag">Gadag</option>
                                                    <option value="belgaum">Belgaum</option>
                                                    <option value="vijayapura">Vijayapura</option>
                                                </select> --}}
                                                <select name="division" class="form-control">
                                                    {{-- <option value="530001">Hubli</option>
                                                    <option value="530003">Dharwad</option>
                                                    <option value="530005">Gadag</option> --}}
                                                    <option value="530010">Belagavi, 530010</option>
                                                    <option value="530016">Vijayapura, 530016</option>
                                                </select>

                                            </div>
                                        </div>

                                        {{-- <div class="col-12">
                                            <div class="mb-3">
                                                @php
                                                    // $lot_no = Warehouse_meter::latest()->first();
                                                @endphp
                                                <label class="form-label" for="product-title-input">Enter Lot
                                                    Number <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                                <input type="number" class="form-control" id="product-title-input"
                                                    name="lot_no" value="" placeholder="Enter Lot Number"
                                                    required>
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            {{-- <div class="mb-3">
                                                <label class="form-label" for="product-title-input">This form creates Box, on click of Submit, the user will be sent to different page to add meters respectively for the box added now. <span class="mandatory_star">*</span></label>

                                            </div> --}}
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
                                        {{-- <div class="row form-group multiple-form-group input-group">
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
                                        </div> --}}






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
                        <h4 class="mb-sm-0">View Lot Stocks</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Lot Stock</a></li>
                                <li class="breadcrumb-item active">Lot Stock Table</li>
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

                            <th >Lot No</th>



                            <th >Meter Type</th>
                            <th >Division</th>
                            {{-- <th scope="col">Lot No</th> --}}


                            {{-- <th scope="col">Meter Serial No</th>
                            <th scope="col"> Total Quantity</th>
                            <th scope="col">Unused</th>
                            <th scope="col">Used</th> --}}


                            <th >Created By</th>
                            <th >Created At</th>
                            <th >Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($warehouse_meters))
                            @foreach ($warehouse_meters as $warehouse_meter)
                                <?php
                                $count = 0;
                                $count++;
                                $division_name =Zone_code::where('div_code',$warehouse_meter->division)->first();
                                ?>

                                <tr>
                                    <th scope="row"><?php echo $warehouse_meter->id; ?></th>
                                    <td><?php if ($warehouse_meter->meter_type == 1) {
                                        echo 'Single Phase';
                                    } else {
                                        echo 'Three Phase';
                                    } ?></td>

                                    <td>{{ $division_name->division }},
                                    {{ $warehouse_meter->division }}</td>

                                    {{-- <td>{{ $warehouse_meter->lot_no }}</td>

                                    @if (!empty($warehouse_meter->meter_serial_no))
                                    <td>{{ $warehouse_meter->meter_serial_no }}</td>
                                    @else
                                    <td style="font-size: 10px;">Meter not added</td>
                                    @endif --}}



                                    {{-- <td> @php
                                    $count = 0;
                                    $meter_single_serial_nos = explode(',', $warehouse_meter->meter_serial_no);
                                    foreach ($meter_single_serial_nos as $meter_single_serial_no) {
                                        $count++;
                                    }
                                    echo $count; @endphp</td> --}}
                                    {{-- <td>
                                        <?php
                                            $count = 0;
                                            if (!empty($warehouse_meter->meter_serial_no)) {
                                                $meter_single_serial_nos = explode(',', $warehouse_meter->meter_serial_no);
                                                $count = count($meter_single_serial_nos);
                                            }
                                            echo $count;
                                        ?>
                                    </td>

                                    @if (!empty($warehouse_meter->unused_meter_serial_no))
                                    <td>{{ $warehouse_meter->unused_meter_serial_no }}</td>
                                    @else
                                    <td>Nill</td>
                                    @endif --}}

                                    {{-- @if (!empty($warehouse_meter->used_meter_serial_no))
                                    <td>{{ $warehouse_meter->used_meter_serial_no }}</td>
                                    @else
                                    <td>Nill</td>
                                    @endif --}}






                                    <?php
                                    $created_by_detail = Admin::where('id', $warehouse_meter->created_by)->first();
                                    ?>
                                    <td>{{ ucwords($created_by_detail->name) }}</td>
                                    <td>{{ $warehouse_meter->created_at }}</td>
                                    <td>
                                        @if ($warehouse_meter->complete_status ==0)
                                        <a href="/inventory_executives/add_meter_sl_number_wise/{{ $warehouse_meter->id }}">View</a>
                                        @else
                                        <s>View</s>
                                        @endif



                                    </td>

                                </tr>
                            @endforeach
                        @endif



                    </tbody>
                </table>
                <span>Note: The View button will appear, if the Indent is ready for the lot.</span>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>








@include('inc_admin.footer')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




<script>
    (function($) {
        $(function() {

            var addFormGroup = function(event) {
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

            var removeFormGroup = function(event) {
                event.preventDefault();

                var $formGroup = $(this).closest('.form-group');
                var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

                var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                    $lastFormGroupLast.find('.btn-add').attr('disabled', false);
                }

                $formGroup.remove();
            };

            var selectFormGroup = function(event) {
                event.preventDefault();

                var $selectGroup = $(this).closest('.input-group-select');
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();

                $selectGroup.find('.concept').text(concept);
                $selectGroup.find('.input-group-select-val').val(param);

            }

            var countFormGroup = function($form) {
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/1.12.1/css/dataTables.responsive.css">
<script type="text/javascript" src="//cdn.datatables.net/responsive/1.12.1/js/dataTables.responsive.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">


<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        $('.table').DataTable({
            dom: 'Bfrtip',
            buttons: [

            ],
            order: [[0, 'desc']]
        });
    });
</script>
