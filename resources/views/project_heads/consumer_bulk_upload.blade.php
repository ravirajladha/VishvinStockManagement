@include("inc_admin.header")


<style>
    .btn-primary {
        --vz-btn-bg: #3480ff;
    }
</style>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="card">
                <div class="card-header border-0 rounded">
                    <!-- <h6 class="text-center mb-3">Select The Form To Add</h6> -->

                </div>
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="page-title-box d-sm-flex align-items-center justify-content-between  mt-1">
                        <h4 class="mb-sm-0">Bulk Upload Consumer Detail</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Project Head</a></li>
                                <li class="breadcrumb-item active">Bulk Upload Consumer Detail</li>
                            </ol>
                        </div>

                    </div>
                    <!-- <div class="mx-5 mt-2 page-title-box" style="display: flex;justify-content:space-between">
                        <h4>Project Name : project name</h4>
                        <h4>Project Lead : project lead</h4>
                        <h4>Module Name : module name</h4>
                    </div> -->

                </div>


            </div>

            <!-- end page title -->

            <form action="upload_file" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="input-group mb-3">
                                    <div class="form-file">
                                        <input required type="file" name="upload" class="form-file-input form-control">
                                    </div>

                                    <button  onclick="Swal.fire({icon: 'info',title: 'Please Wait, Uploading',showConfirmButton: false,timer: 500000})" class="btn btn-success btn-sm" type="submit" name="importSubmit">Upload</button>
                                </div>







                            </div>
                        </div>
                        <!-- end card -->



                        {{-- <div class="text-end mb-3">
                            <button type="submit" class="btn btn-success w-sm">Submit</button>
                        </div> --}}
                    </div>
                    <!-- end col -->


                </div>
                <!-- end row -->

            </form>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>



@include("inc_admin.footer")
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
