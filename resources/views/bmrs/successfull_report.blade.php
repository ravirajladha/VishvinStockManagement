@include("inc_admin.header")

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }
</style>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->

            <div class="row">
                <div class="col-12">

                    <div class="page-title-box d-sm-flex align-items-center justify-content-between  mt-1">
                        <h4 class="mb-sm-0">Successfull Report</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">BMR</a></li>
                                <li class="breadcrumb-item active">Successfull Report</li>
                            </ol>
                        </div>

                    </div>
                    <!-- <div class="mx-5 mt-2 page-title-box" style="display: flex;justify-content:space-between">
                        <h4>Project Name : project name</h4>
                        <h4>Project Lead : project lead</h4>
                        <h4>Module Name : module name</h4>
                    </div> -->

                </div>
                <div class="row container-fluid">
                    <div class="col-12">
                        <form method="GET" action="{{url('/')}}/bmrs/successfull_report">
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
                                    <input type="date" class="form-control" name="start_date" id="start_date">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" class="form-control" name="end_date" id="end_date">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-4">
                                    {{-- <label for="end_date">Action </label> --}}
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                        <script>

                            document.addEventListener('DOMContentLoaded', function() {
                            var weeklyRadio = document.querySelector('input[value="weekly"]');
                            var monthlyRadio = document.querySelector('input[value="monthly"]');
                            var customRadio = document.querySelector('input[value="custom"]');
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
                <div class="row">

                    <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                      <div class="card ongoing-project recent-orders">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Total no. of records: {{$data['count']}} </h4>

                        </div>
                        <br>
                        <div class="card-body pt-0">
                          <form action="/bmrs/downloaded_batch" method="post">
                            @csrf
                          <div class="table-responsive">
                            <table class="table cell-border compact strip" id="myTable" data-order='[[ 0, "desc" ]]' data-page-length='10'>
                              <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Account ID</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                    $count=1;
                                @endphp
                                @foreach ($data['successful_records'] as $successful_record)
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$successful_record->account_id}}</td>
                                    {{-- <td><a href="/bmrs/successfull_report_single/{{$successful_record->account_id}}" class="btn btn-secondary">View</a></td> --}}
                                </tr>
                                @php
                                    $count++;
                                @endphp
                                @endforeach

                              </tbody>
                            </table>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>

            </div>

            <!-- end page title -->



        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>


{{-- @include("inc_admin.footer") --}}


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


  </script>

<?php if(!empty(session()->get('failed'))) { ?>
  <script type="text/javascript">
  Swal.fire({
   icon: 'warning',
   title: '{{ session()->get('failed') }}',
   showConfirmButton: false,
   timer: 5000
 })
  </script>
 <?php } session()->forget('failed'); ?>


 <?php if(!empty(session()->get('success'))) { ?>
	<script type="text/javascript">
	Swal.fire({
	 icon: 'success',
	 title: '{{ session()->get('success') }}',
	 showConfirmButton: false,
	 timer: 5000,

   })
	</script>
   <?php } session()->forget('success'); ?>



