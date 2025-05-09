<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Contractor;
?>
@include('inc_admin.header')

<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }
</style>

<head>

    <title style="background-color:black;color:white;">View Contractors (Fied Activity)</title>


</head>



<!-- Begin page -->
<div id="layout-wrapper">



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header border-0 rounded">
                        <!-- <h6 class="text-center mb-3">Select The Form To Add</h6> -->
                        <div class="justify-content-between" style="display: flex;">
                            <!--end col-->
                            <a href="/project_heads/all_inventory_managers" class="btn btn-primary add-btn">Inventory
                                Managers</a>
                            <a href="/project_heads/all_contractors" class="btn btn-dark add-btn">Contractor (Field
                                Activity)</a>
                            <a href="/project_heads/all_qcs" class="btn btn-primary add-btn">QC Manager (Vishvin)</a>
                            <a href="/project_heads/all_hescoms" class="btn btn-primary add-btn">HESCOM Officer</a>
                            <a href="/project_heads/all_bmr" class="btn btn-primary add-btn">BMR</a>

                        </div>
                    </div>
                </div>
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">View Contractors (Fied Activity)</h4>
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
                                        <table class="table table-striped table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Contractor Name</th>
                                                    <th scope="col">Firm Name</th>
                                                    <th scope="col">Firms Registered Address</th>
                                                    <th scope="col">Mobile Number</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">PAN Card</th>
                                                    <th scope="col">GST Number</th>
                                                    <th scope="col">Bank Name</th>
                                                    <th scope="col">Bank Branch</th>
                                                    <th scope="col">Account No</th>
                                                    <th scope="col">IFSC Code</th>
                                                    <th scope="col">Account Type</th>
                                                    <th scope="col">Team Leader Name</th>
                                                    <th scope="col">Team Leader Phone Number</th>
                                                    {{-- <th scope="col">Username</th> --}}
                                                    <th scope="col">Created</th>





                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($show_users as $user)
                                                    <?php
                                                    $contractor_detail = Contractor::where('auth_id', $user->id)->first();

                                                    ?>
                                                    <tr>
                                                        <td>{{ $user->id }}</td>

                                                        <td>{{ $contractor_detail->contractor_name }}</td>
                                                        <td>{{ $contractor_detail->firm_name }}</td>
                                                        <td>{{ $contractor_detail->house_no }},
                                                            {{ $contractor_detail->building_name }},
                                                            {{ $contractor_detail->road_name }},
                                                            {{ $contractor_detail->cross_name }},
                                                            {{ $contractor_detail->area_name }},
                                                            {{ $contractor_detail->city_name }},
                                                            {{ $contractor_detail->pincode }}</td>
                                                        <td>{{ $contractor_detail->contractor_cell_no }}</td>
                                                        <td>{{ $contractor_detail->contractor_email }}</td>
                                                        <td>{{ $contractor_detail->pan_no }}</td>
                                                        <td>{{ $contractor_detail->gst_no }}</td>
                                                        <td>{{ $contractor_detail->bank_name }}</td>
                                                        <td>{{ $contractor_detail->bank_branch }}</td>
                                                        <td>{{ $contractor_detail->account_no }}</td>
                                                        <td>{{ $contractor_detail->ifsc_code }}</td>
                                                        <td>{{ $contractor_detail->account_type }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        <td>{{ $user->created_at }}</td>


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
