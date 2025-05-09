@include('inc_admin.header')


<?php
// $meter_mains = $data['meter_mains'];
?>

<head>

    <title>All Products</title>


</head>



<!-- Begin page -->
<div id="layout-wrapper">



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">


                                @if (session('rexkod_vishvin_auth_user_type') == 'ae')
                                    Records for Approval By AE
                                @elseif(session('rexkod_vishvin_auth_user_type') == 'aee')
                                Records for Approval By AEE
                                @elseif(session('rexkod_vishvin_auth_user_type') == 'aao')
                                Records for Approval By AAO
                                @endif



                            </h4>
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
                    <div class="col-xl-12">
                        <div class="card">
                            <!-- end card header -->

                            <div class="card-body">

                                <div class="live-preview">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Serial No.</th>
                                                    <th scope="col"> RR No.</th>
                                                    <th scope="col">Actions</th>
                                                    <th scope="col"> <label><input type="checkbox" name="sample"
                                                                class="selectall" /> Select all</label></th>


                                                </tr>
                                            </thead>
                                            <form id="createproduct-form" autocomplete="off" class="needs-validation"
                                                action="/hescoms/bulk_approve_hescoms_report" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <tbody>
                                                    @php
                                                        $count = 0;
                                                    @endphp

                                                    @foreach ($meter_mains as $meter_main)
                                                        @php
                                                            $count++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $count }}</td>
                                                            <td>{{ $meter_main->account_id }}</td>
                                                            <td><a
                                                                    href="/hescoms/hescom_view_detail/{{ $meter_main->id }}"><button
                                                                        type="button"
                                                                        class="btn btn-secondary">View</button></a></td>
                                                            <td><input type="checkbox" name="meter_main_id[]"
                                                                    value="{{ $meter_main->id }}"></td>
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



                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-success w-sm">Approve</button>
                </div>
                </form>
            </div>

            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->




{{-- @include("inc_admin.footer") --}}

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(!empty(session()->get('failed'))) { ?>
<script type="text/javascript">
    Swal.fire({
        icon: 'warning',
        title: '{{ session()->get('failed') }}',
        showConfirmButton: false,
        timer: 5000
    })
</script>
<?php } session()->forget('failed'); ?>


<?php if(!empty(session()->get('success'))) { ?>
<script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: '{{ session()->get('success') }}',
        showConfirmButton: false,
        timer: 5000,

    })
</script>
<?php } session()->forget('success'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.selectall').click(function() {
        if ($(this).is(':checked')) {
            $('div input').attr('checked', true);
        } else {
            $('div input').attr('checked', false);
        }
    });
</script>
