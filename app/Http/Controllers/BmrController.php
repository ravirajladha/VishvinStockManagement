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
use App\Models\Bmr_download;

use Illuminate\Support\Facades\Hash;
use App\Models\Inward_meter_sl_no_wise;
use Illuminate\Support\Facades\Session;
use App\Models\Inward_released_em_meter;
use App\Models\Outward_released_em_meter;
use App\Models\Indent;
use App\Models\Successful_record;
use App\Models\Error_record;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BmrController extends Controller
{
    //
    public function bmr_report(Request $req)

    {

        if ($req->format === 'weekly') {
            # code...
            $today = Carbon::now();
            $dateSevenDaysAgo = Carbon::now()->subDays(7);

            $start_date = $dateSevenDaysAgo->format('Y-m-d');
            $end_date = $today->format('Y-m-d');

            // dd($start_date);

            $approved_meters = Meter_main::where(function ($query) use ($start_date, $end_date) {
                $query->where('aao_status', 1)
                      ->where('aao_updated_at', '>=', $start_date)
                    //   ->where('aao_updated_at', '<=', $end_date)
                      ->where('download_flag',0);
            })
            ->orWhere(function ($query) use ($start_date, $end_date){
                $query->where('error_updated_by_aao', 1)
                ->where('error_updated_at', '>=', $start_date);
                // ->where('error_updated_at', '<=', $end_date);
            })
            ->get();

            // $approved_meters = Meter_main::where('aao_status', 1)->where('aao_updated_at', '>=', $start_date)->where('aao_updated_at', '<=', $end_date)->where('download_flag',0)->get();

                $data = [
                    'approved_meters' => $approved_meters,
                ];
        } else if($req->format === 'monthly'){
            # code...
            $today = Carbon::now();
            $dateSevenDaysAgo = Carbon::now()->subDays(30);

            $start_date = $dateSevenDaysAgo->format('Y-m-d');
            $end_date = $today->format('Y-m-d');
            // $approved_meters = Meter_main::where('aao_status', 1)->orWhere('error_updated_by_aao', 1)->where('aao_updated_at', '>=', $start_date)->where('aao_updated_at', '<=', $end_date)->where('download_flag',0)->get();
                $approved_meters = Meter_main::where(function ($query) use ($start_date, $end_date) {
                $query->where('aao_status', 1)
                      ->where('aao_updated_at', '>=', $start_date)
                    //   ->where('aao_updated_at', '<=', $end_date)
                      ->where('download_flag',0);
            })
            ->orWhere(function ($query) use ($start_date, $end_date){
                $query->where('error_updated_by_aao', 1)
                ->where('error_updated_at', '>=', $start_date);
                // ->where('error_updated_at', '<=', $end_date);
            })
            ->get();

                $data = [
                    'approved_meters' => $approved_meters,
                ];
        }else{
            if ($req->get('start_date') !== NUll) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');
                // $approved_meters = Meter_main::where('aao_status', 1)->where('aao_updated_at', '>=', $start_date)->where('aao_updated_at', '<=', $end_date)->where('download_flag',0)->get();
                $approved_meters = Meter_main::where(function ($query) use ($start_date, $end_date) {
                    $query->where('aao_status', 1)
                          ->where('aao_updated_at', '>=', $start_date)
                          ->where('aao_updated_at', '<=', $end_date)
                          ->where('download_flag',0);
                })
                ->orWhere(function ($query) use ($start_date, $end_date){
                    $query->where('error_updated_by_aao', 1)
                    ->where('error_updated_at', '>=', $start_date)
                    ->where('error_updated_at', '<=', $end_date);
                })
                ->get();

                $data = [
                    'approved_meters' => $approved_meters,
                ];
            } else {
                // $approved_meters = Meter_main::where('aao_status', 1)->where('download_flag',0)->orWhere('error_updated_by_aao', 1)->get();
                $approved_meters = Meter_main::where(function ($query)  {
                    $query->where('aao_status', 1)
                          ->where('download_flag',0);
                })
                ->orWhere(function ($query) {
                    $query->where('error_updated_by_aao', 1);
                    // ->where('download_flag',0);
                })
                ->get();

                $data = [
                    'approved_meters' => $approved_meters,
                ];
            }
        }
        // $approved_meters = Meter_main::where('aao_status', 1)->get();
        // $data = [
        //     'approved_meters' => $approved_meters,
        // ];
        return view('bmrs.bmr_report', compact('data'));
    }

    public function successfull_records()
    {
        # code...
        return view('bmrs.successfull_records');
    }
    public function upload_successfull_records(Request $req)
    {
        # code...
        set_time_limit(7200);
        $validatedData = $req->validate([
            'successfull_record' => 'required|mimes:txt',
        ]);
        $path = $req->file('successfull_record')->store('uploads/file');

        $fileContents = Storage::get($path);
        $lines = explode("\n", $fileContents);

    // dd($lines);
    $count=0;
    $token = Str::random(10);
    foreach ($lines as $line) {
        // $columns = explode("|", $line);
        // // dd($columns);
        if (empty(trim($line))) {
            continue;
        }
        $successful_record = new Successful_record();

        // commented because format changed

        // $columns2 = explode(':', $line);
        // if(!empty($columns2[1] )){
        //     if(trim($columns2[1])==''){
        //         continue;
        //     }else {

        //         $successful_record->account_id = trim($columns2[1]);
        //     }
        // }

        // as new format
        $columns = explode("|", $line);
        if(!empty($columns[2] )){
            if(trim($columns[2])==''){
                continue;
            }else {

                $successful_record->account_id = trim($columns[2]);
            }
        }
        $count++;
        $successful_record->token = $token;
        // Set attributes for any other columns you want to save data to
        $successful_record->save();
    }
    session()->put('success', $count.' Success Records Uploaded Successfully');
    return redirect('/bmrs/successfull_records');
    }

    public function error_records()
    {
        # code...
        return view('bmrs.error_records');
    }
    public function upload_error_records(Request $req)
    {
        # code...
        set_time_limit(7200);
        // $validatedData = $req->validate([
        //     'error_record' => 'required|mimes:txt',
        // ]);

        // if($validatedData){
        //     dd("uploaded");
        // }
        // else{
        //     dd("not uploaded");
        // }

        //validate the uploaded file is in txt format or not
        if (!$req->hasFile('error_record')) {
            return redirect()->back()->with('failed', 'No file uploaded');
        }
        $file = $req->file('error_record');
        $allowedMimeTypes = [
            'text/plain',
        ];

        if (!in_array($file->getClientMimeType(), $allowedMimeTypes)) {
            return redirect()->back()->with('failed', 'Invalid file type');
        }



        $path = $req->file('error_record')->store('uploads/file');

        $fileContents = Storage::get($path);
        $lines = explode("\n", $fileContents);
        // dd($lines);
        $count=0;
        $token = Str::random(10);
    foreach ($lines as $line) {
        // $columns = explode("|", $line);
        if (empty(trim($line))) {
            continue;
        }
        $error_record = new Error_record();

        $columns2 = explode(':', $line);
        // dd($columns2);
        if(!empty($columns2[1] )){
            if(trim($columns2[1])==''){
                continue;
            }else {

                $error_record->account_id = trim($columns2[1]);
            }
        }

        $count++;
        // Set attributes for any other columns you want to save data to
        $error_record->token = $token;
        $error_record->save();
    }
    session()->put('success', $count.' Error Records Uploaded Successfully');
    return redirect('/bmrs/error_records');
    }



    public function downloaded_batch(Request $req)
    {
        // $distinctValues = DB::table('meter_mains')->distinct()->pluck('download_flag');
        // dd($req);
        $maxValue = DB::table('meter_mains')->max('download_flag');
        foreach ($req->selected_id as $selected) {

            $error_records = Meter_main::where('id', $selected)->first();
            if($error_records->error_updated_by_aao == 1){
                $meter_main = Meter_main::where('id', $selected)->update(['error_updated_by_aao' => 0]);
            }
            $meter_main = Meter_main::where('id', $selected)->update(['download_flag' => $maxValue+1]);

        }
        $download_ids= implode(',',$req->selected_id);
        $bmr_downloads = new Bmr_download();
        $bmr_downloads->meter_main_id	= $download_ids;
        $bmr_downloads->save();
        return redirect('/bmrs/bmr_report');

    }
    public function bmr_report_single($flag)
    {
        # code...
        $bmr_downloads = Bmr_download::where('id',$flag)->first();
        $meter_main_ids = explode(',',$bmr_downloads->meter_main_id);

        // $meter_mains = Meter_main::where('download_flag',$flag)->get();
        $data=[
            // 'approved_meters' =>$meter_mains,
            'meter_main_ids' => $meter_main_ids,
        ];

        return view('/bmrs/bmr_report_single', compact('data'));
    }

    public function successfull_report(Request $req)
    {
        # code...
        if ($req->format === 'weekly') {
            # code...

            $dateSevenDaysAgo = Carbon::now()->subDays(7);
            $start_date = $dateSevenDaysAgo->format('Y-m-d');

            $successful_records = Successful_record::
                      where('created_at', '>=', $start_date)

                        ->get();
                $data = [
                    'successful_records' => $successful_records,
                    'count' => count($successful_records),
                ];
        } else if($req->format === 'monthly'){
            # code...
            $today = Carbon::now();
            $dateSevenDaysAgo = Carbon::now()->subDays(30);
            $start_date = $dateSevenDaysAgo->format('Y-m-d');
            $end_date = $today->format('Y-m-d');
            $successful_records = Successful_record::
                      where('created_at', '>=', $start_date)
                    //   ->where('created_at', '<=', $end_date)
                        ->get();
                $data = [
                    'successful_records' => $successful_records,
                    'count' => count($successful_records),
                ];
        }else{
            if ($req->get('start_date') !== NUll) {
                $start_date = $req->get('start_date');
                $end_date = $req->get('end_date');
                $successful_records = Successful_record::
                      where('created_at', '>=', $start_date)
                      ->where('created_at', '<=', $end_date)
                        ->get();
                $data = [
                    'successful_records' => $successful_records,
                    'count' => count($successful_records),
                ];
            } else {
                $successful_records = Successful_record::get();
                $data = [
                    'successful_records' => $successful_records,
                    'count' => count($successful_records),
                ];
            }
        }
        // $successful_records = Successful_record::get();
        // $data=[
        //     'successful_records' =>$successful_records,
        // ];
        return view('/bmrs/successfull_report',compact('data'));
    }

    public function successfull_report_single($account_id)
    {
        # code...
        $consumer_detail = Consumer_detail::where('account_id',$account_id)->first();
        $meter_main = Meter_main::where('account_id',$account_id)->first();
        $data=[
            'meter_main' => $meter_main,
            'consumer_detail' => $consumer_detail,
            'id' => $account_id,
        ];

        return view('/bmrs/successfull_report_single',compact('data'));
    }
}
