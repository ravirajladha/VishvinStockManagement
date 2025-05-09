<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Contractor;

use App\Models\Meter_main;

use App\Models\Error_record;
// use Session;
use Illuminate\Http\Request;
use App\Models\Consumer_detail;
use App\Models\Zone_code;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class HescomController extends Controller
{

    public function add_hescom_executive()
    {
        // $so_pincode = Consumer_detail::select('so_pincode')->distinct()->get();
        // $sd_pincode = Consumer_detail::select('sd_pincode')->distinct()->get();
        $so_pincode = Zone_code::select('so_code')->distinct()->get();
        $sd_pincode = Zone_code::select('sd_code')->distinct()->get();

        $so_pincode_for_belagavi = Zone_code::select('so_code')->distinct()->where('package', 'BVU')->get();
        $sd_pincode_for_belagavi = Zone_code::select('sd_code')->distinct()->where('package', 'BVU')->get();



        $data = [
            'so_pincode' => $so_pincode,
            'sd_pincode' => $sd_pincode,

            'so_pincode_for_belagavi' => $so_pincode_for_belagavi,
            'sd_pincode_for_belagavi' => $sd_pincode_for_belagavi,
        ];
        return view('hescoms.add_hescom_executive', ['data' => $data]);
    }
    public function login()
    {
        return view('hescoms.login');
    }
    public function hescom_view()
    {

        if (Session('rexkod_vishvin_auth_user_type') == "ae") {

            $meter_mains = DB::table('meter_mains')
                ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
                ->join('admins', 'consumer_details.so_pincode', '=', 'admins.so_pincode')
                ->select('meter_mains.*')
                ->where('admins.id', session('rexkod_vishvin_auth_userid'))
                ->where('qc_status', '=', '1')
                ->where('so_status', '=', '0')
                ->orderBy('id', 'DESC')
                ->get();


            // $meter_mains = Meter_main::where('qc_status', '1')->where('so_status', '0')->orderBy('id')->get();

            //         $meter_mains = DB::table('meter_mains')
            //             ->join('consumer_details', 'consumer_details.account_id', '=', 'meter_mains.account_id')
            //             ->join('admins', 'admins.id', '=',  session('rexkod_vishvin_auth_userid'))
            //             ->where('admins.so_pincode', '=', 'consumer_details.so_pincode')
            // ->get();



            // ->where('qc_status','=','1')
            // ->where('so_status','=','0')
            // ->orderBy('id','DESC')
            // ->get();
        } elseif (Session('rexkod_vishvin_auth_user_type') == "aee") {

            $meter_mains = DB::table('meter_mains')
                ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
                ->join('admins', 'consumer_details.sd_pincode', '=', 'admins.sd_pincode')
                ->select('meter_mains.*')

                ->where('admins.id', session('rexkod_vishvin_auth_userid'))
                ->where('qc_status', '=', '1')
                ->where('so_status', '=', '1')
                ->where('aee_status', '=', '0')
                ->orderBy('id', 'DESC')
                ->get();
        } elseif (Session('rexkod_vishvin_auth_user_type') == "aao") {
            $meter_mains = DB::table('meter_mains')
                ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
                ->join('admins', 'consumer_details.sd_pincode', '=', 'admins.sd_pincode')
                ->select('meter_mains.*')
                ->where('admins.id', session('rexkod_vishvin_auth_userid'))
                ->where('qc_status', 1)->where('so_status', 1)->where('aee_status', 1)->where('aao_status', 0)->orderBy('id')->get();
        } else {
            abort(500, 'Something went wrong');
        }
        // dd($meter_mains);
        return view('hescoms.hescom_view', ['meter_mains' => $meter_mains]);
    }
    public function approved_meter_reports(Request $req)
    {

        if (Session('rexkod_vishvin_auth_user_type') == "ae") {
            if ($req->format === 'weekly') {

                $dateSevenDaysAgo = Carbon::now()->subDays(7);

                $start_date = $dateSevenDaysAgo->format('Y-m-d');
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('so_status', '=', '1')
                    ->where('so_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->whereDate('so_updated_at', '>=', $start_date)
                    // ->whereDate('so_updated_at', '<=', $end_date)
                    ->orderBy('id', 'DESC')
                    ->get();

            } else if ($req->format === 'monthly') {

                $dateSevenDaysAgo = Carbon::now()->subDays(30);

                $start_date = $dateSevenDaysAgo->format('Y-m-d');
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('so_status', '=', '1')
                    ->where('so_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->whereDate('so_updated_at', '>=', $start_date)
                    // ->whereDate('so_updated_at', '<=', $end_date)
                    ->orderBy('id', 'DESC')
                    ->get();

            }else{
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');


                $end_date = $req->get('end_date');
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('so_status', '=', '1')
                    ->where('so_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->whereDate('so_updated_at', '>=', $start_date)
                    ->whereDate('so_updated_at', '<=', $end_date)
                    ->orderBy('id', 'DESC')
                    ->get();
            } else {
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('so_status', '=', '1')
                    ->where('so_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->orderBy('id', 'DESC')
                    ->get();
            }
            }
        } elseif (Session('rexkod_vishvin_auth_user_type') == "aee") {
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('aee_status', '=', '1')
                    ->where('aee_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->whereDate('aee_updated_at', '>=', $start_date)
                    ->whereDate('aee_updated_at', '<=', $end_date)
                    ->orderBy('id', 'DESC')
                    ->get();
            } else {
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('aee_status', '=', '1')
                    ->where('aee_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->orderBy('id', 'DESC')
                    ->get();
            }
        } elseif (Session('rexkod_vishvin_auth_user_type') == "aao") {
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');

                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('aao_status', '=', '1')
                    ->where('aao_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->whereDate('aao_updated_at', '>=', $start_date)
                    ->whereDate('aao_updated_at', '<=', $end_date)
                    ->orderBy('id', 'DESC')
                    ->get();
            } else {
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('aao_status', '=', '1')
                    ->where('aao_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->orderBy('id', 'DESC')
                    ->get();
            }
        } else {
            abort(500, 'Something went wrong');
        }
        // dd($meter_mains);
        return view('hescoms.approved_meter_reports', ['meter_mains' => $meter_mains]);
    }
    public function rejected_meter_reports(Request $req)
    {

        if (Session('rexkod_vishvin_auth_user_type') == "ae") {
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');


                $end_date = $req->get('end_date');
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('so_status', '=', '2')
                    ->where('so_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->whereDate('so_updated_at', '>=', $start_date)
                    ->whereDate('so_updated_at', '<=', $end_date)
                    ->orderBy('id', 'DESC')
                    ->get();
            } else {
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('so_status', '=', '2')
                    ->where('so_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->orderBy('id', 'DESC')
                    ->get();
            }
        } elseif (Session('rexkod_vishvin_auth_user_type') == "aee") {
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('aee_status', '=', '2')
                    ->where('aee_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->whereDate('aee_updated_at', '>=', $start_date)
                    ->whereDate('aee_updated_at', '<=', $end_date)
                    ->orderBy('id', 'DESC')
                    ->get();
            } else {
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('aee_status', '=', '2')
                    ->where('aee_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->orderBy('id', 'DESC')
                    ->get();
            }
        } elseif (Session('rexkod_vishvin_auth_user_type') == "aao") {
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');

                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('aao_status', '=', '2')
                    ->where('aao_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->whereDate('aao_updated_at', '>=', $start_date)
                    ->whereDate('aao_updated_at', '<=', $end_date)
                    ->orderBy('id', 'DESC')
                    ->get();
            } else {
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('aao_status', '=', '2')
                    ->where('aao_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->orderBy('id', 'DESC')
                    ->get();
            }
        } else {
            abort(500, 'Something went wrong');
        }
        // dd($meter_mains);
        return view('hescoms.rejected_meter_reports', ['meter_mains' => $meter_mains]);
    }


    public function hescom_view_detail($id)
    {
        $meter_main = Meter_main::where('id', $id)->first();

        $consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();

        $data = [
            'meter_main' => $meter_main,
            'consumer_detail' => $consumer_detail,
            'id' => $id,
        ];
        return view('hescoms.hescom_view_detail', ['data' => $data]);
    }

    function bulk_approve_hescoms_report(Request $req)
    {

        if ($req->input('meter_main_id') != null) {
            $meter_main_arr = implode(',', $req->input('meter_main_id'));
            $meter_main_id = explode(',', $meter_main_arr);

            for ($i = 0; $i < count($meter_main_id); $i++) {
                $meter_main = Meter_main::find($meter_main_id[$i]);


                if (session()->get('rexkod_vishvin_auth_user_type') == "ae") {

                    $meter_main->so_status = 1;
                    $meter_main->so_updated_by = session()->get('rexkod_vishvin_auth_userid');
                    $meter_main->so_updated_at = now();
                    $meter_main->save();
                } elseif (session()->get('rexkod_vishvin_auth_user_type') == "aee") {

                    $meter_main->aee_status = 1;
                    $meter_main->aee_updated_by = session()->get('rexkod_vishvin_auth_userid');
                    $meter_main->aee_updated_at = now();
                    $meter_main->save();
                } elseif (session()->get('rexkod_vishvin_auth_user_type') == "aao") {



                    $meter_main->aao_status = 1;
                    $meter_main->aao_updated_by = session()->get('rexkod_vishvin_auth_userid');
                    $meter_main->aao_updated_at = now();
                } else {
                    session()->put('failed', 'Please check any QC report to approve.');
                    return redirect()->back();
                }
                $meter_main->save();
            }
            session()->put('success', 'Congrats! The meter status has been approved for: ' . $meter_main_arr);
            // return redirect('/qcs/qc_view_detail/' . $id);
            return redirect('/hescoms/hescom_view');
        } else {
            session()->put('failed', 'Please check any QC report to approve.');
            return redirect()->back();
        }
    }


    public function index()
    {
        return view('hescoms.index');
    }
    public function all_hescom_executives()
    {
        // ->where('type', 'inventory_reporter')
        return view('hescoms.all_hescom_executives', [
            'show_users' => Admin::where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get(),
        ]);
    }
    public function all_consumers()
    {

        return view('hescoms.all_consumers', [
            'show_users' => Consumer_detail::get(),
        ]);
    }
    function authenticate(Request $req)
    {

        $user = Admin::where('user_name', $req->phone)->first();
        // return($req->all());
        if ($user && Hash::check($req->password, $user->password) && $user->type == "hescom_manager") {
            Session::put('rexkod_hescom_manager_name', $user->name);
            Session::put('rexkod_vishvin_auth_userid', $user->id);
            Session::put('rexkod_hescom_manager_user_name', $user->user_name);
            Session::put('rexkod_vishvin_auth_user_type', $user->type);
            return redirect('hescoms/index');
        } elseif ($user && Hash::check($req->password, $user->password) && $user->type == "aee") {
            Session::put('rexkod_hescom_manager_name', $user->name);
            Session::put('rexkod_vishvin_auth_userid', $user->id);
            Session::put('rexkod_hescom_manager_user_name', $user->user_name);
            Session::put('rexkod_vishvin_auth_user_type', $user->type);
            return redirect('hescoms/index');
        } elseif ($user && Hash::check($req->password, $user->password) && $user->type == "aao") {
            Session::put('rexkod_hescom_manager_name', $user->name);
            Session::put('rexkod_vishvin_auth_userid', $user->id);
            Session::put('rexkod_hescom_manager_user_name', $user->user_name);
            Session::put('rexkod_vishvin_auth_user_type', $user->type);
            return redirect('hescoms/index');
        } elseif ($user && Hash::check($req->password, $user->password) && $user->type == "ae") {
            Session::put('rexkod_hescom_manager_name', $user->name);
            Session::put('rexkod_vishvin_auth_userid', $user->id);
            Session::put('rexkod_hescom_manager_user_name', $user->user_name);
            Session::put('rexkod_vishvin_auth_user_type', $user->type);
            return redirect('hescoms/index');
        } else {
            session()->put('failed', 'Invalid Credentials');
            return redirect('/hescoms');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/hescoms')->with('message', 'You have been logged out!');
    }
    function create_hescom_executive(Request $req)
    {

        $auth = new Admin;
        $result = Admin::where('phone', $req->phone)->first();

        if ($result) {
            session()->put('failed', 'Phone already exists');
            return redirect('/hescoms/add_hescom_executive');
        } else {

            $auth->name = $req->name;

            $auth->phone = $req->phone;
            // $auth->user_name = $req->user_name;

            $auth->type = $req->type;
            if ($auth->type == 'ae') {
                if ($req->so_pincode) {
                    $auth->so_pincode = $req->so_pincode;
                } else {
                    session()->put('failed', 'Please select the SO Pincode, if the post is AE');
                    return redirect('/hescoms/add_hescom_executive');
                }
            }


            if ($auth->type == 'aee') {
                if ($req->sd_pincode) {
                    $auth->sd_pincode = $req->sd_pincode;
                } else {
                    session()->put('failed', 'Please select the SD Pincode, if the post is AEE');
                    return redirect('/hescoms/add_hescom_executive');
                }
            }
            if ($auth->type == 'aao') {
                if ($req->sd_pincode) {
                    $auth->sd_pincode = $req->sd_pincode;
                } else {
                    session()->put('failed', 'Please select the SD Pincode, if the post is AAO');
                    return redirect('/hescoms/add_hescom_executive');
                }
            }
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
            session()->put('success', 'Executive added successfully');

            // $user = Admin::where('user_name', $req->user_email)->first();

            // $req->session()->put('user',$user);

            return redirect('/hescoms/all_hescom_executives');
        }
    }
    public function approve_so_reports_status(Request $req, $id)
    {
        // first case: its present in consumer_detail

        $meter_main = Meter_main::find($id);
        // $meter_main->so_remark = $req->so_remark;
        $meter_main->so_status = 1;
        $meter_main->so_updated_by = session()->get('rexkod_vishvin_auth_userid');
        $meter_main->so_updated_at = now();
        $meter_main->save();

        session()->put('success', 'Congrats! The meter status has been approved');
        return redirect('/hescoms/hescom_view');
    }
    public function reject_so_reports_status(Request $req, $id)
    {
        // first case: its present in consumer_detail
        // dd('sto23232323p');

        $meter_main = Meter_main::find($id);
        $meter_main->so_remark = $req->remark;
        $meter_main->so_status = 2;
        $meter_main->so_updated_by = session()->get('rexkod_vishvin_auth_userid');
        $meter_main->so_updated_at = now();
        $meter_main->save();

        session()->put('success', 'Congrats! The meter status has been approved');
        return redirect('/hescoms/hescom_view');
    }
    public function approve_aee_reports_status(Request $req, $id)
    {
        // first case: its present in consumer_detail

        $meter_main = Meter_main::find($id);
        // $meter_main->aee_remark = $req->aee_remark;
        $meter_main->aee_status = 1;
        $meter_main->aee_updated_by = session()->get('rexkod_vishvin_auth_userid');
        $meter_main->aee_updated_at = now();
        $meter_main->save();

        session()->put('success', 'Congrats! The meter status has been approved');
        return redirect('/hescoms/hescom_view');
    }
    public function reject_aee_reports_status(Request $req, $id)
    {
        // first case: its present in consumer_detail

        $meter_main = Meter_main::find($id);
        $meter_main->aee_remark = $req->remark;
        $meter_main->aee_status = 2;
        $meter_main->aee_updated_by = session()->get('rexkod_vishvin_auth_userid');
        $meter_main->aee_updated_at = now();
        $meter_main->save();

        session()->put('success', 'Congrats! The meter status has been approved');
        return redirect('/hescoms/hescom_view');
    }
    public function approve_aao_reports_status(Request $req, $id)
    {
        // first case: its present in consumer_detail

        $meter_main = Meter_main::find($id);
        // $meter_main->aao_remark = $req->aao_remark;
        $meter_main->aao_status = 1;
        $meter_main->aao_updated_by = session()->get('rexkod_vishvin_auth_userid');
        $meter_main->aao_updated_at = now();
        $meter_main->save();

        session()->put('success', 'Congrats! The meter status has been approved');
        return redirect('/hescoms/hescom_view');
    }
    public function reject_aao_reports_status(Request $req, $id)
    {



        // first case: its present in consumer_detail

        $meter_main = Meter_main::find($id);
        $meter_main->aao_remark = $req->remark;
        $meter_main->aao_status = 2;
        $meter_main->aao_updated_by = session()->get('rexkod_vishvin_auth_userid');
        $meter_main->aao_updated_at = now();
        $meter_main->save();

        session()->put('success', 'Congrats! The meter status has been approved');
        return redirect('/hescoms/hescom_view');
    }




    // public function update_aee_reports_status(Request $req, $id)
    // {
    //     $meter_main = Meter_main::find($id);
    //     $meter_main->aee_remark = $req->aee_remark;
    //     $meter_main->aee_status = $req->submit_button;
    //     $meter_main->aee_updated_by = session()->get('rexkod_vishvin_auth_userid');
    //     $meter_main->aee_updated_at = now();
    //     $meter_main->save();
    //     session()->put('success', 'Congrats! The meter status has been submitted successfully');
    //     return redirect('/hescoms/hescom_view');
    // }

    // public function update_aao_reports_status(Request $req, $id)
    // {
    //     $meter_main = Meter_main::find($id);
    //     $meter_main->aao_remark = $req->aao_remark;
    //     $meter_main->aao_status = $req->submit_button;
    //     $meter_main->aao_updated_by = session()->get('rexkod_vishvin_auth_userid');
    //     $meter_main->aao_updated_at = now();
    //     $meter_main->save();

    //     session()->put('success', 'Congrats! The meter status has been submitted successfully');
    //     return redirect('/hescoms/hescom_view');
    // }

    public function error_reports()
    {
        # code...

        $error_records =Error_record::where('updated_by_aao',0)->get();
        $data =[
            'error_records' => $error_records,
        ];

        return view('/hescoms/error_reports',compact('data'));
    }
    public function edit_error_reports($account_id)
    {
        $meter_main = Meter_main::where('account_id', $account_id)->first();

        $consumer_detail = Consumer_detail::where('account_id', $account_id)->first();

        $data = [
            'meter_main' => $meter_main,
            'consumer_detail' => $consumer_detail,
            'account_id' => $account_id,
        ];
        return view('/hescoms/edit_error_reports',compact('data'));
    }

    public function update_error_reports(Request $req, $id)
    {
        // return($req);
        // first case: its present in consumer_detail

        $meter_main = Meter_main::find($id);
        $meter_main->meter_make_old = $req->meter_make_old;
        $meter_main->serial_no_old = $req->serial_no_old;
        $meter_main->mfd_year_old = $req->mfd_year_old;
        $meter_main->final_reading = $req->final_reading;
        $meter_main->meter_make_new = $req->meter_make_new;
        $meter_main->serial_no_new = $req->serial_no_new;
        $meter_main->mfd_year_new = $req->mfd_year_new;
        $meter_main->initial_reading_kwh = $req->initial_reading_kwh;
        $meter_main->initial_reading_kvah = $req->initial_reading_kvah;
        if (!empty($req->file('image_1_old'))) {
            $extension1 = $req->file('image_1_old')->extension();
            if ($extension1 == "png" || $extension1 == "jpeg" || $extension1 == "jpg") {
                $filename = Str::random(4) . time() . '.' . $extension1;
                $meter_main->image_1_old = $req->file('image_1_old')->move(('uploads'), $filename);
            }
        } else {
            $meter_main->image_1_old = $meter_main->image_1_old;
        }

        if (!empty($req->file('image_2_old'))) {
            $extension1 = $req->file('image_2_old')->extension();
            if ($extension1 == "png" || $extension1 == "jpeg" || $extension1 == "jpg") {
                $filename = Str::random(4) . time() . '.' . $extension1;
                $meter_main->image_2_old = $req->file('image_2_old')->move(('uploads'), $filename);
            }
        } else {
            $meter_main->image_2_old = $meter_main->image_2_old;
        }
        if (!empty($req->file('image_3_old'))) {
            $extension1 = $req->file('image_3_old')->extension();
            if ($extension1 == "png" || $extension1 == "jpeg" || $extension1 == "jpg") {
                $filename = Str::random(4) . time() . '.' . $extension1;
                $meter_main->image_3_old = $req->file('image_3_old')->move(('uploads'), $filename);
            }
        } else {
            $meter_main->image_3_old = $meter_main->image_3_old;
        }
        if (!empty($req->file('image_1_new'))) {
            $extension1 = $req->file('image_1_new')->extension();
            if ($extension1 == "png" || $extension1 == "jpeg" || $extension1 == "jpg") {
                $filename = Str::random(4) . time() . '.' . $extension1;
                $meter_main->image_1_new = $req->file('image_1_new')->move(('uploads'), $filename);
            }
        } else {
            $meter_main->image_1_new = $meter_main->image_1_new;
        }

        if (!empty($req->file('image_2_new'))) {
            $extension1 = $req->file('image_2_new')->extension();
            if ($extension1 == "png" || $extension1 == "jpeg" || $extension1 == "jpg") {
                $filename = Str::random(4) . time() . '.' . $extension1;
                $meter_main->image_2_new = $req->file('image_2_new')->move(('uploads'), $filename);
            }
        } else {
            $meter_main->image_2_new = $meter_main->image_2_new;
        }

        $meter_main->error_updated_at= now();

        $meter_main->save();

        // session()->put('success', 'Congrats! The meter status has been submitted successfully');
        return redirect('/hescoms/error_reports');
    }

    public function update_error_status(Request $req)
    {
        # code...
        // dd($req->selected_account_id);
        foreach ($req->selected_account_id as $account_id) {
            # code...
            // dd($account_id);
            $meter_main = Meter_main::where('account_id',$account_id)->first();
            // dd($meter_main);
            $meter_main->error_updated_by_aao =1;
            $meter_main->save();
            $error_record = Error_record::where('account_id',$account_id)->first();
            $error_record->updated_by_aao = 1;
            $error_record->save();
        }
        return redirect('/hescoms/error_reports');
    }
}
