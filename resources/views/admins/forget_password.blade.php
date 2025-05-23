@include('inc_admin.header')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-g/AlEeQFeKnYTKratbK30Q2R14wW6ke5U6h5zNJ9k1+wMMxELdr/B5n6Yh1E4ns16+o4mLHecPlC+1O9Jehrg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                        <h4 class="mb-sm-0">Forget Password </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Forget Password </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            @if (session()->has('message'))
                <div class="alert alert-success" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                    role="alert">
                    {{ session('message') }}
                    Password Updation Form
                </div>
            @endif
            <form id="createproduct-form" autocomplete="off" class="needs-validation"
                action="{{ url('/') }}/update_user_password" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">User <span
                                            class="mandatory_star">*<sup><i>required</i></sup></span></label>
                                    <select class="form-control" name="user_id">
                                        @foreach ($data['user_id'] as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} /
                                                {{ $user->phone }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Password <span
                                            class="mandatory_star">*<sup><i>required</i></sup></span></label>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="password" class="form-control"
                                                id="password" name="password" value=""
                                                placeholder="Enter Password" required></div>
                                        <div class="col-md-6">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="show-password-button">
                                                <i class="bi bi-eye"></i>
                                                <span>Show Password</span>
                                            </button>
                                        </div>
                                    </div>


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





                                <!-- <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Division</label>
                                    <input type="email" class="form-control" id="product-title-input" name="email" value="" placeholder="Enter Division" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Sub Division</label>
                                    <input type="email" class="form-control" id="product-title-input" name="email" value="" placeholder="Enter Sub Division" required>
                                </div> -->

                                <!-- <div class="input-group mb-3">
                                    <label for="#">User&ensp;
                                        <input type="radio" name="type_of_user" value="artist" style="display:inline-block;">
                                        Fan&ensp;
                                        <input type="radio" name="type_of_user" value="fan" style="display:inline-block;">
                                        Vendor&ensp;
                                        <input type="radio" name="type_of_user" value="vendor" style="display:inline-block;">


                                    </label>
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
 const passwordInput = document.querySelector('#password');
const showPasswordButton = document.querySelector('#show-password-button');

showPasswordButton.addEventListener('click', () => {
  const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);

  const icon = showPasswordButton.querySelector('i');
  const label = showPasswordButton.querySelector('span');

  if (type === 'password') {
    icon.classList.remove('bi-eye-slash');
    icon.classList.add('bi-eye');
    label.textContent = 'Show Password';
  } else {
    icon.classList.remove('bi-eye');
    icon.classList.add('bi-eye-slash');
    label.textContent = 'Hide Password';
  }
});



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
