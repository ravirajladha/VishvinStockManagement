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
                            <h4 class="mb-sm-0">QC Reports</h4>
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
                            <div class="card-header border-0">

                                <div class="row g-4 align-items-center">
                                    <div class="col-sm-3">
                                        {{-- <div class="search-box">
                                            <input type="text" class="form-control search"
                                                placeholder="Search for...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div> --}}
                                    </div>
                                    <div class="col-sm-auto ms-auto">
                                        <div class="hstack gap-2">
                                            {{-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="offcanvas"
                                                href="#ple"><i
                                                    class="ri-filter-3-line align-bottom me-1"></i> Fliters</button> --}}

                                            {{-- <span class="dropdown">
                                                <button class="btn btn-soft-info btn-icon fs-14" type="button"
                                                    id="dropdownMeuutton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ri-settings-4-line"></i>
                                                </button>

                                            </span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card header -->

                            <div class="card-body">

                                <div class="live-preview">
                                    <div class="table-responsive">
                                        <table style="width:100%"
                                            class="table table-hover table-striped table-bordered">



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
                                        @if ($meter_main->qc_status == 0)
                                            <a href="/qcs/edit_qc_detail/{{ $meter_main->id }}"> <button
                                                    class="btn btn-primary w-sm"><i
                                                        class="ri-add-line align-bottom me-1"></i>Edit</button></a>
                                            <form id="createproduct-form" autocomplete="off" class="needs-validation"
                                                action="{{ url('/') }}/qcs/approve_qc_reports_status/{{ $meter_main->id }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="hstack gap-2 justify-content-end d-print-none mt-4">



                                                    {{-- <a href="javascript:void(0);" class="btn btn-primary"> --}}
                                                    {{-- <!-- <i class="ri-download-2-line align-bottom me-1"></i> --> --}}
                                                    {{-- Edit</a> --}}
                                                    {{-- <button type="button" class="btn btn-secondary add-btn"
                                                data-bs-toggle="modal" id="create-btn1"
                                                data-bs-target="#showModal"><i
                                                    class="ri-add-line align-bottom me-1"></i> Edit</button> --}}



                                                    <button type="submit" class="btn btn-success" name="submit_button"
                                                        value="1">
                                                        <!-- <i class="ri-printer-line align-bottom me-1"></i> -->
                                                        Approve

                                                        {{-- <button type="submit" class="btn btn-danger" name="submit_button" value="2">

                                                Reject</button> --}}


                                                        <button type="button" class="btn btn-danger add-btn"
                                                            data-bs-toggle="modal" id="create-btn"
                                                            data-bs-target="#showModal_reject"><i
                                                                class="ri-delete-bin-2-line"></i> Reject</button>


                                                </div>
                                            </form>
                                        @endif

                                        @if ($meter_main->qc_status == 1)
                                            <div class="alert alert-success" role="alert">
                                                Approved!
                                            </div>
                                        @elseif($meter_main->qc_status == 2)
                                            <div class="alert alert-warning" role="alert">
                                                Rejected!
                                            </div>
                                        @endif

                                        <br>
                                    </div>
                                </div>





                                <div class="modal fade zoomIn" id="showModal_reject" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content border-0">
                                            <div class="modal-header p-3 bg-soft-info">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <form action="/qcs/reject_qc_reports_status/{{ $meter_main->id }}"
                                                method="post" autocomplete="off" enctype="multipart/form-data">
                                                @csrf

                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-lg-12">
                                                            <div id="modal-id">
                                                                <label for="orderId" class="form-label">Enter
                                                                    Remark</label>
                                                                <input type="text" id="orderId"
                                                                    class="form-control"
                                                                    placeholder="Enter Remark before rejecting"
                                                                    value="" name="qc_remark" required/>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-danger">

                                                            Reject</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="modal fade zoomIn" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content border-0">
                                            <div class="modal-header p-3 bg-soft-info">
                                                <h5 class="modal-title" id="exampleModalLabel1"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <form action="/qcs/update_qc_report/{{$meter_main->id}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                                @csrf

                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-lg-12">
                                                            <div id="modal-id">
                                                                <label for="orderId" class="form-label">Account Id</label>
                                                                <input type="text" id="orderId" class="form-control" placeholder="ID" value="{{$meter_main->account_id}}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <label for="tasksTitle-field" class="form-label">RR Number</label>
                                                                <input type="text" id="tasksTitle-field" class="form-control" placeholder="Title" value="{{$consumer_detail->rr_no}}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="client_nameName-field" class="form-label">Name of the consumer</label>
                                                                <input type="text" id="client_nameName-field" class="form-control" value="{{$consumer_detail->consumer_name}}" placeholder="Consumer Name" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Section</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Section" value="{{$consumer_detail->section}}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Subdivision</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Section" value="{{$consumer_detail->sub_division}}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Meter Type</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Section" value=" @if ($consumer_detail->meter_type == 1)Single Phase
                                                                @elseif($consumer_detail->meter_type==2)Three Phase
                                                                @endif" readonly />
                                                            </div>
                                                        </div>
                                                      <h4>Electromechanical</h4>
                                                        <div class="col-lg-6">
                                                            <label for="ticket-status" class="form-label">Photo 1 (with reading)</label>
                                                            <input type="file" id="assignedtoName-field" class="form-control" placeholder="Section" value="{{$meter_main->image_1_old}}" name="image_1_old"  />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="ticket-status" class="form-label">Photo 2 (with reading)</label>
                                                            <input type="file" id="assignedtoName-field" class="form-control" placeholder="Section" value="{{$meter_main->image_2_old}}" name="image_2_old"  />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="ticket-status" class="form-label">Photo 3 (with reading)</label>
                                                            <input type="file" id="assignedtoName-field" class="form-control" placeholder="Section" value="{{$meter_main->image_3_old}}" name="image_3_old"  />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Meter Make</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Meter Make" value="{{$meter_main->meter_make_old}}" name="meter_make_old"  />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Meter Serial No</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Meter Serial No" value="{{$meter_main->serial_no_old}}" name="serial_no_old"  />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Year of Manufacture</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Year of Manufacture" value="{{$meter_main->mfd_year_old}}" name="mfd_year_old"  />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Final Reading (FR)-kWh</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Meter Make" value="{{$meter_main->final_reading}}" name="final_reading"  />
                                                            </div>
                                                        </div>

                                                      <h4>Electrostatic</h4>
                                                        <div class="col-lg-6">
                                                            <label for="ticket-status" class="form-label">Photo 1 (with reading)</label>
                                                            <input type="file" id="assignedtoName-field" class="form-control" placeholder="Section" value="{{$meter_main->image_1_new}}" name="image_1_new"  />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="ticket-status" class="form-label">Photo 2 (with reading)</label>
                                                            <input type="file" id="assignedtoName-field" class="form-control" placeholder="Section" value="{{$meter_main->image_2_new}}" name="image_2_new"  />
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Meter Make</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="GENUS OVERSEAS ELECTRONICS LTD" value="GENUS OVERSEAS ELECTRONICS LTD" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Meter Serial No</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Meter Serial No" value="{{$meter_main->serial_no_new}}" name="serial_no_new"  />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Year of Manufacture</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Year of Manufacture" value="{{$meter_main->mfd_year_new}}" name="mfd_year_new"  />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Final Reading (FR)-kWh</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Meter Make" value="{{$meter_main->initial_reading_kwh}}" name="initial_reading_kwh"  />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Initial Reading g (IR)-kWh</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Meter Make" value="{{$meter_main->initial_reading_kvah}}" name="initial_reading_kvah"  />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label for="assignedtoName-field" class="form-label">Initial Reading g (IR)-kVAh</label>
                                                                <input type="text" id="assignedtoName-field" class="form-control" placeholder="Meter Make" value="{{$meter_main->initial_reading_kvah}}" name="initial_reading_kvah"  />
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-lg-6">
                                                            <label for="priority-field" class="form-label">Priority</label>
                                                            <select class="form-control" data-plugin="choices" name="priority-field" id="priority-field">
                                                                <option value="">Priority</option>
                                                                <option value="High">High</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Low">Low</option>
                                                            </select>
                                                        </div> --}}
                            </div>

                        </div>
                        {{-- <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="add-btn">Update</button>

                                                    </div>
                                                </div> --}}
                        </form>
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




@include('inc_admin.footer')
