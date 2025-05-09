@include('inc_admin.header')
<link href="/assets_admin/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="/assets_admin/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Inventory;
use App\Models\Admin;
use App\Models\Zone_code;
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
                        <h4 class="mb-sm-0">Meter Stocks</h4>
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
                action="/inventory_executives/meter_stocks_filter" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="row">

                                        <div class="col-12">
                                            {{-- <h4 class="mb-sm-0">Total Meters</h4> --}}
                                            
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-title-input">Division
                                                     <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                                
                                                    <select id="division" name="division" class="form-control">
                                                        <option value="" readonly disabled>Select</option>
                                                    @foreach ($data['divisions'] as $division)
                                                    @php
                                                        $division_name = Zone_code::where('div_code',$division->division)->first();
                                                    @endphp
                                                    <option value="{{$division->division}}">{{$division->division}}, {{$division_name->division}}</option>
                                                    @endforeach
                                                    
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-title-input">Section code
                                                     <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                                
                                                    <select id="so_code" name="so_code" class="form-control">
                                                        <option value="" readonly disabled>Select</option>
                                                    {{-- @foreach ($data['so_pincodes'] as $so_code)
                                                    <option value="{{$so_code->so_code}}">{{$so_code->so_code}}</option>
                                                    @endforeach --}}
                                                    
                                                    </select>
                                            </div>
                                            
                                        </div>
                                        <div class="col-4">
                                            <div class=" mt-2">
                                                <br>
                                                <button id="submitBtn" type="submit" class="btn btn-success w-sm ">Serach
                                                </button>
                                            </div>
                                        </div>
                                       
                                    </div>
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

            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
    
                                <th scope="col">Section code</th>
    
                                <th scope="col">Meter Quantity</th>
                                
    
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($data['selected_code']))
                                <tr>
                                    <td>{{$data['selected_code']}}</td>
                                    <td>{{$data['quantity']}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>
    </div>
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


<script>

    $(document).ready(function() {
    $('#division').change(function() {
        var division = $(this).val();
        $('#so_code').empty();
        $('#so_code').append($('<option>', { value: '', text: '-- Select --' }));
        if(division) {
            $.get('/inventory_executives/get_so_code/' + division, function(so_codes) {
                $.each(so_codes, function(i, code) {
                    // console.log(code);
                    var option_text = code.so_code + ' , ' + code.section_office;
                    $('#so_code').append($('<option>', { value: code.so_code, text: option_text }));
                });
            });
        }
    }).trigger('change'); // Trigger the change event on page load
});



</script>
