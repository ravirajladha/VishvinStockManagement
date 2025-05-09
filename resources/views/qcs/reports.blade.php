@include('inc_admin.header')


@php

    use App\Models\Zone_code;
    use App\Models\Admin;

@endphp

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">

                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Reports</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Inventory</a>
                                </li>
                                <li class="breadcrumb-item active">Reports</li>
                            </ol>
                        </div>

                    </div>


                </div>


            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                    <div class="card ongoing-project recent-orders">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1"></h4>
                        </div>
                        {{-- filter --}}
                        <div class="row container-fluid">
                            <div class="col-12">
                                <form method="GET" action="{{ url('/') }}/qcs/reports">
                                    @csrf
                                    <div class="row mb-2">
                                        <div class="col-lg-4 d-flex">
                                            <input type="radio" name="format" id="weekly" value="weekly">
                                            <label for="weekly" style="margin-bottom:0;">Weekly</label>
                                        </div>
                                        <div class="col-lg-4 d-flex">
                                            <input type="radio" name="format" id="monthly" value="monthly">
                                            <label for="monthly" style="margin-bottom:0;">Monthly</label>
                                        </div>
                                        <div class="col-lg-4 d-flex">
                                            <input type="radio" name="format" id="custom" value="custom">
                                            <label for="custom" style="margin-bottom:0;">Custom</label>
                                        </div>
                                    </div>
                                    <div class="row mb-2" id="custom_date" style="display: none">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="start_date">Start Date:</label>
                                                <input type="date" class="form-control" name="start_date"
                                                    id="start_date">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="end_date">End Date:</label>
                                                <input type="date" class="form-control" name="end_date"
                                                    id="end_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4">
                                            {{-- <label for="end_date">Action </label> --}}
                                            <button type="submit" name="inward" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var weeklyRadio = document.querySelector('#weekly');
                                        var monthlyRadio = document.querySelector('#monthly');
                                        var customRadio = document.querySelector('#custom');
                                        var customDiv = document.querySelector('#custom_date');

                                        weeklyRadio.addEventListener('change', function() {
                                            customDiv.style.display = 'none';
                                        });

                                        monthlyRadio.addEventListener('change', function() {
                                            customDiv.style.display = 'none';
                                        });

                                        customRadio.addEventListener('change', function() {
                                            customDiv.style.display = '';
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- filter end --}}

                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl. no.</th>
                                            <th>Date</th>
                                            <th>Qc Executive Name</th>
                                            <th>No of Records Approved</th>
                                            <th>No of Records Rejected</th>
                                            <th>No of Records Completed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                            $i=0
                                        @endphp
                                        @foreach ($qc_approved_date_wise as $meter_approved)

                                        @php
                                            $admin = Admin::where('id',$meter_approved->qc_updated_by)->first();

                                        @endphp
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$meter_approved->created_date}}</td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$meter_approved->record_approved}}</td>
                                            <td>{{$meter_approved->record_rejected}}</td>
                                            <td>{{$total_approved[$i]}}</td>

                                        </tr>

                                        @php
                                            $count++;
                                            $i++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>




@include('inc_admin.footer')


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/1.12.1/css/dataTables.responsive.css">
<script type="text/javascript" src="//cdn.datatables.net/responsive/1.12.1/js/dataTables.responsive.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">


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
                'excelHtml5'
            ]
        });
    });
</script>
