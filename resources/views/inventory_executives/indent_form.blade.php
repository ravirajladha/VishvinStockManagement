@include('inc_admin.header')
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
// $box_id = $data['id'];

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Indent Form</h4>
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
                action="/inventory_executives/indent_form/{{$data['lot_no']}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="row">
                                        <div class="col-12 mb-sm-2">
                                            <span class="mandatory_star">*If the total meters is equal to added meters then you can submit</span>
                                        </div>
                                        <div class="col-3">
                                            <h4 class="mb-sm-2">Total Meters:{{$data['meter_count']}}</h4>
                                            {{-- <div class="text-end mb-3">
                                                <button type="button" id="add_section" class="btn btn-success w-sm"><i class="fa-solid fa-plus"></i></button>
                                            </div> --}}
                                        </div>
                                        <div class="col-3">
                                            <h4 class="mb-sm-2" id="added_meters">Added Meters: </h4>
                                            {{-- <div class="text-end mb-3">
                                                <button type="button" id="add_section" class="btn btn-success w-sm"><i class="fa-solid fa-plus"></i></button>
                                            </div> --}}
                                        </div>
                                        <div class="col-12">
                                            @foreach ($data['so_code'] as $code)
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="section_code">Section Code
                                                            </label>
                                                       <input type="" class="form-control" id="section_code"
                                                           name="section_code[]" value="{{$code->so_code}}, {{$code->section_office}}" placeholder=""
                                                           readonly>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="meter_quantity">Meter Quantity
                                                             </label>
                                                        <input type="number" class="form-control input-field" id="meter_quantity"
                                                            name="meter_quantity[]" value="" placeholder="Enter meter quantity"
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        {{-- <table id="myTable">
                                            <thead>

                                            </thead>
                                            <tbody>
                                                <tr id="section0" class="row">

                                                    <td class="col-5">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="product-title-input">Section Code
                                                                 <span class="mandatory_star">*<sup><i>required</i></sup></span></label>

                                                                <select name="so_code" class="form-control">
                                                                    <option value="" readonly disabled>Select</option>
                                                                @foreach ($data['so_code'] as $code)
                                                                <option value="">{{$code->so_code}}</option>
                                                                @endforeach

                                                                </select>
                                                        </div>
                                                    </td>
                                                    <td class="col-5">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="product-title-input">Meter Quantity
                                                                 <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                                            <input type="number" class="form-control" id="product-title-input"
                                                                name="lot_no" value="" placeholder="Enter Lot Number"
                                                                required>
                                                        </div>
                                                    </td>
                                                    <td class="col-2">
                                                       <label for=""></label><br>
                                                        <button type="button" id="delete_section" onclick="removeSection(0)" class="btn btn-success w-sm"><i class="fa-solid fa-trash-can"></button>
                                                    </td>
                                                </tr>
                                                <tr id="section1" class="row"></tr>
                                            </tbody>


                                        </table> --}}


                                    </div>
                                </div>

                                <!-- end card -->



                                {{-- <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-success w-sm">Add</button>
                                </div> --}}
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->


                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <div class="text-end mb-3">

                    {{-- <button id="submitBtn" type="submit" class="btn btn-success w-sm " disabled>Submit
                        </button> --}}
                        <button id="submitBtn" class="btn btn-success w-sm"  onclick="Swal.fire({icon: 'info',title: 'Please Wait, Uploading',showConfirmButton: false,timer: 500000})" class="btn btn-success btn-sm" type="submit" name="importSubmit">Submit</button>
                </div>
            </form>





        </div>
    </div>
</div>












<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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


<script>
    // $(document).ready(function() {


    //             var i = 1;


    //     $("#add_section").click(function() {
    //         $('#section' + i).html("<td class='col-5'><div class='mb-3'><label class='form-label' for='product-title-input'>Meter Quantity<span class='mandatory_star'>*<sup><i>required</i></sup></span></label><input type='number' class='form-control' id='product-title-input'name='lot_no' value='' placeholder='Enter Lot Number'required></div></td><td class='col-2'><button type='button' id='delete_section' onclick='removeSection(" + i + ")'' class='btn btn-success w-sm'><i class='fa-solid fa-trash-can'></button></td>");

    //         $('#myTable').append('<tr class="row" id="section' + (i + 1) + '"></tr>');
    //         i++;


    //         // $("#no_of_rows").val(i);
    //     });
    // });
    // function removeSection(index) {
    //         var section = document.getElementById("section" + index);
    //         section.parentNode.removeChild(section);
    //     }
    const meter_count = {{$data['meter_count']}};
    const inputFields = document.querySelectorAll('.input-field');
const submitBtn = document.getElementById('submitBtn');
const added_meters = document.getElementById('added_meters');
inputFields.forEach(input => {
  input.addEventListener('input', () => {
    const sum = [...inputFields].reduce((total, input) => total + (+input.value || 0), 0);
    added_meters.innerHTML ="Added Meters:"+sum;
    if (sum === meter_count) {
      submitBtn.disabled = false;
    } else {
      submitBtn.disabled = true;
    }
  });
});

</script>
