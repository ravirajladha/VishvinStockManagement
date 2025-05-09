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
                        <h4 class="mb-sm-0">Released EM Mete</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                <li class="breadcrumb-item active">Add Inward ES Meters</li>  
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-header border-0 rounded">
                    <div class="justify-content-between" style="display: flex;">
                        <!--end col-->
                        <a href="
/inventory_managers/view_inward_genus" class="btn btn-primary add-btn">From Manufacturer</a>
                        <a href="
/inventory_managers/view_inward_mrt_rejected" class="btn btn-primary add-btn"> Add Inward Meters Sl No. wise</a>
                        <a href="
/inventory_managers/view_inward_released_em_eter" class="btn btn-primary add-btn"> From MRT [Rejected ES Meters]</a>
                       


                    </div>
                </div>
            </div> --}}
            <!-- end page title -->

            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Box No</th>
      <th scope="col">From Serial No</th>
      <th scope="col">To Serial No</th>
  
      <th scope="col">Type of meter</th>
      <th scope="col">Created at</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datas as $data)
    <?php 
    $count = 0;
    $count++;
    ?>
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <th scope="row">{{$data->add_box_no}}</th>
      <th scope="row">{{$data->from_serial_no}}</th>
      <th scope="row">{{$data->to_serial_no}}</th>
      <th scope="row">{{$data->meter_type}}</th>
      <th scope="row">{{$data->created_at}}</th>
   
      
    </tr>
   @endforeach
  </tbody>
</table>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>

@include("inc_admin.footer")
