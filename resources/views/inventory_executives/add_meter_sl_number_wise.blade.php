@include('inc_admin.header')
<link href="/assets_admin/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="/assets_admin/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
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
{{-- <div class="main-content">
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

            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation" action="add_meter_to_warehouse"
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

                                                <select name="division" class="form-control">
                                                    <option value="530001">Hubli</option>
                                                    <option value="530003">Dharwad</option>
                                                    <option value="530005">Gadag</option>
                                                    <option value="530010">Belgaum</option>
                                                    <option value="530016">Vijayapura</option>
                                                </select>

                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-title-input">This form creates Box, on click of Submit, the user will be sent to different page to add meters respectively for the box added now. <span class="mandatory_star">*</span></label>

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
</div> --}}




<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">View Box Stocks(Total Meter Quantity: {{$data['meter_count']}})</h4>
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
                <div class="row">
                    <div class="col-6">
                        <form id="createproduct-form" autocomplete="off" class="needs-validation" action="/inventory_executives/add_meter_to_warehouse/{{$data['lot_no']}}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-success w-sm">Add Box to Lot</button>
                </form>
                    </div>
                    <div class="col-6">
                        <form action="/inventory_executives/upload_meter/{{$data['lot_no']}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="form-file">
                                    <input required type="file" name="upload" accept="text/csv, application/csv" class="form-file-input form-control">
                                </div>

                                <button  onclick="Swal.fire({icon: 'info',title: 'Please Wait, Uploading',showConfirmButton: false,timer: 500000})" class="btn btn-success btn-sm" type="submit" name="importSubmit">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table" style="table-layout: fixed;">
                    <thead>
                        <tr>

                            <th scope="col">Box No</th>



                            <th scope="col">Meter Type</th>
                            <th scope="col">Division</th>
                            <th scope="col">Lot No</th>


                            <th scope="col">Meter Serial No</th>
                            <th scope="col"> Total Quantity</th>
                            <th scope="col">Unused</th>
                            <th scope="col">Used</th>


                            <th scope="col">Created By</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>

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

                                    <td>{{ $warehouse_meter->lot_no }}</td>

                                    @if (!empty($warehouse_meter->meter_serial_no))
                                    <td>{{ $warehouse_meter->meter_serial_no }}</td>
                                    @else
                                    <td style="font-size: 10px;">Meter not added</td>
                                    @endif



                                    {{-- <td> @php
                                    $count = 0;
                                    $meter_single_serial_nos = explode(',', $warehouse_meter->meter_serial_no);
                                    foreach ($meter_single_serial_nos as $meter_single_serial_no) {
                                        $count++;
                                    }
                                    echo $count; @endphp</td> --}}
                                    <td>
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
                                    @endif

                                    @if (!empty($warehouse_meter->used_meter_serial_no))
                                    <td>{{ $warehouse_meter->used_meter_serial_no }}</td>
                                    @else
                                    <td>Nill</td>
                                    @endif






                                    <?php
                                    $created_by_detail = Admin::where('id', $warehouse_meter->created_by)->first();
                                    ?>
                                    <td>{{ ucwords($created_by_detail->name) }}</td>
                                    <td>{{ $warehouse_meter->created_at }}</td>
                                    <td>
                                         {{-- @if ($warehouse_meter->complete_status ==0)
                                         <a href="/inventory_executives/add_meter_into_box/{{ $warehouse_meter->id }}">View</a>
                                         @else
                                         <s>View</s>
                                         @endif --}}
                                         <a href="/inventory_executives/add_meter_into_box/{{ $warehouse_meter->id }}">View</a>
                                    </td>

                                </tr>
                            @endforeach
                        @endif



                    </tbody>
                </table>
                <div class="text-end">
                    <a href="/inventory_executives/indent_form/{{ $data['lot_no'] }}"> <button class="btn btn-warning w-sm">Complete
                    </button></a>
                </div>
                <span>Note: The View button will appear, if the Indent is ready for the lot.</span>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>










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
