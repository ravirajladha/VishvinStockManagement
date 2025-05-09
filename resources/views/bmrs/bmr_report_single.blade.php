@include("inc_admin.header")
<?php
// $approved_meters = $data['approved_meters'];
$meter_main_ids = $data['meter_main_ids'];
use App\Models\Consumer_detail;
use App\Models\Meter_main;
?>
<link rel="stylesheet" type="text/css" href="assets_admin/css/vendors/datatables.css">
<style>
  .form-group {
margin-bottom: 1rem;
}

label {
display: block;
font-weight: bold;
}

input[type="date"] {
padding: 0.5rem;
border: 1px solid #ccc;
border-radius: 0.25rem;
font-size: 1rem;
width: 100%;
box-sizing: border-box;
}

button[type="submit"] {
padding: 0.5rem 1rem;
border: none;
border-radius: 0.25rem;
font-size: 1rem;
background-color: #007bff;
color: #fff;
cursor: pointer;
}

</style>
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
                            <h4 class="mb-sm-0">BMR Reports</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Basic Tables</li> -->
                                </ol>
                            </div>

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
              <table class="table cell-border compact strip" id="myTable" data-order='[[ 0, "desc" ]]' data-page-length='10'>
                <thead>
                  <tr>


                    <th>Sl. No.</th>
                    <th>SP Id</th>
                    <th>Account Id</th>
                    <th>SubDivision code</th>
                    <th>Meter Replacement date (DD-MM-YYYY)</th>
                    <th>Serial NO.</th>
                    <th>Manufacturer (Meter Make)</th>
                    <th>Meter Type</th>
                    <th>Year Of Manufacture</th>
                    <th>Is meter digital</th>
                    <th>Final Reading(KWH)</th>
                    <th>Final Reading(KVAH)</th>
                    <th>SR CODE</th>
                    <th>Serial no.</th>
                    <th>Manufacturer(Meter Make)</th>
                    <th>Meter Type</th>
                    <th>Year of Manufacture(YYYY)</th>
                    <th>Meter Model</th>
                    <th>Is meter digital</th>
                    <th>Number of Revolution Pulse</th>
                    <th>Meter constant</th>
                    <th>Multiplication Factor</th>
                    <th>Inital Reading(KWH)</th>
                    <th>Initial Reading(KVAH)</th>
                    <th>Number of Dials(total no of digits inclluding decimal)</th>
                    <th>Default Decimal(digits after Decimal)</th>
                    <th>Current Rating</th>
                    <th>Voltage(in Volts)</th>
                    <th>SR code</th>
                    {{-- <th class="sort text-uppercase" data-sort="serial_no">
                        Serial No</th>
                    <th class="sort text-uppercase" data-sort="updated_at">Last Finalized</th> --}}



                  </tr>

                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    <?php foreach($meter_main_ids as $meter_main_id){
                        $count++;
                        $approved_meter = Meter_main::where('id',$meter_main_id)->first();
                        $get_consumer_details = Consumer_detail::where('account_id', $approved_meter->account_id)->first();

                        ?>


                   <tr>


                    <td><?php echo $count; ?></td>
                    <td>{{$get_consumer_details->sp_id}}</td>
                    <td>{{$approved_meter->account_id}}</td>
                    <td>{{$get_consumer_details->sd_pincode}}</td>
                    {{-- <td>{{ date('d/m/Y', strtotime($approved_meter->created_at)) }}</td> --}}
                    <td>{{ date('d-m-Y', strtotime($approved_meter->created_at)) }}</td>
                    <td>{{$approved_meter->serial_no_old}}</td>
                    <td>{{!empty($approved_meter->meter_make_old) ? $approved_meter->meter_make_old : 'Null'}}</td>
                    <td>EM</td>
                    <td>{{$approved_meter->mfd_year_old}}</td>
                    <td>N</td>
                    <td>{{$approved_meter->final_reading}}</td>
                    <td>0</td>
                    <td>900001</td>
                    <td>{{!empty($approved_meter->serial_no_new) ? $approved_meter->serial_no_new : 'Null'}}</td>
                    <td>GENUS POWER INFRASTRUCTURE LTD</td>
                    <td>{{$get_consumer_details->meter_type == 1 ? 'EDL' : 'EDL3'}}</td>
                    <td>2023</td>
                    <td>DLMS</td>
                    <td>Y</td>
                    <td>{{$get_consumer_details->meter_type == 1 ? '3200' : '1200'}}</td>
                    <td>1</td>
                    <td>1</td>
                    <td>{{!empty($approved_meter->initial_reading_kwh) ? $approved_meter->initial_reading_kwh : 'Null'}}</td>
                    <td>{{!empty($approved_meter->initial_reading_kvah) ? $approved_meter->initial_reading_kvah : 'Null'}}</td>

                    <td>7</td>
                    <td>2</td>
                    <td>30</td>
                    <td>{{$get_consumer_details->meter_type == 1 ? '230' : '400'}}</td>
                    <td>{{$get_consumer_details->meter_type == 1 ? '357006' : '357531'}}</td>


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
    $('#myTable').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'excelHtml5',
        'pdfHtml5'
      ]
    });
  });


  $('input[type="checkbox"]').prop('checked', true);

//   $('#myTable').on('click', '.excelHtml5', function() {
//     $.ajax({
//         url: '/admins/download_excel',
//         type: 'POST',
//         data: {
//             _token: '{{ csrf_token() }}'
//         },
//         success: function(response) {
//             window.location.href = response.url;
//         },
//         error: function(xhr) {
//             console.log(xhr.responseText);
//         }
//     });
// });
</script>
