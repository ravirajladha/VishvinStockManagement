@include("inc_admin.header")

<?php
$approved_meters = $data['approved_meters'];
?>

<link rel="stylesheet" type="text/css" href="/assets_admin/css/vendors/datatables.css">


<!-- Begin page -->
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
                            <h4 class="mb-sm-0">Approved By HESCOMs</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Basic Tables</li> -->
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="invoiceList">
                            <div class="card-header border-0">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0 flex-grow-1">Invoices</h5>
                                    {{-- <div class="flex-shrink-0">
                                        <button class="btn btn-primary" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                        <a href="#" class="btn btn-danger"><i
                                                class="ri-add-line align-bottom me-1"></i> Create Invoice</a>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="card ongoing-project recent-orders">
                                <br>
                                <div class="card-body pt-0">
                                  <div class="table-responsive">
                                  <table class="table cell-border compact strip"  data-order='[[ 0, "desc" ]]' data-page-length='10'>
                                            <thead>
                                                <tr>
                                                    {{-- <th scope="col" style="width: 50px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="checkAll" value="option">
                                                        </div>
                                                    </th> --}}
                                                    <th class="sort text-uppercase" data-sort="invoice_id">Sl. No.</th>
                                                    <th class="sort text-uppercase" data-sort="account_id">
                                                        Account Id</th>
                                                    <th class="sort text-uppercase" data-sort="serial_no">
                                                        Serial No</th>
                                                    <th class="sort text-uppercase" data-sort="updated_at">Last Finalized</th>

                                                    {{-- <th class="sort text-uppercase" data-sort="status">Payment
                                                        Status</th>
                                                    <th class="sort text-uppercase" data-sort="action">Action</th> --}}
                                                </tr>
                                            </thead>
                                            {{-- <tbody class="list form-check-all" id="invoice-list-data"> --}}
                                                <tbody>
                                                <?php $count = 0; ?>
                                                @foreach($approved_meters as $approved_meter)
                                                {{$count++}}
                                               <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$approved_meter->account_id}}</td>
                                                <td>{{$approved_meter->serial_no_new}}</td>
                                                <td>{{$approved_meter->serial_no_old}}</td>
                                                <td>{{$approved_meter->aao_updated_at}}</td>

                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{-- <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                                    trigger="loop" colors="primary:#121331,secondary:#08a88a"
                                                    style="width:75px;height:75px">
                                                </lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted mb-0">We've searched more than 150+ invoices We
                                                    did not find any
                                                    invoices for you search.</p>
                                            </div>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="d-flex justify-content-end mt-3">
                                        <div class="pagination-wrap hstack gap-2">
                                            <a class="page-item pagination-prev disabled" href="#">
                                                Previous
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0"></ul>
                                            <a class="page-item pagination-next" href="#">
                                                Next
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>


                                <!--end modal -->
                            </div>
                        </div>

                    </div>
                    <!--end col-->
                </div>
                <!--end row-->




            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->




@include("inc_admin.footer")

<script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>

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
  $('.table').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'excelHtml5',
          'pdfHtml5'
      ]
  } );
} );

</script>



