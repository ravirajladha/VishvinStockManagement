@include('inc_admin.header')
<link href="/assets_admin/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="/assets_admin/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }


    #checkbox-container {
        display: none;
    }
</style>
<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Inventory;
use App\Models\Admin;
use App\Models\Contractor;

?>
<?php
$contractors = $data['contractors'];
$warehouse_meters = $data['warehouse_meters'];
$contractor_inventories = $data['contractor_inventories'];

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Outward for Installation</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                <li class="breadcrumb-item active">Outward for Installation</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation"
                action="create_outward_installation" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Date</label>
                                            <input type="date" class="form-control" id="product-title-input" name="start_date" required>
                                        </div> --}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Select Division <span
                                                    class="mandatory_star">*</span></label>
                                            <select name="division" class="form-control" id="division" required>
                                                {{-- <option value="530001">Hubli</option>
                                                <option value="530003">Dharwad</option>
                                                <option value="530005">Gadag</option> --}}
                                                <option value="530010">Belagavi, 530010</option>
                                                <option value="530016">Vijayapura, 530016</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Type of Meters <span
                                                    class="mandatory_star">*</span></label>
                                            <select class="form-control" name="meter_type" required>
                                                <option value="1">Single Phase</option>
                                                <option value="2">Three Phase</option>

                                            </select>

                                        </div>
                                    </div>
                                </div>



                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Select Contractor <span
                                            class="mandatory_star">*</span></label>

                                    <select class="form-control" name="contractor_id" required>
                                        <option value="" readonly>Select Contractor</option>
                                        @foreach ($contractors as $contractor)
                                        @php
                                            $contractor_details = Contractor::where('auth_id', $contractor->id)->first();
                                        @endphp
                                            <option value="{{ $contractor->id }}">{{ $contractor_details->contractor_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">DC Number <span
                                            class="mandatory_star">*</span></label>
                                    <input type="number" class="form-control" id="product-title-input" name="dc_no"
                                        value="" placeholder="Enter DC Number" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Select Box <span
                                            class="mandatory_star">*</span></label>
                                    <select class="form-control" name="box_id" required id="box_id">
                                        <option value="" readonly>Select Box Id</option>
                                        {{-- @foreach ($warehouse_meters as $warehouse_meter)
                                            <option value="{{ $warehouse_meter->id }}">{{ $warehouse_meter->id }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Select Meter Serial No Below:
                                    </label>

                                    <div id="checkbox-container">

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



                            <th scope="col">Meter Type</th>
                            <th scope="col">Division</th>
                            <th scope="col">Lot No</th>


                            <th scope="col">Meter Serial No</th>
                            <th scope="col"> Total Quantity</th>

                            <th scope="col">Unused</th>
                            <th scope="col">Used</th>
                            <th scope="col">Contractor</th>
                            <th scope="col">Created At</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($contractor_inventories))
                            @foreach ($contractor_inventories as $contractor_inventory)
                                <?php
                                $count = 0;
                                $count++;
                                ?>

                                <tr>
                                    <th scope="row"><?php echo $contractor_inventory->box_id; ?></th>
                                    <td><?php if ($contractor_inventory->meter_type == 1) {
                                        echo 'Single Phase';
                                    } else {
                                        echo 'Three Phase';
                                    } ?></td>

                                    <td>{{ $contractor_inventory->division }}</td>

                                    <td>{{ $contractor_inventory->dc_no }}</td>
                                    <td>{{ $contractor_inventory->serial_no }}</td>
                                    <td> <?php
                                    $count = 0;
                                    $meter_single_serial_nos = explode(',', $contractor_inventory->serial_no);
                                    foreach ($meter_single_serial_nos as $meter_single_serial_no) {
                                        $count++;
                                    }
                                    echo $count; ?></td>
                                    <td>{{ $contractor_inventory->unused_meter_serial_no }}</td>
                                    <td>{{ $contractor_inventory->used_meter_serial_no }}</td>


                                    <?php
                                    $created_by_detail = Admin::where('id', $contractor_inventory->contractor_id)->first();
                                    ?>
                                    <td>{{ ucwords($created_by_detail->name) }}</td>
                                    <td>{{ $contractor_inventory->created_at }}</td>
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

<script type="text/javascript">
    $(document).ready(function() {

        $('#box_id').on('change', function() {
            var box_id = this.value;

            $('#checkbox-container').html(''); // clear existing checkboxes
            var meter_type = $('select[name="meter_type"]').val(); // Get the selected meter type
            if (!meter_type) {
                return; // Return if meter type is not selected
            }
            var url = '{{ route('get_meter_serial_no') }}?box_id=' + box_id + '&meter_type=' +
                meter_type; // Construct the URL with box_id and meter_type parameters
            $.ajax({
                url: url,
                type: 'get',
                beforeSend: function() {
                    // Show a loading spinner or message before the AJAX call
                    $('#checkbox-container').html('<p>Loading...</p>').show();
                },
                success: function(res) {
                    var values = res.split(",");

                    if (values.length === 1 || values[0].trim() === '') {
                        $('#checkbox-container').html(
                            'No meter serial number found for the selected box ID.');
                        return;
                    }

                    var selectAllCheckbox = $('<input>').attr({
                        type: 'checkbox',
                        name: 'select_all',
                        id: 'select_all'
                    });

                    var selectAllLabel = $('<label>').attr({
                        for: 'select_all'
                    }).text('Select All');
                    $('#checkbox-container').html('').append(selectAllCheckbox,
                        selectAllLabel, '<br>');

                    for (var i = 0; i < values.length; i++) {
                        var checkbox = $('<input>').attr({
                            type: 'checkbox',
                            name: 'meter_serial_no[]',
                            value: values[i],
                            id: 'meter_serial_no_' + i
                        });
                        var label = $('<label>').attr({
                            for: 'meter_serial_no_' + i
                        }).text(values[i]);
                        $('#checkbox-container').append(checkbox, label, '<br>');
                    }

                    // Add click event listener to the "Select All" checkbox
                    $('#select_all').on('click', function() {
                        $('input[name="meter_serial_no[]"]').prop('checked', this
                            .checked);
                    });

                    $('select[name="meter_type"]').on('change', function() {
                        $('#checkbox-container').html(
                            ''); // Clear existing checkboxes
                        $('#box_id').trigger(
                            'change'
                        ); // Trigger the change event for the box ID select element
                    });


                    // Show the #checkbox-container div
                    $('#checkbox-container').show();
                },
                error: function() {
                    // Show an error message if the AJAX call fails
                    $('#checkbox-container').html('<p>Error loading data.</p>');
                }
            });
        });
    });
</script>
{{-- <script>
    $(document).ready(function(){
    $('#division').on('change', function(){
        var division = $(this).val();
        alert(division);
        if(division){
            $.ajax({
                url: '/inventory_executives/get_box/'+division,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('#box_id').empty();
                    $.each(data, function(){
                        console.log(data);
                        alert(data);
                        $('#box_id').append('<option value="'+data.id+'">'+data.id+'</option>');
                    });
                }
            });
        }else{
            $('#box_id').empty();
        }
    });
});

</script> --}}




<script>

//     $(document).ready(function() {
//     $('#division').change(function() {
//         var division = $(this).val();
//         $('#box_id').empty();
//         $('#box_id').append($('<option>', { value: '', text: '-- Select --' }));
//         if(division) {
//             $.get('/inventory_executives/get_box/' + division, function(so_codes) {
//                 $.each(so_codes, function(i, code) {
//                     // console.log(code);
//                     $('#box_id').append($('<option>', { value: code.id, text: code.id }));
//                 });
//             });
//         }
//     });
// });


$(document).ready(function() {
    $('#division').change(function() {
        var division = $(this).val();
        $('#box_id').empty();
        $('#box_id').append($('<option>', { value: '', text: '-- Select --' }));
        if(division) {
            $.get('/inventory_executives/get_box/' + division, function(so_codes) {
                $.each(so_codes, function(i, code) {
                    // console.log(code);
                    $('#box_id').append($('<option>', { value: code.id, text: code.id }));
                });
            });
        }
    }).trigger('change'); // Trigger the change event on page load
});



</script>



{{-- success: function(data){
    $('#box_id').empty();
    $.each(data, function(index, value){
        console.log(value);
        $('#box_id').append('<option value="'+value.id+'">'+value.id+'</option>');
    });
} --}}

