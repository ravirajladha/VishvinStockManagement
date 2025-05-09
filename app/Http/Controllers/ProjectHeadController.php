<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Contractor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Consumer_detail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator;

use App\Models\Meter_main;
use App\Models\Error_record;
use Illuminate\Support\Facades\DB;



class ProjectHeadController extends Controller
{
    public function index()
    {
        return view('project_heads.index');
    }
    public function add_inventory_manager()
    {
        return view('project_heads.add_inventory_manager');
    }
    public function consumer_bulk_upload()
    {
        return view('project_heads.consumer_bulk_upload');
    }
    public function add_contractor()
    {
        return view('project_heads.add_contractor');
    }
    public function add_hescom()
    {
        return view('project_heads.add_hescom');
    }
    public function add_qc()
    {
        return view('project_heads.add_qc');
    }
    public function all_contractors()
    {

        // $data = Admin::where('type', 'contractor_manager')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get();
        // dd($data);
        return view('project_heads.all_contractors', [
            'show_users' => Admin::where('type', 'contractor_manager')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get(),
        ]);
    }
    public function all_hescoms()
    {
        return view('project_heads.all_hescoms', [
            'show_users' => Admin::where('type', 'hescom_manager')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get(),
        ]);
    }
    public function all_inventory_managers()
    {
        return view('project_heads.all_inventory_managers', [
            'show_users' => Admin::where('type', 'inventory_manager')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get(),
        ]);
    }
    public function all_qcs()
    {
        return view('project_heads.all_qcs', [
            'show_users' => Admin::where('type', 'qc_manager')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get(),
        ]);
    }
    public function all_users()
    {
        return view('project_heads.all_users');
    }
    public function login()
    {
        return view('project_heads.login');
    }

    public function authenticate(Request $request)
    {
        // print_r($request->all());

        // dd($request);

        $user = Admin::where('user_name', $request->user_name)->first();
        if ($user) {
            if ($user->type != 'project_head') {
                return back()->withErrors('name', 'name is required!');
                // return back()->with('success', 'Invalid Credentials');
                // return back()->with('error', 'Invalid Credentials');
                die();
            }
        } else {
            return back()->withErrors('success', 'name is required!');

            // return Redirect::back()->withErrors($validator);
            // return back()->with('error', 'Invalid Credentials');
            // return back()->withErrors('name' ,'name is required!');


            die();
        }
        $formFields = $request->validate([
            'user_name' => 'required',
            'password' => 'required',
            // 'type'=>'admin',
        ]);
        // if(auth()->type!="admin"){
        // return back()->with('success', 'Invalid Credentials');
        // }
        if (auth()->attempt($formFields)) {
            auth()->login($user);
            $request->session()->regenerate();


            Session::put('rexkod_project_head', $user);
            Session::put('rexkod_project_head_user_name', $user->name);
            Session::put('rexkod_vishvin_auth_userid', $user->id);
            Session::put('rexkod_project_head_user_type', $user->type);
            Session::put('rexkod_project_head_user_phone', $user->phone);

            $user = admin::where('user_name', '=', $request->user_name)->first();
            return redirect('/project_heads/index')->with('message', 'You are now logged in!');
        }
        return back()->withErrors('name', 'name is required!');

        // return back()->withErrors(['user_name' => 'Invalid Credentials'])->onlyInput('user_name');
        // return back()->with('error', 'Invalid Credentials');
    }

    function create_inventory_manager(Request $req)
    {
        // print_r($req->all());

        $auth = new Admin;


        $result = Admin::where('phone', $req->phone)->first();

        if ($result) {
            session()->put('failed', 'Phone already exists');

            return redirect('/project_heads/add_inventory_manager');
        } else {

            $auth->name = $req->name;

            $auth->phone = $req->phone;

            $auth->project_name = $req->project_name;

            $auth->type = "inventory_manager";
            $auth->password = Hash::make($req->password);

            if (strlen((string)$auth->phone) < 10) {
                session()->put('failed', 'Mobile nummber should be at least 10 digits');
                return redirect()->back();
            }


            $uppercase = preg_match('@[A-Z]@', $req->password);
            $lowercase = preg_match('@[a-z]@', $req->password);
            $number    = preg_match('@[0-9]@', $req->password);
            $specialChars = preg_match('@[^\w]@', $req->password);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($req->password) < 8) {

                session()->put('failed', 'Password should be atleast 8 characters & must include atleast one upper case letter, one number, and one special character');
                return redirect()->back();
            }

            $auth->created_by = session()->get('rexkod_vishvin_auth_userid');
            $auth->save();
            session()->put('success', 'Inventory Manager added successfully');


            return redirect('/project_heads/all_inventory_managers');
        }
    }
    function create_qc_manager(Request $req)
    {

        $auth = new Admin;


        $result = Admin::where('phone', $req->phone)->first();

        if ($result) {
            session()->put('failed', 'Phone already exists');

            return redirect('/project_heads/add_qc_manager');
        } else {

            $auth->name = $req->name;

            $auth->phone = $req->phone;

            $auth->project_name = $req->project_name;

            $auth->type = "qc_manager";
            $auth->password = Hash::make($req->password);

            if (strlen((string)$auth->phone) < 10) {
                session()->put('failed', 'Mobile nummber should be at least 10 digits');
                return redirect()->back();
            }


            $uppercase = preg_match('@[A-Z]@', $req->password);
            $lowercase = preg_match('@[a-z]@', $req->password);
            $number    = preg_match('@[0-9]@', $req->password);
            $specialChars = preg_match('@[^\w]@', $req->password);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($req->password) < 8) {

                session()->put('failed', 'Password should be atleast 8 characters & must include atleast one upper case letter, one number, and one special character');
                return redirect()->back();
            }

            $auth->created_by = session()->get('rexkod_vishvin_auth_userid');
            $auth->save();
            session()->put('success', 'QC Manager added successfully');


            return redirect('/project_heads/all_qcs');
        }
    }
    function create_hescom_manager(Request $req)
    {
        $auth = new Admin;


        $result = Admin::where('phone', $req->phone)->first();

        if ($result) {
            session()->put('failed', 'Phone already exists');

            return redirect('/project_heads/add_hescom');
        } else {

            $auth->name = $req->name;

            $auth->phone = $req->phone;

            $auth->project_name = $req->project_name;

            $auth->type = "hescom_manager";
            $auth->password = Hash::make($req->password);

            if (strlen((string)$auth->phone) < 10) {
                session()->put('failed', 'Mobile nummber should be at least 10 digits');
                return redirect()->back();
            }


            $uppercase = preg_match('@[A-Z]@', $req->password);
            $lowercase = preg_match('@[a-z]@', $req->password);
            $number    = preg_match('@[0-9]@', $req->password);
            $specialChars = preg_match('@[^\w]@', $req->password);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($req->password) < 8) {

                session()->put('failed', 'Password should be atleast 8 characters & must include atleast one upper case letter, one number, and one special character');
                return redirect()->back();
            }

            $auth->created_by = session()->get('rexkod_vishvin_auth_userid');
            $auth->save();
            session()->put('success', 'Hescom Manager added successfully');


            return redirect('/project_heads/all_hescoms');
        }
    }
    function create_contractor_manager(Request $req)
    {
        // print_r($req->all());
        $auth = new Admin;
        $contractor = new Contractor;


        $result = Admin::where('phone', $req->phone)->first();

        if ($result) {
            session()->put('failed', 'Phone already exists');

            return redirect('/project_heads/add_contractor');
        } else {

            $auth->name = $req->name;

            $auth->phone = $req->phone;
            // $auth->user_name = $req->user_name;
            $auth->type = "contractor_manager";
            $auth->password = Hash::make($req->password);


            if (strlen((string)$auth->phone) < 10) {
                session()->put('failed', 'Mobile number should be at least 10 digits');
                return redirect()->back();
            }


            $uppercase = preg_match('@[A-Z]@', $req->password);
            $lowercase = preg_match('@[a-z]@', $req->password);
            $number    = preg_match('@[0-9]@', $req->password);
            $specialChars = preg_match('@[^\w]@', $req->password);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($req->password) < 8) {

                session()->put('failed', 'Password should be atleast 8 characters & must include atleast one upper case letter, one number, and one special character');
                return redirect()->back();

                //  "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
                //     redirect('pages/add_user');
                // die;
            }

            $auth->created_by = session()->get('rexkod_vishvin_auth_userid');
            $auth->save();
            $auth->refresh();
            $new_contractor_added = Admin::where('phone', $req->phone)->first();
            // return ($new_contractor_added);

            $contractor->auth_id = $new_contractor_added->id;
            $contractor->contractor_name = $req->contractor_name;
            $contractor->firm_name = $req->firm_name;
            $contractor->house_no = $req->house_no;
            $contractor->building_name = $req->building_name;
            $contractor->road_name = $req->road_name;
            $contractor->cross_name = $req->cross_name;
            $contractor->area_name = $req->area_name;
            $contractor->city_name = $req->city_name;
            $contractor->pincode = $req->pincode;
            $contractor->contractor_cell_no = $req->contractor_cell_no;
            $contractor->contractor_email = $req->contractor_email;
            $contractor->pan = $req->pan;
            $contractor->gst = $req->gst;
            $contractor->bank_name = $req->bank_name;
            $contractor->bank_branch = $req->bank_branch;
            $contractor->account_no = $req->account_no;
            $contractor->ifsc_code = $req->ifsc_code;
            $contractor->account_type = $req->account_type;
            $contractor->pan_no = $req->pan_no;
            $contractor->gst_no = $req->gst_no;

            // if (!empty($req->file('pan'))) {
            //     $extension1 = $req->file('pan')->extension();
            //     if ($extension1 == "png" || $extension1 == "jpeg" || $extension1 == "jpg") {
            //         $filename = Str::random(4) . time() . '.' . $extension1;
            //         $contractor->pan = $req->file('pan')->move(('uploads'), $filename);
            //     }
            // }


            if (!empty($req->file('pan'))) {
                $file = $req->file('pan');
                $mime_type = $file->getClientMimeType();
                $extension = $file->getClientOriginalExtension();
                if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                    $filename = Str::random(4) . time() . '.' . $extension;
                    $contractor->pan = $file->move(('uploads'), $filename);
                } else {
                    session()->put('failed', 'Please add jpeg/png format images');
                    return redirect('/project_heads/add_contractor');
                }
            }
            if (!empty($req->file('gst'))) {
                $file = $req->file('gst');
                $mime_type = $file->getClientMimeType();
                $extension = $file->getClientOriginalExtension();
                if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                    $filename = Str::random(4) . time() . '.' . $extension;
                    $contractor->gst = $file->move(('uploads'), $filename);
                } else {
                    session()->put('failed', 'Please add jpeg/png format images');
                    return redirect('/project_heads/add_contractor');
                }
            }





            $contractor->save();

            session()->put('success', 'Contractor Manager added successfully');

            // $user = Admin::where('user_name', $req->user_email)->first();

            // $req->session()->put('user',$user);

            return redirect('/project_heads/all_contractors');
        }
    }


    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/project_heads')->with('message', 'You have been logged out!');
    }
    public function upload_file(Request $req)
    {
        set_time_limit(7200);

        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

        if (!empty($req->file('upload')) && $csvMimes) {


            if (is_uploaded_file($req->file('upload'))) {


                $csvFile = fopen($req->file('upload'), 'r');

                fgetcsv($csvFile);

                while (($line = fgetcsv($csvFile)) !== false) {
                    for ($i = 0; $i < 15; $i++) {
                        if (str_contains($line[$i], 'script')) {
                            session()->flush();
                            return redirect('login');
                        }
                    }

                    //commentted checking dupilcation account id

                    // $existingConsumer = Consumer_detail::where('account_id', $line[7])->first();
                    // if ($existingConsumer == null) {
                        $consumer = new Consumer_detail();
                        // $consumer->tariff = $line[1];

                        // $consumer->mrcode = $line[2];
                        // $consumer->account_id = $line[3];
                        // // dd($line[3]);
                        // $consumer->rr_no = $line[4];
                        // $consumer->consumer_name = $line[5];
                        // $consumer->consumer_address = $line[6];
                        // // $consumer->read_date = $line[7];
                        // $consumer->meter_type = $line[7];
                        // $consumer->longitude = $line[8];
                        // $consumer->latitude = $line[9];
                        // $consumer->hescom = $line[10];
                        // $consumer->zone = $line[11];
                        // $consumer->circle = $line[12];
                        // $consumer->division = $line[13];
                        // $consumer->sd_pincode = $line[14];
                        // $consumer->so_pincode = $line[15];
                        // $consumer->sub_division = $line[16];
                        // $consumer->section = $line[17];
                        // $consumer->read_date = $line[18];

                        $consumer->tariff = $line[1];
                        $consumer->division = $line[2];

                        $consumer->sd_pincode = $line[3];
                        $consumer->sub_division = $line[3];

                        $consumer->so_pincode = $line[4];
                        $consumer->section = $line[4];

                        $consumer->sp_id = $line[5];

                        $consumer->mrcode = $line[6];
                        $consumer->account_id = $line[7];
                        $consumer->rr_no = $line[8];
                        $consumer->consumer_name = $line[9];
                        $consumer->consumer_address = $line[10];
                        // $consumer->read_date = $line[11];
                        $meter_type =null;
                        if(Str::lower($line[12]) === 'single phase'){
                            $meter_type = 1;
                        }else if(Str::lower($line[12]) === 'three phase'){
                            $meter_type = 2;
                        }

                        $consumer->meter_type = $meter_type;

                        $consumer->longitude = $line[14];
                        $consumer->latitude = $line[15];


                        $consumer->save();
                    // } else {
                    //     continue;
                    // }
                }
                fclose($csvFile);
            }
        }
        session()->put('success', 'Bulk Upload Successfull');
        return redirect('/admins/index');
    }









    public function upload_file1(Request $req)
    {
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

        if (!empty($req->file('upload')) && $csvMimes) {

            if (is_uploaded_file($req->file('upload'))) {

                $csvFile = fopen($req->file('upload'), 'r');
                fgetcsv($csvFile);

                while (($line = fgetcsv($csvFile)) !== FALSE) {

                    $validator = Validator::make($line, [
                        'account_id' => 'required|unique:consumer_details,account_id',
                    ]);

                    if ($validator->fails()) {
                        // Account ID already exists, skip this row
                        continue;
                    }

                    for ($i = 0; $i < 22; $i++) {
                        if (str_contains($line[$i], 'script')) {
                            session()->flush();
                            return redirect('login');
                        }
                    }

                    // Create new consumer detail record
                    $consumer = new Consumer_detail;
                    $consumer->tariff = $line[1];
                    $consumer->mrcode = $line[2];
                    $consumer->account_id = $line[3];
                    $consumer->rr_no = $line[4];
                    $consumer->consumer_name = $line[5];
                    $consumer->consumer_address = $line[6];
                    $consumer->read_date = $line[7];
                    $consumer->meter_type = $line[8];
                    $consumer->longitude = $line[10];
                    $consumer->latitude = $line[11];
                    $consumer->hescom = $line[12];
                    $consumer->zone = $line[13];
                    $consumer->circle = $line[14];
                    $consumer->division = $line[15];
                    $consumer->sd_pincode = $line[16];
                    $consumer->so_pincode = $line[17];
                    $consumer->save();
                }
                fclose($csvFile);
            }
        }

        session()->put('success', 'Bulk Upload Successfull');
        return redirect('/admins/index');
    }


    public function add_bmr()
    {
        return view('project_heads.add_bmr');
    }

    function create_bmr(Request $req)
    {
        // print_r($req->all());

        $auth = new Admin;


        $result = Admin::where('phone', $req->phone)->first();

        if ($result) {
            session()->put('failed', 'Phone already exists');

            return redirect('/project_heads/add_bmr');
        } else {

            $auth->name = $req->name;

            $auth->phone = $req->phone;

            $auth->project_name = $req->project_name;

            $auth->type = "bmr";
            $auth->password = Hash::make($req->password);

            if (strlen((string)$auth->phone) < 10) {
                session()->put('failed', 'Mobile nummber should be at least 10 digits');
                return redirect()->back();
            }


            $uppercase = preg_match('@[A-Z]@', $req->password);
            $lowercase = preg_match('@[a-z]@', $req->password);
            $number    = preg_match('@[0-9]@', $req->password);
            $specialChars = preg_match('@[^\w]@', $req->password);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($req->password) < 8) {

                session()->put('failed', 'Password should be atleast 8 characters & must include atleast one upper case letter, one number, and one special character');
                return redirect()->back();
            }

            $auth->created_by = session()->get('rexkod_vishvin_auth_userid');
            $auth->save();
            session()->put('success', 'Inventory Manager added successfully');


            return redirect('/project_heads/all_bmr');
        }

    }

    public function all_bmr()
        {

            // $data = Admin::where('type', 'contractor_manager')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get();
            // dd($data);
            return view('project_heads.all_bmr', [
                'show_users' => Admin::where('type', 'bmr')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get(),
            ]);
        }

        public function reports(){
            $total_meter_replaced = count(Meter_main::get());
            $pending_in_qc = count(Meter_main::where('qc_status',0)->get());
            $pending_in_ae = count(Meter_main::where('qc_status',1)->where('so_status',0)->get());
            $pending_in_aee = count(Meter_main::where('qc_status',1)->where('so_status',1)->where('aee_status',0)->get());
            $pending_in_aao = count(Meter_main::where('qc_status',1)->where('so_status',1)->where('aee_status',1)->where('aao_status',0)->get());

            $get_total_successful_record_bmr = DB::table('successful_records')
            ->get();
$get_total_successful_record_count_bmr = count($get_total_successful_record_bmr);
            $error_records =count(Error_record::where('updated_by_aao',0)->get());

            // pending at bmr download
            $approved_meters = Meter_main::where(function ($query)  {
                $query->where('aao_status', 1)
                      ->where('download_flag',0);
            })
            ->orWhere(function ($query) {
                $query->where('error_updated_by_aao', 1);
                // ->where('download_flag',0);
            })
            ->get();
            $pending_in_bmr = count($approved_meters);
            $data = [
                'total_meter_replaced' => $total_meter_replaced,
                'pending_in_qc' => $pending_in_qc,
                'pending_in_ae' => $pending_in_ae,
                'pending_in_aee' => $pending_in_aee,
                'pending_in_aao' => $pending_in_aao,

                'error_records' => $error_records,
                'get_total_successful_record_count_bmr' => $get_total_successful_record_count_bmr,
                'pending_in_bmr' => $pending_in_bmr,

            ];

            return view('project_heads.reports', ['data' => $data]);
        }
}
