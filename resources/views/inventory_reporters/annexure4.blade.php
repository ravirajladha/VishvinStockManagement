@include("inc_admin.header")



<head>

    <title style="background-color:black;color:white;">ANNEXURE-II</title>


</head>


<?php
$meter_main = $data['meter_main'];
$consumer_detail = $data['consumer_detail'];
?>

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
                            <h4 class="mb-sm-0">ANNEXURE-IV</h4>
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
                                        <table style="width:100%" class="table table-hover table-striped table-bordered border-dark">

                                        <tr>
                                        <th rowspan="5" scope="row" style="margin-top: 50px;">BMR Format</th>

                                        </tr>
                                            <tr>
                                                <th>S No.</th>
                                                <td >{{ $meter_main->id }}</td>
                                            </tr>
                                            <tr>
                                                <th>*SP ID</th>
                                                <td>Service point ID</td>

                                            </tr>
                                            <tr>
                                                <th>*Account ID </th>
                                                <td>{{ $meter_main->account_id }}</td>

                                            </tr>
                                            <tr>
                                                <th>*Meter Replacement date </th>
                                                <td>{{ $meter_main->created_at }}</td>

                                            </tr>
                                            <!-- =============================================================== -->
                                            <tr>
                                                <th rowspan="9">OLD METER DATA</th>

                                            </tr>
                                            <tr>
                                                <th>Serial No.</th>
                                                <td>{{ $meter_main->serial_no_old }}</td>
                                            </tr>
                                            <tr>
                                                <th>Manufacturer(Meter Make)</th>
                                                <td>{{ $meter_main->meter_make_old }}</td>

                                            </tr>
                                            <tr>
                                                <th>*Meter Type </th>
                                                <td>@if($consumer_detail->meter_type == 1)
                                                    {{ 'Single Phase' }}
                                                @elseif($consumer_detail->meter_type == 3)
                                                    {{ 'Three Phase' }}
                                                @endif
                                                    </td>

                                            </tr>
                                            <tr>
                                                <th>Year of Manufacture</th>
                                                <td>{{ $meter_main->mfd_year_old }}</td>

                                            </tr>
                                            <tr>
                                                <th>*Is meter digital</td></th>
                                                <td>N</td>

                                            </tr>
                                            <tr>
                                                <th>*Final Reading (KWH)</th>
                                                <td>{{ $meter_main->final_reading }}</td>

                                            </tr>
                                            <tr>
                                                <th>*Final Reading (KVAH)</th>
                                                <td>{{ $meter_main->final_reading }}</td>

                                            </tr>
                                            <tr>
                                                <th>*SR CODE</th>
                                                <td>900001</td>

                                            </tr>

                                            <!-- =============================================================== -->
                                            <tr>
                                                <th rowspan="17">NEW METER DATA</th>
                                            </tr>
                                            <tr>
                                                <th>*Serial No.</th>
                                                <td>{{ $meter_main->serial_no_new }}</td>
                                            </tr>
                                            <tr>
                                                <th>*Manufacturer (Meter Make) </th>
                                                <td>GENUS OVERSEAS ELECTRONICS LTD</td>

                                            </tr>
                                            <tr>
                                                <th>*Meter Type </th>
                                                <td>EDL for 1-ph, EDL3 for 3-ph</td>

                                            </tr>
                                            <tr>
                                                <th>*Year of Manufacture <br> (YYYY)</th>
                                                <td>{{ $meter_main->mfd_year_new }}</td>

                                            </tr>
                                            <tr>
                                                <th>Meter Model</th>
                                                <td>DLMS</td>

                                            </tr>
                                            <tr>
                                                <th>*Is meter digital</th>
                                                <td>Y</td>

                                            </tr>
                                            <tr>
                                                <th>Number of Revolution Pulse</th>
                                                <td>3200 for 1-ph, 1200 for 3-ph</td>

                                            </tr>
                                            <tr>
                                                <th>*Meter constant <br> (Value > 0)</th>
                                                <td>1</td>

                                            </tr>
                                            <tr>
                                                <th>*Multiplication Factor</th>
                                                <td>1</td>

                                            </tr>
                                            <tr>
                                                <th>*Initial Reading(KWH)</th>
                                                <td>{{ $meter_main->initial_reading_kwh }}</td>

                                            </tr>
                                            <tr>
                                                <th>*Initial Reading(KVAH)</th>
                                                <td>{{ $meter_main->initial_reading_kvah }}</td>

                                            </tr>
                                            <tr>
                                                <th>*Number of Dials (total no of digits including decimal)</th>
                                                <td>7</td>

                                            </tr>
                                            <tr>
                                                <th>*Default Decimal (digits after decimal)</th>
                                                <td>2</td>

                                            </tr>
                                            <tr>
                                                <th>Current Rating (in amps.)</th>
                                                <td>--</td>

                                            </tr>
                                            <tr>
                                                <th>Voltage (in Volts)</th>
                                                <td>230 fro 1ph, 400 for 3-ph</td>

                                            </tr>
                                            <tr>
                                                <th>*SR CODE</th>
                                                <td>357006 for 1-ph, 357531 for 3-ph</td>

                                            </tr>
                                        </table>

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
