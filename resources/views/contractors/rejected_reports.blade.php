<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Consumer_detail;
?>
@include('inc_admin.header')

<head>

    <title>Rejected Reports</title>


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
                            <h4 class="mb-sm-0">Rejected Reports</h4>
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
                                        <table class="table table-striped table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>

                                                    <th scope="col">Serial No.</th>
                                                    <th scope="col">Subdivision</th>
                                                    <th scope="col">Section</th>
                                                    <th scope="col">Date of Installation</th>
                                                    <th scope="col">Account ID</th>
                                                    <th scope="col">Consumer Name</th>
                                                    <th scope="col">Rejected By</th>
                                                    <th scope="col">Remarks</th>
                                                    <th scope="col">Action</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($meter_mains as $meter_main)
                                                    <?php
                                                    $consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();
                                                    ?>
                                                    <tr>
                                                        <td>{{ $meter_main->id }}</td>
                                                        <td>{{ $consumer_detail->sub_division }}</td>
                                                        <td>{{ $consumer_detail->section }}</td>
                                                        <td>{{ $meter_main->created_at }}</td>
                                                        <td>{{ $meter_main->account_id }}</td>
                                                        <td>{{ $consumer_detail->consumer_name }}</td>
                                                        <td>
                                                            @if ($meter_main->qc_status == 2)
                                                                QC Vishvin
                                                            @elseif($meter_main->so_status == 2)
                                                                AE
                                                            @elseif($meter_main->aee_status == 2)
                                                                AEE
                                                            @elseif($meter_main->aao_status == 2)
                                                                AAO
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($meter_main->qc_status == 2)
                                                                {{ $meter_main->qc_remark }}
                                                            @elseif($meter_main->so_status == 2)
                                                                {{ $meter_main->so_remark }}
                                                            @elseif($meter_main->aee_status == 2)
                                                                {{ $meter_main->aee_remark }}
                                                            @elseif($meter_main->aao_status == 2)
                                                                {{ $meter_main->aao_remark }}
                                                            @endif
                                                        </td>


                                                        <td><a
                                                                href="/contractors/rejected_report_view/{{ $meter_main->id }}"><button
                                                                    type="button"
                                                                    class="btn btn-secondary">View</button></a></td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
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



@include('inc_admin.footer')
