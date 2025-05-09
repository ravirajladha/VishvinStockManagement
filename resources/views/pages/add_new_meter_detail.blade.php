@include('inc_pages.header')
<?php
$consumer_detail = $data['get_consumer_detail'];
$meter_main_id = $data['id'];
$meter_main = $data['meter_main'];
?>

<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Contractor_inventory;
?>


<style>
    a.disabled {
        pointer-events: none;
        cursor: default;
    }

    .modal-content {


        background-color: #BBD6EC;

    }

    .modal-header {

        background-color: #337AB7;

        /* padding:16px 16px; */

        color: #FFF;

        border-bottom: 2px dashed #337AB7;

    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<body class="fixed-bottom-padding">
    <div>
        <!-- <div class="p-3 shadow-sm bg-white border-bottom">
            <div class="d-flex align-items-center">
               <h5 class="fw-bold m-0">Add Account</h5> -->
        <!-- <a class="toggle ms-auto" href="#"><i class="bi bi-list "></i></a> -->
        <!-- </div>
         </div> -->
        <nav class="navbar fixed-top navbar-light bg-light">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    {{-- <a class="fw-bold text-success text-decoration-none" href="/pages/home">
            <i class="bi bi-arrow-left back-page"></i></a> --}}
                    <h5 class="fw-bold m-0 ms-3">
                        <center>Details of Electrostatic Meter</center>
                    </h5>

                </div>
            </div>
        </nav>
        <div class="container col-sm-6"
            style="margin-top:80px;padding-left:50px;padding-right:50px;margin-bottom:50px;">
            <form action="/pages/update_new_meter_detail/{{ $meter_main_id }}" method="post" autocomplete="off"
                enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="image" class="form-label">Photo 1 with readings on display <span
                            class="mandatory_star">*</span></label>
                    <input type="file" class="form-control" name="image_1_new" accept="image/*" required>
                    {{-- @if (empty($meter_main->image_1_new)) required @endif --}}
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Photo 2 with readings on display (optional)</label>
                    <input type="file" class="form-control" name="image_2_new" accept="image/*">
                </div>



                {{-- <div class="mb-3">
          <label for="meter_make" class="form-label">Meter Make</label>
          <input type="text" class="form-control" name="meter_make_new" value=" --}}
                <?php
                // if(!empty($meter_main->meter_make_new)){echo ($meter_main->meter_make_new); }
                ?>
                {{-- " placeholder="Enter Manufacturer Name" aria-describedby="textHelp">
        </div> --}}


                <div class="mb-3">
                    <label for="serial_no" class="form-label">Meter Serial No</label>
                    <select class="form-control" name="serial_no_new" required id="serial_no_new_dropdown">
                        <?php
              if(empty($meter_main->serial_no_new)){
                $get_field_executive_contractor =  Admin::where('id',session('rexkod_pages_id'))->first();
                $contractor_inventories =  Contractor_inventory::where('contractor_id', $get_field_executive_contractor->created_by)->get();
                foreach ($contractor_inventories as $contractor_inventory) {
                    if($contractor_inventory->meter_type==$consumer_detail->meter_type)
{
                        $str = $contractor_inventory->unused_meter_serial_no;
                        if($str!== Null && $str !==''){
                  $nums = explode(",", $str);
                  foreach($nums as $num) { ?>
                        <option value="<?php echo $num; ?>"><?php echo $num; ?></option>
                        <?php }
                    }

                }
            }
              } else { ?>
                        <option value="<?php echo $meter_main->serial_no_new; ?>" selected><?php echo $meter_main->serial_no_new; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <script>
                    const serialNoDropdown = document.getElementById('serial_no_new_dropdown');
                    const options = serialNoDropdown.options;
                    const filterInput = document.createElement('input');
                    filterInput.type = 'text';
                    filterInput.placeholder = 'Search...';
                    serialNoDropdown.parentNode.insertBefore(filterInput, serialNoDropdown);

                    filterInput.addEventListener('input', () => {
                        const filterValue = filterInput.value.toUpperCase();
                        for (let i = 0; i < options.length; i++) {
                            const optionValue = options[i].value.toUpperCase();
                            const containsFilterValue = optionValue.includes(filterValue);
                            options[i].style.display = containsFilterValue ? 'block' : 'none';
                        }
                    });
                </script>







                <?php
                // if($meter_main->serial_no_new==$i){ echo "selected";}
                ?>



                <div class="mb-3">
                    <label for="mfd_year" class="form-label">Manufacturer (Given)</label>
                    <input type="text" class="form-control" value="GENUS POWER INFRASTRUCTURES LTD."
                        placeholder="GENUS OVERSEAS ELECTRONICS LTD" aria-describedby="textHelp" readonly>
                </div>
                <div class="mb-3">
                    <label for="mfd_year" class="form-label">Year Of Manufacture</label>
                    <input type="text" class="form-control" name="mfd_year_new" value="2023" placeholder="2023"
                        aria-describedby="textHelp" readonly>
                </div>
                <div class="mb-3">
                    <label for="final_reading" class="form-label">Initial Reading (IR)-kWh <span
                            class="mandatory_star">*</span></label>
                    <input type="number" class="form-control" name="initial_reading_kwh" value="<?php if (!empty($meter_main->initial_reading_kwh)) {
                        echo $meter_main->initial_reading_kwh;
                    } ?>"
                        placeholder="Enter Initial Reading" aria-describedby="textHelp" required>
                </div>
                <div class="mb-3">
                    <label for="final_reading" class="form-label">Initial Reading (IR)-kVAh <span
                            class="mandatory_star">*</span></label>
                    <input type="number" class="form-control" name="initial_reading_kvah" value="<?php if (!empty($meter_main->initial_reading_kvah)) {
                        echo $meter_main->initial_reading_kvah;
                    } ?>"
                        placeholder="Enter Initial Reading" aria-describedby="textHelp" required>
                </div>


                <!-- LOCATION AND DATE SHOULD BE AUTO FETCHED -->

                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                    Cancel
                </button>
            </form>
        </div>
    </div>
    {{-- <div class="osahan-menu-fotter fixed-bottom bg-dark text-center m-3 shadow rounded py-2">
        <div class="row m-0">
            <a href="/pages/home" class="text-white col small text-decoration-none p-2 disabled">
                <p class="h5 m-0"><i class="fa-sharp fa-solid fa-house" style="color:white;"></i></p>Home
            </a>
            <a href="/pages/add_meter_first_step" class="text-white col small text-decoration-none p-2 disabled">
                <p class="h5 m-0"><i class="fa-solid fa-plus"></i></p>
                Add Meter
            </a>
            <a href="/pages/records" class="text-white col small text-decoration-none p-2 disabled">
                <p class="h5 m-0"><i class="icofont-bag"></i></p>
                Rejected Meters
            </a>
            <a href="/pages/account" class="text-white col small text-decoration-none p-2 disabled">
                <p class="h5 m-0"><i class="icofont-user"></i></p>
                Account
            </a>
        </div>
    </div> --}}

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="height:300px;">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Are you sure you want to cancel ?<br><br>
                        The meter reading is already in progress, if you cancel now you wont be able to start again
                        until the current account number is re-allocated to field executive.</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="width:100%;">No</button>
                <a href="/pages/add_meter_first_step"> <button type="button" class="btn btn-primary"
                        style="width:100%;background-color:chocolate;">Yes</button></a>
                {{-- <center><div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
         <a href="/pages/add_meter_first_step"> <button type="button" class="btn btn-primary">Yes</button></a>
        </div></center> --}}
                {{-- <div class="modal-body" >
          The meter reading is already in progress, if you cancel now you wont be able to start again until the current account number is re-allocated to field executive.
            </div> --}}



            </div>
        </div>
    </div>

    @include('inc_pages.footer')
