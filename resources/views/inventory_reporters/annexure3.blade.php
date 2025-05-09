@include("inc_admin.header")
<script src="jquery-3.6.3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<head>

    <title>All Vendors</title>


</head>
<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Zone_code;
?>
<?php

$unique_sd_pincodes = $data['unique_sd_pincodes'];
$em_meters  = $data['em_meters'];
$all_annexure3s  = $data['all_annexure3'];


?>

<div id="layout-wrapper">
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Number of Meter Replaced</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Basic Tables</li> -->
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-auto ms-auto">
                        <div class="hstack gap-2">
                            <!-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button> -->
                            <!-- <button type="button" class="btn btn-info" data-bs-toggle="offcanvas" href="#ple"><i class="ri-filter-3-line align-bottom me-1"></i> Fliters</button> -->
                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                            <span class="dropdown">
                                <!-- <button class="btn btn-soft-info btn-icon fs-14" type="button" id="dropdownMeuutton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-settings-4-line"></i>
                                </button> -->

                            </span>
                        </div>
                    </div>
                </div>



  <!-- Container-fluid starts-->
  <?php
  $url =  "{$_SERVER['REQUEST_URI']}";
  $url = explode('/', $url);
  ?>
  <div class="container-fluid general-widget">
    <div class="row">


      <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
        <div class="card ongoing-project recent-orders">
          <br>
          <div class="card-body pt-0">
            <div class="table-responsive">
              <table class="table cell-border compact strip" data-order='[[ 0, "desc" ]]' data-page-length='10'>
                <thead>
                  <tr>

                    <th>Sl. No.</th>
                    <th>
                        Start Date</th>
                      <th> End Date</th>
                      <th>Circle</th>
                      <th>Division</th>
                      <th>SO Code</th>
                      <th>SD Code</th>
                      <th>ES Meter Replaced</th>
                      <th>EM Meter Released</th>
                      <th>Remark</th>
                      <th>Created At</th>
                    {{-- <th class="sort text-uppercase" data-sort="serial_no">
                        Serial No</th>
                    <th class="sort text-uppercase" data-sort="updated_at">Last Finalized</th> --}}



                  </tr>

                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    <?php foreach($all_annexure3s as $all_annexure3){
                        $count++; ?>


                   <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $all_annexure3->start_date; ?></td>
                    <td><?php echo $all_annexure3->end_date; ?></td>
                    <td><?php echo $all_annexure3->circle; ?></td>
                    <td><?php echo $all_annexure3->division; ?></td>
                    <td><?php echo $all_annexure3->sd_pincode; ?></td>
                    <td><?php echo $all_annexure3->so_pincode; ?></td>
                    <td><?php echo $all_annexure3->no_of_es_meter_released; ?></td>
                    <td><?php echo $all_annexure3->no_of_es_meter_replaced; ?></td>
                    <td><?php echo $all_annexure3->remarks; ?></td>
                    <td><?php echo $all_annexure3->created_at?></td>




                </tr>
            <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- END layout-wrapper -->

<!-- ==================================MODAL STARTS ================================================= -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="create_annexure3" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id-field" />
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="company_name-field" class="form-label">Start Date <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                <input type="date" id="company_name-field" class="form-control" name="start_date" placeholder="Enter" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="company_name-field" class="form-label">End Date <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                <input type="date" id="company_name-field" class="form-control" name="end_date" placeholder="Enter" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="company_name-field" class="form-label">Circle <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                <input type="text" id="company_name-field" class="form-control" name="circle" placeholder="Enter" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="company_name-field" class="form-label">Division <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                <input type="text" id="company_name-field" class="form-control" name="division" placeholder="Enter" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label" for="product-title-input">SD Code <span
                                        class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                <select class="form-control" name="sd_pincode" id="sd_pincode">
                                    <option value="">Select SD Code</option>
                                    @foreach ($unique_sd_pincodes as $unique_sd_pincode)
                                        <option value="{{$unique_sd_pincode->sd_code}}">
                                            {{$unique_sd_pincode->sd_code}}

                                            <?php
                                            $sd_pincode_name = Zone_code::where('sd_code', $unique_sd_pincode->sd_code)->first();
                                            ?>
                                            @if ($sd_pincode_name)
                                                 {{ $sd_pincode_name->sub_division }}
                                            @endif




                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label" for="product-title-input">Section Office Code <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                <select class="form-control" name="so_pincode" id="so_pincode">
                                    <option value=""></option>


                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div>
                                <label for="company_name-field" class="form-label">Remarks <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                <input type="text" id="company_name-field" class="form-control" placeholder="Enter" required name="remarks" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="add-btn">Add</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ==================================MODAL ENDS ================================================= -->
@include("inc_admin.footer")

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
        'excelHtml5',
        'pdfHtml5'
      ]
    });
  });
</script>
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
                    $.each(res, function(key, value) {
                        $('#so_pincode').append('<option value="' + value
                            .so_code + '">' + value.so_code + '</option>');
                    });
                    // $('#city').html('<option value="">Select City</option>');
                }
            });
        });
        });
</script>

