<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Contractor;
use App\Models\Meter_main;
// use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Consumer_detail;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class QcController extends Controller
{

    public function add_qc_executive()
    {
        return view('qcs.add_qc_executive');
    }
    public function login()
    {
        return view('qcs.login');
    }
    public function qc_view()
    {
        $meter_mains = Meter_main::where('qc_status', 0)->whereNotNull('serial_no_new')->orderBy('id')->get();
        return view('qcs.qc_view', ['meter_mains' => $meter_mains]);
    }
    public function qc_view_detail($id)
    {
        $meter_main = Meter_main::where('id', $id)->first();

        $consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();
        $data = [
            'meter_main' => $meter_main,
            'consumer_detail' => $consumer_detail,
            'id' => $id,
        ];
        return view('qcs.qc_view_detail', ['data' => $data]);
    }
    public function edit_qc_report($id)
    {
        $meter_main = Meter_main::where('id', $id)->first();
        $consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();
        $data = [
            'meter_main' => $meter_main,
            'consumer_detail' => $consumer_detail,
            'id' => $id,
        ];
        return view('qcs.edit_qc_report', ['data' => $data]);
    }
    public function edit_qc_detail($id)
    {
        $meter_main = Meter_main::where('id', $id)->first();

        $consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();

        $data = [
            'meter_main' => $meter_main,
            'consumer_detail' => $consumer_detail,
            'id' => $id,
        ];
        return view('qcs.edit_qc_detail', ['data' => $data]);
    }
    public function index()
    {
        return view('qcs.index');
    }
    public function all_qc_executives()
    {
        // ->where('type', 'inventory_reporter')
        return view('qcs.all_qc_executives', [
            'show_users' => Admin::where('type', 'qc_executive')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get(),
        ]);
    }
    function authenticate(Request $req)
    {
        // return ($req);
        $user = Admin::where('user_name', $req->user_name)->first();
        // return($req->all());
        if ($user && Hash::check($req->password, $user->password) && $user->type == "qc_manager") {
            Session::put('rexkod_vishvin_auth_name', $user->name);
            Session::put('rexkod_vishvin_auth_userid', $user->id);
            Session::put('rexkod_vishvin_auth_phone', $user->phone);
            Session::put('rexkod_vishvin_auth_user_type', $user->type);
            return redirect('qcs/index');
        } else {
            session()->put('failed', 'Invalid Credentials');
            return redirect('/qcs');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/qcs')->with('message', 'You have been logged out!');
    }
    function create_qc_executive(Request $req)
    {

        $auth = new Admin;


        $result = Admin::where('phone', $req->phone)->first();

        if ($result) {
            session()->put('failed', 'Phone already exists');

            return redirect('/qcs/add_qc_executive');
        } else {

            $auth->name = $req->name;

            $auth->phone = $req->phone;


            $auth->type = "qc_executive";
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

            return redirect('/qcs/all_qc_executives');
        }
    }
    function bulk_approve_qcs_report(Request $req)
    {

        if ($req->input('meter_main_id') != null) {
            $meter_main_arr = implode(',', $req->input('meter_main_id'));
            $meter_main_id = explode(',', $meter_main_arr);

            for ($i = 0; $i < count($meter_main_id); $i++) {
                $meter_main = Meter_main::find($meter_main_id[$i]);
                // $meter_main->qc_remark = $req->qc_remark;
                $meter_main->qc_status = 1;
                $meter_main->qc_updated_by = session()->get('rexkod_vishvin_auth_userid');
                $meter_main->qc_updated_at = now();
                $meter_main->save();
            }
            session()->put('success', 'Congrats! The meter status has been approved for: ' . $meter_main_arr);
            // return redirect('/qcs/qc_view_detail/' . $id);
            return redirect('/qcs/qc_view');
        } else {
            session()->put('failed', 'Please check any QC report to approve.');
            return redirect()->back();
        }
    }
    public function approve_qc_reports_status(Request $req, $id)
    {
        // first case: its present in consumer_detail

        $meter_main = Meter_main::find($id);
        // $meter_main->qc_remark = $req->qc_remark;
        $meter_main->qc_status = 1;
        $meter_main->qc_updated_by = session()->get('rexkod_vishvin_auth_userid');
        $meter_main->qc_updated_at = now();
        $meter_main->save();

        session()->put('success', 'Congrats! The meter status has been approved');
        // return redirect('/qcs/qc_view_detail/' . $id);
        return redirect('/qcs/qc_view');
    }
    public function reject_qc_reports_status(Request $req, $id)
    {
        // first case: its present in consumer_detail

        $meter_main = Meter_main::find($id);
        $meter_main->qc_remark = $req->qc_remark;
        $meter_main->qc_status = 2;
        $meter_main->qc_updated_by = session()->get('rexkod_vishvin_auth_userid');
        $meter_main->qc_updated_at = now();
        $meter_main->save();

        session()->put('success', 'The meter status has been rejected!');
        // return redirect('/qcs/qc_view_detail/' . $id);
        return redirect('/qcs/qc_view');
    }
    public function update_qc_report(Request $req, $id)
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


        $meter_main->save();

        // session()->put('success', 'Congrats! The meter status has been submitted successfully');
        return redirect('/qcs/qc_view_detail/' . $id);
    }

    public function approved_meter_reports(Request $req)
    {

        if (Session('rexkod_vishvin_auth_user_type') == "qc_executive") {
            if ($req->format === 'weekly') {

                $dateSevenDaysAgo = Carbon::now()->subDays(7);

                $start_date = $dateSevenDaysAgo->format('Y-m-d');
                $meter_mains = DB::table('meter_mains')
                ->select('meter_mains.*')
                ->where('qc_status', '=', '1')
                ->where('qc_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                ->whereDate('qc_updated_at', '>=', $start_date)
                // ->whereDate('qc_updated_at', '<=', $end_date)
                ->orderBy('id', 'DESC')
                ->get();


            } else if ($req->format === 'monthly') {

                $dateSevenDaysAgo = Carbon::now()->subDays(30);

                $start_date = $dateSevenDaysAgo->format('Y-m-d');
                $meter_mains = DB::table('meter_mains')
                ->select('meter_mains.*')
                ->where('qc_status', '=', '1')
                ->where('qc_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                ->whereDate('qc_updated_at', '>=', $start_date)
                // ->whereDate('qc_updated_at', '<=', $end_date)
                ->orderBy('id', 'DESC')
                ->get();

            }else{
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('qc_status', '=', '1')
                    ->where('qc_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->whereDate('qc_updated_at', '>=', $start_date)
                    ->whereDate('qc_updated_at', '<=', $end_date)
                    ->orderBy('id', 'DESC')
                    ->get();
            } else {
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('qc_status', '=', '1')
                    ->where('qc_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->orderBy('id', 'DESC')
                    ->get();
            }
        }
    }
        else {
            abort(500, 'Something went wrong');
        }
        // dd($meter_mains);
        return view('qcs.approved_meter_reports', ['meter_mains' => $meter_mains]);
    }
    public function rejected_meter_reports(Request $req)
    {

        if (Session('rexkod_vishvin_auth_user_type') == "qc_executive") {
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');


                $end_date = $req->get('end_date');
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('qc_status', '=', '2')
                    ->where('qc_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->whereDate('qc_updated_at', '>=', $start_date)
                    ->whereDate('qc_updated_at', '<=', $end_date)
                    ->orderBy('id', 'DESC')
                    ->get();
            } else {
                $meter_mains = DB::table('meter_mains')
                    ->select('meter_mains.*')
                    ->where('qc_status', '=', '2')
                    ->where('qc_updated_by', '=', session('rexkod_vishvin_auth_userid'))
                    ->orderBy('id', 'DESC')
                    ->get();
            }

        } else {
            abort(500, 'Something went wrong');
        }
        // dd($meter_mains);
        return view('qcs.rejected_meter_reports', ['meter_mains' => $meter_mains]);
    }


    public function reports(Request $req){

        if ($req->format === 'weekly') {
            # code...
            $dateSevenDaysAgo = Carbon::now()->subDays(7);
            $start_date = $dateSevenDaysAgo->format('Y-m-d');

            $qc_approved_date_wise = DB::table('meter_mains')
            ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
            ->whereNotNull('qc_updated_by')
            ->where('qc_updated_at', '>=', $start_date)
            ->groupBy('created_date', 'qc_updated_by')
            ->get();

             // to get the total aprroved tilldate
             $qc_approved_till_date = DB::table('meter_mains')
             ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                 COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                 COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
             ->whereNotNull('qc_updated_by')
             ->where('qc_updated_at', '<', $start_date)
             ->groupBy('created_date', 'qc_updated_by')
             ->get();

             $total_meter_approved_till_date = 0;
             foreach ($qc_approved_till_date as $qc_approved){
                 $total_meter_approved_till_date += $qc_approved->record_approved;
             }
             $total_approved = [];
             $i=0;
             foreach ($qc_approved_date_wise as $qc_approved){
                 $total_meter_approved_till_date += $qc_approved->record_approved;
                 $total_approved[$i] = $total_meter_approved_till_date;
                 $i++;
             }

        } elseif($req->format === 'monthly') {
            # code...
            $today = Carbon::now();
            $dateSevenDaysAgo = Carbon::now()->subDays(30);
            $start_date = $dateSevenDaysAgo->format('Y-m-d');
            $end_date = $today->format('Y-m-d');

            $qc_approved_date_wise = DB::table('meter_mains')
            ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
            ->whereNotNull('qc_updated_by')
            ->where('qc_updated_at', '>=', $start_date)
            ->groupBy('created_date', 'qc_updated_by')
            ->get();

             // to get the total aprroved tilldate
             $qc_approved_till_date = DB::table('meter_mains')
             ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                 COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                 COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
             ->whereNotNull('qc_updated_by')
             ->where('qc_updated_at', '<', $start_date)
             ->groupBy('created_date', 'qc_updated_by')
             ->get();

             $total_meter_approved_till_date = 0;
             foreach ($qc_approved_till_date as $qc_approved){
                 $total_meter_approved_till_date += $qc_approved->record_approved;
             }
             $total_approved = [];
             $i=0;
             foreach ($qc_approved_date_wise as $qc_approved){
                 $total_meter_approved_till_date += $qc_approved->record_approved;
                 $total_approved[$i] = $total_meter_approved_till_date;
                 $i++;
             }

        } else {
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');

                $qc_approved_date_wise = DB::table('meter_mains')
                ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                    COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                    COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
                ->whereNotNull('qc_updated_by')
                ->where('qc_updated_at', '>=', $start_date)
                ->where('qc_updated_at', '<=', $end_date)
                ->groupBy('created_date', 'qc_updated_by')
                ->get();

                // to get the total aprroved tilldate
                $qc_approved_till_date = DB::table('meter_mains')
                ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                    COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                    COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
                ->whereNotNull('qc_updated_by')
                ->where('qc_updated_at', '<', $start_date)
                ->groupBy('created_date', 'qc_updated_by')
                ->get();

                $total_meter_approved_till_date = 0;
                foreach ($qc_approved_till_date as $qc_approved){
                    $total_meter_approved_till_date += $qc_approved->record_approved;
                }
                $total_approved = [];
                $i=0;
                foreach ($qc_approved_date_wise as $qc_approved){
                    $total_meter_approved_till_date += $qc_approved->record_approved;
                    $total_approved[$i] = $total_meter_approved_till_date;
                    $i++;
                }


            } else {
                $qc_approved_date_wise = DB::table('meter_mains')
                ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                    COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                    COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
                ->whereNotNull('qc_updated_by')
                ->groupBy('created_date', 'qc_updated_by')
                ->get();

                // to get the total aprroved tilldate
                $total_approved = [];
                $total_meter_approved_till_date = 0;
                $i=0;
                foreach ($qc_approved_date_wise as $qc_approved){
                    $total_meter_approved_till_date += $qc_approved->record_approved;
                    $total_approved[$i] = $total_meter_approved_till_date;
                    $i++;
                }
            }
        }



        return view('qcs.reports', ['qc_approved_date_wise' => $qc_approved_date_wise , 'total_approved' => $total_approved]);

    }

    public function executive_reports(Request $req){

        if ($req->format === 'weekly') {
            # code...
            $dateSevenDaysAgo = Carbon::now()->subDays(7);
            $start_date = $dateSevenDaysAgo->format('Y-m-d');

            $qc_approved_date_wise = DB::table('meter_mains')
            ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
            ->whereNotNull('qc_updated_by')
            ->where('qc_updated_at', '>=', $start_date)
            ->where('qc_updated_by',session()->get('rexkod_vishvin_auth_userid'))
            ->groupBy('created_date', 'qc_updated_by')
            ->get();

             // to get the total aprroved tilldate
             $qc_approved_till_date = DB::table('meter_mains')
             ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                 COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                 COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
             ->whereNotNull('qc_updated_by')
             ->where('qc_updated_at', '<', $start_date)
             ->where('qc_updated_by',session()->get('rexkod_vishvin_auth_userid'))
             ->groupBy('created_date', 'qc_updated_by')
             ->get();

             $total_meter_approved_till_date = 0;
             foreach ($qc_approved_till_date as $qc_approved){
                 $total_meter_approved_till_date += $qc_approved->record_approved;
             }
             $total_approved = [];
             $i=0;
             foreach ($qc_approved_date_wise as $qc_approved){
                 $total_meter_approved_till_date += $qc_approved->record_approved;
                 $total_approved[$i] = $total_meter_approved_till_date;
                 $i++;
             }

        } elseif($req->format === 'monthly') {
            # code...
            $today = Carbon::now();
            $dateSevenDaysAgo = Carbon::now()->subDays(30);
            $start_date = $dateSevenDaysAgo->format('Y-m-d');
            $end_date = $today->format('Y-m-d');

            $qc_approved_date_wise = DB::table('meter_mains')
            ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
            ->whereNotNull('qc_updated_by')
            ->where('qc_updated_at', '>=', $start_date)
            ->where('qc_updated_by',session()->get('rexkod_vishvin_auth_userid'))
            ->groupBy('created_date', 'qc_updated_by')
            ->get();

             // to get the total aprroved tilldate
             $qc_approved_till_date = DB::table('meter_mains')
             ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                 COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                 COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
             ->whereNotNull('qc_updated_by')
             ->where('qc_updated_at', '<', $start_date)
             ->where('qc_updated_by',session()->get('rexkod_vishvin_auth_userid'))
             ->groupBy('created_date', 'qc_updated_by')
             ->get();

             $total_meter_approved_till_date = 0;
             foreach ($qc_approved_till_date as $qc_approved){
                 $total_meter_approved_till_date += $qc_approved->record_approved;
             }
             $total_approved = [];
             $i=0;
             foreach ($qc_approved_date_wise as $qc_approved){
                 $total_meter_approved_till_date += $qc_approved->record_approved;
                 $total_approved[$i] = $total_meter_approved_till_date;
                 $i++;
             }

        } else {
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');

                $qc_approved_date_wise = DB::table('meter_mains')
                ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                    COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                    COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
                ->whereNotNull('qc_updated_by')
                ->where('qc_updated_at', '>=', $start_date)
                ->where('qc_updated_at', '<=', $end_date)
                ->where('qc_updated_by',session()->get('rexkod_vishvin_auth_userid'))
                ->groupBy('created_date', 'qc_updated_by')
                ->get();

                // to get the total aprroved tilldate
                $qc_approved_till_date = DB::table('meter_mains')
                ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                    COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                    COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
                ->whereNotNull('qc_updated_by')
                ->where('qc_updated_at', '<', $start_date)
                ->where('qc_updated_by',session()->get('rexkod_vishvin_auth_userid'))
                ->groupBy('created_date', 'qc_updated_by')
                ->get();

                $total_meter_approved_till_date = 0;
                foreach ($qc_approved_till_date as $qc_approved){
                    $total_meter_approved_till_date += $qc_approved->record_approved;
                }
                $total_approved = [];
                $i=0;
                foreach ($qc_approved_date_wise as $qc_approved){
                    $total_meter_approved_till_date += $qc_approved->record_approved;
                    $total_approved[$i] = $total_meter_approved_till_date;
                    $i++;
                }


            } else {
                $qc_approved_date_wise = DB::table('meter_mains')
                ->select(DB::raw('DATE(qc_updated_at) AS created_date, qc_updated_by,
                    COUNT(CASE WHEN qc_status = 1 THEN 1 ELSE NULL END) AS record_approved,
                    COUNT(CASE WHEN qc_status = 2 THEN 1 ELSE NULL END) AS record_rejected'))
                ->whereNotNull('qc_updated_by')
                ->where('qc_updated_by',session()->get('rexkod_vishvin_auth_userid'))
                ->groupBy('created_date', 'qc_updated_by')
                ->get();

                // to get the total aprroved tilldate
                $total_approved = [];
                $total_meter_approved_till_date = 0;
                $i=0;
                foreach ($qc_approved_date_wise as $qc_approved){
                    $total_meter_approved_till_date += $qc_approved->record_approved;
                    $total_approved[$i] = $total_meter_approved_till_date;
                    $i++;
                }
            }
        }



        return view('qc_executives.reports', ['qc_approved_date_wise' => $qc_approved_date_wise , 'total_approved' => $total_approved]);

    }
}
