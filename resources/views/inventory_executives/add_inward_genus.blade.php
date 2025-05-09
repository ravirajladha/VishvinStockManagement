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
                        <h4 class="mb-sm-0">From Manufacturer</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                <li class="breadcrumb-item active">From Manufacturer</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-0 rounded">
                    <div class="justify-content-between" style="display: flex;">
                        <!--end col-->
                        {{-- <a href="/inventory_executives/add_inward_genus" class="btn btn-dark add-btn">From Manufacturer</a> --}}
                        <a href="/inventory_executives/add_meter_sl_number_wise" class="btn btn-primary add-btn"> Add Inward Meters Sl No. wise</a>
                        <a href="/inventory_executives/add_inward_mrt_rejected" class="btn btn-primary add-btn"> From MRT [Rejected ES Meters]</a>
                        <a href="/inventory_executives/add_inward_released_em_meter" class="btn btn-primary add-btn"> From Field [Released EM Meter]</a>


                    </div>
                </div>
            </div>
            <!-- end page title -->


            <form id="createproduct-form" autocomplete="off" class="needs-validation" action="create_inward_genus" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Quantity <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="number" class="form-control" id="product-title-input" name="quantity" value="" placeholder="Enter Quantity" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Date <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="date" class="form-control" id="product-title-input" name="start_date" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Invoice Number <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="text" class="form-control" id="product-title-input" name="invoice_no" placeholder="Enter Invoice Number" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">DC Number <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="text" class="form-control" id="product-title-input" name="dc_no" placeholder="Enter DC Number" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Meter rating in AMPs <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="text" class="form-control" id="product-title-input" name="meter_rating" placeholder="Enter Meter rating in AMPs" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input"> Invoice Amount <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="number" class="form-control" id="product-title-input" name="amount" placeholder="Enter  Invoice Amount" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Number of Boxes <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="number" class="form-control" id="product-title-input" name="box_no" placeholder="Enter Number of Boxes" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input">Type of Meters <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <select class="form-control" name="type_meter">
                                                <option value="Single Phase">Single Phase</option>
                                                <option value="Three Phase">Three Phase</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input"> PO Number <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="number" class="form-control" id="product-title-input" name="po_no" placeholder="Enter PO Number" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="product-title-input"> PO Date <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                            <input type="date" class="form-control" id="product-title-input" name="po_date" placeholder="Enter PO Date" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-6">

                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="product-title-input">Upload Invoice Photograph <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                        <input type="file" class="form-control" id="product-title-input" name="invoice" value="" placeholder="Enter Barcode" required>
                                    </div>

                                    <!-- <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Quantity</label>
                                    <input type="text" class="form-control" id="product-title-input" name="name" value="" placeholder="Enter Quantity" required>
                                </div> -->

                                </div>
                                <!-- end card -->



                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-success w-sm">Submit</button>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                        </div>
                        </div>
                        <!-- end row -->

            </form>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>

@include("inc_admin.footer")



<script>
    (function($) {
        $(function() {
            var addFormGroup = function(event) {
                event.preventDefault();
                var $formGroup = $(this).closest('.form-group');
                var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                var $formGroupClone = $formGroup.clone();
                $(this)
                    .toggleClass('btn-success btn-add btn-danger btn-remove')
                    .html('–');
                $formGroupClone.find('input').val('');
                $formGroupClone.find('.concept').text('Phone');
                $formGroupClone.insertAfter($formGroup);
                var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                    $lastFormGroupLast.find('.btn-add').attr('disabled', true);
                }
            };
            var removeFormGroup = function(event) {
                event.preventDefault();
                var $formGroup = $(this).closest('.form-group');
                var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                    $lastFormGroupLast.find('.btn-add').attr('disabled', false);
                }
                $formGroup.remove();
            };
            var selectFormGroup = function(event) {
                event.preventDefault();
                var $selectGroup = $(this).closest('.input-group-select');
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $selectGroup.find('.concept').text(concept);
                $selectGroup.find('.input-group-select-val').val(param);
            }
            var countFormGroup = function($form) {
                return $form.find('.form-group').length;
            };
            $(document).on('click', '.btn-add', addFormGroup);
            $(document).on('click', '.btn-remove', removeFormGroup);
            $(document).on('click', '.dropdown-menu a', selectFormGroup);
        });
    })(jQuery);
    $(document).ready(function() {
        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount: 5,
            searchResultLimit: 5,
            renderChoiceLimit: 5
        });
    });
</script>

