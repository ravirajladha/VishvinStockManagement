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
                        <h4 class="mb-sm-0">Outward Released EM Meters</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                <li class="breadcrumb-item active">View Outward Released EM Meters</li>  
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-0 rounded">
                    <div class="justify-content-between" style="display: flex;">
                        <!--end col-->
                        <a href="
/inventory_managers/view_outward_mrt" class="btn btn-primary add-btn">Outward to MRT</a>
                        <a href="
/inventory_managers/view_outward_installation" class="btn btn-primary add-btn">Outward for Installation</a>
                        <a href="
/inventory_managers/view_outward_released_em_eter" class="btn btn-primary add-btn">Outward to Division Stores [Released EM Meter]</a>
                    </div>
                </div>
            </div>
             
            <!-- end page title -->

            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Division Store Name</th>
      <th scope="col">Vishvin DC No</th>
      <th scope="col">DC Date</th>
      <th scope="col">Sl No</th>
      <th scope="col">Meter type</th>

      <th scope="col">Created At</th>
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
      <td>{{$data->division_store_name}}</td>
      <td>{{$data->vishvin_dc_no}}</td>
      <td>{{$data->dc_date}}</td>
      <td>{{$data->sl_no}}</td>
      <td>{{$data->meter_type}}</td>
    
      <td>{{$data->created_at}}</td>
     
      
    

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
