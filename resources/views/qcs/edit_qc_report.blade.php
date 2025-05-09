
@include("inc_admin.header")

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Add/Manage Client</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage</a></li>
                                            <li class="breadcrumb-item active">Client</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <form action="<?php echo URLROOT; ?>/admin/add_manage" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" id="id-field" />
                                                        <div class="row g-3">
                                                            <div class="col-lg-12">
                                                            <div class="text-center">
                                                                    <div class="position-relative d-inline-block">
                                                                        <div class="position-absolute bottom-0 end-0">
                                                                           
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                            <!--end col-->
                                                       
                                                            <!--end col-->
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="leads_score-field"
                                                                        class="form-label">ORG / Client Name *</label>
                                                                    <input type="text" id="leads_score-field"
                                                                        class="form-control" name="name"
                                                                        placeholder="Enter Name" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                            <div class="dropdown">
                                                                    <label for="company_name-field"
                                                                        class="form-label">City</label>
                                                                        <select name="city" id="city" class="form-control" required>
                                                                        <option value="select"> Please Select City</option>
                                                                        <option value="Bhubaneswar">Bhubaneswar</option>
                                                                        <option value="Bhubaneswar">Ranchi</option>

                                         <?php foreach($data['city'] as $city) { ?>                                
                                        
                                        <option value="<?php echo $city->city ?>"><?php echo $city->city ?></option>
                                        
                                        <?php } ?>
                                        </select>
                                                                </div>
                                                            </div>
                                                         
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="leads_score-field"
                                                                        class="form-label">Enter Order Value</label>
                                                                    <input type="number" id="leads_score-field"
                                                                        class="form-control" name="or_value"
                                                                        placeholder=" Enter value" required />
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="leads_score-field"
                                                                        class="form-label">Address </label>
                                                                    <input type="text" id="leads_score-field"
                                                                        class="form-control" name="address"
                                                                        placeholder="Enter Address" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="leads_score-field"
                                                                        class="form-label">Contact No *</label>
                                                                    <input type="number" id="leads_score-field"
                                                                        class="form-control" name="number"
                                                                        placeholder="Enter Contact No" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="leads_score-field"
                                                                        class="form-label">Contact Name</label>
                                                                    <input type="" id="leads_score-field"
                                                                        class="form-control" name="con_name"
                                                                        placeholder="  Enter Contact Name" required />
                                                                </div>
                                                            </div>
                                                           
                                                            <!--end col-->
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="leads_score-field"
                                                                        class="form-label">Order Placed Date </label>
                                                                    <input type="date" id="leads_score-field"
                                                                        class="form-control" name="date"
                                                                        placeholder="Oderd placed Date" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="leads_score-field"
                                                                        class="form-label">Elora id</label>
                                                                    <input type="number" id="leads_score-field"
                                                                        class="form-control" name="e_id"
                                                                        placeholder="Enter id" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div>
                                                                    <label for="leads_score-field"
                                                                        class="form-label">Password</label>
                                                                    <input type="text" id="leads_score-field"
                                                                        class="form-control" name="password"
                                                                        placeholder="Enter password" required />
                                                                </div>
                                                            </div>
                                                         
                                                            <!--end col-->
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="leads_score-field"
                                                                        class="form-label">Type Of Work </label>
                                                                    <input type="text" id="leads_score-field"
                                                                        class="form-control" name="work"
                                                                        placeholder="Enter type of work" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="leads_score-field"
                                                                        class="form-label">Email</label>
                                                                    <input type="email" id="leads_score-field"
                                                                        class="form-control" name="email"
                                                                        placeholder="Enter email" required />
                                                                </div>
                                                            </div>
                                                        
                                                            <!--end col-->
                                                        </div>
                                             

                                                        <!--end row-->
                                                        <br>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success"
                                                                id="add-btn">Submit</button>
                                                           
                                                        </div>
                                                    </div>
                                                </form>
                                                
                                                @include("inc_admin.footer")
     