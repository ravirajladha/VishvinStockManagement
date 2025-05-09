<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Inventory;
use App\Models\Annexure_1;
use App\Models\Annexure_3;
use App\Models\Contractor;
use App\Models\Outward_mrt;
use App\Models\Consumer_detail;
use App\Models\Zone_code;
use Illuminate\Support\Str;
use App\Models\Inward_genus;
use App\Models\Meter_main;
use Illuminate\Http\Request;
use App\Models\Warehouse_meter;
use App\Models\Inward_mrt_reject;
use Illuminate\Support\Facades\DB;
use App\Models\Outward_installation;
use App\Models\Contractor_inventory;
use App\Models\Lot_detail;

use Illuminate\Support\Facades\Hash;
use App\Models\Inward_meter_sl_no_wise;
use Illuminate\Support\Facades\Session;
use App\Models\Inward_released_em_meter;
use App\Models\Outward_released_em_meter;
use App\Models\Indent;
use Carbon\Carbon;

class InventoryController extends Controller
{
    public function add_inventory_executive()
    {
        $admin = Admin::where('id', session('rexkod_vishvin_auth_userid'))->first();
        $project_head = Admin::where('id', $admin->created_by)->first();
        $data = [
            'project_head' => $project_head,
        ];
        return view('inventories.add_inventory_executive', ['data' => $data]);
    }
    public function add_outward_installation()
    {
        $contractor =  DB::table('admins')
            ->where('type', 'contractor_manager')
            ->get();
        $warehouse_meters =  DB::table('warehouse_meters')
            ->where('unused_meter_serial_no', 'IS NOT', null)
            ->where('complete_status',1)
            ->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get();
        $contractor_inventories =  DB::table('contractor_inventories')
            ->get();



        // $project_head = Admin::where('id', $admin->created_by)->first();
        $data = [
            'contractors' => $contractor,
            'warehouse_meters' => $warehouse_meters,
            'contractor_inventories' => $contractor_inventories,
        ];
        return view('inventory_executives.add_outward_installation', ['data' => $data]);
    }
    public function add_inward_released_em_meter()
    {
        $unique_sd_pincodes = Consumer_detail::select('sd_pincode')->distinct()->get();
        $contractor =  DB::table('admins')
            ->where('type', 'contractor_manager')
            ->get();
        $em_meters =  DB::table('inward_released_em_meters')
            ->where('status', 0)
            ->get();



        // $project_head = Admin::where('id', $admin->created_by)->first();
        $data = [
            'unique_sd_pincodes' => $unique_sd_pincodes,
            'contractors' => $contractor,
            'em_meters' => $em_meters,


        ];
        return view('inventory_executives.add_inward_released_em_meter', ['data' => $data]);
    }
    public function add_outward_released_em_meter()
    {


        $em_meters =  DB::table('inward_released_em_meters')
            ->where('status', 1)
            ->get();



        // $project_head = Admin::where('id', $admin->created_by)->first();
        $data = [

            'em_meters' => $em_meters,


        ];
        return view('inventory_executives.add_outward_released_em_meter', ['data' => $data]);
    }

    public function get_sd_pincode(Request $request)
    {
        // $so_pincode = DB::table('consumer_details')
        //     ->select('so_pincode')
        //     ->where('sd_pincode', $request->sd_pincode)
        //     ->distinct()
        //     ->get();
        $so_pincode = DB::table('zone_codes')
            ->select('so_code')
            ->where('sd_code', $request->sd_pincode)
            ->distinct()
            ->get();
        //         ->pluck('sd_pincode')
        // ->unique();
        if (count($so_pincode) > 0) {
            return response()->json($so_pincode);
        }
    }
    public function get_meter_serial_no(Request $request)
    {
        $meter_serial_no = DB::table('warehouse_meters')
            ->where('id', $request->box_id)
            ->where('meter_type', $request->meter_type)
            ->value('unused_meter_serial_no');

        if (!empty($meter_serial_no)) {
            return response()->json($meter_serial_no);
        } else {
            return response()->json('No meter serial number found for the selected box ID.');
        }
    }


    public function login()
    {
        return view('inventories.login');
    }
    public function index()
    {
        return view('inventories.index');
    }
    public function inventory_executive_index()
    {
        return view('inventory_executives.index');
    }
    public function inventory_reporter_index()
    {
        return view('inventory_reporters.index');
    }
    public function annexure4_list()

    {
        $approved_meters = Meter_main::where('aao_status', 1)->get();
        $data = [
            'approved_meters' => $approved_meters,
        ];
        return view('inventory_reporters.annexure4_list', compact('data'));
    }

    public function annexure1()
    {

        // $unique_sd_pincodes = Consumer_detail::select('sd_pincode')->distinct()->get();
        $unique_sd_pincodes = Zone_code::select('sd_code')->distinct()->get();

        $em_meters =  DB::table('inward_released_em_meters')
            ->where('status', 0)
            ->get();

        $all_annexure1 = Annexure_1::all();

        // $project_head = Admin::where('id', $admin->created_by)->first();
        $data = [
            'unique_sd_pincodes' => $unique_sd_pincodes,
            'em_meters' => $em_meters,
            'all_annexure1s' => $all_annexure1,
        ];


        return view('inventory_reporters.annexure1', compact('data'));
    }
    public function annexure3()
    {
        // $unique_sd_pincodes = Consumer_detail::select('sd_pincode')->distinct()->get();
        $unique_sd_pincodes = Zone_code::select('sd_code')->distinct()->get();
        $em_meters =  DB::table('inward_released_em_meters')
            ->where('status', 0)
            ->get();

        $all_annexure3 = Annexure_3::all();

        // $project_head = Admin::where('id', $admin->created_by)->first();
        $data = [
            'unique_sd_pincodes' => $unique_sd_pincodes,
            'em_meters' => $em_meters,
            'all_annexure3' => $all_annexure3,
        ];
        return view('inventory_reporters.annexure3', compact('data'));
    }
    public function annexure4($id)
    {
        $meter_main = Meter_main::where('id', $id)->first();
        $consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();
        $data = [
            'meter_main' => $meter_main,
            'consumer_detail' => $consumer_detail,
            'id' => $id,
        ];
        return view('inventory_reporters.annexure4', ['data' => $data]);
    }
    public function all_inventory_executives()
    {
        // ->where('type', 'annexure_executive')
        return view('inventories.all_inventory_executives', [
            'show_users' =>  Admin::where(function ($query) {
                $query->where('type', 'inventory_executive')
                    ->orWhere('type', 'inventory_reporter');
            })
                ->where('created_by', session()->get('rexkod_vishvin_auth_userid'))
                ->get(),
        ]);
    }


    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/inventories')->with('message', 'You have been logged out!');
    }
    function create_inventory_executive(Request $req)
    {
        // print_r($req->all());
        $auth = new Admin;


        $result = Admin::where('phone', $req->phone)->first();

        if ($result) {
            session()->put('failed', 'Phone already exists');
            return redirect('/inventories/add_inventory_executive');
        } else {

            $auth->name = $req->name;
            $auth->phone = $req->phone;

            if ($req->type == 1) {
                $type = "inventory_executive";
            } else {
                $type = "inventory_reporter";
            }
            $auth->type = $type;
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

            return redirect('/inventories/all_inventory_executives');
        }
    }


    // Route::get('/inventories/view_inward_genus', [InventoryController::class, 'view_inward_genus']);
    // Route::get('/inventories/view_inward_mrt_rejected', [InventoryController::class, 'view_inward_mrt_rejected']);
    // Route::get('/inventories/view_inward_released_em_meter', [InventoryController::class, 'view_inward_released_em_meter']);
    // Route::get('/inventories/view_meter_sl_number_wise', [InventoryController::class, 'view_meter_sl_number_wise']);
    // Route::get('/inventories/view_outward_mrt', [InventoryController::class, 'view_outward_mrt']);
    // Route::get('/inventories/view_outward_installation', [InventoryController::class, 'view_outward_installation']);
    // Route::get('/inventories/view_outward_released_on_meter', [InventoryController::class, 'view_outward_released_on_meter']);



    // function create_inward_genus(Request $req)
    // {
    //     print_r($req->all());
    //     $inward_genus = new Inward_genus;

    //         $inward_genus->quantity = $req->quantity;
    //         $inward_genus->start_date = $req->start_date;
    //         $inward_genus->invoice_no = $req->invoice_no;
    //         $inward_genus->dc_no = $req->dc_no;
    //         $inward_genus->meter_rating = $req->meter_rating;
    //         $inward_genus->amount = $req->amount;
    //         $inward_genus->box_no= $req->box_no;
    //         $inward_genus->type_meter= $req->type_meter;
    //         $inward_genus->po_no = $req->po_no;
    //         $inward_genus->po_date= $req->po_date;

    //         if (!empty($req->file('invoice'))) {
    //             $extension1 = $req->file('invoice')->extension();
    //             if ($extension1 == "png" || $extension1 == "jpeg" || $extension1 == "jpg") {
    //                 $filename = Str::random(4) . time() . '.' . $extension1;
    //                 $inward_genus->invoice = $req->file('invoice')->move(('uploads'), $filename);
    //             }
    //         }
    //         $inward_genus->created_by = session()->get('rexkod_vishvin_auth_userid');
    //         $inward_genus->save();
    //         return back()->with('message', 'Successfullly submitted');
    //         session()->put('success', 'Exective added successfully');



    //         return redirect('/inventory_executives/add_inward_genus');

    // }

    function create_inward_mrt_rejected(Request $req)
    {
        print_r($req->all());
        $inward_mrt_rejected = new Inward_mrt_reject;

        $inward_mrt_rejected->lot_no = $req->lot_no;
        $inward_mrt_rejected->start_date = $req->start_date;
        $inward_mrt_rejected->meter_type = $req->meter_type;
        $inward_mrt_rejected->serial_no = $req->serial_no;

        $inward_mrt_rejected->created_by = session()->get('rexkod_vishvin_auth_userid');
        $inward_mrt_rejected->save();
        session()->put('success', 'Inward Mrt Rejected added successfully');

        // $user = Admin::where('user_name', $req->user_email)->first();

        // $req->session()->put('user',$user);

        return redirect('/inventory_executives/add_inward_mrt_rejected');
    }
    function create_inward_released_em_meter(Request $req)
    {



        $serial_no_arr = implode(',', $req->input('serial_no'));
        // dd($serial_no_arr);
        $serial_no = explode(',', $serial_no_arr);
        // dd($serial_no);
        $unique_serial_no = array_unique($serial_no);
        $overlapping = 0;
        $error_flag = 0;

        // Check if the number of elements in the original and unique arrays are the same
        if (count($serial_no) !== count($unique_serial_no)) {
            $overlapping = 1;
        } else {
            $overlapping = 0;
        }


        if (count($serial_no) >= 1) {
            for ($i = 0; $i < count($req->input('serial_no')); $i++) {
                $existingInventory = Inward_released_em_meter::where('serial_no', $serial_no[$i])->first();
                if ($existingInventory !== null) {
                    $error_flag = 1;
                    session()->put('failed', 'Serial number already present in the Inventory database: ' . $serial_no[$i]);
                    return redirect('/inventory_executives/add_inward_released_em_meter');
                    // $existing_inventory_flag =0;
                }
            }
        } else {
            $error_flag = 1;
        }


        if ($error_flag || $overlapping || ($serial_no_arr == "")) {
            session()->put('failed', 'Duplicate values found or invalid value detected');
            return redirect('/inventory_executives/add_inward_released_em_meter');
        }


        for ($i = 0; $i < count($req->input('serial_no')); $i++) {
            $inward_released_em_meter = new Inward_released_em_meter;

            $inward_released_em_meter->sd_pincode = $req->sd_pincode;
            $inward_released_em_meter->so_pincode = $req->so_pincode;
            $inward_released_em_meter->contractor_id = $req->contractor_id;
            $inward_released_em_meter->meter_type = $req->meter_type;
            $inward_released_em_meter->serial_no = $serial_no[$i];


            $inward_released_em_meter->created_by = session()->get('rexkod_vishvin_auth_userid');
            $inward_released_em_meter->save();
        }
        session()->put('success', 'Inward Release Em Meter added successfully');

        // $user = Admin::where('user_name', $req->user_email)->first();

        // $req->session()->put('user',$user);

        return redirect('/inventory_executives/add_inward_released_em_meter');
    }

    public function add_lot(){
        // $lot_detail = new Lot_detail();
        $lot_details =  DB::table('lot_details')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))
        ->orderBy('id', 'desc')
            ->get();

        $data = [
            'warehouse_meters' => $lot_details,
        ];

        return view('inventory_executives.add_lot',compact('data'));
    }

    public function create_lot_no(Request $req){
        $lot_detail = new Lot_detail();
        $lot_detail->meter_type = $req->meter_type;
        $lot_detail->division = $req->division;
        $lot_detail->created_by = session()->get('rexkod_vishvin_auth_userid');
        $lot_detail->save();

        return redirect('/inventory_executives/add_lot');
    }

    public function add_meter_to_warehouse(Request $req,$lot_no)
    {
        $lot_details = Lot_detail::where('id',$lot_no)->first();


        $warehouse_meter = new Warehouse_meter;
        $warehouse_meter->meter_type = $lot_details->meter_type;
        $warehouse_meter->division = $lot_details->division;
        $warehouse_meter->lot_no = $lot_no;
        // $warehouse_meter_detail = Warehouse_meter::latest()->first();
        // if($warehouse_meter_detail ==null){
        //     $warehouse_meter->lot_no =1;
        // }else{
        //     $warehouse_meter->lot_no = ($warehouse_meter_detail->lot_no )+1;
        // }
        $warehouse_meter->created_by = session()->get('rexkod_vishvin_auth_userid');
        $warehouse_meter->save();
        $last_id_added = $warehouse_meter->id;
        session()->put('success', 'Box has been created successfully. Please add meters to the box');

        // return redirect('/inventory_executives/add_meter_into_box/' . $last_id_added);
        return redirect('/inventory_executives/add_meter_sl_number_wise/' . $lot_no);

    }


    public function add_meter_into_box($id)
    {

        $current_box = Warehouse_meter::where('id', $id)->first();



        $data = [
            'id' => $id,
            'current_box' => $current_box,
        ];
        return view('inventory_executives.add_meter_into_box', compact('data'));
    }

    public function update_meter_into_box(Request $req)
    {
        // dd('22');
        $box_id = $req->box_id;

        $scanner = $req->scanner;
        if ($req->barcode_meter_id == null && $req->meter_id == null) {
            session()->put('failed', 'Please add values');
            return redirect('/inventory_executives/add_meter_into_box/' . $box_id);
        }

        if ($scanner == 'on') {
            $meter_id = $req->barcode_meter_id;
            $meter_id = substr($req->barcode_meter_id, 0, -4);
            if($meter_id<=0 || $meter_id==''){
                session()->put('failed', 'The values added through Scanning trims the last four character. Please dont add negative or null serial number.');
                return redirect('/inventory_executives/add_meter_into_box/' . $box_id);
            }
        } else {
            $meter_id = $req->meter_id;
        }

        if(!($meter_id >=1000000 && $meter_id <= 9999999)){
            session()->put('failed', 'The meter serial number should be 7 digits.');
            return redirect('/inventory_executives/add_meter_into_box/' . $box_id);
        }
        // dd($req);

        $scanner_meter_id = $req->scanner_meter_id;
        $duplicate_flag = 0;
        $rows = DB::table('warehouse_meters')->get(); // Replace 'table_name' with the name of your actual table


        foreach ($rows as $row) {
            $existing_string = $row->meter_serial_no;
            // $meter_serial_no_bundle   = explode(',', $existing_string);
            // foreach($meter_serial_no_bundle as $meter_serial_no){
            //     if($meter_serial_no == $meter_id){
            //         $duplicate_flag = 1;
            //     }else{

            //     }
            // }
            $existing_string = $row->meter_serial_no;
            $existing_array = explode(',', $existing_string);
            if (in_array($meter_id, $existing_array) == false) {
                // The new value is not present in the existing string, so we can add it
                $duplicate_flag = 0;

                // Replace 'id' with the name of your actual primary key column
            } else {
                // The new value is already present in the existing string, so we don't need to add it
                session()->put('failed', 'Serial number already present in the Inventory database: ' . $meter_id);
                return redirect('/inventory_executives/add_meter_into_box/' . $box_id);
                $duplicate_flag = 1;
            }

            // Do something with the updated string for this row, if needed
        }
















        if ($duplicate_flag) {
            session()->put('failed', 'Serial number already present in the Inventory database: ' . $meter_id);
            return redirect('/inventory_executives/add_meter_into_box/' . $box_id);
        } else {
            $current_box = Warehouse_meter::where('id', $box_id)->first();

            $meter_serial_no = explode(',', $current_box->meter_serial_no);
            if (empty($current_box->meter_serial_no)) {
                $new_meter_serial_no_string = $meter_id;
            } else {
                array_push($meter_serial_no, $meter_id);
                $new_meter_serial_no_string = implode(',', $meter_serial_no);
            }



            $current_box->meter_serial_no = $new_meter_serial_no_string;
            $current_box->save();




            $unused_meter_serial_no = explode(',', $current_box->unused_meter_serial_no);
            if (empty($current_box->unused_meter_serial_no)) {
                $new__unused_meter_serial_no_string = $meter_id;
            } else {
                array_push($unused_meter_serial_no, $meter_id);
                $new__unused_meter_serial_no_string = implode(',', $meter_serial_no);
            }



            $current_box->unused_meter_serial_no = $new__unused_meter_serial_no_string;
            $current_box->save();
            // session()->put('success', 'Serial number added: ' . $meter_id);

            return redirect('/inventory_executives/add_meter_into_box/' . $box_id);
        }
    }

    function add_meter_to_stock1(Request $req)
    {

        // $error_flag = 1;
        $overlap_flag = 0;
        // $existing_inventory_flag =1;

        // retrieve the values submitted for the from_serial_no and to_serial_no fields
        $from_serial_no_arr = implode(',', $req->input('from_serial_no'));
        $to_serial_no_arr = implode(',', $req->input('to_serial_no'));

        // split the comma-separated values of from_serial_no and to_serial_no into arrays
        $from_serial_no = explode(',', $from_serial_no_arr);
        $to_serial_no = explode(',', $to_serial_no_arr);
        // check if all to_serial_no values are greater than corresponding from_serial_no values


        if (count($from_serial_no) == 1 && count($to_serial_no) == 1 && $from_serial_no[0] == $to_serial_no[0]) {
            $valid_serial_no = 1;
        } else {
            $valid_serial_no = true;
            for ($i = 0; $i < count($from_serial_no); $i++) {
                if ($to_serial_no[$i] <= $from_serial_no[$i]) {
                    $valid_serial_no = false;
                    break;
                }
            }

            // check if there are any collisions between the generated serial numbers
            if ($valid_serial_no) {
                $generated_serial_no = array();
                for ($i = 0; $i < count($from_serial_no); $i++) {
                    $serial_no_range = range($from_serial_no[$i], $to_serial_no[$i]);
                    foreach ($serial_no_range as $serial_no) {
                        if (in_array($serial_no, $generated_serial_no)) {
                            $valid_serial_no = false;
                            break;
                        }
                        $generated_serial_no[] = $serial_no;
                        $overlap_flag = 1;
                    }
                    if (!$valid_serial_no) {
                        break;
                    }
                }
            }
        }

        if (!$valid_serial_no) {
            if ($overlap_flag) {
                session()->put('failed', 'Serial Number: ' . $serial_no . ' found overalapped');
            } else {
                session()->put('failed', 'Invalid Serial Number Detected');
            }
            return redirect('/inventory_executives/add_meter_sl_number_wise');
        }



        //   test the serial number is present in the inventoru database or not
        if (count($from_serial_no) == 1 && count($to_serial_no) == 1 && $from_serial_no[0] == $to_serial_no[0]) {
            $existingInventory = inventory::where('serial_no', $from_serial_no[0])->first();
            if ($existingInventory !== null) {
                session()->put('failed', 'Serial number already present in the Inventory database: ' . $from_serial_no[0]);
                return redirect('/inventory_executives/add_meter_sl_number_wise');
                // $existing_inventory_flag =0;
            }
        } else {
            // loop through the values of the $from_serial_no array
            for ($i = 0; $i < count($req->input('from_serial_no')); $i++) {
                // concatenate the values from both arrays with a hyphen -
                $serial_no = $from_serial_no[$i] . '-' . $to_serial_no[$i];
                for ($j = $from_serial_no[$i]; $j <=  $to_serial_no[$i]; $j++) {
                    $existingInventory = inventory::where('serial_no', $j)->first();
                    if ($existingInventory !== null) {
                        session()->put('failed', 'Serial number already present in the Inventory database: ' . $j);
                        return redirect('/inventory_executives/add_meter_sl_number_wise');
                        // $existing_inventory_flag =0;
                    }
                }
            }
        }

        // if ($existing_inventory_flag==0) {
        //     session()->put('failed', 'Serial number already present in the Inventory database: '. $j);
        //     return redirect('/inventory_executives/add_meter_sl_number_wise');
        // }




        // final code
        // set the values of the meter_type and division fields of the $warehouse_meter object to the values submitted from the form

        // loop through the values of the $from_serial_no array
        for ($i = 0; $i < count($req->input('from_serial_no')); $i++) {
            $warehouse_meter = new Warehouse_meter;
            // concatenate the values from both arrays with a hyphen -
            $serial_no = $from_serial_no[$i] . '-' . $to_serial_no[$i];

            // set the values of the meter_type, division, serial_no, lot_no, and created_by fields of the $warehouse_meter object to the values submitted from the form
            $warehouse_meter->meter_type = $req->meter_type;
            $warehouse_meter->division = $req->division;
            $warehouse_meter->serial_no = $serial_no;
            $warehouse_meter->lot_no = $req->lot_no;
            $warehouse_meter->created_by = session()->get('rexkod_vishvin_auth_userid');

            // store the $warehouse_meter object in the database
            $warehouse_meter->save();
            $warehouse_meter_id = $warehouse_meter->id;
            for ($j = $from_serial_no[$i]; $j <=  $to_serial_no[$i]; $j++) {
                $inventory = new Inventory;
                $inventory->warehouse_id = $warehouse_meter_id;
                $inventory->serial_no = $j;
                $inventory->save();
            }
        }
        //     $warehouse_meter->meter_type =  $req->meter_type;
        //     $warehouse_meter->division =  $req->division;
        //     $warehouse_meter->from_serial_no =  implode(',',$req->input('from_serial_no'));
        //     $warehouse_meter->to_serial_no = implode(',',$req->input('to_serial_no'));

        // //    dd($warehouse_meter->to_serial_no);
        //         $warehouse_meter->created_by = session()->get('rexkod_vishvin_auth_userid');
        //         $warehouse_meter->save();
        session()->put('success', 'Inward Meter Data added successfully');
        return redirect('/inventory_executives/add_meter_sl_number_wise');
    }

    function create_outward_installation(Request $req)
    {
        $box_id = $req->box_id;
        $existingInventory = Warehouse_meter::where('id', $box_id)->first();


        $unused_meter_serial_no = explode(',', $existingInventory->unused_meter_serial_no);
        $used_meter_serial_no = explode(',', $existingInventory->used_meter_serial_no);

        $input_values = $req->input('meter_serial_no'); // assume the checkbox values are submitted as an array
        $input_values_string = implode(',', $input_values);
$input_values_string = rtrim($input_values_string, ',');

        // dd($input_values);
        // Remove the input values from unused data and add them to used data
        // dd($input_values);
        if (!$input_values) {
            session()->put('failed', 'Please select any meter serial no');
            return redirect('/inventory_executives/add_outward_installation');
        }
        foreach ($input_values as $val) {
            $key = array_search($val, $unused_meter_serial_no);
            if ($key !== false) {
                unset($unused_meter_serial_no[$key]);
                $used_meter_serial_no[] = $val;
            }
        }

        $existingInventory->unused_meter_serial_no = implode(',', $unused_meter_serial_no);
        if (empty($existingInventory->unused_meter_serial_no)) {
            $existingInventory->unused_meter_serial_no = Null;
        }
        $existingInventory->used_meter_serial_no= implode(',', $used_meter_serial_no);

        $existingInventory->used_meter_serial_no  = ltrim($existingInventory->used_meter_serial_no, ',');
        $existingInventory->save();



        $contractor_inventory = new Contractor_inventory;

        $contractor_inventory->meter_type = $req->meter_type;
        $contractor_inventory->division = $req->division;
        $contractor_inventory->box_id = $req->box_id;
        $contractor_inventory->serial_no = $input_values_string;
        $contractor_inventory->unused_meter_serial_no = $input_values_string;
        $contractor_inventory->contractor_id = $req->contractor_id;
        $contractor_inventory->dc_no = $req->dc_no;
        $contractor_inventory->created_by = session()->get('rexkod_vishvin_auth_userid');

        // store the $warehouse_meter object in the database
        $contractor_inventory->save();




        session()->put('success', 'Inward Meter Data added successfully');
        return redirect('/inventory_executives/add_outward_installation');
        // $meter_serial
        //         $contractor_inventory->meter_type = $req->meter_type;
        //         $contractor_inventory->division = $req->division;
        //         $contractor_inventory->serial_no = $serial_no;
        //         $contractor_inventory->contractor_id = $req->contractor_id;
        //         $contractor_inventory->dc_no = $req->dc_no;
        //         $contractor_inventory->created_by = session()->get('rexkod_vishvin_auth_userid');

        //         // store the $warehouse_meter object in the database
        //         $contractor_inventory->save();


    }

    function create_outward_installation1(Request $req)
    {


        // $error_flag = 1;
        $overlap_flag = 0;
        // $existing_inventory_flag =1;

        // retrieve the values submitted for the from_serial_no and to_serial_no fields
        $from_serial_no_arr = implode(',', $req->input('from_serial_no'));
        $to_serial_no_arr = implode(',', $req->input('to_serial_no'));

        // split the comma-separated values of from_serial_no and to_serial_no into arrays
        $from_serial_no = explode(',', $from_serial_no_arr);
        $to_serial_no = explode(',', $to_serial_no_arr);

        // dd(count($to_serial_no));


        // check if all to_serial_no values are greater than corresponding from_serial_no values
        $no_error = 1;
        if (count($from_serial_no) == 1 && count($to_serial_no) == 1 && $from_serial_no[0] == $to_serial_no[0]) {
            $no_error  = 1;
        } else {
            $valid_serial_no = true;
            for ($i = 0; $i < count($from_serial_no); $i++) {
                if ($to_serial_no[$i] <= $from_serial_no[$i]) {
                    $valid_serial_no = false;
                    break;
                }
            }

            // check if there are any collisions between the generated serial numbers
            if ($valid_serial_no) {
                $generated_serial_no = array();
                for ($i = 0; $i < count($from_serial_no); $i++) {
                    $serial_no_range = range($from_serial_no[$i], $to_serial_no[$i]);
                    foreach ($serial_no_range as $serial_no) {
                        if (in_array($serial_no, $generated_serial_no)) {
                            $valid_serial_no = false;
                            break;
                        }
                        $generated_serial_no[] = $serial_no;
                        $overlap_flag = 1;
                    }
                    if (!$valid_serial_no) {
                        break;
                    }
                }
            }


            if (!$valid_serial_no) {
                if ($overlap_flag) {
                    session()->put('failed', 'Serial Number: ' . $serial_no . ' found overalapped');
                } else {
                    session()->put('failed', 'Invalid Serial Number Detected');
                }
                return redirect('/inventory_executives/add_outward_installation');
            }
        }

        $inventory = new Inventory;
        // retrieve the values submitted for the from_serial_no and to_serial_no fields
        $from_serial_no_arr = implode(',', $req->input('from_serial_no'));
        $to_serial_no_arr = implode(',', $req->input('to_serial_no'));

        // split the comma-separated values of from_serial_no and to_serial_no into arrays
        $from_serial_no = explode(',', $from_serial_no_arr);
        $to_serial_no = explode(',', $to_serial_no_arr);
        // check if all to_serial_no values are greater than corresponding from_serial_no values
        //   test the serial number is present in the inventoru database or not

        // loop through the values of the $from_serial_no array to check whether the meter serial number was in the database or not
        if (count($from_serial_no) == 1 && count($to_serial_no) == 1 && $from_serial_no[0] == $to_serial_no[0]) {
            // $to_serial_no = $from_serial_no;

            $existingInventory = Inventory::where('serial_no', $from_serial_no[0])->first();
            if ($existingInventory == null) {
                session()->put('failed', 'Serial number not present in the Inventory database: ' . $from_serial_no[0]);
                return redirect('/inventory_executives/add_outward_installation');
                // $existing_inventory_flag =0;
            }
        } else {
            for ($i = 0; $i < count($req->input('from_serial_no')); $i++) {
                // concatenate the values from both arrays with a hyphen -
                $serial_no = $from_serial_no[$i] . '-' . $to_serial_no[$i];
                for ($j = $from_serial_no[$i]; $j <=  $to_serial_no[$i]; $j++) {
                    $existingInventory = Inventory::where('serial_no', $j)->first();
                    if ($existingInventory == null) {
                        session()->put('failed', 'Serial number not present in the Inventory database: ' . $j);
                        return redirect('/inventory_executives/add_outward_installation');
                        // $existing_inventory_flag =0;
                    }
                }
            }
        }

        if (count($from_serial_no) == 1 && count($to_serial_no) == 1 && $from_serial_no[0] == $to_serial_no[0]) {



            $existingInventory = Inventory::where('status', 0)->where('serial_no', $from_serial_no[0])->first();
            if ($existingInventory == null) {
                session()->put('failed', 'Serial number already alloted: ' . $from_serial_no[0]);
                return redirect('/inventory_executives/add_outward_installation');
                // $existing_inventory_flag =0;
            }
        } else {
            // loop through the values of the $from_serial_no array to check if the meter has already been used or not
            for ($i = 0; $i < count($req->input('from_serial_no')); $i++) {
                // dd('jer0');
                // concatenate the values from both arrays with a hyphen -
                $serial_no = $from_serial_no[$i] . '-' . $to_serial_no[$i];
                for ($j = $from_serial_no[$i]; $j <=  $to_serial_no[$i]; $j++) {
                    $existingInventory = Inventory::where('status', 0)->where('serial_no', $j)->first();
                    if ($existingInventory == null) {
                        session()->put('failed', 'Serial number already alloted: ' . $j);
                        return redirect('/inventory_executives/add_outward_installation');
                        // $existing_inventory_flag =0;
                    }
                }
            }
        }

        for ($i = 0; $i < count($req->input('from_serial_no')); $i++) {
            $contractor_inventory = new Contractor_inventory;
            // concatenate the values from both arrays with a hyphen -
            $serial_no = $from_serial_no[$i] . '-' . $to_serial_no[$i];

            // set the values of the meter_type, division, serial_no, lot_no, and created_by fields of the $warehouse_meter object to the values submitted from the form
            $contractor_inventory->meter_type = $req->meter_type;
            $contractor_inventory->division = $req->division;
            $contractor_inventory->serial_no = $serial_no;
            $contractor_inventory->contractor_id = $req->contractor_id;
            $contractor_inventory->dc_no = $req->dc_no;
            $contractor_inventory->created_by = session()->get('rexkod_vishvin_auth_userid');

            // store the $warehouse_meter object in the database
            $contractor_inventory->save();

            for ($j = $from_serial_no[$i]; $j <=  $to_serial_no[$i]; $j++) {
                $inventory = new Inventory;
                $inventory = Inventory::where('serial_no', $j)->first();
                $inventory->status = '1';
                $inventory->appointed_to = $req->contractor_id;
                // $inventory->appointed_to = $j;
                $inventory->save();
            }
        }

        session()->put('success', 'Outward Installation data added successfully');

        // $user = Admin::where('user_name', $req->user_email)->first();

        // $req->session()->put('user',$user);

        return redirect('/inventory_executives/add_outward_installation');
    }
    function create_outward_mrt(Request $req)
    {

        $outward_mrt = new Outward_mrt;
        $outward_mrt->lot_no = $req->lot_no;
        $outward_mrt->meter_type = $req->meter_type;
        $outward_mrt->start_date = $req->start_date;
        $outward_mrt->dc_no = $req->dc_no;
        $outward_mrt->dc_date = $req->dc_date;
        $outward_mrt->box_no = $req->box_no;
        $outward_mrt->from_serial_no = $req->from_serial_no;
        $outward_mrt->to_serial_no = $req->to_serial_no;


        $outward_mrt->created_by = session()->get('rexkod_vishvin_auth_userid');
        $outward_mrt->save();
        session()->put('success', 'Outward Installation data added successfully');

        // $user = Admin::where('user_name', $req->user_email)->first();

        // $req->session()->put('user',$user);

        return redirect('/inventory_executives/add_outward_mrt');
    }
    function create_outward_released_em_meter(Request $req)
    {
        // dd($req->serial_no);
        $existingInventory = Inward_released_em_meter::where('serial_no', $req->serial_no)->first();
        if ($existingInventory == null) {
            session()->put('failed', 'Serial number found unknown in database: ' . $req->serial_no);
            return redirect('/inventory_executives/add_outward_released_em_meter');
        }
        $existingInventory_status = Inward_released_em_meter::where('serial_no', $req->serial_no)->where('status', 0)->first();
        if ($existingInventory_status == null) {
            session()->put('failed', 'Serial number already discharged: ' . $req->serial_no);
            return redirect('/inventory_executives/add_outward_released_em_meter');
        }

        $outward_em_meter = Inward_released_em_meter::where('serial_no', $req->serial_no)->first();


        $outward_em_meter->division = $req->division;
        $outward_em_meter->dc_no = $req->dc_no;
        $outward_em_meter->status = 1;




        $outward_em_meter->discharged_by = session()->get('rexkod_vishvin_auth_userid');
        $outward_em_meter->discharged_at = now();
        $outward_em_meter->save();

        session()->put('success', 'EM Meter Released Successfully');
        return redirect('/inventory_executives/add_outward_released_em_meter');
    }
    public function view_inward_genus()
    {
        $datas = Inward_genus::all();
        return view('inventory_executives.view_inward_genus', compact('datas'));
    }
    public function view_inward_mrt_rejected()
    {
        $datas = Inward_mrt_reject::all();

        return view('inventory_executives.view_inward_mrt_rejected', compact('datas'));
    }
    public function view_inward_released_em_meter()
    {
        $datas = Inward_released_em_meter::all();
        return view('inventory_executives.view_inward_released_em_meter', compact('datas'));
    }
    public function add_meter_sl_number_wise($id)
    {
        $warehouse_meters =  DB::table('warehouse_meters')->where('lot_no',$id)->where('created_by', session()->get('rexkod_vishvin_auth_userid'))
            ->get();

            $box_details = Warehouse_meter::where('lot_no',$id)->get();
            $meter_count =0;
            foreach ($box_details as $box) {
                $meter_added = explode(',',$box->meter_serial_no);
                $meter_count += count($meter_added);

            }
        $data = [
            'warehouse_meters' => $warehouse_meters,
            'lot_no'=>$id,
            'meter_count'=>$meter_count,
        ];
        return view('inventory_executives.add_meter_sl_number_wise', compact('data'));
    }
    public function view_outward_mrt()
    {
        $datas = Outward_mrt::all();

        return view('inventory_executives.view_outward_mrt', compact('datas'));
    }
    public function view_outward_installation()
    {
        $datas = Outward_installation::all();
        return view('inventory_executives.view_outward_installation', compact('datas'));
    }
    public function view_outward_released_em_meter()
    {
        $datas = Outward_released_em_meter::all();
        return view('inventory_executives.view_outward_released_em_meter', compact('datas'));
    }

    function create_annexure1(Request $req)
    {
        $start_date = $req->start_date;
        $end_date = $req->end_date;
        $sd_code = $req->sd_pincode;
        $so_code = $req->so_pincode;
        $start_timestamp = strtotime($start_date . ' 00:00:00 UTC');
        $end_timestamp = strtotime($end_date . ' 23:59:59 UTC');
        // dd($start_timestamp, $end_timestamp);
        // dd($sd_code, $so_code);
        $results = DB::table('meter_mains')
            ->join('consumer_details', function ($join) use ($sd_code, $so_code) {
                $join->on('meter_mains.account_id', '=', 'consumer_details.account_id')
                    ->where('consumer_details.sd_pincode', '=', $sd_code)
                    ->where('consumer_details.so_pincode', '=', $so_code);
            })
            ->where('meter_mains.aao_updated_at', '>=', date('Y-m-d H:i:s', $start_timestamp))
            ->where('meter_mains.aao_updated_at', '<=', date('Y-m-d H:i:s', $end_timestamp))
            ->select('meter_mains.*')
            ->get();
        // $count_of_reports = count($results);
        // dd($count_of_reports);
        $annexure_1 = new Annexure_1;


        // just for the emergency, i am storing all the account_id coming from the above query. because the client will be confused which meters reading are stored.
        $account_ids = '';
        foreach ($results as $result) {
            $account_ids .= $result->account_id . ',';
        }

        // Remove the last comma from the string
        $account_ids = rtrim($account_ids, ',');



        $annexure_1->start_date = $req->start_date;
        $annexure_1->end_date = $req->end_date;
        $annexure_1->circle = $req->circle;
        $annexure_1->division = $req->division;
        $annexure_1->sd_pincode = $req->sd_pincode;
        $annexure_1->so_pincode = $req->so_pincode;
        $annexure_1->account_id = $account_ids;

        $annexure_1->target_to_achieve = $req->target_to_achieve;
        $annexure_1->actual_completed =  count($results);


        $annexure_1->created_by = session()->get('rexkod_vishvin_auth_userid');


        $annexure_1->save();
        return back()->with('message', 'Successfullly submitted');
        session()->put('success', 'Annexure1 added successfully');

        // $user = Admin::where('user_name', $req->user_email)->first();

        // $req->session()->put('user',$user);

        return redirect('/inventory_reporters/annexure1');
    }
    function create_annexure3(Request $req)
    {
        $start_date = $req->start_date;
        $end_date = $req->end_date;
        $sd_code = $req->sd_pincode;
        $so_code = $req->so_pincode;
        $start_timestamp = strtotime($start_date . ' 00:00:00 UTC');
        $end_timestamp = strtotime($end_date . ' 23:59:59 UTC');
        // dd($sd_code, $so_code);
        $results = DB::table('meter_mains')
            ->join('consumer_details', function ($join) use ($sd_code, $so_code) {
                $join->on('meter_mains.account_id', '=', 'consumer_details.account_id')
                    ->where('consumer_details.sd_pincode', '=', $sd_code)
                    ->where('consumer_details.so_pincode', '=', $so_code);
            })
            ->where('meter_mains.aao_updated_at', '>=', date('Y-m-d H:i:s', $start_timestamp))
            ->where('meter_mains.aao_updated_at', '<=', date('Y-m-d H:i:s', $end_timestamp))
            ->select('meter_mains.*')
            ->get();
        // just for the emergency, i am storing all the account_id coming from the above query. because the client will be confused which meters reading are stored.
        $account_ids = '';
        foreach ($results as $result) {
            $account_ids .= $result->account_id . ',';
        }

        // Remove the last comma from the string
        $account_ids = rtrim($account_ids, ',');

        // dd($start_date,$end_date,$account_ids);

        $annexure_3 = new Annexure_3;
        $annexure_3->start_date = $req->start_date;
        $annexure_3->end_date = $req->end_date;

        $annexure_3->circle = $req->circle;
        $annexure_3->division = $req->division;
        $annexure_3->sd_pincode = $req->sd_pincode;
        $annexure_3->so_pincode = $req->so_pincode;
        $annexure_3->no_of_es_meter_released = count($results);
        $annexure_3->no_of_es_meter_replaced = count($results);
        $annexure_3->account_id = $account_ids;
        $annexure_3->remarks = $req->remarks;

        $annexure_3->created_by = session()->get('rexkod_vishvin_auth_userid');
        $annexure_3->save();
        return back()->with('message', 'Successfullly submitted');
        session()->put('success', 'Annexure3 added successfully');

        // $user = Admin::where('user_name', $req->user_email)->first();

        // $req->session()->put('user',$user);

        return redirect('/inventory_reporters/annexure3');
    }

    public function indent_form_view($lot_no)
    {
        // $warehouse_meter= new Warehouse_meter();
        // $warehouse_meter->update();
        $box_details = Warehouse_meter::where('lot_no',$lot_no)->get();
        $meter_count =0;
        foreach ($box_details as $box) {
            # code...
            // $box->complete_status =1;
            // $box->save();
            $meter_added = explode(',',$box->meter_serial_no);
            $meter_count += count($meter_added);

        }


        $lot_detail = Lot_detail::where('id',$lot_no)->first();
        $lot_detail->complete_status =1;
            $lot_detail->save();
        $so_pincode = DB::table('zone_codes')
            ->select('so_code','section_office')
            ->where('div_code', $lot_detail->division)
            ->get();
            // dd($so_pincode);
            $data=[
                'lot_no' => $lot_no,
                'so_code' =>$so_pincode,
                'meter_count' => $meter_count,
            ];
        return view('inventory_executives.indent_form',['data' => $data]);
    }
    public function indent_form(Request $req,$lot_no)
    {

        $box_details = Warehouse_meter::where('lot_no',$lot_no)->get();
        $meter_count =0;
        foreach ($box_details as $box) {
            # code...
            $box->complete_status =1;
            $box->save();
            $meter_added = explode(',',$box->meter_serial_no);
            $meter_count += count($meter_added);

        }


        $indent =new Indent();
        // $indent->box_id =$box_id;
        $indent->lot_no =$lot_no;

        $count =0;
        $meter_qty_arr =[];
        $so_code_arr = [];
        foreach ($req->meter_quantity as $meter_quantity) {
            # code...
            if(!empty($meter_quantity)){
                $meter_qty_arr[] = $meter_quantity;
                // dd(explode(',',$req->section_code[$count]));

                $so_code_single = explode(',',$req->section_code[$count]);
                $so_code_arr[]= $so_code_single[0];

            }
            $count++;
        }
        // dd($so_code_arr);
        $so_code = implode(',',$so_code_arr);
        $meter_quantity = implode(',',$meter_qty_arr);
        $indent->so_code=$so_code;
        $indent->meter_quantity=$meter_quantity;
        $indent->save();

        session()->put('success', 'Indent Form Uploaded Successfully');
        return redirect('/inventory_executives/add_lot');
    }

    public function meter_stocks()
    {
        # code...
        $divisions = DB::table('warehouse_meters')->select('division')->distinct()->get();
        $so_pincodes = DB::table('zone_codes')->get();
        // dd($divisions);
        $data =[
            'so_pincodes' => $so_pincodes,
            'divisions' => $divisions,
        ];
        return view('inventory_executives.meter_stocks',['data' => $data]);
    }
    public function meter_stocks_filter(Request $req)
    {
        # code...
        $divisions = DB::table('warehouse_meters')->select('division')->distinct()->get();
        $meter_stocks = Indent::get();
        // $so_pincodes = DB::table('zone_codes')
        //     ->select('so_code')
        //     ->where('div_code', $req->division)
        //     ->get();


        $meter_count =0;
            foreach ($meter_stocks as $meter_stock) {
                # code...
                $so_code = explode(',',$meter_stock->so_code);
                // if(in_array($req->so_code,$so_code)){
                //     $meter_quantity =explode(',',$meter_stock->meter_quantity)
                //     $meter_count = $meter_count + $meter_stock->
                // }
                $count=0;
                foreach ($so_code as $code) {
                    if($code == $req->so_code){
                        $meter_quantity =explode(',',$meter_stock->meter_quantity);
                        $meter_count = $meter_count + $meter_quantity[$count];
                    }
                    $count++;
                }

            }

        // dd($meter_count);
        $so_pincodes = DB::table('zone_codes')->get();
        // dd($divisions);
        $data =[
            'so_pincodes' => $so_pincodes,
            'selected_code' =>$req->so_code,
            'quantity' => $meter_count,
            'divisions' => $divisions,
        ];
        return view('inventory_executives.meter_stocks',['data' => $data]);
    }
    public function get_so_code($division)
    {
        # code...
        $so_pincode = DB::table('zone_codes')
            ->select('so_code')
            ->where('div_code', $division)
            ->get();

        return response()->json($so_pincode);
    }
    public function get_box($division)
    {
        # code...
        // $warehouse_meters = Warehouse_meter::where('division',$division)->get();
        $warehouse_meters = DB::table('warehouse_meters')
            // ->select('so_code')
            ->where('division', $division)
            ->where('complete_status', 1)
            ->get();
        return response()->json($warehouse_meters);
    }


    public function deleteMeterFromBox(Request $request)
    {
        $selectedRows = $request->input('selectedRows');
        $selectedRowsArray = [];
        $id = $request->metersid;

        foreach ($selectedRows as $index => $selectedRow) {
            $selectedRowsArray[$index] = $selectedRow;
        }

        $result = DB::table('warehouse_meters')->where('id', $id)->get();
        foreach ($result as $key) {
            $meters = ($key->meter_serial_no);
        }
        $metersarr = explode(',', $meters);

        $dele = array_diff($metersarr, $selectedRowsArray);

        $str = implode(",", $dele);

        DB::table('warehouse_meters')->where('id', $id)->update(['meter_serial_no' => $str , 'unused_meter_serial_no' => $str]);
        Session::flash('success', 'Meters deleted successfully.');

        // Redirect back to the same page
        return redirect()->back();
    }

    public function reports(Request $req)
    {
        $meter_stocks = Warehouse_meter::where('complete_status', 1)->get();

        $total_meter_quantity = 0;
            foreach ($meter_stocks as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->meter_serial_no);
                $total_meter_quantity += count($break_single_meter);
            }
    if ($req->format === 'weekly') {
        # code...
        $dateSevenDaysAgo = Carbon::now()->subDays(7);
        $start_date = $dateSevenDaysAgo->format('Y-m-d');

        $ware_house_meter_stock = Warehouse_meter::where('complete_status', 1)->where('created_at', '>=', $start_date)->get();
        $contractor_inventories = Contractor_inventory::get();

        // --------to get the total meter date wise
        $ware_house_meter_stock_till_date = Warehouse_meter::where('complete_status', 1)
        ->where('created_at', '<', $start_date)
        ->get();
// dd($ware_house_meter_stock_till_date);


$total_meter_quantity_till_date = 0;
foreach ($ware_house_meter_stock_till_date as $meter_stock) {
    $break_single_meter = explode(',', $meter_stock->meter_serial_no);
    $total_meter_quantity_till_date += count($break_single_meter);
}
$total_meter_stock = [];
$i=0;
foreach ($ware_house_meter_stock as $meter_stock) {
    $break_single_meter = explode(',', $meter_stock->meter_serial_no);
    $total_meter_quantity_till_date += count($break_single_meter);
    $total_meter_stock[$i] = $total_meter_quantity_till_date;
    $i++;
}

// to get the total stock after each outward
$total_meter_stock_till_date = $total_meter_quantity;

$total_meter_stock_outward = [];
$j=0;
foreach ($contractor_inventories as $meter_stock) {
    $break_single_meter = explode(',', $meter_stock->used_meter_serial_no);
    $total_meter_stock_till_date -= count($break_single_meter);
    $total_meter_stock_outward[$j] = $total_meter_stock_till_date;
    $j++;
}

        $data = [
            'ware_house_meter_stock' => $ware_house_meter_stock,
            'contractor_inventories' => $contractor_inventories,
            'total_meter_quantity' => $total_meter_quantity,
            'total_meter_stock' => $total_meter_stock,
            'total_meter_stock_outward' => $total_meter_stock_outward,


        ];
    } elseif($req->format === 'monthly') {
        # code...
        $today = Carbon::now();
        $dateSevenDaysAgo = Carbon::now()->subDays(30);
        $start_date = $dateSevenDaysAgo->format('Y-m-d');
        $end_date = $today->format('Y-m-d');
        $ware_house_meter_stock = Warehouse_meter::where('complete_status', 1)->where('created_at', '>=', $start_date)->get();
        $contractor_inventories = Contractor_inventory::get();

        // --------to get the total meter date wise
        $ware_house_meter_stock_till_date = Warehouse_meter::where('complete_status', 1)
        ->where('created_at', '<', $start_date)
        ->get();
// dd($ware_house_meter_stock_till_date);


$total_meter_quantity_till_date = 0;
foreach ($ware_house_meter_stock_till_date as $meter_stock) {
    $break_single_meter = explode(',', $meter_stock->meter_serial_no);
    $total_meter_quantity_till_date += count($break_single_meter);
}
$total_meter_stock = [];
$i=0;
foreach ($ware_house_meter_stock as $meter_stock) {
    $break_single_meter = explode(',', $meter_stock->meter_serial_no);
    $total_meter_quantity_till_date += count($break_single_meter);
    $total_meter_stock[$i] = $total_meter_quantity_till_date;
    $i++;
}

// to get the total stock after each outward
$total_meter_stock_till_date = $total_meter_quantity;

$total_meter_stock_outward = [];
$j=0;
foreach ($contractor_inventories as $meter_stock) {
    $break_single_meter = explode(',', $meter_stock->used_meter_serial_no);
    $total_meter_stock_till_date -= count($break_single_meter);
    $total_meter_stock_outward[$j] = $total_meter_stock_till_date;
    $j++;
}

        $data = [
            'ware_house_meter_stock' => $ware_house_meter_stock,
            'contractor_inventories' => $contractor_inventories,
            'total_meter_quantity' => $total_meter_quantity,
            'total_meter_stock' => $total_meter_stock,
            'total_meter_stock_outward' => $total_meter_stock_outward,


        ];
    } else {
        if ($req->get('start_date') !== null) {
            $start_date = $req->get('start_date');
            $end_date = $req->get('end_date');
            $ware_house_meter_stock = Warehouse_meter::where('complete_status', 1)
                    ->where('created_at', '>=', $start_date)
                  ->where('created_at', '<=', $end_date)
                    ->get();

            // --------to get the total meter date wise
            $ware_house_meter_stock_till_date = Warehouse_meter::where('complete_status', 1)
                    ->where('created_at', '<', $start_date)
                    ->get();
            // dd($ware_house_meter_stock_till_date);


            $total_meter_quantity_till_date = 0;
            foreach ($ware_house_meter_stock_till_date as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->meter_serial_no);
                $total_meter_quantity_till_date += count($break_single_meter);
            }
            $total_meter_stock = [];
            $i=0;
            foreach ($ware_house_meter_stock as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->meter_serial_no);
                $total_meter_quantity_till_date += count($break_single_meter);
                $total_meter_stock[$i] = $total_meter_quantity_till_date;
                $i++;
            }
            // dd($total_meter_stock);
            $contractor_inventories = Contractor_inventory::get();

            // to get the total stock after each outward
            $total_meter_stock_till_date = $total_meter_quantity;

            $total_meter_stock_outward = [];
            $j=0;
            foreach ($contractor_inventories as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->used_meter_serial_no);
                $total_meter_stock_till_date -= count($break_single_meter);
                $total_meter_stock_outward[$j] = $total_meter_stock_till_date;
                $j++;
            }

            $data = [
                'ware_house_meter_stock' => $ware_house_meter_stock,
                    'contractor_inventories' => $contractor_inventories,
                    'total_meter_quantity' => $total_meter_quantity,
                'total_meter_stock' => $total_meter_stock,
                'total_meter_stock_outward' => $total_meter_stock_outward,

            ];
        } else {
            $ware_house_meter_stock = Warehouse_meter::where('complete_status', 1)->get();
            $contractor_inventories = Contractor_inventory::get();

            // to get the total meter date wise
            $total_meter_quantity_till_date = 0;
            $total_meter_stock = [];
            $i=0;
            foreach ($ware_house_meter_stock as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->meter_serial_no);
                $total_meter_quantity_till_date += count($break_single_meter);
                $total_meter_stock[$i] = $total_meter_quantity_till_date;
                $i++;
            }

            // to get the total stock after each outward
            $total_meter_stock_till_date = $total_meter_quantity;

            $total_meter_stock_outward = [];
            $j=0;
            foreach ($contractor_inventories as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->used_meter_serial_no);
                $total_meter_stock_till_date -= count($break_single_meter);
                $total_meter_stock_outward[$j] = $total_meter_stock_till_date;
                $j++;
            }
            $data = [
                'ware_house_meter_stock' => $ware_house_meter_stock,
                'contractor_inventories' => $contractor_inventories,
                'total_meter_quantity' => $total_meter_quantity,
                'total_meter_stock' => $total_meter_stock,
                'total_meter_stock_outward' => $total_meter_stock_outward,

            ];
        }
    }

        return view('inventories.reports',['data' => $data]);
    }
    public function filter_outward_reports(Request $req){
        $meter_stocks = Warehouse_meter::where('complete_status', 1)->get();

        $total_meter_quantity = 0;
            foreach ($meter_stocks as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->meter_serial_no);
                $total_meter_quantity += count($break_single_meter);
            }

        if ($req->format === 'weekly') {
            # code...
            $dateSevenDaysAgo = Carbon::now()->subDays(7);
            $start_date = $dateSevenDaysAgo->format('Y-m-d');

            $ware_house_meter_stock = Warehouse_meter::where('complete_status', 1)->get();
            $contractor_inventories = Contractor_inventory::where('created_at', '>=', $start_date)->get();


            // to get the total meter date wise
            $total_meter_quantity_till_date = 0;
            $total_meter_stock = [];
            $i=0;
            foreach ($ware_house_meter_stock as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->meter_serial_no);
                $total_meter_quantity_till_date += count($break_single_meter);
                $total_meter_stock[$i] = $total_meter_quantity_till_date;
                $i++;
            }

             // to get the total stock after each outward
             $total_meter_stock_till_date = $total_meter_quantity;
             $ware_house_meter_stock_outward_till_date = Contractor_inventory::where('created_at', '<', $start_date)->get();
             foreach ($ware_house_meter_stock_outward_till_date as $meter_stock) {
                 $break_single_meter = explode(',', $meter_stock->serial_no);
                 $total_meter_stock_till_date -= count($break_single_meter);
             }
             $total_meter_stock_outward = [];
             $j=0;
             foreach ($contractor_inventories as $meter_stock) {
                 $break_single_meter = explode(',', $meter_stock->used_meter_serial_no);
                 $total_meter_stock_till_date -= count($break_single_meter);
                 $total_meter_stock_outward[$j] = $total_meter_stock_till_date;
                 $j++;
             }
            $data = [
                'ware_house_meter_stock' => $ware_house_meter_stock,
                'contractor_inventories' => $contractor_inventories,
            'total_meter_quantity' => $total_meter_quantity,
            'total_meter_stock' => $total_meter_stock,
            'total_meter_stock_outward' => $total_meter_stock_outward,

            ];
        } elseif($req->format === 'monthly') {
            # code...
            $today = Carbon::now();
            $dateSevenDaysAgo = Carbon::now()->subDays(30);
            $start_date = $dateSevenDaysAgo->format('Y-m-d');
            $end_date = $today->format('Y-m-d');
            $ware_house_meter_stock = Warehouse_meter::where('complete_status', 1)->get();
            $contractor_inventories = Contractor_inventory::where('created_at', '>=', $start_date)->get();


            // to get the total meter date wise
            $total_meter_quantity_till_date = 0;
            $total_meter_stock = [];
            $i=0;
            foreach ($ware_house_meter_stock as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->meter_serial_no);
                $total_meter_quantity_till_date += count($break_single_meter);
                $total_meter_stock[$i] = $total_meter_quantity_till_date;
                $i++;
            }

            // to get the total stock after each outward
            $total_meter_stock_till_date = $total_meter_quantity;
            $ware_house_meter_stock_outward_till_date = Contractor_inventory::where('created_at', '<', $start_date)->get();
            foreach ($ware_house_meter_stock_outward_till_date as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->serial_no);
                $total_meter_stock_till_date -= count($break_single_meter);
            }
            $total_meter_stock_outward = [];
            $j=0;
            foreach ($contractor_inventories as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->used_meter_serial_no);
                $total_meter_stock_till_date -= count($break_single_meter);
                $total_meter_stock_outward[$j] = $total_meter_stock_till_date;
                $j++;
            }


            $data = [
                'ware_house_meter_stock' => $ware_house_meter_stock,
                'contractor_inventories' => $contractor_inventories,
            'total_meter_quantity' => $total_meter_quantity,
            'total_meter_stock' => $total_meter_stock,
                    'total_meter_stock_outward' => $total_meter_stock_outward,


            ];
        } else {
            if ($req->get('start_date') !== null) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');
                $ware_house_meter_stock = Warehouse_meter::where('complete_status', 1)
                        ->get();
                $contractor_inventories = Contractor_inventory::where('created_at', '>=', $start_date)
                ->where('created_at', '<=', $end_date)
                  ->get();


                  // to get the total meter date wise
            $total_meter_quantity_till_date = 0;
            $total_meter_stock = [];
            $i=0;
            foreach ($ware_house_meter_stock as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->meter_serial_no);
                $total_meter_quantity_till_date += count($break_single_meter);
                $total_meter_stock[$i] = $total_meter_quantity_till_date;
                $i++;
            }

            // to get the total stock after each outward
            $total_meter_stock_till_date = $total_meter_quantity;
            $ware_house_meter_stock_outward_till_date = Contractor_inventory::where('created_at', '<', $start_date)->get();
            foreach ($ware_house_meter_stock_outward_till_date as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->serial_no);
                $total_meter_stock_till_date -= count($break_single_meter);
            }
            $total_meter_stock_outward = [];
            $j=0;
            foreach ($contractor_inventories as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->used_meter_serial_no);
                $total_meter_stock_till_date -= count($break_single_meter);
                $total_meter_stock_outward[$j] = $total_meter_stock_till_date;
                $j++;
            }
            // dd($total_meter_stock_outward);
                $data = [
                    'ware_house_meter_stock' => $ware_house_meter_stock,
                        'contractor_inventories' => $contractor_inventories,
            'total_meter_quantity' => $total_meter_quantity,
            'total_meter_stock' => $total_meter_stock,
                    'total_meter_stock_outward' => $total_meter_stock_outward,

                ];
            } else {
                $ware_house_meter_stock = Warehouse_meter::where('complete_status', 1)->get();
                $contractor_inventories = Contractor_inventory::get();

                // to get the total meter date wise
            $total_meter_quantity_till_date = 0;
            $total_meter_stock = [];
            $i=0;
            foreach ($ware_house_meter_stock as $meter_stock) {
                $break_single_meter = explode(',', $meter_stock->meter_serial_no);
                $total_meter_quantity_till_date += count($break_single_meter);
                $total_meter_stock[$i] = $total_meter_quantity_till_date;
                $i++;
            }
                $data = [
                    'ware_house_meter_stock' => $ware_house_meter_stock,
                    'contractor_inventories' => $contractor_inventories,
            'total_meter_quantity' => $total_meter_quantity,
            'total_meter_stock' => $total_meter_stock,


                ];
            }
        }

            return view('inventories.reports',['data' => $data]);
    }

    public function upload_meter(Request $req, $lot_no){

        $lot_details = Lot_detail::where('id',$lot_no)->first();


        // $warehouse_meter = new Warehouse_meter;
        // $warehouse_meter->meter_type = $lot_details->meter_type;
        // $warehouse_meter->division = $lot_details->division;
        // $warehouse_meter->lot_no = $lot_no;

        // $warehouse_meter->created_by = session()->get('rexkod_vishvin_auth_userid');
        // $warehouse_meter->save();
        // $last_id_added = $warehouse_meter->id;

        // ----
        set_time_limit(7200);

        // $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

        // if (!empty($req->file('upload')) && $csvMimes) {


        //     if (is_uploaded_file($req->file('upload'))) {


        //         $csvFile = fopen($req->file('upload'), 'r');

        //         fgetcsv($csvFile);

        //         while (($line = fgetcsv($csvFile)) !== false) {
        //             for ($i = 0; $i < 1; $i++) {
        //                 if (str_contains($line[$i], 'script')) {
        //                     session()->flush();
        //                     return redirect('login');
        //                 }
        //             }

        //             $box_no = $line[0];






        //                 $consumer->tariff = $line[1];



        //                 $consumer->save();

        //         }
        //         fclose($csvFile);
        //     }
        // }

        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

if (!empty($req->file('upload')) && $csvMimes) {
    if (is_uploaded_file($req->file('upload'))) {
        $csvFile = fopen($req->file('upload'), 'r');
        fgetcsv($csvFile);

        $previousBoxNo = '';
        $meter_sl_no = '';

        while (($line = fgetcsv($csvFile)) !== false) {
            $boxNo = $line[0];
            $meter = $line[1];

            if ($previousBoxNo !== $boxNo) {
                // Store previous box's meter data if it exists
                if ($previousBoxNo !== '') {

                    $warehouse_meter = new Warehouse_meter;
                    $warehouse_meter->meter_type = $lot_details->meter_type;
                    $warehouse_meter->division = $lot_details->division;
                    $warehouse_meter->lot_no = $lot_no;

                    $warehouse_meter->created_by = session()->get('rexkod_vishvin_auth_userid');

                    // $warehouse_meter->box_id = $previousBoxNo;
                    $warehouse_meter->meter_serial_no = $meter_sl_no;
                    $warehouse_meter->unused_meter_serial_no = $meter_sl_no;

                    $warehouse_meter->save();

                }

                // Reset the meter data for the new box
                $meter_sl_no = $meter;
                $previousBoxNo = $boxNo;
            } else {
                // Append meter to the existing meter data for the same box
                $meter_sl_no .= ',' . $meter;
            }
        }

        // Store the last box's meter data
        if ($previousBoxNo !== '') {

            $warehouse_meter = new Warehouse_meter;
            $warehouse_meter->meter_type = $lot_details->meter_type;
            $warehouse_meter->division = $lot_details->division;
            $warehouse_meter->lot_no = $lot_no;

            $warehouse_meter->created_by = session()->get('rexkod_vishvin_auth_userid');

            $warehouse_meter->meter_serial_no = $meter_sl_no;
            $warehouse_meter->unused_meter_serial_no = $meter_sl_no;

            $warehouse_meter->save();
        }

        fclose($csvFile);
    }
}

        session()->put('success', 'Bulk Upload Successfull');

        return redirect('/inventory_executives/add_meter_sl_number_wise/'.$lot_no);

    }
}
