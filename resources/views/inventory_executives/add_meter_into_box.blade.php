@include('inc_admin.header')
<link href="/assets_admin/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="/assets_admin/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Inventory;
use App\Models\Admin;
use App\Models\Warehouse_meter;
?>
<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }
</style>
<style>
    .form-switch {
        display: inline-block;
        cursor: pointer;
    }

    .form-switch input {
        display: none;
    }

    .form-switch label {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 0;
        cursor: pointer;
    }

    .form-switch label:before {
        content: '';
        display: block;
        position: absolute;
        top: 2px;
        left: 0;
        width: 26px;
        height: 14px;
        border-radius: 14px;
        background-color: #e6e6e6;
        transition: all 0.3s ease-in-out;
    }

    .form-switch label:after {
        content: '';
        display: block;
        position: absolute;
        top: 1px;
        left: 0;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background-color: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease-in-out;
    }

    .form-switch input:checked+label:before {
        background-color: #2ecc71;
    }

    .form-switch input:checked+label:after {
        transform: translateX(12px);
    }
</style>
<?php
// if(isset($data['warehouse_meters'])){
//     $warehouse_meters  = $data['warehouse_meters'];
// }
$box_id = $data['id'];

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Meter to Box</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation"
                action="/inventory_executives/update_meter_into_box" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="row">



                                        {{--
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-title-input">Enter Meter Serial Number <span class="mandatory_star">*<sup><i>required</i></sup></span></label>

                                                <input type="number" class="form-control" id="product-title-input" name="meter_id" value="" placeholder="Enter Meter Serial No" required>
                                            </div>
                                        </div> --}}


                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-title-input">Enter Meter Serial
                                                    Number <span
                                                        class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                                <div class="form-switch">
                                                    <input class="form-check-input" type="checkbox" id="toggle-input"
                                                        name="scanner" checked>
                                                    <label class="form-check-label" for="toggle-input">Use barcode
                                                        scanner</label>
                                                </div>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="manual-input"
                                                        name="meter_id" placeholder="Enter Meter Serial No"
                                                        style="display:none;">
                                                </div>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="barcode-input"
                                                        name="barcode_meter_id" placeholder="Scan Barcode" autofocus>
                                                </div>
                                            </div>
                                        </div>


                                        <input type="number" class="form-control" id="product-title-input"
                                            name="box_id" value={{ $box_id }} hidden>







                                    </div>



                                </div>

                                <!-- end card -->



                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-success w-sm">Add</button>
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




            <div class="text-end mb-3">
                {{-- <a href="/inventory_executives/indent_form/{{ $box_id }}"> <button class="btn btn-warning w-sm">Complete
                </button></a> --}}
                @php
                    $warehouse_meter = Warehouse_meter::where('id', '=', $box_id)->first();
                @endphp
                <a href="/inventory_executives/add_meter_sl_number_wise/{{ $warehouse_meter->lot_no }}"> <button
                        class="btn btn-warning w-sm">Submit
                    </button></a>
            </div>
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
                        <h4 class="mb-sm-0">View Box Stocks (Box No: {{ $box_id }})</h4>
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
                            <th scope="col"></th> <!-- Checkbox Column -->
                            <th scope="col">Count</th>
                            <th scope="col">Meter Serial No</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data['current_box']))
                        @php
                        $count = 0;
                        @endphp
                        @if ($data['current_box']->meter_serial_no !== null && $data['current_box']->meter_serial_no !== '')
                        <form id="delete-form" method="POST" action="/inventory_executives/delete_meter_from_box">
                            @csrf
                            <input type="hidden" name="metersid" value="{{$data['current_box']->id}}">

                            @foreach (explode(',', $data['current_box']->meter_serial_no) as $meter_serial_no)
                            @php $count++; @endphp

                            <tr>
                                <td>
                                    <input type="checkbox" name="selectedRows[]" value="{{ $meter_serial_no }}">
                                </td>
                                <td>{{ $count }}</td>
                                <td scope="row">{{ $meter_serial_no }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                            @endif
                            @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-danger" value="delete">Delete</button>
                </div>
                </form>

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

<script>
    $(document).ready(function() {
        $('#toggle-input').on('change', function() {
            if ($(this).is(':checked')) {
                $('#manual-input').hide();
                $('#barcode-input').show();
            } else {
                $('#manual-input').show();
                $('#barcode-input').hide();
            }
        });
    });
</script>
