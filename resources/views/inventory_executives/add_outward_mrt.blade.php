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
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Outward to MRT</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                <li class="breadcrumb-item active">Outward to MRT</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-0 rounded">
                    <div class="justify-content-between" style="display: flex;">
                        <!--end col-->
                        {{-- <a href="/inventory_executives/add_outward_mrt" class="btn btn-dark add-btn">Outward to MRT</a> --}}
                        <a href="/inventory_executives/add_outward_installation" class="btn btn-primary add-btn">Outward for Installation</a>
                        <a href="/inventory_executives/add_outward_released_em_meter" class="btn btn-primary add-btn">Outward to Division Stores [Released EM Meter]</a>
                    </div>
                </div>
            </div>
            <!-- ===================================== -->

            <!-- ===================================== -->

            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation" action="create_outward_mrt" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Lot Number <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="number" class="form-control" id="product-title-input" name="lot_no" placeholder="Enter Lot Number" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Type of Meters <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <select class="form-control" name="meter_type">
                                                <option value="Single phase">Single Phase</option>
                                                <option value="Three phase">Three Phase</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Date <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="date" class="form-control" id="product-title-input" name="start_date" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="product-title-input">DC Number <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                        <input type="number" class="form-control" id="product-title-input" name="dc_no" placeholder="Enter DC Number" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="product-title-input">DC Date <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                        <input type="date" class="form-control" id="product-title-input" name="dc_date" placeholder="Enter DC Date" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Box No. <span class="mandatory_star">*<sup><i>required</i></sup></span></label>


                                            <select class="form-control" name="box_no">
                                                <option value="" readonly>Select Box Number</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">From Serial No. <span class="mandatory_star">*<sup><i>required</i></sup></span></label>

                                            <input type="number" class="form-control" id="product-title-input" name="from_serial_no" value="" placeholder="Enter From Serial No." required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">To Serial No. <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="number" class="form-control" id="product-title-input" name="to_serial_no" value="" placeholder="Enter To Serial No." required>
                                        </div>
                                    </div>
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
<?php

?>




@include("inc_admin.footer")
