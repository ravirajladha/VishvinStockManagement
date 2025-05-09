@include("inc_admin.header")

<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }
</style>

<head>

    <title style="background-color:black;color:white;">View Inventory Managers</title>


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
                        <a href="/project_heads/all_inventory_managers" class="btn btn-primary add-btn">Inventory Manager</a>
                        <a href="/project_heads/all_contractors" class="btn btn-primary add-btn">Contractor (Field Activity)</a>
                        <a href="/project_heads/all_qcs" class="btn btn-primary add-btn">QC Manager (Vishvin)</a>
                        <a href="/project_heads/all_hescoms" class="btn btn-primary add-btn">HESCOM Officer</a>
                        <a href="/project_heads/all_bmr" class="btn btn-dark add-btn">BMR</a>

                    </div>
                </div>
            </div>
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">View Inventory Managers</h4>
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
                                                    <th scope="col">Inventory Manager Name</th>
                                                    {{-- <th scope="col">Username</th> --}}

                                                    <th scope="col">Mobile Number</th>
                                                    <th scope="col">Created At</th>




                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($show_users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>{{$user->name}}</td>

                                                    <td>{{$user->phone}}</td>
                                                    <td>{{$user->created_at}}</td>

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



@include("inc_admin.footer")
