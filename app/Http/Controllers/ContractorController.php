<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Contractor;
use App\Models\Meter_main;
// use Session;
use Illuminate\Http\Request;
use App\Models\Consumer_detail;

use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Carbon\Carbon;


class ContractorController extends Controller
{

    public function add_contractor_executive()
    {
        $admin = Admin::where('id', session('rexkod_vishvin_auth_userid'))->first();
        $project_head = Admin::where('id',$admin->created_by)->first();
$data = [
    'project_head' => $project_head,
];

        return view('contractors.add_contractor_executive',['data'=>$data]);
    }
    public function login()
    {
        return view('contractors.login');
    }
    public function rejected_reports()
    {
        $meter_mains = Meter_main::where('qc_status', 2)->orWhere('so_status', 2)->orWhere('aee_status', 2)->orWhere('aao_status', 2)->orderBy('id')->get();
        // dd($meter_mains);
        return view('contractors.rejected_reports', ['meter_mains' => $meter_mains]);
    }
    public function rejected_report_view($id)
    {

        $meter_main = Meter_main::where('id', $id)->first();

        $consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();

        $data = [
            'meter_main' => $meter_main,
            'consumer_detail' => $consumer_detail,
            'id' => $id,
        ];
        return view('contractors.rejected_report_view', ['data' => $data]);
    }
    public function delete_status_data($id)
    {

        $meter_main = Meter_main::where('id', $id)->first();

        $consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();
        $meter_main->qc_remark = Null;
        $meter_main->qc_status = 0;
        $meter_main->qc_updated_by = Null;
        $meter_main->qc_updated_at = Null;
        $meter_main->so_remark = Null;
        $meter_main->so_status = 0;
        $meter_main->so_updated_by = Null;
        $meter_main->so_updated_at = Null;
        $meter_main->aee_remark = Null;
        $meter_main->aee_status = 0;
        $meter_main->aee_updated_by = Null;
        $meter_main->aee_updated_at = Null;
        $meter_main->aao_remark = Null;
        $meter_main->aao_status = 0;
        $meter_main->aao_updated_by = Null;
        $meter_main->aao_updated_at = Null;
        $meter_main->allocation_flag = 1;
        $meter_main->save();
        // return view('contractors.rejected_reports');
        // return $this->rejected_reports();
        return redirect('/contractors/rejected_reports');
        // return App::make('rejected_reports')->rejected_reports();
    }
    public function index()
    {
        return view('contractors.index');
    }
    public function all_contractor_executives()
    {
        // ->where('type', 'inventory_reporter')
        return view('contractors.all_contractor_executives', [
            'show_users' => Admin::where('type', 'field_executive')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get(),
        ]);
    }
    // function authenticate(Request $req)
    // {

    //     $user = Admin::where('user_name', $req->user_name)->first();
    //     if ($user && Hash::check($req->password, $user->password) && $user->type == "contractor_manager") {
    //         Session::put('rexkod_contractor_manager_name', $user->name);
    //         Session::put('rexkod_contractor_manager_user_id', $user->id);
    //         Session::put('rexkod_contractor_manager_user_name', $user->user_name);
    //         Session::put('rexkod_contractor_manager_user_type', $user->type);
    //         return redirect('contractors/index');
    //     } else {
    //         session()->put('failed', 'Invalid Credentials');
    //         return redirect('/contractors');
    //     }
    // }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/contractors')->with('message', 'You have been logged out!');
    }
    function create_contractor_executive(Request $req)
    {
        // print_r($req->all());
        $auth = new Admin;

        $result = Admin::where('phone', $req->phone)->first();

        if ($result) {
            session()->put('failed', 'Phone already exists');

            return redirect('/contractors/add_contractor_executive');
        } else {

            $auth->name = $req->name;

            $auth->phone = $req->phone;


            $auth->type = "field_executive";
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

            return redirect('/contractors/all_contractor_executives');
        }
    }


    public function add_outward_installation()
    {
        $contractor =  DB::table('admins')
            ->where('type', 'contractor_manager')
            ->get();
        $warehouse_meters =  DB::table('warehouse_meters')
            ->get();
        $contractor_inventories =  DB::table('contractor_inventories')->where('contractor_id',session('rexkod_vishvin_auth_userid'))
            ->get();



        // $project_head = Admin::where('id', $admin->created_by)->first();
        $data = [
            'contractors' => $contractor,
            'warehouse_meters' => $warehouse_meters,
            'contractor_inventories' => $contractor_inventories,
        ];
        return view('contractors.add_outward_installation', ['data' => $data]);
    }

    public function reports(Request $req){

        if ($req->format === 'weekly') {
            # code...
            $dateSevenDaysAgo = Carbon::now()->subDays(7);
            $start_date = $dateSevenDaysAgo->format('Y-m-d');

            $meter_replaced_date_wise = DB::table('meter_mains')
            ->select(DB::raw('DATE(created_at) AS created_date, created_by, COUNT(*) AS record_count'))
            ->where('created_at', '>=', $start_date)
            ->groupBy('created_date', 'created_by')
            ->get();
            // dd($meter_replaced_date_wise);

        } elseif($req->format === 'monthly') {
            # code...
            $today = Carbon::now();
            $dateSevenDaysAgo = Carbon::now()->subDays(30);
            $start_date = $dateSevenDaysAgo->format('Y-m-d');
            $end_date = $today->format('Y-m-d');

            $meter_replaced_date_wise = DB::table('meter_mains')
            ->select(DB::raw('DATE(created_at) AS created_date, created_by, COUNT(*) AS record_count'))
            ->where('created_at', '>=', $start_date)
            ->groupBy('created_date', 'created_by')
            ->get();
        } else {
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');

                $meter_replaced_date_wise = DB::table('meter_mains')
            ->select(DB::raw('DATE(created_at) AS created_date, created_by, COUNT(*) AS record_count'))
            ->where('created_at', '>=', $start_date)
            ->where('created_at', '<=', $end_date)
            ->groupBy('created_date', 'created_by')
            ->get();


            } else {
                $meter_replaced_date_wise = DB::table('meter_mains')
                ->select(DB::raw('DATE(created_at) AS created_date, created_by, COUNT(*) AS record_count'))
                ->groupBy('created_date', 'created_by')
                ->get();

            }
        }


        return view('contractors.reports',['meter_replaced_date_wise'=> $meter_replaced_date_wise]);
    }

}
