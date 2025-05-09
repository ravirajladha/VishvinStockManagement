@include('inc_admin.header')
<?php
// $meter_mains = $data['meter_mains'];
use App\Models\Meter_main;
?>
<link rel="stylesheet" type="text/css" href="assets_admin/css/vendors/datatables.css">
<style>
    .form-group {
  margin-bottom: 1rem;
}

label {
  display: block;
  font-weight: bold;
}

input[type="date"] {
  padding: 0.5rem;
  border: 1px solid #ccc;
  border-radius: 0.25rem;
  font-size: 1rem;
  width: 100%;
  box-sizing: border-box;
}

button[type="submit"] {
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 0.25rem;
  font-size: 1rem;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
}

</style>
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
                            <h4 class="mb-sm-0">Error report</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Basic Tables</li> -->
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-12">
                        <form method="GET" action="{{url('/')}}/hescoms/rejected_meter_reports">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                            <div class="form-group">
                              <label for="start_date">Start Date:</label>
                              <input type="date" class="form-control" name="start_date" id="start_date">
                            </div>
                           </div>  <div class="col-lg-4">
                            <div class="form-group">
                              <label for="end_date">End Date:</label>
                              <input type="date" class="form-control" name="end_date" id="end_date">
                            </div>
                        </div>  <div class="col-lg-4">
                            <label for="end_date">Action </label>

                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                          </form>

                    </div>
                </div> --}}
                <!-- Container-fluid starts-->
                <?php
                $url = "{$_SERVER['REQUEST_URI']}";
                $url = explode('/', $url);
                ?>
                <div class="container-fluid general-widget">
                    <div class="row">


                        <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                            <div class="card ongoing-project recent-orders">
                                <br>
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <form action="/hescoms/update_error_status" method="post">
                                            @csrf
                                        <table class="table cell-border compact strip" data-order='[[ 0, "desc" ]]'
                                            data-page-length='10'>
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Sl. no.</th>
                                                    <th>Account Id</th>
                                                    <th>Updated At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $count =0;
                                                @endphp
                                                @foreach ($data['error_records'] as $error_record)
                                                    @php
                                                        $count++;
                                                    $meter_main = Meter_main::where('account_id', $error_record->account_id)->first();

                                                    @endphp
                                                <tr>
                                                    <td><input type="checkbox" class="my-checkbox" name="selected_account_id[]" id="" value="{{$error_record->account_id}}" ></td>
                                                    <td>{{$count}}</td>
                                                    <td>{{$error_record->account_id}}</td>
                                                    <td>{{$meter_main->error_updated_at !== null ? $meter_main->error_updated_at : ''}}</td>
                                                    <td><a href="/hescoms/edit_error_reports/{{$error_record->account_id}}" class="btn btn-primary w-sm">Edit</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-6 d-flex">
                                                <input type="checkbox" id="select-all-checkbox">
                                                <label for="select-all-checkbox" class="mt-2 ms-2">Select All</label>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="submit" >Update</button>
                                            </div>
                                        </div>
                                        </form>
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

@include('inc_admin.footer')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
    // $(document).ready(function() {
    //     $('.table').DataTable({
    //         dom: 'Bfrtip',
    //         buttons: [
    //             {
    //                 extend: 'excelHtml5',
    //                 exportOptions: {
    //                     orthogonal: 'export'
    //                 }
    //             },
    //             {
    //                 extend: 'pdfHtml5',
    //                 orientation: 'landscape',
    //                 exportOptions: {
    //                     orthogonal: 'export'
    //                 }
    //             }
    //         ]
    //     });
    // });
    const selectAllCheckbox = document.getElementById("select-all-checkbox");
const checkboxes = document.querySelectorAll(".my-checkbox");

selectAllCheckbox.addEventListener("change", () => {
  checkboxes.forEach((checkbox) => {
    checkbox.checked = selectAllCheckbox.checked;
  });
});

</script>
