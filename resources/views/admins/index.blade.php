@include('inc_admin.header')

<link rel="stylesheet" type="text/css" href="assets_admin/css/vendors/datatables.css">
@php
    use App\Models\Zone_code;
    use App\Models\Admin;
    use App\Models\Inventory;
    use App\Models\Meter_main;
    use App\Models\Indent;
    use App\Models\Error_record;
    use App\Models\Successful_record;
    use App\Models\Warehouse_meter;

@endphp
<div class="main-content">
    <div class="page-content ">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        {{-- @auth
                    <h4 class="mb-sm-0" >HOME PAGE{{auth()->admin()->user_name}}</h4>
                    @else
                    <h4 class="mb-sm-0" >HOME PAGE</h4>
                    @endauth --}}
                        <h1>Welcome
                            @if (session('rexkod_vishvin_auth_user_type') == 'admin')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, Admin</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'project_head')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, Project Head</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'inventory_manager')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, Inventory Manager</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'inventory_executive')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, Inventory Executive</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'inventory_reporter')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, Inventory Reporter</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'contractor_manager')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, Contractor Manager</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'qc_manager')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, QC Manager</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'qc_executive')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, QC Executive</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'hescom_manager')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, Hescom Officer</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'aee')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, AEE</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'ae')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, AE</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'aao')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, AAO</p>
                            @elseif(session('rexkod_vishvin_auth_user_type') == 'bmr')
                                <p>{{ ucwords(session('rexkod_vishvin_auth_name')) }}, BMR</p>
                            @endif
                        </h1>


                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">HOME PAGE</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row project-wrapper">
                <div class="col-xxl-12">
                    <div class="row">
                        @if (session('rexkod_vishvin_auth_user_type') == 'admin')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                                    <i data-feather="briefcase" class="text-primary"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-3">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                    Project Heads</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['project_head_count'] }}">{{ $data['project_head_count'] }}</span>
                                                    </h4>
                                                    {{-- <span class="badge badge-soft-danger fs-12"><i
                                                class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
                                            %</span> --}}
                                                </div>
                                                <p class="text-muted text-truncate mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->
                        @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'admin')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                    <i data-feather="award" class="text-warning"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-uppercase fw-medium text-muted mb-3">Hescom Approval</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['hescom_approved_count'] }}">{{ $data['hescom_approved_count'] }}</span>
                                                    </h4>
                                                    {{-- <span class="badge badge-soft-success fs-12"><i
                                                class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                            %</span> --}}
                                                </div>
                                                <p class="text-muted mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->

                        @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'project_head')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                    <i data-feather="user" class="text-info"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-3">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                    HESCOM OFFICER</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['hescom_manager_count'] }}">{{ $data['hescom_manager_count'] }}</span>
                                                    </h4>

                                                </div>
                                                <p class="text-muted text-truncate mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->
                        @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'project_head')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                    <i data-feather="user" class="text-info"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-3">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                    INVENTORY MANAGER</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['inventory_manager_count'] }}">{{ $data['inventory_manager_count'] }}</span>
                                                    </h4>

                                                </div>
                                                <p class="text-muted text-truncate mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->
                        @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'project_head')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                    <i data-feather="user" class="text-info"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-3">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                    QC MANAGER</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['qc_manager_count'] }}">{{ $data['qc_manager_count'] }}</span>
                                                    </h4>

                                                </div>
                                                <p class="text-muted text-truncate mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->
                        @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'project_head')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                    <i data-feather="user" class="text-info"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-3">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                    CONTRACTOR MANAGER</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['qc_manager_count'] }}">{{ $data['qc_manager_count'] }}</span>
                                                    </h4>

                                                </div>
                                                <p class="text-muted text-truncate mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->
                        @endif

                        @if (session('rexkod_vishvin_auth_user_type') == 'qc_manager')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                    <i data-feather="user" class="text-info"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-3">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                    QC EXECUTIVE</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['qc_executive_count'] }}">{{ $data['qc_executive_count'] }}</span>
                                                    </h4>

                                                </div>
                                                <p class="text-muted text-truncate mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->
                            <div class="row">
                                <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                    <div class="card ongoing-project recent-orders">
                                        <br>
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl. no.</th>
                                                            <th>QC Executive Name</th>
                                                            <th>No of records Approved</th>
                                                            <th>No of records Rejected</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $count =1;

                                                        @endphp
                                                        @foreach ($data['get_qc_executives'] as $get_qc_executives)
                                                            @php
                                                                $approved = count(Meter_main::where('qc_updated_by',$get_qc_executives->id)->where('qc_status',1)->get());
                                                                $rejected = count(Meter_main::where('qc_updated_by',$get_qc_executives->id)->where('qc_status',2)->get());
                                                            @endphp
                                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                                           <td>{{$count}}</td>
                                                           <td>{{$get_qc_executives->name}}</td>
                                                           <td>{{$approved}}</td>
                                                           <td>{{$rejected}}</td>
                                                        </tr>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'hescom_manager')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                    <i data-feather="user" class="text-info"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-3">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                    AE (Hescom Executive)</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['ae_count'] }}">{{ $data['ae_count'] }}</span>
                                                    </h4>

                                                </div>
                                                <p class="text-muted text-truncate mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->
                        @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'hescom_manager')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                    <i data-feather="user" class="text-info"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-3">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                    AEE (Hescom Executive)</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['aee_count'] }}">{{ $data['aee_count'] }}</span>
                                                    </h4>

                                                </div>
                                                <p class="text-muted text-truncate mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->
                        @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'hescom_manager')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                    <i data-feather="user" class="text-info"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-3">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                    AAO (Hescom Executive)</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['aao_count'] }}">{{ $data['aao_count'] }}</span>
                                                    </h4>

                                                </div>
                                                <p class="text-muted text-truncate mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->
                        @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'inventory_manager')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                    <i data-feather="user" class="text-info"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-3">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                    INVENTORY EXECUTIVE</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['inventory_executive_count'] }}">{{ $data['inventory_executive_count'] }}</span>
                                                    </h4>

                                                </div>
                                                <p class="text-muted text-truncate mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->
                        @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'inventory_manager')
                            <div class="col-xl-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                                    <i data-feather="user" class="text-info"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-3">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                    INVENTORY REPORTER</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                            data-target="{{ $data['inventory_reporter_count'] }}">{{ $data['inventory_reporter_count'] }}</span>
                                                    </h4>

                                                </div>
                                                <p class="text-muted text-truncate mb-0">OVERALL</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!-- end col -->
                        @endif


                        @if (session('rexkod_vishvin_auth_user_type') == 'qc_executive')
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">QC Approval</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['qc_meter_approved_count'] }}">{{ $data['qc_meter_approved_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">QC Rejection</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['qc_meter_rejected_count'] }}">{{ $data['qc_meter_rejected_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">QC Pending</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['qc_meter_pending_count'] }}">{{ $data['qc_meter_pending_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->

                    @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'ae')
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">METER DRAWN FROM STORE (ES METERS)</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['meter_drawn_section_wise'] }}">{{ $data['meter_drawn_section_wise'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">ES TO EM METER REPLACED</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['meter_replaced_section_wise_count'] }}">{{ $data['meter_replaced_section_wise_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">BALANCE QUANTITY WITH VISHVIN FOR IMPLEMENTATION</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['meter_drawn_section_wise'] -  $data['meter_replaced_section_wise_count'] }}">{{ $data['meter_drawn_section_wise'] -  $data['meter_replaced_section_wise_count']}}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">RECORDS APPROVED BY AE</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['ae_meter_approved_count'] }}">{{ $data['ae_meter_approved_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">RECORDS REJECTED</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['ae_meter_rejected_count'] }}">{{ $data['ae_meter_rejected_count'] }}</span>
                                                </h4>

                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">Records pending for approval by AE</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['ae_meter_pending_count'] }}">{{ $data['ae_meter_pending_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->

                    @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'aao')
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">AAO Approval</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['aao_meter_approved_count'] }}">{{ $data['aao_meter_approved_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">AAO  Rejection</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['aao_meter_rejected_count'] }}">{{ $data['aao_meter_rejected_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">AAO Pending</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['aao_meter_pending_count'] }}">{{ $data['aao_meter_pending_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">Successful Records as per TRM report</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['get_total_successful_record_count'] }}">{{ $data['get_total_successful_record_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">BMR Errors Records as per TRM report</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['get_total_error_record_count'] }}">{{ $data['get_total_error_record_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">Records Uploaded in TRM – Submitted for validation</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['error_record_pending_for_aao_count'] }}">{{ $data['error_record_pending_for_aao_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">Records pending for TRM Uploaded – Approved but BMR report not generated</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['error_updated_but_not_downloaded_count'] }}">{{ $data['error_updated_but_not_downloaded_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        {{-- <div class="container-fluid general-widget">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                    <div class="card ongoing-project recent-orders">
                                        <br>
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>

                                                            <th>Sl. no.</th>
                                                            <th>Section Name</th>
                                                            <th>Successful Records as per TRM report</th>
                                                            <th>BMR Errors Records as per TRM report</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $count =0;
                                                            $admin = Admin::where('id',session('rexkod_vishvin_auth_userid'))->first();
                                                            $section_name = Zone_code::where('sd_code',$admin->sd_pincode)->get();
                                                            $get_error_meter = DB::table('error_records')
                                                                ->join('consumer_details', 'error_records.account_id', '=', 'consumer_details.account_id')
                                                                ->selectRaw('consumer_details.so_pincode, COUNT(*) as count')
                                                                ->groupBy('consumer_details.so_pincode')
                                                                ->get();
                                                            $get_success_meter = DB::table('successful_records')
                                                                ->join('consumer_details', 'successful_records.account_id', '=', 'consumer_details.account_id')
                                                                ->selectRaw('consumer_details.so_pincode, COUNT(*) as count')
                                                                ->groupBy('consumer_details.so_pincode')
                                                                ->get();

                                                        @endphp
                                                        @foreach ($section_name as $section)
                                                            @php
                                                                $count++;

                                                            @endphp
                                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                                            <td>{{$count}}</td>
                                                            <td>{{$section->section_office}}</td>



                                                            @if (!count($get_success_meter)==0)
                                                            @foreach ($get_success_meter as $item)
                                                                @if($item->so_pincode == $section->so_code)
                                                                    <td>{{$item->count}}</td>

                                                                @else
                                                                    <td>0</td>
                                                                @endif
                                                            @endforeach
                                                            @else
                                                                    <td>0</td>
                                                            @endif

                                                            @if (!count($get_error_meter)==0)
                                                            @foreach ($get_error_meter as $item)
                                                                @if($item->so_pincode == $section->so_code)
                                                                    <td>{{$item->count}}</td>

                                                                @else
                                                                    <td>0</td>
                                                                @endif
                                                            @endforeach
                                                            @else
                                                                    <td>0</td>
                                                            @endif

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> --}}

                    @endif
                        @if (session('rexkod_vishvin_auth_user_type') == 'aee')
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">AEE Approval</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['aee_meter_approved_count'] }}">{{ $data['aee_meter_approved_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">AEE  Rejection</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['aee_meter_rejected_count'] }}">{{ $data['aee_meter_rejected_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-3">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">AEE Pending</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="{{ $data['aee_meter_pending_count'] }}">{{ $data['aee_meter_pending_count'] }}</span>
                                                </h4>
                                                {{-- <span class="badge badge-soft-success fs-12"><i
                                            class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                        %</span> --}}
                                            </div>
                                            <p class="text-muted mb-0">OVERALL</p>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                        <div class="container-fluid general-widget">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                    <div class="card ongoing-project recent-orders">
                                        <br>
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>

                                                            <th>Sl. no.</th>
                                                            <th>Section Name</th>
                                                            <th>Section wise Record Approved</th>
                                                            <th>Section wise Record Pending for Approval</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $count =0;
                                                            $admin = Admin::where('id',session('rexkod_vishvin_auth_userid'))->first();
                                                            $section_name = Zone_code::where('sd_code',$admin->sd_pincode)->get();
                                                        @endphp
                                                        @foreach ($section_name as $section)
                                                            {{-- @php
                                                                $count++;
                                                            $meter_main = Meter_main::where('account_id', $error_record->account_id)->first();

                                                            @endphp --}}
                                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                                            <td>{{$count}}</td>
                                                            <td>{{$section->section_office}}</td>
                                                            @if (!count($data['get_aee_approved_meter_section_wise'])==0)
                                                                @foreach ($data['get_aee_approved_meter_section_wise'] as $item)
                                                                @if ($item->so_pincode == $section->so_code)
                                                                    <td>{{$item->count}}</td>
                                                                @else
                                                                    <td>0</td>
                                                                @endif
                                                                @endforeach
                                                            @else
                                                                <td>0</td>
                                                            @endif

                                                            @if (!count($data['get_aee_pending_meter_section_wise'])==0)
                                                                @foreach ($data['get_aee_pending_meter_section_wise'] as $item)
                                                                    @if ($item->so_pincode == $section->so_code)
                                                                        <td>{{$item->count}}</td>
                                                                    @else
                                                                        <td>0</td>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <td>0</td>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @endif
                    @if (session('rexkod_vishvin_auth_user_type') == 'inventory_reporter')
                    <div class="col-xl-3">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                            <i data-feather="award" class="text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-muted mb-3">Annexure 1</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                    data-target="{{ $data['count_of_annexure1'] }}">{{ $data['count_of_annexure1'] }}</span>
                                            </h4>
                                            {{-- <span class="badge badge-soft-success fs-12"><i
                                        class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                    %</span> --}}
                                        </div>
                                        <p class="text-muted mb-0">OVERALL</p>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div><!-- end col -->
                    <div class="col-xl-3">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                            <i data-feather="award" class="text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-muted mb-3">Annexure 3</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                    data-target="{{ $data['count_of_annexure3'] }}">{{ $data['count_of_annexure3'] }}</span>
                                            </h4>
                                            {{-- <span class="badge badge-soft-success fs-12"><i
                                        class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                    %</span> --}}
                                        </div>
                                        <p class="text-muted mb-0">OVERALL</p>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div><!-- end col -->
                    @endif

                    </div><!-- end row -->
                    @if (session('rexkod_vishvin_auth_user_type') == 'admin')
                        {{-- <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Total Meters</h4>

                                    </div><!-- end card header -->

                                    <div class="card-header p-0 border-0 bg-soft-light">
                                        <div class="row g-0 text-center">
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_meter_count'] }}">{{ $data['es_total_meter_count'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Total Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_unused_meter_count'] }}">{{ $data['es_total_unused_meter_count'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Unused Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_used_meter_count'] }}">{{ $data['es_total_used_meter_count'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Used Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['em_total_inward_meter_count'] }}">{{ $data['em_total_inward_meter_count'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Inward EM</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['em_total_outward_meter_count'] }}">{{ $data['em_total_outward_meter_count'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Outward EM</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['total_rejected_meter_count'] }}">{{ $data['total_rejected_meter_count'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Rejected Meter</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                    </div><!-- end card header -->

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end col --> --}}
                        <div class="row">
                            <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                <div class="card ongoing-project recent-orders">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Inventory Manager Report report-4</h4>

                                    </div>
                                    <br>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. no.</th>
                                                        <th>Division Name</th>
                                                        <th>Contractor Name</th>
                                                        <th>Qty drawn from Stores</th>
                                                        <th>Qty installed in the filed</th>
                                                        {{-- <th>Balance Qty with Vishvin for implementation</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count =1;

                                                    @endphp
                                                    @foreach ($data['contractor_inventories'] as $contractor_inventory)
                                                        @php
                                                            $zone_code =Zone_code::where('div_code',$contractor_inventory->division)->first();
                                                            $admin = Admin::where('id',$contractor_inventory->contractor_id)->first();
                                                            $break_single_meter = explode(',', $contractor_inventory->serial_no);
                                                            $unused_count=0;
                                                                foreach ($break_single_meter as $es_meter_individual) {
                                                                    $unused_count++;
                                                                }

                                                                $single_box = $contractor_inventory->used_meter_serial_no;
                                                                $used_count=0;
                                                                if ($single_box !== null && $single_box !== '') {
                                                                $break_single_meter = explode(',', $single_box);

                                                                foreach ($break_single_meter as $es_meter_individual) {
                                                                    $used_count++;
                                                                }
                                                            }
                                                        @endphp
                                                    <tr style="border-bottom: 1px solid #dee2e6;">
                                                       <td>{{$count}}</td>
                                                       <td>{{$zone_code->division}}</td>
                                                       <td>{{$admin->name}}</td>
                                                       <td>{{$unused_count}}</td>
                                                       <td>{{$used_count}}</td>
                                                       {{-- <td>{{$unused_count-$used_count}}</td> --}}
                                                    </tr>
                                                @php
                                                    $count++;
                                                @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                <div class="card ongoing-project recent-orders">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Contractor Manager Report report-5</h4>
                                    </div>
                                    <br>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>

                                                        <th>Sl. no.</th>
                                                        <th>Qty Allocated</th>
                                                        <th>Qty installed in the field</th>
                                                        {{-- <th>Balance Qty with Contractor for implementation</th> --}}

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count =1;

                                                    @endphp
                                                    @foreach ($data['contractor_inventories'] as $contractor_inventory)
                                                        @php

                                                            $break_single_meter = explode(',', $contractor_inventory->serial_no);
                                                            $unused_count=0;
                                                                foreach ($break_single_meter as $es_meter_individual) {
                                                                    $unused_count++;
                                                                }

                                                                $single_box = $contractor_inventory->used_meter_serial_no;
                                                                $used_count=0;
                                                                if ($single_box !== null && $single_box !== '') {
                                                                $break_single_meter = explode(',', $single_box);

                                                                foreach ($break_single_meter as $es_meter_individual) {
                                                                    $used_count++;
                                                                }
                                                            }
                                                        @endphp
                                                    <tr style="border-bottom: 1px solid #dee2e6;">
                                                       <td>{{$count}}</td>

                                                       <td>{{$unused_count}}</td>
                                                       <td>{{$used_count}}</td>
                                                       {{-- <td>{{$unused_count-$used_count}}</td> --}}
                                                    </tr>
                                                @php
                                                    $count++;
                                                @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                <div class="card ongoing-project recent-orders">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1"> Report-6</h4>
                                    </div>
                                    <br>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. no.</th>
                                                        <th>Field Executive Name</th>
                                                        <th>No of Meters Replaced</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count =1;

                                                    @endphp
                                                    @foreach ($data['get_all_field_executives'] as $get_field_executive)
                                                        @php
                                                            $inventory = count(Inventory::where('created_by',$get_field_executive->id)->get());

                                                        @endphp
                                                    <tr style="border-bottom: 1px solid #dee2e6;">
                                                       <td>{{$count}}</td>
                                                       <td>{{$get_field_executive->name}}</td>
                                                       <td>{{$inventory}}</td>

                                                    </tr>
                                                @php
                                                    $count++;
                                                @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                <div class="card ongoing-project recent-orders">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">QC Internal Manager Report Report-7</h4>
                                    </div>
                                    <br>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. no.</th>
                                                        <th>QC Executive Name</th>
                                                        <th>No of records Approved</th>
                                                        <th>No of records Rejected</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count =1;

                                                    @endphp
                                                    @foreach ($data['get_all_qc_executives'] as $get_qc_executives)
                                                        @php
                                                            $approved = count(Meter_main::where('qc_updated_by',$get_qc_executives->id)->where('qc_status',1)->get());
                                                            $rejected = count(Meter_main::where('qc_updated_by',$get_qc_executives->id)->where('qc_status',2)->get());
                                                        @endphp
                                                    <tr style="border-bottom: 1px solid #dee2e6;">
                                                       <td>{{$count}}</td>
                                                       <td>{{$get_qc_executives->name}}</td>
                                                       <td>{{$approved}}</td>
                                                       <td>{{$rejected}}</td>
                                                    </tr>
                                                @php
                                                    $count++;
                                                @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                <div class="card ongoing-project recent-orders">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">AE (Section Officer) Dashboard: Report 1 </h4>
                                    </div>
                                    <br>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. no.</th>
                                                        <th>Section Name</th>
                                                        {{-- <th>Meters Drawn from store (ES Meters)</th> --}}
                                                        <th>ES to EM Meters Replaced</th>
                                                        {{-- <th>Balance quantity with Vishvin for implementation </th> --}}
                                                        <th>Record Approved by AE</th>
                                                        <th>Records pending for approval by AE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count =1;

                                                    @endphp
                                                    @foreach ($data['get_all_so_code_for_belagavi'] as $get_all_so_code)
                                                        @php
                                                            // $indents = Indent::get();
                                                            // $meter_drawn_section_wise =0;
                                                            // foreach ($indents as $meter_stock) {
                                                            //     # code...
                                                            //     $so_code = explode(',',$meter_stock->so_code);

                                                            //     $count2=0;
                                                            //     foreach ($so_code as $code) {
                                                            //         if($code == $get_all_so_code->so_code){
                                                            //             $meter_quantity =explode(',',$meter_stock->meter_quantity);
                                                            //             $meter_drawn_section_wise = $meter_drawn_section_wise + $meter_quantity[$count2];
                                                            //         }
                                                            //         $count2++;
                                                            //     }

                                                            // }
                                                            // $ware_house = Warehouse_meter::where('complete_status',1)->get();
                                                            // $meter_drawn_section_wise =0;
                                                            // foreach ($ware_house as $meter_stock) {
                                                            //     # code...
                                                            //     $so_code = explode(',',$meter_stock->so_code);

                                                            //     $count2=0;
                                                            //     foreach ($so_code as $code) {
                                                            //         if($code == $get_all_so_code->so_code){
                                                            //             $meter_quantity =explode(',',$meter_stock->meter_quantity);
                                                            //             $meter_drawn_section_wise = $meter_drawn_section_wise + $meter_quantity[$count2];
                                                            //         }
                                                            //         $count2++;
                                                            //     }

                                                            // }

                                                            $meter_replaced_section_wise = DB::table('meter_mains')
                                                            ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
                                                            ->whereNotNull('meter_mains.serial_no_new')
                                                            ->where('consumer_details.so_pincode', '=', $get_all_so_code->so_code)
                                                            ->get();
                                                            $meter_replaced_section_wise_count =count($meter_replaced_section_wise);

                                                           $get_ae_approved_main_meter = DB::table('meter_mains')
                                                                ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
                                                                ->select('meter_mains.*')
                                                                ->where('consumer_details.so_pincode',$get_all_so_code->so_code)
                                                                ->where('qc_status', '=', '1')
                                                                ->where('so_status', '=', '1')
                                                                ->get();
                                                            $ae_meter_approved_count = count($get_ae_approved_main_meter);
                                                            $get_ae_pending_main_meter = DB::table('meter_mains')
                                                                ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
                                                                ->select('meter_mains.*')
                                                                ->where('consumer_details.so_pincode',$get_all_so_code->so_code)
                                                                ->where('qc_status', '=', '1')
                                                                ->where('so_status', '=', '0')
                                                                ->get();
                                                            $ae_meter_pending_count = count($get_ae_pending_main_meter);

                                                        @endphp
                                                    <tr style="border-bottom: 1px solid #dee2e6;">
                                                       <td>{{$count}}</td>
                                                       <td>{{$get_all_so_code->section_office}}</td>
                                                       {{-- <td>{{ $meter_drawn_section_wise}}</td> --}}
                                                       <td>{{ $meter_replaced_section_wise_count }}</td>
                                                       {{-- <td>{{ $meter_drawn_section_wise- $meter_replaced_section_wise_count }}</td> --}}
                                                       <td>{{$ae_meter_approved_count}}</td>
                                                       <td>{{$ae_meter_pending_count}}</td>

                                                    </tr>
                                                @php
                                                    $count++;
                                                @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                <div class="card ongoing-project recent-orders">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">AEE Dashboard: Report 2</h4>
                                    </div>
                                    <br>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. no.</th>
                                                        <th>Sub Division Name</th>
                                                        <th>Record Approved by AEE </th>
                                                        <th>Records pending for approval by AEE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count =1;

                                                    @endphp
                                                    @foreach ($data['get_all_sd_code_for_belagavi'] as $get_all_sd_code)
                                                        @php
                                                           $get_aee_approved_main_meter = DB::table('meter_mains')
                                                                ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
                                                                ->select('meter_mains.*')
                                                                ->where('consumer_details.sd_pincode',$get_all_sd_code->sd_code)
                                                                ->where('qc_status', '=', '1')
                                                                ->where('so_status', '=', '1')
                                                                ->where('aee_status', '=', '1')

                                                                ->get();
                                                                $aee_meter_approved_count = count($get_aee_approved_main_meter);

                                                            $get_aee_pending_main_meter = DB::table('meter_mains')
                                                                ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
                                                                ->select('meter_mains.*')
                                                                ->where('consumer_details.sd_pincode',$get_all_sd_code->sd_code)
                                                                ->where('qc_status', '=', '1')
                                                                ->where('so_status', '=', '1')
                                                                ->where('aee_status', '=', '0')

                                                                ->get();
                                                                $aee_meter_pending_count = count($get_aee_pending_main_meter);
                                                        @endphp
                                                    <tr style="border-bottom: 1px solid #dee2e6;">
                                                        <td>{{$count}}</td>
                                                        <td>{{$get_all_sd_code->sub_division}}</td>
                                                        <td>{{$aee_meter_approved_count}}</td>
                                                        <td>{{$aee_meter_pending_count}}</td>
                                                    </tr>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                <div class="card ongoing-project recent-orders">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">AAO Dashboard: Report 3</h4>
                                    </div>
                                    <br>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. no.</th>
                                                        <th>Sub Division Name</th>
                                                        <th>Record Approved by AAO </th>
                                                        <th>Records pending for approval by AAO</th>
                                                        <th>Successfull records</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count =1;

                                                    @endphp
                                                    @foreach ($data['get_all_sd_code_for_belagavi'] as $get_all_sd_code)
                                                        @php
                                                        $get_aao_approved_main_meter = DB::table('meter_mains')
                                                                ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
                                                                ->select('meter_mains.*')
                                                                ->where('consumer_details.sd_pincode',$get_all_sd_code->sd_code)
                                                                ->where('qc_status', '=', '1')
                                                                ->where('so_status', '=', '1')
                                                                ->where('aee_status', '=', '1')
                                                                ->where('aao_status', '=', '1')
                                                                ->get();
                                                                $aao_meter_approved_count = count($get_aao_approved_main_meter);

                                                            $get_aao_pending_main_meter = DB::table('meter_mains')
                                                                ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
                                                                ->select('meter_mains.*')
                                                                ->where('consumer_details.sd_pincode',$get_all_sd_code->sd_code)
                                                                ->where('qc_status', '=', '1')
                                                                ->where('so_status', '=', '1')
                                                                ->where('aee_status', '=', '1')
                                                                ->where('aao_status', '=', '0')
                                                                ->get();
                                                                $aao_meter_pending_count = count($get_aao_pending_main_meter);

                                                            // $aao_meter_approved_count =  count(Meter_main::where('aao_status', '1')->where('aao_updated_by',$get_all_aao->id)->get());
                                                            // $get_aao_pending_main_meter =DB::table('meter_mains')
                                                            // ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
                                                            // ->join('admins', 'consumer_details.sd_pincode', '=', 'admins.sd_pincode')
                                                            // ->select('meter_mains.*')
                                                            // ->where('admins.id', $get_all_aao->id)
                                                            // ->where('qc_status', 1)->where('so_status', 1)->where('aee_status', 1)->where('aao_status', 0)->orderBy('id')->get();
                                                            // $aao_meter_approved_count = count($get_aao_pending_main_meter);
                                                            $successfull_records = DB::table('successful_records')
                                                            ->join('consumer_details', 'successful_records.account_id', '=', 'consumer_details.account_id')
                                                            ->where('consumer_details.sd_pincode',$get_all_sd_code->sd_code)
                                                            ->get();
                                                            $successfull_records_count = count($successfull_records);

                                                        @endphp
                                                    <tr style="border-bottom: 1px solid #dee2e6;">
                                                        <td>{{$count}}</td>
                                                        <td>{{$get_all_sd_code->sub_division}}</td>
                                                        <td>{{$aao_meter_approved_count}}</td>
                                                        <td>{{$aao_meter_pending_count}}</td>
                                                        <td>{{$successfull_records_count}}</td>
                                                    </tr>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                    @if (session('rexkod_vishvin_auth_user_type') == 'project_head')
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Total Meters</h4>

                                    </div><!-- end card header -->

                                    <div class="card-header p-0 border-0 bg-soft-light">
                                        <div class="row g-0 text-center">
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_meter_count_project_head_wise'] }}">{{ $data['es_total_meter_count_project_head_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Total Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_unused_meter_count_project_head_wise'] }}">{{ $data['es_total_unused_meter_count_project_head_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Unused Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_used_meter_count_project_head_wise'] }}">{{ $data['es_total_used_meter_count_project_head_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Used Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['em_total_inward_meter_count_project_head_wise'] }}">{{ $data['em_total_inward_meter_count_project_head_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Inward EM</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['em_total_outward_meter_count_project_head_wise'] }}">{{ $data['em_total_outward_meter_count_project_head_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Outward EM</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['total_rejected_meter_count_project_head_wise'] }}">{{ $data['total_rejected_meter_count_project_head_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Rejected Meter</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                    </div><!-- end card header -->

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end col -->
                    @endif
                    @if (session('rexkod_vishvin_auth_user_type') == 'inventory_manager')
                        {{-- <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Total Meters</h4>

                                    </div><!-- end card header -->

                                    <div class="card-header p-0 border-0 bg-soft-light">
                                        <div class="row g-0 text-center">
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_meter_count_inventory_manager_wise'] }}">{{ $data['es_total_meter_count_inventory_manager_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Total Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_unused_meter_count_inventory_manager_wise'] }}">{{ $data['es_total_unused_meter_count_inventory_manager_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Unused Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_used_meter_count_inventory_manager_wise'] }}">{{ $data['es_total_used_meter_count_inventory_manager_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Used Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['em_total_inward_meter_count_inventory_manager_wise'] }}">{{ $data['em_total_inward_meter_count_inventory_manager_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Inward EM</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['em_total_outward_meter_count_inventory_manager_wise'] }}">{{ $data['em_total_outward_meter_count_inventory_manager_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Outward EM</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['total_rejected_meter_count_inventory_manager_wise'] }}">{{ $data['total_rejected_meter_count_inventory_manager_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Rejected Meter</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                    </div><!-- end card header -->

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end col --> --}}
                        {{-- <div class="container-fluid general-widget"> --}}
                            <div class="row">
                                <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                    <div class="card ongoing-project recent-orders">
                                        <br>
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>

                                                            <th>Sl. no.</th>
                                                            <th>Division Name</th>
                                                            <th>Contractor Name</th>
                                                            <th>Qty drawn from Stores</th>
                                                            <th>Qty installed in the field</th>
                                                            {{-- <th>Balance Qty with Vishvin for implementation</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $count =0;

                                                        @endphp
                                                        @foreach ($data['contractor_inventories'] as $contractor_inventory)
                                                            @php
                                                                $admin = Admin::where('id',$contractor_inventory->contractor_id)->first();
                                                                $break_single_meter = explode(',', $contractor_inventory->serial_no);
                                                                $unused_count=0;
                                                                    foreach ($break_single_meter as $es_meter_individual) {
                                                                        $unused_count++;
                                                                    }

                                                                    $single_box = $contractor_inventory->used_meter_serial_no;
                                                                    $used_count=0;
                                                                    if ($single_box !== null && $single_box !== '') {
                                                                    $break_single_meter = explode(',', $single_box);

                                                                    foreach ($break_single_meter as $es_meter_individual) {
                                                                        $used_count++;
                                                                    }
                                                                    }
                                                            @endphp
                                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                                           <td>{{$count}}</td>
                                                           <td>{{$contractor_inventory->division}}</td>
                                                           <td>{{$admin->name}}</td>
                                                           <td>{{$unused_count}}</td>
                                                           <td>{{$used_count}}</td>
                                                           {{-- <td>{{$unused_count-$used_count}}</td> --}}
                                                        </tr>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                    <div class="card ongoing-project recent-orders">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Inward Report :</h4>
                                        </div>
                                        {{-- filter --}}
                                        <div class="row container-fluid">
                                            <div class="col-12">
                                                <form method="GET" action="{{url('/')}}/admins/index">
                                                    @csrf
                                                    <div class="row mb-2">
                                                        <div class="col-lg-4 d-flex">
                                                            <input type="radio" name="format" id="weekly" value="weekly">
                                                            <label for="weekly" style="margin-bottom:0;">Weekly</label>
                                                        </div>
                                                        <div class="col-lg-4 d-flex">
                                                            <input type="radio" name="format" id="monthly" value="monthly">
                                                            <label for="monthly" style="margin-bottom:0;">Monthly</label>
                                                        </div>
                                                        <div class="col-lg-4 d-flex">
                                                            <input type="radio" name="format" id="custom" value="custom">
                                                            <label for="custom" style="margin-bottom:0;">Custom</label>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2" id="custom_date" style="display: none">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                            <label for="start_date">Start Date:</label>
                                                            <input type="date" class="form-control" name="start_date" id="start_date">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                            <label for="end_date">End Date:</label>
                                                            <input type="date" class="form-control" name="end_date" id="end_date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-4">
                                                            {{-- <label for="end_date">Action </label> --}}
                                                            <button type="submit" class="btn btn-primary">Search</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <script>

                                                    document.addEventListener('DOMContentLoaded', function() {
                                                    var weeklyRadio = document.querySelector('input[value="weekly"]');
                                                    var monthlyRadio = document.querySelector('input[value="monthly"]');
                                                    var customRadio = document.querySelector('input[value="custom"]');
                                                    var customDiv = document.querySelector('#custom_date');

                                                    weeklyRadio.addEventListener('change', function() {
                                                        customDiv.style.display = 'none';
                                                    });

                                                    monthlyRadio.addEventListener('change', function() {
                                                        customDiv.style.display = 'none';
                                                    });

                                                    customRadio.addEventListener('change', function() {
                                                        customDiv.style.display = '';
                                                    });
                                                });


                                                </script>
                                            </div>
                                        </div>
                                        {{-- filter end --}}

                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl. no.</th>
                                                            <th>Date</th>
                                                            <th>Division Store</th>
                                                            <th>Inward Quantity</th>
                                                            <th>Total Quantity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $count =0;
                                                            $total_meter_quantity = 0;
                                                        @endphp
                                                        @foreach ($data['ware_house_meter_stock'] as $ware_house_meter_stock)
                                                        @php
                                                        $count++;
                                                        $break_single_meter = explode(',', $ware_house_meter_stock->meter_serial_no);
                                                        $total_meter_quantity += count($break_single_meter);
                                                        $get_division_name = Zone_code::where('div_code', $ware_house_meter_stock->division)->first();
                                                        @endphp
                                                        <tr>
                                                            <td>{{$count}}</td>
                                                            <td>{{$ware_house_meter_stock->created_at}}</td>
                                                            <td>{{$get_division_name->division}}</td>
                                                            <td>{{count($break_single_meter)}}</td>
                                                            <td>{{$total_meter_quantity}}</td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                    <div class="card ongoing-project recent-orders">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Outward Report :</h4>
                                        </div>
                                        <br>
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl. no.</th>
                                                            <th>Date</th>
                                                            <th>Contractor Name</th>
                                                            <th>Outward Quantity</th>
                                                            <th>Outward Balance(Total)</th>
                                                            <th>Balance Quantity &commat;Store</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $count =0;
                                                            $total_meter_quantity = 0;
                                                            foreach ($data['ware_house_meter_stock'] as $ware_house_meter_stock) {
                                                                # code...
                                                                $break_single_meter = explode(',', $ware_house_meter_stock->meter_serial_no);
                                                                $total_meter_quantity += count($break_single_meter);
                                                            }
                                                        @endphp
                                                        @foreach ($data['contractor_inventories'] as $contractor_inventory)
                                                        @php
                                                        $count++;
                                                            $admin = Admin::where('id',$contractor_inventory->contractor_id)->first();
                                                            $break_single_meter = explode(',', $contractor_inventory->serial_no);
                                                            $single_box = $contractor_inventory->used_meter_serial_no;
                                                                    $used_count=0;
                                                                    if ($single_box !== null && $single_box !== '') {
                                                                    $break_single_meter = explode(',', $single_box);

                                                                    foreach ($break_single_meter as $es_meter_individual) {
                                                                        $used_count++;
                                                                    }
                                                                    }
                                                                    $total_meter_quantity -= count($break_single_meter);
                                                        @endphp
                                                        <tr>
                                                            <td>{{$count}}</td>
                                                            <td>{{$contractor_inventory->created_at}}</td>
                                                            <td>{{$admin->name}}</td>
                                                            <td>{{count($break_single_meter)}}</td>
                                                            <td>{{count($break_single_meter) - $used_count}}</td>
                                                            <td>{{$total_meter_quantity}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        {{-- </div> --}}
                    @endif

                    @if (session('rexkod_vishvin_auth_user_type') == 'bmr')
                    <div class="row">
                    <div class="col-xl-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                            <i data-feather="award" class="text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-muted mb-3">Successful Records</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                    data-target="{{ $data['get_total_successful_record_count_bmr'] }}">{{ $data['get_total_successful_record_count_bmr'] }}</span>
                                            </h4>
                                            {{-- <span class="badge badge-soft-success fs-12"><i
                                        class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                    %</span> --}}
                                        </div>
                                        <p class="text-muted mb-0">OVERALL</p>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div><!-- end col -->
                    <div class="col-xl-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                            <i data-feather="award" class="text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-muted mb-3">Errors Records </p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                    data-target="{{ $data['get_total_error_record_count_bmr'] }}">{{ $data['get_total_error_record_count_bmr'] }}</span>
                                            </h4>
                                            {{-- <span class="badge badge-soft-success fs-12"><i
                                        class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                    %</span> --}}
                                        </div>
                                        <p class="text-muted mb-0">OVERALL</p>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div><!-- end col -->

                </div><!-- end col -->
                @endif

                    @if (session('rexkod_vishvin_auth_user_type') == 'inventory_executive')
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Total Meters</h4>

                                    </div><!-- end card header -->

                                    <div class="card-header p-0 border-0 bg-soft-light">
                                        <div class="row g-0 text-center">
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_meter_count_inventory_executive_wise'] }}">{{ $data['es_total_meter_count_inventory_executive_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Total Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_unused_meter_count_inventory_executive_wise'] }}">{{ $data['es_total_unused_meter_count_inventory_executive_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Unused Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_used_meter_count_inventory_executive_wise'] }}">{{ $data['es_total_used_meter_count_inventory_executive_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Used Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['em_total_inward_meter_count_inventory_executive_wise'] }}">{{ $data['em_total_inward_meter_count_inventory_executive_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Inward EM</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['em_total_outward_meter_count_inventory_executive_wise'] }}">{{ $data['em_total_outward_meter_count_inventory_executive_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Outward EM</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['total_rejected_meter_count_inventory_executive_wise'] }}">{{ $data['total_rejected_meter_count_inventory_executive_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Rejected Meter</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                    </div><!-- end card header -->

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end col -->
                    @endif
                    @if (session('rexkod_vishvin_auth_user_type') == 'contractor_manager')
                        {{-- <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Total Meters</h4>

                                    </div><!-- end card header -->

                                    <div class="card-header p-0 border-0 bg-soft-light">
                                        <div class="row g-0 text-center">
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_meter_count_contractor_wise'] }}">{{ $data['es_total_meter_count_contractor_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Total Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_unused_meter_count_contractor_wise'] }}">{{ $data['es_total_unused_meter_count_contractor_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Unused Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['es_total_used_meter_count_contractor_wise'] }}">{{ $data['es_total_used_meter_count_contractor_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Used Meters</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['em_total_inward_meter_count_contractor_wise'] }}">{{ $data['em_total_inward_meter_count_contractor_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Inward EM</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['em_total_outward_meter_count_contractor_wise'] }}">{{ $data['em_total_outward_meter_count_contractor_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Outward EM</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-2">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            style="color:blue;"
                                                            data-target="{{ $data['total_rejected_meter_count_contractor_wise'] }}">{{ $data['total_rejected_meter_count_contractor_wise'] }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-0">Rejected Meter</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                    </div><!-- end card header -->

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end col --> --}}

                        <div class="row">
                            <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                <div class="card ongoing-project recent-orders">
                                    <br>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>

                                                        <th>Sl. no.</th>
                                                        <th>Qty Allocated</th>
                                                        <th>Qty Balance</th>
                                                        <th>Qty installed in the field</th>
                                                        {{-- <th>Balance Qty with Contractor for implementation</th> --}}

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count =1;

                                                    @endphp
                                                    @foreach ($data['contractor_inventories_by_id'] as $contractor_inventory)
                                                        @php

                                                            $unused_count=0;
                                                            $unused_sl_no = $contractor_inventory->unused_meter_serial_no;
                                                    if($unused_sl_no !== null && $unused_sl_no !== ''){
                                                        $break_single_meter = explode(',', $unused_sl_no);
                                                                foreach ($break_single_meter as $es_meter_individual) {
                                                                    $unused_count++;
                                                                }
                                                    }


                                                                $single_box = $contractor_inventory->used_meter_serial_no;
                                                                $used_count=0;
                                                                if ($single_box !== null && $single_box !== '') {
                                                                $break_single_meter = explode(',', $single_box);

                                                                foreach ($break_single_meter as $es_meter_individual) {
                                                                    $used_count++;
                                                                }
                                                            }
                                                        @endphp
                                                    <tr style="border-bottom: 1px solid #dee2e6;">
                                                       <td>{{$count}}</td>
                                                       <td>{{$unused_count + $used_count}}</td>
                                                       <td>{{$unused_count}}</td>
                                                       <td>{{$used_count}}</td>
                                                       {{-- <td>{{$unused_count-$used_count}}</td> --}}
                                                    </tr>
                                                @php
                                                    $count++;
                                                @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 dash-xl-100 dash-lg-100 dash-39">
                                <div class="card ongoing-project recent-orders">
                                    <br>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. no.</th>
                                                        <th>Field Executive Name</th>
                                                        <th>No of Meters Replaced</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count =1;

                                                    @endphp
                                                    @foreach ($data['get_field_executives'] as $get_field_executive)
                                                        @php
                                                            $inventory = count(Inventory::where('created_by',$get_field_executive->id)->get());

                                                        @endphp
                                                    <tr style="border-bottom: 1px solid #dee2e6;">
                                                       <td>{{$count}}</td>
                                                       <td>{{$get_field_executive->name}}</td>
                                                       <td>{{$inventory}}</td>

                                                    </tr>
                                                @php
                                                    $count++;
                                                @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif

                    <!-- end col   -->
                </div>
                <!-- end row  -->

            </div>
            <!-- container-fluid  -->
        </div>
        <!-- End Page-content -->
    </div>

    @include('inc_admin.footer')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
     $(document).ready(function() {
    $('.table').DataTable({
      dom: 'Bfrtip',
      buttons: [

      ]
    });
  });
</script>
