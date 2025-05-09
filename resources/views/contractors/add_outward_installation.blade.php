@include('inc_admin.header')
<link href="/assets_admin/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="/assets_admin/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }
</style>
<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\inventory;
use App\Models\Admin;
?>
<?php
$contractors = $data['contractors'];
$warehouse_meters = $data['warehouse_meters'];
$contractor_inventories = $data['contractor_inventories'];

?>




<div class="main-content" style="padding-top:0px;">
    <div class="page-content" style="padding-top:0px;">
        <div class="container-fluid" style="padding-top:50px;">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">View Contractor Inventories</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> Contractor Inventories</a>
                                </li>
                                <li class="breadcrumb-item active">View Contractor Table</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        <!-- end page title -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table" style="table-layout: fixed;">
                    <thead>
                        <tr>

                            <th scope="col">Serial No</th>
                            <th scope="col">Meter Serial No</th>

                            <th scope="col">Division</th>
                            <th scope="col">Meter Type</th>
                            <th scope="col">DC No</th>
                            <th scope="col">Contractor</th>

                            <th scope="col">Quantity</th>
                            <th scope="col">Unused</th>
                            <th scope="col">Used</th>



                            <th scope="col">Created By</th>
                            <th scope="col">Created At</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;

                        ?>
                        @foreach ($contractor_inventories as $contractor_inventory)
                            <?php

                            $count++;
                            ?>

                            <tr>
                                <th scope="row"><?php echo $count; ?></th>

                                <td>{{ $contractor_inventory->serial_no }}</td>
                                <td>{{ ucwords($contractor_inventory->division) }}</td>
                                <td><?php if ($contractor_inventory->meter_type == 1) {
                                    echo 'Single Phase';
                                } else {
                                    echo 'Three Phase';
                                } ?></td>

                                <td>{{ $contractor_inventory->dc_no }}</td>

                                <?php
                                $created_by_detail = Admin::where('id', $contractor_inventory->contractor_id)->first();
                                ?>
                                <td>{{ ucwords($created_by_detail->name) }}</td>






                                <?php
                                $str = $contractor_inventory->serial_no; // The string containing two numbers separated by a hyphen
                                $nums = explode(',', $str); // Split the string into an array using the hyphen as a delimiter
                                $diff = count($nums);
                                ?>
                                <td>{{ $diff }}</td>
                                <td>{{ $contractor_inventory->unused_meter_serial_no }}</td>
                                <td>{{ $contractor_inventory->used_meter_serial_no }}</td>

                                <?php
                                $created_by_detail = Admin::where('id', $contractor_inventory->created_by)->first();
                                ?>
                                <td>{{ ucwords($created_by_detail->name) }}</td>



                                <td>{{ $contractor_inventory->created_at }}</td>
                            </tr>
                        @endforeach




                    </tbody>
                </table>
            </div>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/1.12.1/css/dataTables.responsive.css">
<script type="text/javascript" src="//cdn.datatables.net/responsive/1.12.1/js/dataTables.responsive.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">


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

      ]
    });
  });
</script>
