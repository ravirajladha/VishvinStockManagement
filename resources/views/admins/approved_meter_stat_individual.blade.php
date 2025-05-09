@include("inc_admin.header")
<style>
    .table th {
        width: 33%;
    }
</style>

<head>

    <title style="background-color:black;color:white;"></title>


</head>



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
                            <h4 class="mb-sm-0">Approved By HESCOMs View</h4>
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
                    <div class="col-xl-12">
                        <div class="card">
                            <!-- end card header -->

                            <div class="card-body">

                                <div class="live-preview">
                                    <div class="table-responsive">
                                        <table style="width:100%" class="table table-hover table-striped table-bordered">



                                            <tr>
                                                <th>Account ID</th>
                                                <td> Entry</td>
                                            </tr>
                                            <tr>
                                                <th>RR Number</th>
                                                <td>Auto fetch</td>

                                            </tr>
                                            <tr>
                                                <th>Name of the consumer</th>
                                                <td>Auto fetch</td>

                                            </tr>
                                            <tr>
                                                <th>Section</th>
                                                <td>Auto fetch</td>

                                            </tr>
                                            <!-- =============================================================== -->

                                            <tr>
                                                <th>Sub Division</th>
                                                <td>Auto fetch</td>
                                            </tr>


                                            <tr>
                                                <th>Installation Type</th>
                                                <td colspan="2">Auto fetch</td>

                                            </tr>
                                            <tr>
                                                <th class="p-4">Parametrers</th>
                                                <th style="width: 35%;" class="p-4"> Electromechanical</th>
                                                <th class="p-4">Electrostatic</th>


                                            </tr>
                                            <tr>
                                                <th>Photos with readings on display</th>
                                                <td> --Photo--</td>
                                                <td> --Photo--</td>


                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> --Photo--</td>
                                                <td> --Photo--</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> --Photo--</td>
                                                <td> --Photo--</td>
                                            </tr>
                                            <tr>
                                                <th>Meter Make</th>
                                                <td>Entry</td>
                                                <td> GENUS POWER INFRASTRUCTURES LTD.</td>

                                            </tr>

                                            <tr>
                                                <th>Meter Serial No</th>
                                                <td>Entry</td>
                                                <td>Entry</td>
                                            </tr>

                                            <tr>
                                                <th>Year Of Manufacture</th>
                                                <td>Entry</td>
                                                <td>Entry</td>
                                            </tr>

                                            <tr>
                                                <th>Final Reading (FR)-kWh</th>
                                                <td>Entry</td>
                                                <td>---NA---</td>
                                            </tr>
                                            <tr>
                                                <th>Initial Reading g (IR)-kWh</th>
                                                <td>---NA---</td>
                                                <td>Entry</td>
                                            </tr>
                                            <tr>
                                                <th>Initial Reading g (IR)-kVAh</th>
                                                <td>---NA---</td>
                                                <td>Entry</td>
                                            </tr>
                                            <tr>
                                                <th>Date & Time of meter replacement</th>
                                                <td>Entry</td>
                                            </tr>
                                            <tr>
                                                <th>GPS Coordinates of the energy meter</th>
                                                <td>Auto fetch (Latitude:______ Longitude:__________)</td>
                                            </tr>

                                            <!-- =============================================================== -->

                                        </table>

                                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">


                                            <button type="submit" class="btn btn-success">
                                                <!-- <i class="ri-printer-line align-bottom me-1"></i> -->
                                                 Print</button>


                                        </div>
                                    </div>
                                </div>
                                <div class="d-none code-view">

                                </div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->




            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->




@include("inc_admin.footer")
