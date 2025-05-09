@include("inc_admin.header")

<style>
    .table th {
        width: 50%;
    }
</style>

<head>

    <title style="background-color:black;color:white;">ANNEXURE-II</title>


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
                            <h4 class="mb-sm-0">QC Executve View Detail</h4>
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
                    <div class="col-xl-1209">
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
                                                <th class="text-end">Parametrers</th>
                                                <th style="width: 50%;"> Electromechanical</th>
                                                <th>Electrostatic</th>


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
                                                <td style="width: 550%;">GENUS OVERSEAS ELECTRONICS LTD</td>

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

                                            <a href="javascript:void(0);" class="btn btn-primary">
                                                <!-- <i class="ri-download-2-line align-bottom me-1"></i> -->
                                                Edit</a>

                                            <button type="submit" class="btn btn-success">
                                                <!-- <i class="ri-printer-line align-bottom me-1"></i> -->
                                                 Approve</button>
                                            
                                            <a href="javascript:void(0);" class="btn btn-danger">
                                                <!-- <i class="ri-send-plane-fill align-bottom me-1"></i> -->
                                                Reject</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none code-view">
                                    <pre class="language-markup" style="height: 275px;"><code>&lt;!-- Striped Rows --&gt;
&lt;table class=&quot;table table-striped&quot;&gt;
    &lt;thead&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;col&quot;&gt;Id&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Customer&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Date&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Invoice&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Action&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
            &lt;td&gt;Bobby Davis&lt;/td&gt;
            &lt;td&gt;Nov 14, 2021&lt;/td&gt;
            &lt;td&gt;$2,410&lt;/td&gt;
            &lt;td&gt;&lt;span class=&quot;badge bg-success&quot;&gt;Confirmed&lt;/span&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
            &lt;td&gt;Christopher Neal&lt;/td&gt;
            &lt;td&gt;Nov 21, 2021&lt;/td&gt;
            &lt;td&gt;$1,450&lt;/td&gt;
            &lt;td&gt;&lt;span class=&quot;badge bg-warning&quot;&gt;Waiting&lt;/span&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
            &lt;td&gt;Monkey Karry&lt;/td&gt;
            &lt;td&gt;Nov 24, 2021&lt;/td&gt;
            &lt;td&gt;$3,500&lt;/td&gt;
            &lt;td&gt;&lt;span class=&quot;badge bg-success&quot;&gt;Confirmed&lt;/span&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;4&lt;/th&gt;
            &lt;td&gt;Aaron James&lt;/td&gt;
            &lt;td&gt;Nov 25, 2021&lt;/td&gt;
            &lt;td&gt;$6,875&lt;/td&gt;
            &lt;td&gt;&lt;span class=&quot;badge bg-danger&quot;&gt;Cancelled&lt;/span&gt;&lt;/td&gt;
        &lt;/tr&gt;
    &lt;/tbody&gt;
&lt;/table&gt;</code></pre>
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


<!-- prismjs plugin -->
<script src="/assets_admin/libs/prismjs/prism.js"></script>

<!-- App js -->
<script src="/assets_admin/js/app.js"></script>
</body>

</html>