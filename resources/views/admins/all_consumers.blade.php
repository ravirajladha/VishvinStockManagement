@include("inc_admin.header")
<?php
// $users = $data['show_users'];
?>
<link rel="stylesheet" type="text/css" href="assets_admin/css/vendors/datatables.css">

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
                            <h4 class="mb-sm-0">Verified QC Reports</h4>
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
        <style>
            svg {
                width: 40px;
            }
            .flex-1 {
                margin-top: 20px;
            }
            .hidden{
                margin-top: 20px;
            }
        </style>

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
                        RR No</th>
                      <th>Account Id</th>
                      <th>Consumer Name</th>
                      <th>Consumer Address</th>
                      <th>SO Pincode</th>
                      <th>SD Pincode</th>
                      <th>Meter Type</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Tariff</th>
                      <th>MR Code</th>
                      <th>Read Date</th>

                    {{-- <th class="sort text-uppercase" data-sort="serial_no">
                        Serial No</th>
                    <th class="sort text-uppercase" data-sort="updated_at">Last Finalized</th> --}}



                  </tr>

                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    <?php foreach($show_users as $user){
                        $count++; ?>


                   <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $user->rr_no; ?></td>
                    <td><?php echo $user->account_id; ?></td>
                    <td><?php echo $user->consumer_name; ?></td>
                    <td><?php echo $user->consumer_address; ?></td>
                    <td><?php echo $user->so_pincode; ?></td>
                    <td><?php echo $user->sd_pincode; ?></td>
                    <td><?php echo $user->meter_type; ?></td>
                    <td><?php echo $user->latitude; ?></td>
                    <td><?php echo $user->longitude; ?></td>
                    <td><?php echo $user->tariff; ?></td>
                    <td><?php echo $user->mrcode; ?></td>
                    <td><?php echo $user->read_date; ?></td>




                </tr>
            <?php } ?>
                </tbody>
              </table>
              {{ $show_users->links() }}
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
    $('.table').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'excelHtml5',
        'pdfHtml5'
      ]
    });
  });
</script>
