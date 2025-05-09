<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Admin;
// use Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Meter_main;
use App\Models\Consumer_detail;
use App\Models\Warehouse_meter;
use App\Models\Annexure_1;
use App\Models\Annexure_3;
use App\Models\Inward_released_em_meter;
use App\Models\Outward_released_em_meter;
use App\Models\Contractor_inventory;
use Illuminate\Support\Facades\DB;
use App\Models\Zone_code;
use App\Models\Indent;
use App\Models\Successful_record;
use App\Models\Error_record;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// use RealRashid\SweetAlert\Facades\Alert;
// use Auth;
class AdminController extends Controller
{
    public function login()
    {
        // if(session('rexkod_vishvin_auth_userid') !== null){
        //     return view('admins.login');
        // }
        // else{
        //     return redirect('/');

        // }
        return view('admins.login');
    }

    public function index()
    {

        $project_head = Admin::where('type', 'project_head')->get();
        $project_head_count = count($project_head);
        $hescom_approved = Meter_main::where('aao_status', '1')->get();
        $hescom_approved_count = count($hescom_approved);
        $hescom_manager = Admin::where('type', 'hescom_manager')->where('created_by', session('rexkod_vishvin_auth_userid'))->get();
        $hescom_manager_count = count($hescom_manager);
        $inventory_manager = Admin::where('type', 'inventory_manager')->where('created_by', session('rexkod_vishvin_auth_userid'))->get();
        $inventory_manager_count = count($inventory_manager);
        $qc_manager = Admin::where('type', 'qc_manager')->where('created_by', session('rexkod_vishvin_auth_userid'))->get();
        $qc_manager_count = count($qc_manager);
        $contractor_manager = Admin::where('type', 'contractor_manager')->where('created_by', session('rexkod_vishvin_auth_userid'))->get();
        $contractor_manager_count = count($contractor_manager);
        $qc_executive = Admin::where('type', 'qc_executive')->where('created_by', session('rexkod_vishvin_auth_userid'))->get();
        $qc_executive_count = count($qc_executive);
        $ae = Admin::where('type', 'ae')->where('created_by', session('rexkod_vishvin_auth_userid'))->get();
        $ae_count = count($ae);
        $aee = Admin::where('type', 'aee')->where('created_by', session('rexkod_vishvin_auth_userid'))->get();
        $aee_count = count($aee);
        $aao = Admin::where('type', 'aao')->where('created_by', session('rexkod_vishvin_auth_userid'))->get();
        $aao_count = count($aao);
        $inventory_executive = Admin::where('type', 'inventory_executive')->where('created_by', session('rexkod_vishvin_auth_userid'))->get();
        $inventory_executive_count = count($inventory_executive);
        $inventory_reporter = Admin::where('type', 'inventory_reporter')->where('created_by', session('rexkod_vishvin_auth_userid'))->get();
        $inventory_reporter_count = count($inventory_reporter);
        // Meters count starts here(3 categories, total, project head wise, contractor wise)

        $es_total_meter_count = 0;
        $es_total_unused_meter_count = 0;
        $es_total_used_meter_count = 0;
        $em_total_inward_meter_count = 0;
        $em_total_outward_meter_count = 0;
        $total_rejected_meter_count = 0;
        $es_meter_total_warehouse_stock = Warehouse_meter::get();

        foreach ($es_meter_total_warehouse_stock as $es_meter) {
            // counting total meter count

            $single_box = $es_meter->meter_serial_no;
if ($single_box !== null && $single_box !== '') {
    // The above line is important,as the count becomes 1 still when the data is Null
    $break_single_meter = explode(',', $single_box);
    foreach ($break_single_meter as $es_meter_individual) {
        $es_total_meter_count++;
    }
}

            // counting unused meter count
            $single_box = $es_meter->unused_meter_serial_no;
if ($single_box !== null && $single_box !== '') {
    $break_single_meter = explode(',', $single_box);
    foreach ($break_single_meter as $es_meter_individual) {
        $es_total_unused_meter_count++;
    }
}
            // counting used meter count
            $single_box = $es_meter->used_meter_serial_no;
if ($single_box !== null && $single_box !== '') {
    $break_single_meter = explode(',', $single_box);
    foreach ($break_single_meter as $es_meter_individual) {
        $es_total_used_meter_count++;
    }
}
        }
        $em_meter_total_inward_stock = Inward_released_em_meter::get();
        $em_total_inward_meter_count = count($em_meter_total_inward_stock);
        $em_total_outward_meter_stock = Outward_released_em_meter::get();
        $em_total_outward_meter_count = count($em_total_outward_meter_stock);


        $es_meter_total_rejected = Meter_main::where('qc_status', 2)->orWhere('so_status', 2)->orWhere('aee_status', 2)->orWhere('aao_status', 2)->get();
        $total_rejected_meter_count = count($es_meter_total_rejected);

        // Count of meters project_head wise
        $es_total_meter_count_project_head_wise = 0;
        $es_total_unused_meter_count_project_head_wise = 0;
        $es_total_used_meter_count_project_head_wise = 0;
        $em_total_inward_meter_count_project_head_wise = 0;
        $em_total_outward_meter_count_project_head_wise = 0;
        $total_rejected_meter_count_project_head_wise = 0;

        $get_all_inventory_managers =  Admin::where('type', 'inventory_manager')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get();
        foreach ($get_all_inventory_managers as $inventory_manager) {
            $get_all_inventory_executives =  Admin::where('type', 'inventory_executive')->where('created_by', $inventory_manager->id)->get();
            foreach ($get_all_inventory_executives as $inventory_executive) {
                $es_meter_total_warehouse_stock = Warehouse_meter::where('created_by', $inventory_executive->id)->get();


foreach ($es_meter_total_warehouse_stock as $es_meter) {
    // counting total meter count
    $single_box = $es_meter->meter_serial_no;
    if ($single_box !== null && $single_box !== '') {
        $break_single_meter = explode(',', $single_box);
        foreach ($break_single_meter as $es_meter_individual) {
            $es_total_meter_count_project_head_wise++;
        }
    }
    // counting unused meter count
    $single_box = $es_meter->unused_meter_serial_no;
    if ($single_box !== null && $single_box !== '') {
        $break_single_meter = explode(',', $single_box);
        foreach ($break_single_meter as $es_meter_individual) {
            $es_total_unused_meter_count_project_head_wise++;
        }
    }
    // counting used meter count
    $single_box = $es_meter->used_meter_serial_no;
    if ($single_box !== null && $single_box !== '') {
        $break_single_meter = explode(',', $single_box);
        foreach ($break_single_meter as $es_meter_individual) {
            $es_total_used_meter_count_project_head_wise++;
        }
    }
}

                $em_meter_total_inward_stock = Inward_released_em_meter::where('created_by', $inventory_executive->id)->get();
                $em_total_inward_meter_count_project_head_wise = count($em_meter_total_inward_stock);
                $em_total_outward_meter_stock = Outward_released_em_meter::get();
                $em_total_outward_meter_count_project_head_wise = count($em_total_outward_meter_stock);

                $field_executives = Admin::where('type', 'field_executive')->where('created_by', $inventory_executive->id)->get();
                foreach ($field_executives as $field_executive) {
                    $es_meter_total_rejected = Meter_main::where('qc_status', 2)->orWhere('so_status', 2)->orWhere('aee_status', 2)->orWhere('aao_status', 2)->where('created_by', $field_executive->id)->get();
                    $total_rejected_meter_count_project_head_wise = count($es_meter_total_rejected);
                }
            }
        }
        // Count of meters inventory_manager wise

        $es_total_meter_count_inventory_manager_wise = 0;
        $es_total_unused_meter_count_inventory_manager_wise = 0;
        $es_total_used_meter_count_inventory_manager_wise = 0;
        $em_total_inward_meter_count_inventory_manager_wise = 0;
        $em_total_outward_meter_count_inventory_manager_wise = 0;
        $total_rejected_meter_count_inventory_manager_wise = 0;


        $get_all_inventory_executives =  Admin::where('type', 'inventory_executive')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get();
        foreach ($get_all_inventory_executives as $inventory_executive) {
            $es_meter_total_warehouse_stock = Warehouse_meter::where('created_by', $inventory_executive->id)->get();


            foreach ($es_meter_total_warehouse_stock as $es_meter) {
                // counting total meter count
                $single_box = $es_meter->meter_serial_no;
if ($single_box !== null && $single_box !== '') {
    $break_single_meter = explode(',', $single_box);
    foreach ($break_single_meter as $es_meter_individual) {
        $es_total_meter_count_inventory_manager_wise++;
    }
}
                // counting unused meter count
                $single_box = $es_meter->unused_meter_serial_no;
if ($single_box !== null && $single_box !== '') {
    $break_single_meter = explode(',', $single_box);
    foreach ($break_single_meter as $es_meter_individual) {
        $es_total_unused_meter_count_inventory_manager_wise++;
    }
}
                // counting used meter count
                $single_box = $es_meter->used_meter_serial_no;
if ($single_box !== null && $single_box !== '') {
    $break_single_meter = explode(',', $single_box);
    foreach ($break_single_meter as $es_meter_individual) {
        $es_total_used_meter_count_inventory_manager_wise++;
    }
}
            }

            $em_meter_total_inward_stock = Inward_released_em_meter::where('created_by', $inventory_executive->id)->get();
            $em_total_inward_meter_count_inventory_manager_wise = count($em_meter_total_inward_stock);
            $em_total_outward_meter_stock = Outward_released_em_meter::get();
            $em_total_outward_meter_count_inventory_manager_wise = count($em_total_outward_meter_stock);

            $field_executives = Admin::where('type', 'field_executive')->where('created_by', $inventory_executive->id)->get();
            foreach ($field_executives as $field_executive) {
                $es_meter_total_rejected = Meter_main::where('qc_status', 2)->orWhere('so_status', 2)->orWhere('aee_status', 2)->orWhere('aao_status', 2)->where('created_by', $field_executive->id)->get();
                $total_rejected_meter_count_inventory_manager_wise = count($es_meter_total_rejected);
            }
        }
        // Count of meters inventory_executive wise
        $es_total_meter_count_inventory_executive_wise = 0;
        $es_total_unused_meter_count_inventory_executive_wise = 0;
        $es_total_used_meter_count_inventory_executive_wise = 0;
        $em_total_inward_meter_count_inventory_executive_wise = 0;
        $em_total_outward_meter_count_inventory_executive_wise = 0;
        $total_rejected_meter_count_inventory_executive_wise = 0;



        $es_meter_total_warehouse_stock = Warehouse_meter::where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get();


        foreach ($es_meter_total_warehouse_stock as $es_meter) {
            // counting total meter count
            $single_box = $es_meter->meter_serial_no;

            $break_single_meter = explode(',', $single_box);
            foreach ($break_single_meter as $es_meter_individual) {
                $es_total_meter_count_inventory_executive_wise++;
            }
            // counting unused meter count
            $single_box = $es_meter->unused_meter_serial_no;
if ($single_box !== null && $single_box !== '') {
    $break_single_meter = explode(',', $single_box);
    foreach ($break_single_meter as $es_meter_individual) {
        $es_total_unused_meter_count_inventory_executive_wise++;
    }
}
            // counting used meter count
            $single_box = $es_meter->used_meter_serial_no;
if ($single_box !== null && $single_box !== '') {
    $break_single_meter = explode(',', $single_box);
    foreach ($break_single_meter as $es_meter_individual) {
        $es_total_used_meter_count_inventory_executive_wise++;
    }
}
        }


        $em_meter_total_inward_stock = Inward_released_em_meter::where('created_by', session()->get('rexkod_vishvin_auth_userid'))->where('status',0)->get();
        $em_total_inward_meter_count_inventory_executive_wise = count($em_meter_total_inward_stock);
        $em_total_outward_meter_stock = Inward_released_em_meter::where('status',1)->get();
        $em_total_outward_meter_count_inventory_executive_wise = count($em_total_outward_meter_stock);

        $field_executives = Admin::where('type', 'field_executive')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get();
        foreach ($field_executives as $field_executive) {
            $es_meter_total_rejected = Meter_main::where('qc_status', 2)->orWhere('so_status', 2)->orWhere('aee_status', 2)->orWhere('aao_status', 2)->where('created_by', $field_executive->id)->get();
            $total_rejected_meter_count_inventory_executive_wise = count($es_meter_total_rejected);
        }


        // Count of meters contractor wise
        $es_total_meter_count_contractor_wise = 0;
        $es_total_unused_meter_count_contractor_wise = 0;
        $es_total_used_meter_count_contractor_wise = 0;
        $em_total_inward_meter_count_contractor_wise = 0;
        $em_total_outward_meter_count_contractor_wise = 0;
        $total_rejected_meter_count_contractor_wise = 0;

        $es_meter_total_contractor_inventory_stock = Contractor_inventory::where('contractor_id', session()->get('rexkod_vishvin_auth_userid'))->get();


foreach ($es_meter_total_contractor_inventory_stock as $es_meter) {
    // counting total meter count
    $single_box = $es_meter->serial_no;
    if ($single_box !== null && $single_box !== '') {
        $break_single_meter = explode(',', $single_box);
        foreach ($break_single_meter as $es_meter_individual) {
            $es_total_meter_count_contractor_wise++;
        }
    }
    // counting unused meter count
    $single_box = $es_meter->unused_meter_serial_no;
    if ($single_box !== null && $single_box !== '') {
        $break_single_meter = explode(',', $single_box);
        foreach ($break_single_meter as $es_meter_individual) {
            $es_total_unused_meter_count_contractor_wise++;
        }
    }
    // counting used meter count
    $single_box = $es_meter->used_meter_serial_no;
    if ($single_box !== null && $single_box !== '') {
        $break_single_meter = explode(',', $single_box);
        foreach ($break_single_meter as $es_meter_individual) {
            $es_total_used_meter_count_contractor_wise++;
        }
    }
}

        $em_meter_total_inward_stock = Inward_released_em_meter::where('contractor_id', session()->get('rexkod_vishvin_auth_userid'))->where('status',0)->get();
        $em_total_inward_meter_count_contractor_wise = count($em_meter_total_inward_stock);
        $em_total_outward_meter_stock = Inward_released_em_meter::where('status',1)->get();
        $em_total_outward_meter_count_contractor_wise = count($em_total_outward_meter_stock);

        $field_executives = Admin::where('type', 'field_executive')->where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get();
        foreach ($field_executives as $field_executive) {
            $es_meter_total_rejected = Meter_main::where('qc_status', 2)->orWhere('so_status', 2)->orWhere('aee_status', 2)->orWhere('aao_status', 2)->where('created_by', $field_executive->id)->get();
            $total_rejected_meter_count_contractor_wise = count($es_meter_total_rejected);
        }

        $qc_meter_approved_count = 0;
        $ae_meter_approved_count = 0;
        $aao_meter_approved_count = 0;
        $aee_meter_approved_count = 0;
        $qc_meter_rejected_count = 0;
        $ae_meter_rejected_count = 0;
        $aee_meter_rejected_count = 0;
        $aao_meter_rejected_count = 0;
        $qc_meter_pending_count = 0;
        $ae_meter_pending_count = 0;
        $aee_meter_pending_count = 0;
        $aao_meter_pending_count = 0;

        $get_all_meter_main_data =  Meter_main::where('qc_status', '1')->where('so_status', '1')->where('aao_status', '1')->where('aee_status', '1')->get();
        $qc_meter_approved_count =  count(Meter_main::where('qc_status', '1')->where('qc_updated_by',session()->get('rexkod_vishvin_auth_userid'))->get());
        $ae_meter_approved_count =  count(Meter_main::where('so_status', '1')->where('so_updated_by',session()->get('rexkod_vishvin_auth_userid'))->get());
        $aee_meter_approved_count =  count(Meter_main::where('aee_status', '1')->where('aee_updated_by',session()->get('rexkod_vishvin_auth_userid'))->get());
        $aao_meter_approved_count =  count(Meter_main::where('aao_status', '1')->where('aao_updated_by',session()->get('rexkod_vishvin_auth_userid'))->get());



        $get_qc_rejected_main_meter =  Meter_main::where('qc_status', '2')->get();
        $get_ae_rejected_main_meter = Meter_main::where('so_status', '2')->get();
        $get_aee_rejected_main_meter =  Meter_main::where('aee_status', '2')->get();
        $get_aao_rejected_main_meter =  Meter_main::where('aao_status', '2')->get();


        $get_qc_pending_main_meter =  Meter_main::where('qc_status', '0')->whereNotNull('serial_no_new')->get();




        $get_ae_pending_main_meter = DB::table('meter_mains')
        ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
        ->join('admins', 'consumer_details.so_pincode', '=', 'admins.so_pincode')
        ->select('meter_mains.*')
        ->where('admins.id', session('rexkod_vishvin_auth_userid'))
        ->where('qc_status', '=', '1')
        ->where('so_status', '=', '0')
        ->orderBy('id', 'DESC')
        ->get();

        $get_aee_pending_main_meter = DB::table('meter_mains')
        ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
        ->join('admins', 'consumer_details.sd_pincode', '=', 'admins.sd_pincode')
        ->select('meter_mains.*')

        ->where('admins.id', session('rexkod_vishvin_auth_userid'))
        ->where('qc_status', '=', '1')
        ->where('so_status', '=', '1')
        ->where('aee_status', '=', '0')
        ->orderBy('id', 'DESC')
        ->get();

        $get_aao_pending_main_meter =DB::table('meter_mains')
        ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
        ->join('admins', 'consumer_details.sd_pincode', '=', 'admins.sd_pincode')
        ->select('meter_mains.*')
        ->where('qc_status', 1)->where('so_status', 1)->where('aee_status', 1)->where('aao_status', 0)->orderBy('id')->get();


        $qc_meter_rejected_count =  count($get_qc_rejected_main_meter);
        $ae_meter_rejected_count =  count($get_ae_rejected_main_meter);
        $aao_meter_rejected_count =  count($get_aao_rejected_main_meter);
        $aee_meter_rejected_count =  count($get_aee_rejected_main_meter);


        $qc_meter_pending_count =  count($get_qc_pending_main_meter);
        $ae_meter_pending_count =  count($get_ae_pending_main_meter);
        $aao_meter_pending_count =  count($get_aao_pending_main_meter);
        $aee_meter_pending_count =  count($get_aee_pending_main_meter);
        // dd($aee_meter_pending_count);





        // For annexure reporters
        $annexure_1_report = Annexure_1::where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get();
        $annexure_3_report = Annexure_3::where('created_by', session()->get('rexkod_vishvin_auth_userid'))->get();

        $count_of_annexure1 = count($annexure_1_report);
        $count_of_annexure3 = count($annexure_3_report);

        // -------
        $total_es_meter__stock = Warehouse_meter::get();

        $total_es_meter_stock =0;
        $total_es_meter_used= 0;
        foreach ($total_es_meter__stock as $es_meter) {
            // counting total meter count
            $single_box = $es_meter->meter_serial_no;

            $break_single_meter = explode(',', $single_box);
            foreach ($break_single_meter as $es_meter_individual) {
                $total_es_meter_stock++;
            }

            $single_box = $es_meter->used_meter_serial_no;
            if ($single_box !== null && $single_box !== '') {
                $break_single_meter = explode(',', $single_box);
                foreach ($break_single_meter as $es_meter_individual) {
                    $total_es_meter_used++;
                }
            }
        }

        // $admin = Admin::where('id',session('rexkod_vishvin_auth_userid'))->first();
        // $section_name = Zone_code::where('sd_code',$admin->sd_pincode)->get();
        // dd($admin);

        $get_aee_pending_meter_section_wise = DB::table('meter_mains')
        ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
        ->join('admins', 'consumer_details.sd_pincode', '=', 'admins.sd_pincode')
        // ->join('zone_codes', 'zone_codes.sd_code', '=', 'admins.sd_pincode')
        ->select('consumer_details.so_pincode',DB::raw('count(*) as count'))

        ->where('admins.id', session('rexkod_vishvin_auth_userid'))
        ->where('qc_status', '=', '1')
        ->where('so_status', '=', '1')
        ->where('aee_status', '=', '0')
        ->groupBy('consumer_details.so_pincode')
        ->get();
        $get_aee_approved_meter_section_wise = DB::table('meter_mains')
        ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
        ->join('admins', 'consumer_details.sd_pincode', '=', 'admins.sd_pincode')
        // ->join('zone_codes', 'zone_codes.sd_code', '=', 'admins.sd_pincode')
        ->select('consumer_details.so_pincode',DB::raw('count(*) as count'))

        ->where('admins.id', session('rexkod_vishvin_auth_userid'))
        ->where('qc_status', '=', '1')
        ->where('so_status', '=', '1')
        ->where('aee_status', '=', '1')
        ->groupBy('consumer_details.so_pincode')
        ->get();
        // dd($get_aee_pending_meter_section_wise);

        $contractor_inventories = Contractor_inventory::get();
        // dd($contractor_inventories);
        $contractor_inventories_by_id = Contractor_inventory::where('contractor_id',session('rexkod_vishvin_auth_userid'))->get();
    //     $distinct_division = $divisions = DB::table('contractor_inventories')
    //     ->select('division')
    //     ->distinct()
    //     ->get();
    //     $es_meter_stock_division_wise = [];
    //    $es_meter_used_division_wise =[];
    //     foreach ($distinct_division as $division) {
    //         $es_meter_stock_division_wise[$division->division] = 0;
    //     }
    //     foreach ($distinct_division as $division) {
    //         $es_meter_used_division_wise[$division->division] = 0;
    //     }
    //     // dd($es_meter_stock_division_wise);
    //         // counting total meter count
    //     foreach ($distinct_division as $division) {
    //         $count =0;
    //         foreach ($contractor_inventories as $es_meter) {
    //             # code...
    //             // $zone_code = Zone_code::where('div_code',$es_meter->division)->get();
    //             if($division->division == $es_meter->division){
    //                 $single_box = $es_meter->unused_meter_serial_no;

    //                 $break_single_meter = explode(',', $single_box);
    //                 foreach ($break_single_meter as $es_meter_individual) {
    //                     $es_meter_stock_division_wise[$division->division]++;
    //                 }
    //                 $single_box = $es_meter->used_meter_serial_no;

    //                 if ($single_box !== null && $single_box !== '') {
    //                     $break_single_meter = explode(',', $single_box);
    //                     foreach ($break_single_meter as $es_meter_individual) {
    //                         $es_meter_used_division_wise[$division->division]++;
    //                     }
    //                 }
    //             }
    //         }
    //         $count++;
    //     }
        // dd($es_meter_stock_division_wise);

        $get_field_executives = Admin::where('type', 'field_executive')->where('created_by',session('rexkod_vishvin_auth_userid'))->get();

        $get_qc_executives = Admin::where('type', 'qc_executive')->where('created_by',session('rexkod_vishvin_auth_userid'))->get();

        $get_all_field_executives = Admin::where('type', 'field_executive')->get();
        $get_all_qc_executives = Admin::where('type', 'qc_executive')->get();
        $get_all_ae = Admin::where('type', 'ae')->get();
        $get_all_aee = Admin::where('type', 'aee')->get();
        $get_all_aao = Admin::where('type', 'aao')->get();
        $get_all_sd_code = DB::table('zone_codes')
            ->select('sd_code','sub_division')
            ->distinct()
            ->get();

            $get_all_sd_code_for_belagavi = DB::table('zone_codes')
            ->select('sd_code','sub_division')
            ->where('package', 'BVU')
            ->distinct()
            ->get();
        $get_all_so_code = DB::table('zone_codes')
            ->select('so_code','section_office')
            ->distinct()
            ->get();

            $get_all_so_code_for_belagavi = DB::table('zone_codes')
            ->select('so_code','section_office')
            ->distinct()
            ->where('package', 'BVU')
            ->get();

            $indents = Indent::get();
            $meter_drawn_section_wise =0;
            $ae_detail =Admin::where('id',session('rexkod_vishvin_auth_userid'))->first();
            foreach ($indents as $meter_stock) {
                # code...
                $so_code = explode(',',$meter_stock->so_code);
                // if(in_array($req->so_code,$so_code)){
                //     $meter_quantity =explode(',',$meter_stock->meter_quantity)
                //     $meter_count = $meter_count + $meter_stock->
                // }
                $count=0;
                foreach ($so_code as $code) {
                    if($code == $ae_detail->so_pincode){
                        $meter_quantity =explode(',',$meter_stock->meter_quantity);
                        foreach($meter_quantity as $meter){
                            $meter_drawn_section_wise = $meter_drawn_section_wise + $meter;

                        }
                    }
                    $count++;
                }

            }
            // dd($meter_drawn_section_wise);


            $meter_replaced_section_wise = DB::table('meter_mains')
            ->join('consumer_details', 'meter_mains.account_id', '=', 'consumer_details.account_id')
            ->whereNotNull('meter_mains.serial_no_new')
            ->where('consumer_details.so_pincode', '=', $ae_detail->so_pincode)
            ->get();
            $meter_replaced_section_wise_count =count($meter_replaced_section_wise);

            // $success_records = Successful_record::get();
            // $error_records = Error_record::get();
            $get_total_error_record = DB::table('error_records')
                            ->join('consumer_details', 'error_records.account_id', '=', 'consumer_details.account_id')
                            ->join('admins', 'consumer_details.sd_pincode', '=', 'admins.sd_pincode')
                            ->where('admins.id', session('rexkod_vishvin_auth_userid'))
                            ->get();
            $get_total_error_record_count = count($get_total_error_record);
            $get_total_successful_record = DB::table('successful_records')
                            ->join('consumer_details', 'successful_records.account_id', '=', 'consumer_details.account_id')
                            ->join('admins', 'consumer_details.sd_pincode', '=', 'admins.sd_pincode')
                            ->where('admins.id', session('rexkod_vishvin_auth_userid'))
                            ->get();
            $get_total_successful_record_count = count($get_total_successful_record);
            $error_record_pending_for_aao = DB::table('error_records')
                            ->join('consumer_details', 'error_records.account_id', '=', 'consumer_details.account_id')
                            ->join('admins', 'consumer_details.sd_pincode', '=', 'admins.sd_pincode')
                            ->where('admins.id', session('rexkod_vishvin_auth_userid'))
                            ->where('error_records.updated_by_aao', 0)
                            ->get();
            $error_record_pending_for_aao_count = count($error_record_pending_for_aao);
            $error_updated_but_not_downloaded = DB::table('error_records')
                            ->join('consumer_details', 'error_records.account_id', '=', 'consumer_details.account_id')
                            ->join('meter_mains', 'error_records.account_id', '=', 'meter_mains.account_id')
                            ->join('admins', 'consumer_details.sd_pincode', '=', 'admins.sd_pincode')
                            ->where('admins.id', session('rexkod_vishvin_auth_userid'))
                            ->where('meter_mains.error_updated_by_aao','!=', 0)
                            ->get();
            $error_updated_but_not_downloaded_count = count($error_updated_but_not_downloaded);

            $get_total_error_record_bmr = DB::table('error_records')
                            ->get();
            $get_total_error_record_count_bmr = count($get_total_error_record_bmr);
            $get_total_successful_record_bmr = DB::table('successful_records')
                             ->get();
            $get_total_successful_record_count_bmr = count($get_total_successful_record_bmr);

            $ware_house_meter_stock = Warehouse_meter::where('complete_status',1)->get();

        $data = [
            'project_head_count' => $project_head_count,
            'hescom_approved_count' => $hescom_approved_count,
            'hescom_manager_count' => $hescom_manager_count,
            'inventory_manager_count' => $inventory_manager_count,
            'qc_manager_count' => $qc_manager_count,
            'qc_executive_count' => $qc_executive_count,
            'ae_count' => $ae_count,
            'aee_count' => $aee_count,
            'aao_count' => $aao_count,
            'inventory_executive_count' => $inventory_executive_count,
            'inventory_reporter_count' => $inventory_reporter_count,

            'es_total_meter_count' => $es_total_meter_count,
            'es_total_unused_meter_count' => $es_total_unused_meter_count,
            'es_total_used_meter_count' => $es_total_used_meter_count,
            'em_total_inward_meter_count' => $em_total_inward_meter_count,
            'em_total_outward_meter_count' => $em_total_outward_meter_count,
            'total_rejected_meter_count' => $total_rejected_meter_count,

            'es_total_meter_count_project_head_wise' => $es_total_meter_count_project_head_wise,
            'es_total_unused_meter_count_project_head_wise' => $es_total_unused_meter_count_project_head_wise,
            'es_total_used_meter_count_project_head_wise' => $es_total_used_meter_count_project_head_wise,
            'em_total_inward_meter_count_project_head_wise' => $em_total_inward_meter_count_project_head_wise,
            'em_total_outward_meter_count_project_head_wise' => $em_total_outward_meter_count_project_head_wise,
            'total_rejected_meter_count_project_head_wise' => $total_rejected_meter_count_project_head_wise,

            'es_total_meter_count_inventory_manager_wise' => $es_total_meter_count_inventory_manager_wise,
            'es_total_unused_meter_count_inventory_manager_wise' => $es_total_unused_meter_count_inventory_manager_wise,
            'es_total_used_meter_count_inventory_manager_wise' => $es_total_used_meter_count_inventory_manager_wise,
            'em_total_inward_meter_count_inventory_manager_wise' => $em_total_inward_meter_count_inventory_manager_wise,
            'em_total_outward_meter_count_inventory_manager_wise' => $em_total_outward_meter_count_inventory_manager_wise,
            'total_rejected_meter_count_inventory_manager_wise' => $total_rejected_meter_count_inventory_manager_wise,

            'es_total_meter_count_inventory_executive_wise' => $es_total_meter_count_inventory_executive_wise,
            'es_total_unused_meter_count_inventory_executive_wise' => $es_total_unused_meter_count_inventory_executive_wise,
            'es_total_used_meter_count_inventory_executive_wise' => $es_total_used_meter_count_inventory_executive_wise,
            'em_total_inward_meter_count_inventory_executive_wise' => $em_total_inward_meter_count_inventory_executive_wise,
            'em_total_outward_meter_count_inventory_executive_wise' => $em_total_outward_meter_count_inventory_executive_wise,
            'total_rejected_meter_count_inventory_executive_wise' => $total_rejected_meter_count_inventory_executive_wise,

            'es_total_meter_count_contractor_wise' => $es_total_meter_count_contractor_wise,
            'es_total_unused_meter_count_contractor_wise' => $es_total_unused_meter_count_contractor_wise,
            'es_total_used_meter_count_contractor_wise' => $es_total_used_meter_count_contractor_wise,
            'em_total_inward_meter_count_contractor_wise' => $em_total_inward_meter_count_contractor_wise,
            'em_total_outward_meter_count_contractor_wise' => $em_total_outward_meter_count_contractor_wise,
            'total_rejected_meter_count_contractor_wise' => $total_rejected_meter_count_contractor_wise,

            'qc_meter_approved_count' => $qc_meter_approved_count,
            'ae_meter_approved_count' => $ae_meter_approved_count,
            'aao_meter_approved_count' => $aao_meter_approved_count,
            'aee_meter_approved_count' => $aee_meter_approved_count,

            'qc_meter_rejected_count' => $qc_meter_rejected_count,
            'ae_meter_rejected_count' => $ae_meter_rejected_count,
            'aao_meter_rejected_count' => $aao_meter_rejected_count,
            'aee_meter_rejected_count' => $aee_meter_rejected_count,

            'qc_meter_pending_count' => $qc_meter_pending_count,
            'ae_meter_pending_count' => $ae_meter_pending_count,
            'aao_meter_pending_count' => $aao_meter_pending_count,
            'aee_meter_pending_count' => $aee_meter_pending_count,

            'count_of_annexure1' => $count_of_annexure1,
            'count_of_annexure3' => $count_of_annexure3,

            'total_es_meter_stock' => $total_es_meter_stock,
            'total_es_meter_used' => $total_es_meter_used,

            'get_aee_pending_meter_section_wise' => $get_aee_pending_meter_section_wise,
            'get_aee_approved_meter_section_wise' => $get_aee_approved_meter_section_wise,

            'contractor_inventories' => $contractor_inventories,
            'contractor_inventories_by_id' => $contractor_inventories_by_id,
            // 'es_meter_stock_division_wise' => $es_meter_stock_division_wise,
            // 'es_meter_used_division_wise' => $es_meter_used_division_wise,

            'get_field_executives' => $get_field_executives,
            'get_qc_executives' => $get_qc_executives,
            'get_all_field_executives' => $get_all_field_executives,
            'get_all_qc_executives' => $get_all_qc_executives,
            'get_all_ae' => $get_all_ae,
            'get_all_aee' => $get_all_aee,
            'get_all_aao' => $get_all_aao,
            'get_all_sd_code' => $get_all_sd_code,
            'get_all_so_code' => $get_all_so_code,
            'meter_drawn_section_wise' => $meter_drawn_section_wise,
            'meter_replaced_section_wise_count' => $meter_replaced_section_wise_count,
            'get_total_error_record_count' => $get_total_error_record_count,
            'get_total_successful_record_count' => $get_total_successful_record_count,
            'error_record_pending_for_aao_count' => $error_record_pending_for_aao_count,
            'error_updated_but_not_downloaded_count' => $error_updated_but_not_downloaded_count,
            'get_total_error_record_count_bmr' => $get_total_error_record_count_bmr,
            'get_total_successful_record_count_bmr' => $get_total_successful_record_count_bmr,

            'ware_house_meter_stock' => $ware_house_meter_stock,

            'get_all_so_code_for_belagavi' => $get_all_so_code_for_belagavi,
            'get_all_sd_code_for_belagavi' => $get_all_sd_code_for_belagavi,
        ];
        return view('admins.index', compact('data'));
    }


    public function approve_meter_stat_show(Request $req)
    {
        if ($req->format === 'weekly') {
            # code...
            $today = Carbon::now();
            $dateSevenDaysAgo = Carbon::now()->subDays(7);
            // dd($today);
            $start_date = $dateSevenDaysAgo->format('Y-m-d');
            $end_date = $today->format('Y-m-d');

            $approved_meters = Meter_main::where('aao_status', 1)->where('aao_updated_at', '>=', $start_date)->where('aao_updated_at', '<=', $end_date)->get();

                $data = [
                    'approved_meters' => $approved_meters,
                ];
        } else if($req->format === 'monthly'){
            # code...
            $today = Carbon::now();
            $dateSevenDaysAgo = Carbon::now()->subDays(30);

            $start_date = $dateSevenDaysAgo->format('Y-m-d');
            $end_date = $today->format('Y-m-d');
            $approved_meters = Meter_main::where('aao_status', 1)->where('aao_updated_at', '>=', $start_date)->where('aao_updated_at', '<=', $end_date)->get();


                $data = [
                    'approved_meters' => $approved_meters,
                ];
        }else{
            if ($req->get('start_date') !== NUll) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');
                $approved_meters = Meter_main::where('aao_status', 1)->where('aao_updated_at', '>=', $start_date)->where('aao_updated_at', '<=', $end_date)->get();


                $data = [
                    'approved_meters' => $approved_meters,
                ];
            } else {
                $approved_meters = Meter_main::where('aao_status', 1)->get();
                $data = [
                    'approved_meters' => $approved_meters,
                ];
            }
        }






        return view('admins.approve_meter_stat_show', compact('data'));
    }



    public function add_project_head()
    {
        return view('admins.add_project_head');
    }

    //     public function authenticate(Request $request)
    //     {


    //       $user = Admin::where('user_name', $request->user_name)->first();
    // if ($user && Hash::check($request->password, $user->password)) {
    //             return redirect('/');
    // }
    //         $credentials = $request->only('user_name', 'password');

    //         if (auth()->attempt($credentials)) {
    //             return redirect('/admins/index');
    //         }

    //         return redirect('/admins/login')->withErrors(['error' => 'Invalid username or password.']);
    //     }






    public function authenticate(Request $req)
    {
        // return $req;
        // dd($req->phone);
        $user = Admin::where('phone', $req->phone)->first();

        if ($user  && Hash::check($req->password, $user->password)) {
            if (($user->type == "admin") || ($user->type == "project_head") || ($user->type == "inventory_manager") || ($user->type == "inventory_executive") || ($user->type == "inventory_reporter") || ($user->type == "contractor_manager") || ($user->type == "qc_manager") || ($user->type == "qc_executive") || ($user->type == "hescom_manager") || ($user->type == "aee") || ($user->type == "aao") || ($user->type == "ae") || ($user->type == "bmr")) {
                Session::put('rexkod_vishvin_auth_name', $user->name);
                Session::put('rexkod_vishvin_auth_userid', $user->id);
                Session::put('rexkod_vishvin_auth_phone', $user->phone);
                Session::put('rexkod_vishvin_auth_user_type', $user->type);
                return redirect('admins/index');
            } else {
                session()->put('failed', 'Invalid Credentials');
                return redirect('/');
            }
            // {Hash::check($req->password,$user->password)
        } else {
            session()->put('failed', 'Invalid Credentials');
            return redirect('/');
        }
    }



    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    // Store Listing Data
    // public function create_project_head(Request $request)
    // {
    //     // print_r($request->all());
    //     // dd($request->all());
    //     $type = 'project_head';
    //     $formFields = $request->validate([
    //         'name' => ['required', 'min:3'],
    //         'project_name' => ['required', 'min:3'],
    //         'user_name' => ['required', 'min:3'],
    //         // 'user_name' => ['required', 'user_name', Rule::unique('admins', 'user_name')],
    //         'password' => 'required|confirmed|min:6',
    //         'phone' => ['required', 'min:3'],



    //     ]);

    //     $formFields['password'] = bcrypt($formFields['password']);
    //     $formFields['type'] = $type;

    //     $user = Admin::create($formFields);


    //     return redirect('/admins/add_project_head')->with('message', 'Project Head Created');
    // }



    public function create_project_head(Request $req)
    {
        // print_r($req->all());
        $auth = new Admin();


        $result = Admin::where('phone', $req->phone)->first();

        if ($result) {
            session()->put('failed', 'Phone already exists');

            return redirect('/admins/add_project_head');
        } else {
            $auth->name = $req->name;

            $auth->phone = $req->phone;

            $auth->project_name = $req->project_name;

            $auth->type = "project_head";
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

                //  "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
                //     redirect('pages/add_user');
                // die;
            }



            $auth->created_by = session()->get('rexkod_vishvin_auth_userid');
            $auth->save();
            session()->put('success', 'Project Head added successfully');

            // $user = Admin::where('user_name', $req->user_email)->first();

            // $req->session()->put('user',$user);

            return redirect('/admins/show_users');
        }
    }


    function update_user_password(Request $req)
    {
        // print_r($req->all());

        // dd($req);

        $auth = Admin::where('id', $req->user_id)->first();
        $auth->password = Hash::make($req->password);

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
        $auth->password = Hash::make($req->password);
        $auth->save();

        session()->put('success', 'Password changed successfully');
        return redirect('/admins/index');
    }





    public function show_users()
    {
        return view('admins.show_users', [
            'show_users' => Admin::where('type', 'project_head')->get(),
        ]);
    }


    public function qc_report_detail($id)
    {
        $meter_main = Meter_main::where('id', $id)->first();
        $consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();
        $data = [
            'meter_main' => $meter_main,
            'consumer_detail' => $consumer_detail,
            'id' => $id,
        ];
        return view('admins.qc_report_detail', ['data' => $data]);
    }
    public function forget_password()
    {
        $created_by  = session()->get('rexkod_vishvin_auth_userid');;
        $user_id = Admin::where('created_by', $created_by)->get();

        $data = [
            'user_id' => $user_id,

        ];
        return view('admins.forget_password', ['data' => $data]);
    }

    public function all_consumers()
    {
        $show_users = Consumer_detail::paginate(5000);

        return view('admins.all_consumers', compact('show_users'));

        // return view('admins.all_consumers', [
        //     'show_users' => Consumer_detail::take(100)->get(),
        // ]);
    }

//     public function change_file(){

//         $meter_mains = Meter_main::where('account_id', 1473755903)->get();

//         $uploadedFile = $meter_mains->image_1_old;  // Assuming 'file' is the name of the file input field

// $originalFileName = $uploadedFile['name'];
// $temporaryFilePath = $uploadedFile['tmp_name'];
// $destinationFolder = 'uploads/';
// $newFileName = 'new_file_name.txt';  // Set the desired new file name here

// $destinationPath = $destinationFolder . $newFileName;

// if (move_uploaded_file($temporaryFilePath, $destinationPath)) {
//     // File renamed and moved successfully
//     echo "File renamed and moved successfully.";
// } else {
//     // Failed to rename or move the file
//     echo "Error renaming or moving the file.";
// }

//     }

}
