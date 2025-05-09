@include('inc_admin.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Zone_code;
?>

<style>
    #password-strength-status {
        padding: 5px 10px;
        color: #FFFFFF;
        border-radius: 4px;
        margin-top: 5px;
    }

    .medium-password {
        background-color: #b7d60a;
        border: #BBB418 1px solid;
    }

    .weak-password {
        background-color: #ce1d14;
        border: #AA4502 1px solid;
    }

    .strong-password {
        background-color: #12CC1A;
        border: #0FA015 1px solid;
    }
</style>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">

                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add HESCOM Officers</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Inventory</a>
                                </li>
                                <li class="breadcrumb-item active">Add HESCOM Officers</li>
                            </ol>
                        </div>

                    </div>
                    <!-- <div class="mx-5 mt-2 page-title-box" style="display: flex;justify-content:space-between">
                        <h4>Project Name : project name</h4>
                        <h4>Project Lead : project lead</h4>
                        <h4>Module Name : module name</h4>
                    </div> -->

                </div>


            </div>
            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation" action="create_hescom_executive"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="mb-3 mt-5">
                                    <label class="form-label" for="product-title-input">Hescom Executive Name <span
                                            class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <input type="text" class="form-control" id="product-title-input" name="name"
                                        value="" placeholder="Enter Hescom Executive Name" required>
                                </div>

                                <!-- <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Project Name</label>
                                    <input type="number" class="form-control" id="product-title-input" name="phno" value="" placeholder="Enter Project Name" required>
                                </div> -->
                                {{-- <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Username</label>
                                    <input type="text" class="form-control" id="product-title-input" name="user_name" value="" placeholder="Enter Username"   required>
                                </div> --}}
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Mobile Number <span
                                            class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <input type="number" class="form-control" name="phone" id="phone"
                                        value="{{ old('phone') }}" placeholder="Enter Mobile Number"
                                        onkeyup="checkphn(this.value);" oninput="numberOnly(this.id);" maxlength="10"
                                        required>

                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Password <span
                                            class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="{{ old('password') }}" placeholder="Enter Password" required>
                                    <div class="password-strength">
                                        <p>Minimum Requirements:</p>
                                        <ul>
                                            <li>At least 8 characters long</li>
                                            <li>Must include 2 uppercase letters</li>
                                            <li>Must include 2 lowercase letters</li>
                                            <li>Must include 2 numbers</li>
                                            <li>Must include alphanumeric characters (letters and numbers)</li>
                                        </ul>
                                    </div>
                                    <div id="password-strength-status"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Select Posts <span
                                            class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <select class="form-control" name="type" id="posts" required>
                                        <option value="" disabled="disabled" selected="selected">Please Select
                                        </option>
                                        <option value="ae">AE</option>
                                        <option value="aee">AEE</option>
                                        <option value="aao">AAO</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="so_pincode">
                                    <label class="form-label" for="product-title-input">SELECT SECTION OFFICE PINCODE
                                        <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <select class="form-control" name="so_pincode">
                                        <option value="" readonly disabled>Select Type</option>
                                        @foreach ($data['so_pincode_for_belagavi'] as $single_so_pincode)
                                            <option value="{{ $single_so_pincode->so_code }}">
                                                {{ $single_so_pincode->so_code }}


                                                <?php
                                                $so_pincode_name = Zone_code::where('so_code', $single_so_pincode->so_code)->first();
                                                ?>
                                                @if ($so_pincode_name)
                                                    {{ $so_pincode_name->section_office }}
                                                @endif


                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3" id="sd_pincode">
                                    <label class="form-label" for="product-title-input">SELECT SECTION SUB-DIVISION
                                        PINCODE <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <select class="form-control" name="sd_pincode">
                                        <option value="" readonly disabled>Select Type</option>
                                        @foreach ($data['sd_pincode_for_belagavi'] as $single_sd_pincode)
                                            <option value="{{ $single_sd_pincode->sd_code }}">
                                                {{ $single_sd_pincode->sd_code }}

                                                <?php
                                                $sd_pincode_name = Zone_code::where('sd_code', $single_sd_pincode->sd_code)->first();
                                                ?> @if ($sd_pincode_name)
                                                    ({{ $sd_pincode_name->sub_division }})
                                                @endif
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <!-- <div class="mb-3">
                                    <select class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="">Inventory</option>
                                        <option value="">Annexure</option>

                                    </select>



                                </div> -->





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




{{-- @include("inc_admin.footer") --}}
<script>
    // $(document).ready(function() {
    //     $('#posts').on('change.so_pincode', function() {
    //         $("#so_pincode").toggle($(this).val() == 'ae');
    //     }).trigger('change.so_pincode');
    //     $('#posts').on('change.sd_pincode', function() {
    //         $("#sd_pincode").toggle($(this).val() == 'aee');
    //     }).trigger('change.sd_pincode');
    //     $('#posts').on('change.sd_pincode', function() {
    //         $("#sd_pincode").toggle($(this).val() == 'aao');
    //     }).trigger('change.sd_pincode');
    // });


    $(document).ready(function() {
    $('#posts').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue == 'ae' ) {
            $("#so_pincode").show();
            $("#sd_pincode").hide();
        } else if (selectedValue == 'aao' || selectedValue == 'aee') {
            $("#so_pincode").hide();
            $("#sd_pincode").show();
        } else {
            $("#so_pincode").hide();
            $("#sd_pincode").hide();
        }
    }).trigger('change');
});




</script>

{{-- @include("inc_admin.footer") --}}
<script>
    $(document).ready(function() {
        $("#password").on('keyup', function() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if ($('#password').val().length < 8) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("Weak (should be atleast 8 characters.)");
            } else {
                if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $(
                        '#password').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("Strong");
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html(
                        "Medium (should include alphabets, numbers and special characters or some combination.)"
                    );
                }
            }
        });
    });

    function numberOnly(id) {
        let input = document.getElementById(id);
        let value = input.value;
        if (value.length > input.maxLength) {
            input.value = value.substring(0, input.maxLength);
        }
    }
</script>

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
