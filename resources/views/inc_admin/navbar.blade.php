<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <!-- <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="/assets_admin/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/assets_admin/images/logo-dark.png" alt="" height="30">
            </span>
        </a> -->
        <!-- Light Logo-->
        <!-- <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="/assets_admin/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/assets_admin/images/logo-light.png" alt="" height="30">
            </span>
        </a> -->
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <img src="/assets_admin/images/vishvin/logo.jpg" class="card-logo card-logo-dark" alt="logo dark"
                style="width:101%;height:62px;">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu" style="margin-top:10%">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="/admins/index">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Home</span>
                    </a>

                </li> <!-- end Dashboard Menu -->
                @if (Session('rexkod_vishvin_auth_user_type') == 'admin')
                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Admin</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-apps-2-line"></i> <span data-key="t-apps">Project Heads</span>
                        </a>

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/admins/add_project_head" class="nav-link" data-key="t-calendar"> Add Project
                                    Heads </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admins/show_users" class="nav-link" data-key="t-calendar"> All Project Heads
                                </a>
                            </li>
                        </ul>

                        {{-- <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/admins/add_project_head" class="nav-link" data-key="t-calendar"> Add Project Heads  </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admins/show_users" class="nav-link" data-key="t-calendar"> All Project Heads </a>
                            </li>

                        </ul>
                    </div> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/admins/approve_meter_stat_show">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Approved By HESCOMS</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/admins/all_consumers">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Consumer Detail</span>
                        </a>

                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link menu-link" href="/admins/change_file">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">change</span>
                        </a>

                    </li> --}}
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'project_head')
                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Project
                            Heads</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarApps23" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarApps1">
                            <i class="ri-apps-2-line"></i> <span data-key="t-apps">Add Managers</span>
                        </a>

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/project_heads/add_inventory_manager" class="nav-link" data-key="t-calendar">
                                    Add Inventory Manager </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/add_contractor" class="nav-link" data-key="t-calendar"> Add
                                    Contractor (Field Activity) </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/add_qc" class="nav-link" data-key="t-calendar"> Add QC Manager
                                    (Vishvin) </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/add_hescom" class="nav-link" data-key="t-calendar"> Add HESCOM
                                    Officer </a>
                            </li>
                            <li class="nav-item">
                                <a href="/project_heads/add_bmr" class="nav-link" data-key="t-calendar"> Add BMR
                                     </a>
                            </li>
                            {{-- <li class="nav-item">
                            <a href="/project_heads/bulk_upload_consumer" class="nav-link" data-key="t-calendar"> Add Consumer </a>
                        </li> --}}


                        </ul>
                        {{-- <div class="collapse menu-dropdown" id="sidebarApps23">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/project_heads/add_inventory_manager" class="nav-link" data-key="t-calendar"> Add Inventory Manager </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/add_contractor" class="nav-link" data-key="t-calendar"> Add Contractor (Field Activity) </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/add_qc" class="nav-link" data-key="t-calendar"> Add QC Manager (Vishvin) </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/add_hescom" class="nav-link" data-key="t-calendar"> Add HESCOM Officer </a>
                            </li>



                        </ul>
                    </div> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLayouts24" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="ri-layout-3-line"></i> <span data-key="t-layouts">View Managers</span>
                        </a>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/project_heads/all_inventory_managers" class="nav-link"
                                    data-key="t-calendar"> All Inventory Managers </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/all_contractors" class="nav-link" data-key="t-calendar"> All
                                    Contractor (Field Activity) </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/all_qcs" class="nav-link" data-key="t-calendar"> QC Manager
                                    (Vishvin) </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/all_hescoms" class="nav-link" data-key="t-calendar"> All
                                    HESCOM Officer </a>
                            </li>
                            <li class="nav-item">
                                <a href="/project_heads/all_bmr" class="nav-link" data-key="t-calendar"> All
                                    BMR </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="/project_heads/consumer_bulk_upload" class="nav-link" data-key="t-calendar">
                                    Consumer Bulk Upload </a>
                            </li> --}}

                        </ul>
                        {{-- <div class="collapse menu-dropdown" id="sidebarLayouts24">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/project_heads/all_inventory_managers" class="nav-link" data-key="t-calendar"> All Inventory Managers </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/all_contractors" class="nav-link" data-key="t-calendar"> All Contractor (Field Activity) </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/all_qcs" class="nav-link" data-key="t-calendar"> QC Manager (Vishvin) </a>
                            </li>

                            <li class="nav-item">
                                <a href="/project_heads/all_hescoms" class="nav-link" data-key="t-calendar"> All HESCOM Officer </a>
                            </li>

                        </ul>
                    </div> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/project_heads/reports">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Reports</span>
                        </a>

                    </li>
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'inventory_manager')
                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Inventory
                            Manager</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/inventories/add_inventory_executive">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Add Inventory
                                Executives</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/inventories/all_inventory_executives">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">All Inventory
                                Executives</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/inventories/reports">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Reports</span>
                        </a>

                    </li>
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'inventory_executive')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarPages">
                            <i class="ri-pages-line"></i> <span data-key="t-pages">Add Inward Inventory</span>
                        </a>
                        <ul class="nav nav-sm flex-column">
                            {{-- <li class="nav-item">
                                <a href="/inventory_executives/add_meter_sl_number_wise" class="nav-link"
                                    data-key="t-calendar">Add Inward from Division
                                    Stores</a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="/inventory_executives/add_lot" class="nav-link"
                                    data-key="t-calendar">Add Inward from Division
                                    Stores</a>
                            </li>
                            <li class="nav-item">
                                <a href="/inventory_executives/add_inward_released_em_meter" class="nav-link"
                                    data-key="t-calendar">Add Inward Released EM Meter</a>
                            </li>


                        </ul>
                        {{-- <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/inventory_executives/add_inward_released_em_meter" class="nav-link" data-key="t-calendar">Add Inward Released EM Meter</a>
                            </li>
                            <li class="nav-item">
                                <a href="/inventory_executives/add_meter_sl_number_wise" class="nav-link" data-key="t-calendar">Add Meter Serial No Wise (Add Inventory Stock)</a>
                            </li>

                        </ul>
                    </div> --}}
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarLanding">
                            <i class="ri-rocket-line"></i> <span data-key="t-landing">Add Outward Inventory</span>
                        </a>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/inventory_executives/add_outward_installation" class="nav-link"
                                    data-key="t-calendar">Add Outward for Installation</a>
                            </li>
                            <li class="nav-item">
                                <a href="/inventory_executives/add_outward_released_em_meter" class="nav-link"
                                    data-key="t-calendar">Add Outward Released EM Meter</a>
                            </li>

                        </ul>
                        {{-- <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/inventory_executives/add_outward_installation" class="nav-link" data-key="t-calendar">Add Outward Installation</a>
                            </li>
                            <li class="nav-item">
                                <a href="/inventory_executives/add_outward_released_em_meter" class="nav-link" data-key="t-calendar">Add Outward released EM Meter</a>
                            </li>

                        </ul>
                    </div> --}}
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link menu-link" href="/inventory_executives/meter_stocks" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarLanding">
                            <i class="ri-rocket-line"></i> <span data-key="t-landing">Meter Stocks</span>
                        </a> --}}
                        <a href="/inventory_executives/meter_stocks" class="nav-link"
                            data-key="t-calendar"><i class="ri-rocket-line"></i> Meter Stocks</a>
                    </li>
                    <li class="nav-item">
                        <a href="/inventories/reports" class="nav-link"
                            data-key="t-calendar"><i class="ri-rocket-line"></i>Reports</a>
                    </li>
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'inventory_reporter')
                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Inventory
                            Reporters</span></li>


                    <li class="nav-item">
                        <a class="nav-link menu-link" href="
/inventory_reporters/annexure1">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Annexure-I</span>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="
/inventory_reporters/annexure3">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Annexure-III</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link menu-link" href="
/inventory_reporters/annexure4_list">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Annexure-IV</span>
                        </a>
                    </li> --}}
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'contractor_manager')
                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Contractor
                            Manager</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/contractors/add_contractor_executive">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Add Field
                                Executive</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/contractors/all_contractor_executives">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">All Field
                                Executives</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/contractors/rejected_reports">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Rejected Records</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/contractors/add_outward_installation">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Meter Stocks</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/contractors/reports">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Reports</span>
                        </a>
                    </li>
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'contractor_executive')
                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Contractor
                            Executive</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="
/contractor_executves/add_field_executive">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Add Field
                                Executive</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="
/contractor_executves/all_field_executives">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">All Field
                                Executives</span>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="
/contractor_executves/rejected_meters">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Rejected Meters</span>
                        </a>

                    </li>
                @endif



                @if (Session('rexkod_vishvin_auth_user_type') == 'qc_manager')
                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">QC
                            Vishvin</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/qcs/add_qc_executive">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Add QC Executive</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/qcs/all_qc_executives">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">All QC Executives</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/qcs/reports">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Reports</span>
                        </a>
                    </li>
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'qc_executive')
                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">QC
                            Exectuvie</span></li>
                    {{-- <li class="nav-item">
    <a class="nav-link menu-link" href="
/qc_executives/qc_executive_view">
        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">QC Executive View</span>
    </a>
</li> --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/qcs/qc_view">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Pending QC Records</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/qcs/approved_meter_reports">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Approved QC Records</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/qcs/rejected_meter_reports">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Rejected QC Records</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/qcs/executive_reports">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Reports</span>
                        </a>
                    </li>
                @endif

                @if (Session('rexkod_vishvin_auth_user_type') == 'hescom_manager')
                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Hescom
                            Executives</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/hescoms/add_hescom_executive">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Add HESCOM
                                Officer</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/hescoms/all_hescom_executives">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">All HESCOM
                                Officers</span>
                        </a>

                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link menu-link" href="/hescoms/all_consumers">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Consumer Detail</span>
                        </a>

                    </li> --}}
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'ae' ||
                        Session('rexkod_vishvin_auth_user_type') == 'aee' ||
                        Session('rexkod_vishvin_auth_user_type') == 'aao')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/hescoms/hescom_view">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Records for Approval</span>
                        </a>

                    </li>
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'ae' ||
                        Session('rexkod_vishvin_auth_user_type') == 'aee' ||
                        Session('rexkod_vishvin_auth_user_type') == 'aao')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/hescoms/approved_meter_reports">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Approved Records</span>
                        </a>

                    </li>
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'ae' ||
                        Session('rexkod_vishvin_auth_user_type') == 'aee' ||
                        Session('rexkod_vishvin_auth_user_type') == 'aao')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/hescoms/rejected_meter_reports">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Rejected Records</span>
                        </a>

                    </li>
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'aao')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/hescoms/error_reports">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Error Records as per TRM</span>
                        </a>

                    </li>
                @endif
                @if (Session('rexkod_vishvin_auth_user_type') == 'bmr')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="/bmrs/bmr_report">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">BMR Records</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">TRM</span>
                    </a>
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="/bmrs/successfull_records" class="nav-link"
                                data-key="t-calendar">Upload Successfull Records</a>
                        </li>
                        <li class="nav-item">
                            <a href="/bmrs/error_records" class="nav-link"
                                data-key="t-calendar">Upload Error Records</a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="/bmrs/successfull_report">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Successfull Records</span>
                    </a>

                </li>
                @endif
                @unless(in_array(Session('rexkod_vishvin_auth_user_type'), ['qc_executive', 'inventory_reporter', 'inventory_executive', 'contractor_executive', 'ae', 'aee', 'aao', 'inventory_reporter','bmr']))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="/admins/forget_password">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Forgot Password</span>
                    </a>
                </li>
            @endunless


                <li class="nav-item">
                    <a class="nav-link menu-link" href="/admins/logout">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Logout</span>
                    </a>

                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
