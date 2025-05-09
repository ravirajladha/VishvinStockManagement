@include("inc_pages.header")


<?php
// print_r($data['get_consumer_detail']);

$consumer_detail   = $data['get_consumer_detail'];
$meter_main_id = $data['id'];
$meter_main = $data['meter_main'];


?>
<!-- CSS -->
{{--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-YWNzIkpAATugcUIGC6p0L6UoCZmH+Y9XJ1zrQ2b05BldyUivn+U6FJn6EkGxstCZ" crossorigin="anonymous">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-hJPkMy86Rz8ozJwBgNpPcNTeFdYZvR8M5WZWhLzYJX9/3vzq3F/4h29mCtaIfFZZ" crossorigin="anonymous"></script> --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

{{-- this disabled the anchor tag, as in this page we cant allow the user to go back and forth while adding or replacing the meters --}}
<style>
  a.disabled {
  pointer-events: none;
  cursor: default;
  }
  .modal-dialog {



}

.modal-content {


background-color:#BBD6EC;

}

.modal-header {

background-color: #337AB7;

/* padding:16px 16px; */

color:#FFF;

border-bottom:2px dashed #337AB7;

}

</style>
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
          <h6 class="fw-bold m-0 ms-3">
            <center> Details of Electromechanical Meter</center>
          </h6>

        </div>
      </div>
    </nav>
    <div class="container col-sm-6" style="margin-top:20px;padding-left:50px;padding-right:50px;margin-bottom:50px;">
      <form action="/pages/update_old_meter_detail/{{$meter_main_id}}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="account_id" class="form-label">Account Id</label>
          <input type="text" class="form-control"  value="{{$consumer_detail->account_id}}" placeholder="Enter Account Id" readonly disabled>

        </div>
        <div class="mb-3">
          <label for="RR_Number" class="form-label">RR Number</label>
          <input type="text" class="form-control" id="RR_Number" value="{{$consumer_detail->rr_no}}" placeholder="Enter RR Number" readonly disabled>
        </div>
        <div class="mb-3">
          <label for="consumer_name" class="form-label">Name of the Consumer</label>
          <input type="text" class="form-control"  placeholder="Enter Consumer Name" value="{{$consumer_detail->consumer_name}}" readonly disabled>
        </div>
        <div class="mb-3">
          <label for="consumer_name" class="form-label">Consumer Address</label>
          {{-- <input type="text" class="form-control"   value="{{$consumer_detail->consumer_address}}" placeholder="Enter Consumer Address" readonly disabled> --}}
          <textarea class="form-control" rows="3" placeholder="Enter Consumer Address" readonly disabled>{{$consumer_detail->consumer_address}}</textarea>
        </div>
        <div class="mb-3">
          <label for="section" class="form-label">Section</label>
          <input type="text" class="form-control"  placeholder="Enter Section" value="{{$consumer_detail->so_pincode}}" readonly disabled>
        </div>
        <div class="mb-3">
          <label for="sub_section" class="form-label">Subdivision</label>
          <input type="text" class="form-control"  placeholder="Enter Subdivision" value="{{$consumer_detail->sd_pincode}}" readonly disabled>
        </div>


        <div class="mb-3 row">

          <div class="dropdown col-6">
            {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> --}}
            <button class="btn btn-secondary " type="button"  data-bs-toggle="dropdown" aria-expanded="false">
              @if($consumer_detail->meter_type==1)
            Single Phase
          @else
          Three Phase
          @endif


            </button>
            {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
             <li><a class="dropdown-item" href="#">Single Phase</a></li>
              <li><a class="dropdown-item" href="#">Three Phase</a></li>
            </ul> --}}
          </div>
          <div class="dropdown col-6">
            <button class="btn btn-secondary" disabled data-bs-toggle="dropdown" aria-expanded="false">
            Electromechanical
            </button>

          </div>

        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Photo 1 with readings on display <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
          @if(!empty($meter_main->image_1_old))
          <img src="{{asset($meter_main->image_1_old)}}" alt="photo1" style="height:47px;width:100%;">
          @endif
          @if(empty($meter_main->image_1_old))
          <input type="file" class="form-control" name="image_1_old"  accept="image/*"  @if(empty($meter_main->image_1_old)) required @endif>
          @endif
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Photo 2 with readings on display <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
          @if(!empty($meter_main->image_2_old))
          <img src="{{asset($meter_main->image_2_old)}}" alt="photo2" style="height:47px;width:100%;">
          @endif
          @if(empty($meter_main->image_2_old))
          <input type="file" class="form-control" name="image_2_old" accept="image/*" @if(empty($meter_main->image_2_old)) required @endif>
          @endif
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Photo 3 with readings on display (optional)</label>
          @if(!empty($meter_main->image_3_old))
          <img src="{{asset($meter_main->image_3_old)}}" alt="photo2" style="height:47px;width:100%;">
          @endif
          @if(empty($meter_main->image_3_old))
          <input type="file" class="form-control" name="image_3_old"  accept="image/*" @if(empty($meter_main->image_3_old))  @endif>
        @endif
        </div>


        <div class="mb-3">
          <label for="meter_make" class="form-label">Meter Make <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
          <input type="text" class="form-control" name="meter_make_old" value="<?php if(!empty($meter_main->meter_make_old)){echo ($meter_main->meter_make_old); }?>" placeholder="Enter Meter Make" aria-describedby="textHelp" required>
        </div>

        <div class="mb-3">
          <label for="serial_no" class="form-label">Meter Serial No <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
          <input type="number" class="form-control" name="serial_no_old" value="<?php if(!empty($meter_main->serial_no_old)){echo ($meter_main->serial_no_old); }?>" placeholder="Enter Serial Number" aria-describedby="textHelp" required>
        </div>

        <div class="mb-3">
          <label for="mfd_year" class="form-label">Year Of Manufacture <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
          <input type="number" class="form-control" name="mfd_year_old" value="<?php if(!empty($meter_main->mfd_year_old)){echo ($meter_main->mfd_year_old); }?>" placeholder="Enter Manufacture Year" aria-describedby="textHelp" required>
        </div>
        <div class="mb-3">
          <label for="final_reading" class="form-label">Final Reading (FR)-kWh <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
          <input type="number" class="form-control" name="final_reading" value="<?php if(!empty($meter_main->final_reading)){echo ($meter_main->final_reading); }?>" placeholder="Enter Final Reading" aria-describedby="textHelp" required>
        </div>


<!-- LOCATION AND DATE SHOULD BE AUTO FETCHED -->

        <button type="submit" class="btn btn-primary">Next</button>
        <button type="button" class="btn btn-warning"  style="float:right;" data-toggle="modal" data-target="#exampleModalCenter">
          Cancel
        </button>
      </form>
    </div>
  </div>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="height:300px;">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle">Are you sure you want to cancel ?<br><br>
            </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%;">No</button>
         <a href="/pages/add_meter_first_step" class=""> <button type="button" class="btn btn-primary" style="width:100%;background-color:chocolate;">Yes</button></a>
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





  @include("inc_pages.footer")

