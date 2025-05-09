@include("inc_admin.header")



<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">

                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Field Executive</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Inventory</a></li>
                                <li class="breadcrumb-item active">Add Field Executive</li>
                            </ol>
                        </div>

                    </div>
                    <div class="mx-5 mt-2 page-title-box" style="display: flex;justify-content:space-between">
                        <h4>Project Name : project name</h4>
                        <h4>Project Lead : project lead</h4>
                        <h4>Module Name : module name</h4>
                    </div>

                </div>


            </div>
            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation" action="/admins/create_user" method="POST"  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="mb-3 mt-5">
                                    <label class="form-label" for="product-title-input">Field Executive Name <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <input type="text" class="form-control" id="product-title-input" name="name" value="" placeholder="Enter Inventory Executive name" required>
                                </div>

                                <!-- <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Project Name</label>
                                    <input type="number" class="form-control" id="product-title-input" name="phno" value="" placeholder="Enter Project Name" required>
                                </div> -->
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Username <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <input type="number" class="form-control" id="product-title-input" name="phno" value="" placeholder="Enter Username" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Password <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <input type="email" class="form-control" id="product-title-input" name="email" value="" placeholder="Enter Password" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Mobile Number <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <input type="number" class="form-control" id="product-title-input" name="phno" value="" placeholder="Enter Mobile Number" required>
                                </div>
                                <!-- <div class="mb-3">
                                    <select class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="">Inventory</option>
                                        <option value="">Annexure</option>

                                    </select>



                                </div> -->





                            </div>
                        </div>
                        <!-- end card -->



                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-success w-sm">Submit</button>
                        </div>
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




<?php require APPROOT . '/views/inc_contractor_executves/footer.php'; ?>
