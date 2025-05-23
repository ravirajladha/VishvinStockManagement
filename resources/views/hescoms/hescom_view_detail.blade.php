@include('inc_admin.header')
<style>
    .table th {
        width: 50%;
    }
</style>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title style="background-color:black;color:white;">QC View</title>


</head>

<?php
    use App\Models\Admin;
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
                            @if (Session('rexkod_vishvin_auth_user_type') == 'ae')
                            <h4 class="mb-sm-0">AE Reports</h4>


                            @elseif (Session('rexkod_vishvin_auth_user_type') == 'aee')
                            <h4 class="mb-sm-0">AEE Reports</h4>

                            @elseif (Session('rexkod_vishvin_auth_user_type') == 'aao')
                            <h4 class="mb-sm-0">AAO Reports</h4>
                            @else
                            <h4 class="mb-sm-0">QC Reports</h4>

                            @endif
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
                                                <td> {{ $meter_main->account_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>RR Number</th>
                                                <td> {{ $consumer_detail->rr_no }}</td>


                                            </tr>
                                            <tr>
                                                <th>Name of the consumer</th>
                                                <td> {{ $consumer_detail->consumer_name }}</td>


                                            </tr>
                                            <tr>
                                                <th>Section</th>
                                                <td> {{ $consumer_detail->section }}</td>


                                            </tr>
                                            <!-- =============================================================== -->

                                            <tr>
                                                <th>Sub Division</th>
                                                <td> {{ $consumer_detail->sub_division }}</td>

                                            </tr>


                                            <tr>
                                                <th>Installation Type</th>
                                                <td colspan="2">
                                                    @if ($consumer_detail->meter_type == 1)
                                                    Single Phase
                                                    @elseif($consumer_detail->meter_type == 2)
                                                    Three Phase
                                                    @endif
                                                </td>

                                            </tr>

                                            <tr>
                                                <th class="">Parameters</th>
                                                <th style="width: 26%;"> Electromechanical</th>
                                                <th style="width: 50%;"> Electrostatic</th>


                                            </tr>
                                            <tr>
                                                <th>Photos with readings on display <br> <span style="font-weight: 300;font-size:10px
                                                    ">click on the image to view</span></th>
                                                <td>
                                                    @if (!empty($meter_main->image_1_old))
                                                    <a href="javascript:void(0);" onclick="window.open('{{ asset($meter_main->image_1_old) }}', '_blank', 'width=800,height=600');">
                                                        <img src="{{ asset($meter_main->image_1_old) }}" alt="photo1" style="height: 47px; max-width: 100%;">
                                                    </a>
                                                    @else
                                                    {{-- <i class="fa fa-eye-slash"></i> --}}
                                                    <p>No image</p>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if (!empty($meter_main->image_1_new))
                                                    <a href="javascript:void(0);" onclick="window.open('{{ asset($meter_main->image_1_new) }}', '_blank', 'width=800,height=600');">
                                                        <img src="{{ asset($meter_main->image_1_new) }}" alt="photo1" style="height: 47px; max-width: 100%;">
                                                    </a>
                                                    @else
                                                    {{-- <i class="fa fa-eye-slash"></i> --}}
                                                    <p>No image</p>
                                                    @endif
                                                </td>

                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    @if (!empty($meter_main->image_2_old))
                                                    <a href="javascript:void(0);" onclick="window.open('{{ asset($meter_main->image_2_old) }}', '_blank', 'width=800,height=600');">
                                                        <img src="{{ asset($meter_main->image_2_old) }}" alt="photo1" style="height: 47px; max-width: 100%;">
                                                    </a>
                                                    @else
                                                    {{-- <i class="fa fa-eye-slash"></i> --}}
                                                    <p>No image</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($meter_main->image_2_new))
                                                    <a href="javascript:void(0);" onclick="window.open('{{ asset($meter_main->image_2_new) }}', '_blank', 'width=800,height=600');">
                                                        <img src="{{ asset($meter_main->image_2_new) }}" alt="photo1" style="height: 47px; max-width: 100%;">
                                                    </a>
                                                    @else
                                                    {{-- <i class="fa fa-eye-slash"></i> --}}
                                                    <p>No image</p>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    @if (!empty($meter_main->image_3_old))
                                                    <a href="javascript:void(0);" onclick="window.open('{{ asset($meter_main->image_3_old) }}', '_blank', 'width=800,height=600');">
                                                        <img src="{{ asset($meter_main->image_3_old) }}" alt="photo1" style="height: 47px; max-width: 100%;">
                                                    </a>
                                                    @else
                                                    {{-- <i class="fa fa-eye-slash"></i> --}}
                                                    <p>No image</p>
                                                    @endif
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>Meter Make</th>
                                                <td>{{ $meter_main->meter_make_old }}</td>
                                                <td style="width: 550%;">GENUS OVERSEAS ELECTRONICS LTD</td>

                                            </tr>

                                            <tr>
                                                <th>Meter Serial No</th>
                                                <td>{{ $meter_main->serial_no_old }}</td>
                                                <td>{{ $meter_main->serial_no_new }}</td>
                                            </tr>

                                            <tr>
                                                <th>Year Of Manufacture</th>
                                                <td>{{ $meter_main->mfd_year_old }}</td>
                                                <td>{{ $meter_main->mfd_year_new }}</td>
                                            </tr>

                                            <tr>
                                                <th>Final Reading (FR)-kWh</th>
                                                <td>{{ $meter_main->final_reading }}</td>

                                                <td>---NA---</td>
                                            </tr>
                                            <tr>
                                                <th>Initial Reading g (IR)-kWh</th>
                                                <td>---NA---</td>
                                                <td>{{ $meter_main->initial_reading_kwh }}</td>

                                            </tr>
                                            <tr>
                                                <th>Initial Reading g (IR)-kVAh</th>
                                                <td>---NA---</td>
                                                <td>{{ $meter_main->initial_reading_kvah }}</td>

                                            </tr>
                                            <tr>
                                                <th>Date & Time of meter replacement</th>
                                                <td>{{ $meter_main->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <th>GPS Coordinates of the energy meter</th>
                                                <td>(Latitude:{{ $meter_main->lat }}
                                                    Longitude:{{ $meter_main->lon }})</td>
                                            </tr>

                                            <!-- =============================================================== -->

                                        </table>
                                        @php
                                        $admin = Admin::where('id',$meter_main->created_by)->first();
                                        @endphp
                                        @if (Session('rexkod_vishvin_auth_user_type') == 'qc_executive')
                                        <p style="float: right">Field Executive Name: {{$admin->name}}</p>
                                        @endif
                                        @if (Session('rexkod_vishvin_auth_user_type') == 'ae')
                                        @if ($meter_main->so_status == 0)
                                        <form id="createproduct-form" autocomplete="off" class="needs-validation" action="{{ url('/') }}/hescoms/approve_so_reports_status/{{ $meter_main->id }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                {{-- <textarea class="form-control" name="so_remark" placeholder="Enter Remark">@if (!empty($meter_main->so_remark)){{$meter_main->so_remark}}@endif</textarea> --}}
                                            </div>
                                            <div class="hstack gap-2 justify-content-end d-print-none mt-4">




                                                <button type="submit" class="btn btn-success" name="submit_button" value="1">
                                                    <!-- <i class="ri-printer-line align-bottom me-1"></i> -->
                                                    Approve

                                                    <button type="button" class="btn btn-danger add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal_reject_so"><i class="ri-delete-bin-2-line"></i>
                                                        Reject</button>

                                            </div>
                                        </form>
                                        @else
                                        @if ($meter_main->so_status == 1)
                                        <span class="text-primary" style="float:right;">Approved</span>
                                        @elseif($meter_main->so_status == 2)
                                        <span class="text-warning" style="float:right;">Rejected</span>
                                        @endif
                                        @endif
                                        @endif
                                        @if (Session('rexkod_vishvin_auth_user_type') == 'aee')
                                        @if ($meter_main->aee_status == 0)
                                        <form id="createproduct-form" autocomplete="off" class="needs-validation" action="{{ url('/') }}/hescoms/approve_aee_reports_status/{{ $meter_main->id }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                {{-- <textarea class="form-control" name="aee_remark" placeholder="Enter Remark">@if (!empty($meter_main->aee_remark)) {{$meter_main->aee_remark}} @endif</textarea> --}}
                                            </div>
                                            <div class="hstack gap-2 justify-content-end d-print-none mt-4">




                                                <button type="submit" class="btn btn-success" name="submit_button" value="1">
                                                    <!-- <i class="ri-printer-line align-bottom me-1"></i> -->
                                                    Approve

                                                    <button type="button" class="btn btn-danger add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal_reject_so"><i class="ri-delete-bin-2-line"></i>
                                                        Reject</button>

                                            </div>
                                        </form>
                                        @else
                                        @if ($meter_main->aee_status == 1)
                                        <span class="text-primary" style="float:right;">Approved</span>
                                        @elseif($meter_main->aee_status == 2)
                                        <span class="text-warning" style="float:right;">Rejected</span>
                                        @endif
                                        @endif
                                        @endif
                                        @if (Session('rexkod_vishvin_auth_user_type') == 'aao')
                                        @if ($meter_main->aao_status == 0)
                                        <form id="createproduct-form" autocomplete="off" class="needs-validation" action="{{ url('/') }}/hescoms/approve_aao_reports_status/{{ $meter_main->id }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                {{-- <textarea class="form-control" name="aao_remark" placeholder="Enter Remark">@if (!empty($meter_main->aao_remark)) {{$meter_main->aao_remark}} @endif</textarea> --}}
                                            </div>
                                            <div class="hstack gap-2 justify-content-end d-print-none mt-4">





                                                <button type="submit" class="btn btn-success" name="submit_button" value="1">
                                                    <!-- <i class="ri-printer-line align-bottom me-1"></i> -->
                                                    Approve

                                                    <button type="button" class="btn btn-danger add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal_reject_so"><i class="ri-delete-bin-2-line"></i>
                                                        Reject</button>

                                            </div>
                                        </form>
                                        @else
                                        @if ($meter_main->aao_status == 1)
                                        <span class="text-primary" style="float:right;">Approved</span>
                                        @elseif($meter_main->aao_status == 2)
                                        <span class="text-warning" style="float:right;">Rejected</span>
                                        @endif
                                        @endif
                                        @endif

                                        <br>
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




<div class="modal fade zoomIn" id="showModal_reject_so" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-soft-info">
                {{ session()->get('rexkod_vishvin_auth_type') }}
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            @if (session()->get('rexkod_vishvin_auth_user_type') == 'ae')
            <form method="POST" action="{{ route('reject_so_reports_status', $meter_main->id) }}">
                @elseif(session()->get('rexkod_vishvin_auth_user_type') == 'aee')
                <form method="POST" action="{{ route('reject_aee_reports_status', $meter_main->id) }}">
                    @else
                    <form method="POST" action="{{ route('reject_aao_reports_status', $meter_main->id) }}">
                        @endif

                        @csrf

                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <div id="modal-id">
                                        <label for="orderId" class="form-label">Enter Remark</label>
                                        <input type="text" id="orderId" class="form-control" placeholder="Enter Remark before rejecting" value="" name="remark" required />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger">

                                    Reject</button>
                    </form>
        </div>
    </div>
</div>






{{-- <div class="modal fade zoomIn" id="showModal_reject_aee" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-soft-info">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form action="/qcs/reject_aee_reports_status/{{ $meter_main->id }}" method="post" autocomplete="off"
enctype="multipart/form-data">
@csrf

<div class="modal-body">
    <div class="row g-3">
        <div class="col-lg-12">
            <div id="modal-id">
                <label for="orderId" class="form-label">Enter Remark</label>
                <input type="text" id="orderId" class="form-control" placeholder="Enter Remark before rejecting" value="" name="aee_remark" />
            </div>
        </div>
        <button type="submit" class="btn btn-danger">

            Reject</button>
        </form>
    </div>
</div>
</div>
<div class="modal fade zoomIn" id="showModal_reject_aao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-soft-info">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="/qcs/reject_aao_reports_status/{{ $meter_main->id }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div id="modal-id">
                                <label for="orderId" class="form-label">Enter Remark</label>
                                <input type="text" id="orderId" class="form-control" placeholder="Enter Remark before rejecting" value="" name="aao_remark" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">

                            Reject</button>
            </form>
        </div>
    </div>
</div> --}}




@include('inc_admin.footer')
