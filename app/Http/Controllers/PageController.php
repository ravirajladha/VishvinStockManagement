<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Meter_main;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Consumer_detail;
use App\Models\Contractor_inventory;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function location_fetch($lat,$lon)
    {
        Session::put('rexkod_pages_lat', $lat);
        Session::put('rexkod_pages_lon', $lon);

        return redirect('pages/index');
        // return view('pages.location_fetch');
    }

    public function load_location()
    {

        return view('pages.load_location');
    }
    public function add_old_meter_detail($id)
    {
        // dd($id);

        $meter_main = Meter_main::where('id', $id)->first();
        // dd($meter_main);
        // dd($meter_main->account_id);
        $get_consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();

        $data = [
            'meter_main' => $meter_main,
            'get_consumer_detail' => $get_consumer_detail,
            'id' => $id,
        ];
        return view('pages.add_old_meter_detail', ['data' => $data]);
    }
    public function add_new_meter_detail($id)
    {
        $meter_main = Meter_main::where('id', $id)->first();
        // dd($meter_main->account_id);
        $get_consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();

        $data = [
            'meter_main' => $meter_main,

            'get_consumer_detail' => $get_consumer_detail,
            'id' => $id,
        ];
        return view('pages.add_new_meter_detail', ['data' => $data]);
    }
    public function add2()
    {
        return view('pages.add2');
    }
    public function home(Request $request)
    {
        $meter_main = Meter_main::where('created_by', Session('rexkod_pages_id'))->where('created_at', '>=', date('Y-m-d') . ' 00:00:00')->get();
        $lat = session('user_lat');
        $lon = session('user_lon');
        $city = session('user_city');
        $data = [
            'meter_main' => $meter_main,
            'lat' => $lat,
            'lon' => $lon,
            'city' => $city,


        ];
        return view('pages.home', compact('data'));
    }
    public function records()
    {
        // $meter_main = Meter_main::where('delete_flag', 1)->get();
        // return view('pages.records', ['meter_main' => $meter_main]);
        return view('pages.records');
    }
    public function records2()
    {
        return view('pages.records2');
    }
    public function account()
    {
        return view('pages.account');
    }
    public function location()
    {
        return view('pages.location');
    }
     public function login()
    {
        if(session('rexkod_pages_id')){
            return redirect('pages/home');
        }else{
            return view('pages.login');
        }
    }
    public function login2()
    {
        return view('pages.login2');
    }
    public function add_meter_first_step()
    {
        return view('pages.add_meter_first_step');
    }
    function authenticate(Request $req)
    {
        // return($req->all());
        $user = Admin::where('phone', $req->phone)->first();
        // return($req->all());
        if ($user && Hash::check($req->password, $user->password) && $user->type == "field_executive") {

            Session::put('rexkod_pages_name', $user->name);
            Session::put('rexkod_pages_id', $user->id);
            Session::put('rexkod_pages_user_phone', $user->phone);
            Session::put('rexkod_pages_uesr_type', $user->type);
            return redirect('pages/load_location');
        } else {


            session()->put('failed', 'Invalid credentials');
            return redirect('/pages');
        }
    }
    public function check_rr_number(Request $req)
    {
        if (session()->get('rexkod_pages_id') != Null) {
        // dd($req->account_id);
        // delete_flag
        // the pages has been provided with edit page too, in future they can edit the meter reading page also.
        // first case: its present in consumer_detail

        // consumer detail can be search by either accoount_id or rr_number -- added by ashutosh
        if($req->account_id){
            $consumer_detail = Consumer_detail::where('account_id', $req->account_id)->first();

            $meter_main = Meter_main::where('account_id', $req->account_id)->first();
        }else if($req->rr_number){
            $consumer_detail = Consumer_detail::where('rr_no', $req->rr_number)->first();
            if($consumer_detail){
                $meter_main = Meter_main::where('account_id', $consumer_detail->account_id)->first();
            }else{
                $meter_main = null;
            }
            // dd($consumer_detail->account_id);
        }


        // $consumer_detail = Consumer_detail::where('account_id', $req->account_id)->first();
        // $meter_main = Meter_main::where('account_id', $req->account_id)->first();
        // $count = 0;
        // foreach ($meter_main as $individual_meter_main) {
        //     $count++;
        // }



        if (!($consumer_detail)) {
            session()->put('failed', 'Account number Invalid');
            return redirect('/pages/add_meter_first_step');
        }
        if ($meter_main) {
            $meter_main_id = $meter_main->id;

            // there is one scenario
            // consider this has just relocated, so it reach to qc_vishvin already
            // so he can again approve
            // give allocate_flag or something to control that scenario
            if ((($meter_main->qc_status == 0) && ($meter_main->so_status == 0) && ($meter_main->aee_status == 0) && ($meter_main->aao_status == 0) && ($meter_main->allocation_flag == 1)) || ($meter_main->serial_no_new == Null)) {
                $meter_main->allocation_flag = 0;
                $meter_main->save();

                return redirect('/pages/add_old_meter_detail/' . $meter_main_id);
            }elseif((($meter_main->qc_status == 1) && ($meter_main->so_status == 1) && ($meter_main->aee_status == 1) && ($meter_main->aao_status == 1))){
                session()->put('success', 'Meter already approved');
                return redirect('/pages/add_meter_first_step');
            } else {
                session()->put('failed', 'Meter status under progress');
                return redirect('/pages/add_meter_first_step');
            }
        } else {
            $Meter_main = new Meter_main();
            // $Meter_main->account_id = $req->account_id;
            $Meter_main->account_id = $consumer_detail->account_id;

            $Meter_main->created_by = session()->get('rexkod_pages_id');

            $Meter_main->save();
            $Meter_main->id;

            session()->put('success', 'Please fill the old Electromechanical meter details');
            return redirect('/pages/add_old_meter_detail/' . $Meter_main->id);
        }
  
    }else{
        return redirect('/pages')->with('message', 'Session Time Out!');
    }
    }
    public function update_old_meter_detail(Request $req, $id)
    {
        // first case: its present in consumer_detail
        // dd($id);
        $meter_main = Meter_main::find($id);
        $meter_main->meter_make_old = $req->meter_make_old;
        $meter_main->serial_no_old = $req->serial_no_old;
        $meter_main->mfd_year_old = $req->mfd_year_old;
        $meter_main->final_reading = $req->final_reading;
        // if ($req->hasFile('image_1_old')) {
        //     $image = $req->file('image_1_old');
        //     $name = time().'.'.$image->getClientOriginalExtension();
        //     $destinationPath = public_path('/uploads');
        //    $meter_main->image_1_old= $image->move($destinationPath, $name);

        // }


        if (!empty($req->file('image_1_old'))) {
            $file = $req->file('image_1_old');
            $mime_type = $file->getClientMimeType();
            $extension = $file->getClientOriginalExtension();
            if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                // $filename = Str::random(4) . time() . '.' . $extension;

                // giving the image name as account id
                $filename = Str::random(4) . $meter_main->account_id . '.' . $extension;

                $meter_main->image_1_old = $file->move(('uploads'), $filename);
            } else {
                session()->put('failed', 'Only JPEG and PNG images are allowed.');
                return redirect('/pages/add_old_meter_detail/' . $id);
            }
        }
        if (!empty($req->file('image_2_old'))) {
            $file = $req->file('image_2_old');
            $mime_type = $file->getClientMimeType();
            $extension = $file->getClientOriginalExtension();
            if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                // $filename = Str::random(4) . time() . '.' . $extension;

                // giving the image name as account id
                $filename = Str::random(4) . $meter_main->account_id . '.' . $extension;
                $meter_main->image_2_old= $file->move(('uploads'), $filename);
            } else {
                session()->put('failed', 'Only JPEG and PNG images are allowed.');
                return redirect('/pages/add_old_meter_detail/' . $id);
            }
        }
        if (!empty($req->file('image_3_old'))) {
            $file = $req->file('image_3_old');
            $mime_type = $file->getClientMimeType();
            $extension = $file->getClientOriginalExtension();
            if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                // $filename = Str::random(4) . time() . '.' . $extension;

                // giving the image name as account id
                $filename = Str::random(4) . $meter_main->account_id . '.' . $extension;
                $meter_main->image_3_old= $file->move(('uploads'), $filename);
            } else {
                session()->put('failed', 'Only JPEG and PNG images are allowed.');
                return redirect('/pages/add_old_meter_detail/' . $id);
            }
        }


        $meter_main->save();


        session()->put('success', 'Please fill the new Electrostatic meter details');

        return redirect('/pages/add_new_meter_detail/' . $id);


    }
    public function update_new_meter_detail(Request $req, $id)
    {
    if (session()->get('rexkod_pages_id') != Null) {
        // first case: its present in consumer_detail
        // dd($id);
        $meter_serial_no = $req->serial_no_new;

        $get_field_executive_contractor =  Admin::where('id', session('rexkod_pages_id'))->first();
        //   print_r($get_field_executive_contractor);
        $contractor_inventories =  Contractor_inventory::where('contractor_id', $get_field_executive_contractor->created_by)->get();


        foreach ($contractor_inventories as $contractor_inventory) {
            $individual_inventory  = $contractor_inventory->unused_meter_serial_no;
            // dd($individual_inventory);
            $individual_serial_nos = explode(",", $individual_inventory);
            foreach ($individual_serial_nos as $individual_serial_no) {
                // dd($individual_serial_no);
                if ($individual_serial_no == $meter_serial_no) {
                    $current_inventory_id = $contractor_inventory->id;
                }
            }
        }
        // dd($current_inventory_id);
        if (isset($current_inventory_id)) {
            // ****************
            $existingInventory = Contractor_inventory::where('id', $current_inventory_id)->first();


            $unused_meter_serial_no = explode(',', $existingInventory->unused_meter_serial_no);
            $used_meter_serial_no = explode(',', $existingInventory->used_meter_serial_no);

            $input_values = $meter_serial_no; // assume the checkbox values are submitted as an array
            // dd($input_values);
            // Remove the input values from unused data and add them to used data
            if (!$input_values) {
                session()->put('failed', 'Please select any meter serial no');
                return redirect('/inventory_executives/add_outward_installation');
            }

            $key = array_search($input_values, $unused_meter_serial_no);
            if ($key !== false) {
                unset($unused_meter_serial_no[$key]);
                $used_meter_serial_no[] = $input_values;
            }


            $existingInventory->unused_meter_serial_no = implode(',', $unused_meter_serial_no);
            if (empty($existingInventory->unused_meter_serial_no)) {
                $existingInventory->unused_meter_serial_no = null;
            }
            $existingInventory->used_meter_serial_no = implode(',', $used_meter_serial_no);
            $existingInventory->used_meter_serial_no  = ltrim($existingInventory->used_meter_serial_no, ',');
            $existingInventory->save();




            $Inventory  = new Inventory();


            $Inventory->serial_no = $meter_serial_no;
            $Inventory->created_by = session()->get('rexkod_pages_id');

            $Inventory->save();
        }
        $meter_main = Meter_main::find($id);
        // $meter_main = new meter_main;
        // $meter_main->meter_make_new = $req->meter_make_new;
        $meter_main->serial_no_new = $req->serial_no_new;


        $meter_main->mfd_year_new = $req->mfd_year_new;
        $meter_main->initial_reading_kwh = $req->initial_reading_kwh;
        $meter_main->initial_reading_kvah = $req->initial_reading_kvah;


        if (!empty($req->file('image_1_new'))) {
            $file = $req->file('image_1_new');
            $mime_type = $file->getClientMimeType();
            $extension = $file->getClientOriginalExtension();
            if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                // $filename = Str::random(4) . time() . '.' . $extension;

                // giving the image name as account id
                $filename = Str::random(4) . $meter_main->account_id . '.' . $extension;

                $meter_main->image_1_new = $file->move(('uploads'), $filename);
            } else {
                session()->put('failed', 'Only JPEG and PNG images are allowed.');
                return redirect('/pages/add_new_meter_detail/' . $id);
            }
        }

        if (!empty($req->file('image_2_new'))) {
            $file = $req->file('image_2_new');
            $mime_type = $file->getClientMimeType();
            $extension = $file->getClientOriginalExtension();
            if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                // $filename = Str::random(4) . time() . '.' . $extension;

                // giving the image name as account id
                $filename = Str::random(4) . $meter_main->account_id . '.' . $extension;
                $meter_main->image_2_new = $file->move(('uploads'), $filename);
            } else {
                session()->put('failed', 'Only JPEG and PNG images are allowed.');
                return redirect('/pages/add_new_meter_detail/' . $id);
            }
        }



        $meter_main->lat = session()->get('rexkod_pages_lat');
        $meter_main->lon = session()->get('rexkod_pages_lon');
        $meter_main->save();


        session()->put('success', 'Congrats! The new meter and old meter has been stored successfully.');

        // $user = Admin::where('user_name', $req->user_email)->first();

        // $req->session()->put('user',$user);

        return redirect('/pages/home');

        // second case: this is present in meter_mains

        return ($req);
}else{
    return redirect('/pages')->with('message', 'Session Time Out!');
}
}


    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/pages')->with('message', 'You have been logged out!');
    }

    // public function storeUserLocation(Request $request)
    // {

    //     $request->session()->put('user_lat', $request->lat);
    //     $request->session()->put('user_lon', $request->lon);
    //     $request->session()->put('user_city', $request->city);

    // return response()->json(['success' => true]);
    // }
    public function storeUserLocation(Request $request)
    {
        $lat = $request->lat;
        $lon = $request->lon;
        $city = $request->city;

        session(['user_lat' => $lat]);
        session(['user_lon' => $lon]);
        session(['user_city' => $city]);

        return response()->json(['success' => true]);
    }



    // =================api methods==================
    public function authenticate_api(Request $req)
    {
        // return($req->all());
        $user = Admin::where('phone', $req->phone)->first();
        // return($req->all());
        if ($user && Hash::check($req->password, $user->password) && $user->type == "field_executive") {

            Session::put('rexkod_pages_name', $user->name);
            Session::put('rexkod_pages_id', $user->id);
            Session::put('rexkod_pages_user_phone', $user->phone);
            Session::put('rexkod_pages_uesr_type', $user->type);
            $data = [
                'name' => session('rexkod_pages_name'),
                'id' => session('rexkod_pages_id'),
                'phone' => session('rexkod_pages_user_phone'),
                'type' => session('rexkod_pages_uesr_type')
            ];
            return response()->json([   'status' => true,
                                        'msg' => '',
                                        'user_info' => $data]);
        } else {
            // session()->put('failed', 'Invalid credentials');
            return response()->json([   'status' => false,
                                        'msg' => 'Invalid credentials',
                                        'user_info' => '']);

        }
    }
    public function add_meter_first_step_api()
    {
        return view('pages.add_meter_first_step');
    }

    public function check_rr_number_api(Request $req)
    {

        if (session()->get('rexkod_pages_id') != Null) {
        // dd($req->account_id);
        // delete_flag
        // the pages has been provided with edit page too, in future they can edit the meter reading page also.
        // first case: its present in consumer_detail

        // consumer detail can be search by either accoount_id or rr_number -- added by ashutosh
        if($req->account_id){
            $consumer_detail = Consumer_detail::where('account_id', $req->account_id)->first();
            $meter_main = Meter_main::where('account_id', $req->account_id)->first();
        }else if($req->rr_number){
            $consumer_detail = Consumer_detail::where('rr_no', $req->rr_number)->first();
            if($consumer_detail){
                $meter_main = Meter_main::where('account_id', $consumer_detail->account_id)->first();
            }else{
                $meter_main = null;
            }
            // dd($consumer_detail->account_id);
        }


        if (!($consumer_detail)) {
            // session()->put('failed', 'Account number Invalid');
            // return redirect('/pages/add_meter_first_step');
            return response()->json(['status' => false,
                                    'msg' => 'Account number Invalid',
                                    'id' => '',
                                    'account_id' => '']);
        }
        if ($meter_main) {
            $meter_main_id = $meter_main->id;

            // there is one scenario
            // consider this has just relocated, so it reach to qc_vishvin already
            // so he can again approve
            // give allocate_flag or something to control that scenario
            if ((($meter_main->qc_status == 0) && ($meter_main->so_status == 0) && ($meter_main->aee_status == 0) && ($meter_main->aao_status == 0) && ($meter_main->allocation_flag == 1)) || ($meter_main->serial_no_new == Null)) {
                $meter_main->allocation_flag = 0;
                $meter_main->save();

                // return redirect('/pages/add_old_meter_detail/' . $meter_main_id);
                return response()->json(['status' => true,
                                    'msg' => '',
                                        'id' => $meter_main->id,
                                    'account_id' => $meter_main->account_id]);

            }elseif((($meter_main->qc_status == 1) && ($meter_main->so_status == 1) && ($meter_main->aee_status == 1) && ($meter_main->aao_status == 1))){
                // session()->put('success', 'Meter already approved');
                // return redirect('/pages/add_meter_first_step');
                return response()->json(['status' => false,
                                    'msg' => 'Meter already approved',
                                    'id' => '',
                                    'account_id' => '']);
            } else {
                // session()->put('failed', 'Meter status under progress');
                // return redirect('/pages/add_meter_first_step');
                return response()->json(['status' => false,
                                    'msg' => 'Meter status under progress',
                                    'id' => '',
                                    'account_id' => '']);
            }
        } else {
            $Meter_main = new Meter_main();
            // $Meter_main->account_id = $req->account_id;
            $Meter_main->account_id = $consumer_detail->account_id;

            $Meter_main->created_by = session()->get('rexkod_pages_id');

            $Meter_main->save();
            $Meter_main->id;

            // session()->put('success', 'Please fill the old Electromechanical meter details');
            // return redirect('/pages/add_old_meter_detail/' . $Meter_main->id);
            return response()->json(['status' => true,
                                    'msg' => 'Please fill the old Electromechanical meter details',
                                    'id' => $Meter_main->id,
                                'account_id' => $Meter_main->account_id]);
        }

    }else{
        return redirect('/pages')->with('message', 'Session Time Out!');
    }
    }

    public function add_old_meter_detail_api($id)
    {
        // dd($id);

        $meter_main = Meter_main::where('id', $id)->first();
        // dd($meter_main);
        // dd($meter_main->account_id);
        $get_consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();

        $data = [
            'meter_main' => $meter_main,
            'get_consumer_detail' => $get_consumer_detail,
            'id' => $id,
        ];
        // return view('pages.add_old_meter_detail', ['data' => $data]);
        return response()->json(['status' => true,
                                'msg' => '',
                                'meter_main' => $meter_main,
                                'get_consumer_detail' => $get_consumer_detail,
                                'id' => $id]);
    }

    public function update_old_meter_detail_api(Request $req, $id)
    {
        // first case: its present in consumer_detail
        // dd($id);
        $meter_main = Meter_main::find($id);
        $meter_main->meter_make_old = $req->meter_make_old;
        $meter_main->serial_no_old = $req->serial_no_old;
        $meter_main->mfd_year_old = $req->mfd_year_old;
        $meter_main->final_reading = $req->final_reading;
        // if ($req->hasFile('image_1_old')) {
        //     $image = $req->file('image_1_old');
        //     $name = time().'.'.$image->getClientOriginalExtension();
        //     $destinationPath = public_path('/uploads');
        //    $meter_main->image_1_old= $image->move($destinationPath, $name);

        // }


        if (!empty($req->file('image_1_old'))) {
            $file = $req->file('image_1_old');
            $mime_type = $file->getClientMimeType();
            $extension = $file->getClientOriginalExtension();
            if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                // $filename = Str::random(4) . time() . '.' . $extension;

                // giving the image name as account id
                $filename = Str::random(4) . $meter_main->account_id . '.' . $extension;

                $meter_main->image_1_old = $file->move(('uploads'), $filename);
            } else {
                session()->put('failed', 'Only JPEG and PNG images are allowed.');
                return redirect('/pages/add_old_meter_detail/' . $id);
            }
        }
        if (!empty($req->file('image_2_old'))) {
            $file = $req->file('image_2_old');
            $mime_type = $file->getClientMimeType();
            $extension = $file->getClientOriginalExtension();
            if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                // $filename = Str::random(4) . time() . '.' . $extension;

                // giving the image name as account id
                $filename = Str::random(4) . $meter_main->account_id . '.' . $extension;
                $meter_main->image_2_old= $file->move(('uploads'), $filename);
            } else {
                session()->put('failed', 'Only JPEG and PNG images are allowed.');
                return redirect('/pages/add_old_meter_detail/' . $id);
            }
        }
        if (!empty($req->file('image_3_old'))) {
            $file = $req->file('image_3_old');
            $mime_type = $file->getClientMimeType();
            $extension = $file->getClientOriginalExtension();
            if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                // $filename = Str::random(4) . time() . '.' . $extension;

                // giving the image name as account id
                $filename = Str::random(4) . $meter_main->account_id . '.' . $extension;
                $meter_main->image_3_old= $file->move(('uploads'), $filename);
            } else {
                session()->put('failed', 'Only JPEG and PNG images are allowed.');
                return redirect('/pages/add_old_meter_detail/' . $id);
            }
        }


        $meter_main->save();


        session()->put('success', 'Please fill the new Electrostatic meter details');

        // return redirect('/pages/add_new_meter_detail/' . $id);
        return response()->json(['status' => true,
                                'msg' => '',
                                'meter_make_old' => $meter_main->meter_make_old,
                                'serial_no_old' => $meter_main->serial_no_old,
                                'mfd_year_old' => $meter_main->mfd_year_old,
                                'final_reading' => $meter_main->final_reading,
                                'image_1_old' => $meter_main->image_1_old,
                                'image_2_old' => $meter_main->image_2_old,]);

    }

    public function add_new_meter_detail_api($id)
    {
        $meter_main = Meter_main::where('id', $id)->first();
        // dd($meter_main->account_id);
        $get_consumer_detail = Consumer_detail::where('account_id', $meter_main->account_id)->first();

        $data = [
            'meter_main' => $meter_main,

            'get_consumer_detail' => $get_consumer_detail,
            'id' => $id,
        ];
        // return view('pages.add_new_meter_detail', ['data' => $data]);
        return response()->json(['meter_main' => $meter_main,
                            'get_consumer_detail' => $get_consumer_detail,
                        'id' => $id]);
    }

    public function update_new_meter_detail_api(Request $req, $id)
    {
    if (session()->get('rexkod_pages_id') != Null) {
        // first case: its present in consumer_detail
        // dd($id);
        $meter_serial_no = $req->serial_no_new;

        $get_field_executive_contractor =  Admin::where('id', session('rexkod_pages_id'))->first();
        //   print_r($get_field_executive_contractor);
        $contractor_inventories =  Contractor_inventory::where('contractor_id', $get_field_executive_contractor->created_by)->get();


        foreach ($contractor_inventories as $contractor_inventory) {
            $individual_inventory  = $contractor_inventory->unused_meter_serial_no;
            // dd($individual_inventory);
            $individual_serial_nos = explode(",", $individual_inventory);
            foreach ($individual_serial_nos as $individual_serial_no) {
                // dd($individual_serial_no);
                if ($individual_serial_no == $meter_serial_no) {
                    $current_inventory_id = $contractor_inventory->id;
                }
            }
        }
        // dd($current_inventory_id);
        if (isset($current_inventory_id)) {
            // ****************
            $existingInventory = Contractor_inventory::where('id', $current_inventory_id)->first();


            $unused_meter_serial_no = explode(',', $existingInventory->unused_meter_serial_no);
            $used_meter_serial_no = explode(',', $existingInventory->used_meter_serial_no);

            $input_values = $meter_serial_no; // assume the checkbox values are submitted as an array
            // dd($input_values);
            // Remove the input values from unused data and add them to used data
            if (!$input_values) {
                session()->put('failed', 'Please select any meter serial no');
                return redirect('/inventory_executives/add_outward_installation');
            }

            $key = array_search($input_values, $unused_meter_serial_no);
            if ($key !== false) {
                unset($unused_meter_serial_no[$key]);
                $used_meter_serial_no[] = $input_values;
            }


            $existingInventory->unused_meter_serial_no = implode(',', $unused_meter_serial_no);
            if (empty($existingInventory->unused_meter_serial_no)) {
                $existingInventory->unused_meter_serial_no = null;
            }
            $existingInventory->used_meter_serial_no = implode(',', $used_meter_serial_no);
            $existingInventory->used_meter_serial_no  = ltrim($existingInventory->used_meter_serial_no, ',');
            $existingInventory->save();




            $Inventory  = new Inventory();


            $Inventory->serial_no = $meter_serial_no;
            $Inventory->created_by = session()->get('rexkod_pages_id');

            $Inventory->save();
        }
        $meter_main = Meter_main::find($id);
        // $meter_main = new meter_main;
        // $meter_main->meter_make_new = $req->meter_make_new;
        $meter_main->serial_no_new = $req->serial_no_new;


        $meter_main->mfd_year_new = $req->mfd_year_new;
        $meter_main->initial_reading_kwh = $req->initial_reading_kwh;
        $meter_main->initial_reading_kvah = $req->initial_reading_kvah;


        if (!empty($req->file('image_1_new'))) {
            $file = $req->file('image_1_new');
            $mime_type = $file->getClientMimeType();
            $extension = $file->getClientOriginalExtension();
            if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                // $filename = Str::random(4) . time() . '.' . $extension;

                // giving the image name as account id
                $filename = Str::random(4) . $meter_main->account_id . '.' . $extension;

                $meter_main->image_1_new = $file->move(('uploads'), $filename);
            } else {
                session()->put('failed', 'Only JPEG and PNG images are allowed.');
                return redirect('/pages/add_new_meter_detail/' . $id);
            }
        }

        if (!empty($req->file('image_2_new'))) {
            $file = $req->file('image_2_new');
            $mime_type = $file->getClientMimeType();
            $extension = $file->getClientOriginalExtension();
            if (($mime_type == 'image/png' || $mime_type == 'image/jpeg' || $mime_type == 'image/jpg') && ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')) {
                // $filename = Str::random(4) . time() . '.' . $extension;

                // giving the image name as account id
                $filename = Str::random(4) . $meter_main->account_id . '.' . $extension;
                $meter_main->image_2_new = $file->move(('uploads'), $filename);
            } else {
                session()->put('failed', 'Only JPEG and PNG images are allowed.');
                return redirect('/pages/add_new_meter_detail/' . $id);
            }
        }



        $meter_main->lat = session()->get('rexkod_pages_lat');
        $meter_main->lon = session()->get('rexkod_pages_lon');
        $meter_main->save();


        session()->put('success', 'Congrats! The new meter and old meter has been stored successfully.');

        // $user = Admin::where('user_name', $req->user_email)->first();

        // $req->session()->put('user',$user);

        // return redirect('/pages/home');
        return response()->json(['status' => true,
                                'msg' => '',
                                'serial_no_new' => $meter_main->serial_no_new,
                                'initial_reading_kwh' => $meter_main->initial_reading_kwh,
                                'initial_reading_kvah' => $meter_main->initial_reading_kvah,
                                'image_1_new' => $meter_main->image_1_new,
                                'image_2_new' => $meter_main->image_2_new,
                                ]);

        // second case: this is present in meter_mains

        return ($req);
}else{
    return redirect('/pages')->with('message', 'Session Time Out!');
}
}

public function home_api(Request $request)
    {
        $meter_main = Meter_main::where('created_by', Session('rexkod_pages_id'))->where('created_at', '>=', date('Y-m-d') . ' 00:00:00')->get();
        $lat = session('user_lat');
        $lon = session('user_lon');
        $city = session('user_city');
        $data = [
            'meter_main' => $meter_main,
            'lat' => $lat,
            'lon' => $lon,
            'city' => $city,


        ];
        // return view('pages.home', compact('data'));
        return response()->json([ 'status' => true,
                                    'msg' => '',
                                    'meter_main' => $meter_main,
                                    'lat' => $lat,
                                    'lon' => $lon,
                                    'city' => $city,
                                ]);
    }

    public function logout_api(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // return redirect('/pages')->with('message', 'You have been logged out!');
        return response()->json([ 'status' => true,
                                    'msg' => 'logged out',
                                ]);
    }


    public function location_api()
    {
        return view('pages.location');
    }


}
