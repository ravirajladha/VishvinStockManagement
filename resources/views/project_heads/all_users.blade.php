@include("inc_admin.header")

<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }
</style>

<head>

    <title style="background-color:black;color:white;">Inventory Executives</title> 


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
                        <a href="/project_heads/all_inventory_managers" class="btn btn-primary add-btn">Inventory Executive</a>
                        <a href="/project_heads/all_contractors" class="btn btn-primary add-btn">Contractor (Field Activity)</a>
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
                            <h4 class="mb-sm-0">Inventory Executives</h4>
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
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Profile</th>
                                                   



                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                    </td>
                                                    <tr>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                    </td>
                                                    <tr>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                        <td>Data</td>
                                                    </td>
                                           
                                            </tbody>
                                   
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