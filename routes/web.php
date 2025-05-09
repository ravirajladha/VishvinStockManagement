<?php

use illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectHeadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\QcController;
use App\Http\Controllers\HescomController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BmrController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admins/index', [AdminController::class, 'index']);
Route::get('/admins/add_project_head', [AdminController::class, 'add_project_head']);
Route::get('/admins/forget_password', [AdminController::class, 'forget_password']);
Route::get('/admins/qc_report_detail/{id}', [AdminController::class, 'qc_report_detail']);

// Route::get('/admins/add_project_head', function () {
//     return view('admins/add_project_head')->middleware('auth');
// });
Route::post('/update_user_password', [AdminController::class, 'update_user_password']);
Route::post('/create_project_head', [AdminController::class, 'create_project_head']);

// Route::get('/admins/approve_meter_stat_show', function () {
//     return view('admins/approve_meter_stat_show');
// });


Route::get('/admins/approve_meter_stat_show', [AdminController::class, 'approve_meter_stat_show']);
Route::get('/admins/show_users', [AdminController::class, 'show_users'])->name('register');
Route::get('/', [AdminController::class, 'login'])->name('login');
// This will basically not allow the user to go to login page if they are logged in .
// ->middleware('guest');
// Log In User
Route::post('/authenticate', [AdminController::class, 'authenticate']);
// Route::post('/update_user_password', [AdminController::class, 'update_user_password']);


Route::get('/admins/logout', [AdminController::class, 'logout']);

Route::get('/admins/all_consumers', [AdminController::class, 'all_consumers']);



// Project Head Routes
// Route::get('project_heads/index', [ProjectHeadController::class, 'index']);
Route::get('project_heads/add_inventory_manager', [ProjectHeadController::class, 'add_inventory_manager']);
Route::post('project_heads/create_inventory_manager', [ProjectHeadController::class, 'create_inventory_manager']);
Route::get('project_heads/add_contractor', [ProjectHeadController::class, 'add_contractor']);
Route::post('project_heads/create_contractor_manager', [ProjectHeadController::class, 'create_contractor_manager']);

Route::get('project_heads/add_hescom', [ProjectHeadController::class, 'add_hescom']);
Route::post('project_heads/create_hescom_manager', [ProjectHeadController::class, 'create_hescom_manager']);

Route::get('project_heads/add_inventory', [ProjectHeadController::class, 'add_inventory']);
Route::get('project_heads/consumer_bulk_upload', [ProjectHeadController::class, 'consumer_bulk_upload']);
Route::get('project_heads/add_qc', [ProjectHeadController::class, 'add_qc']);
Route::post('project_heads/create_qc_manager', [ProjectHeadController::class, 'create_qc_manager']);

Route::get('project_heads/all_contractors', [ProjectHeadController::class, 'all_contractors']);
Route::get('project_heads/all_hescoms', [ProjectHeadController::class, 'all_hescoms']);
Route::get('project_heads/all_inventory_managers', [ProjectHeadController::class, 'all_inventory_managers']);
Route::get('project_heads/all_qcs', [ProjectHeadController::class, 'all_qcs']);
Route::get('project_heads/all_users', [ProjectHeadController::class, 'all_users']);

Route::post('project_heads/upload_file',[ProjectHeadController::class,'upload_file']);

Route::get('project_heads/add_bmr', [ProjectHeadController::class, 'add_bmr']);
Route::post('project_heads/create_bmr', [ProjectHeadController::class, 'create_bmr']);
Route::get('project_heads/all_bmr', [ProjectHeadController::class, 'all_bmr']);

Route::get('project_heads/reports', [ProjectHeadController::class, 'reports']);


// Route::get('/project_heads', [ProjectHeadController::class, 'login']);
// Route::post('project_heads/authenticate', [ProjectHeadController::class, 'authenticate']);
// Route::get('/project_heads/logout', [ProjectHeadController::class, 'logout']);

// Inventories
// Route::get('/inventories', [InventoryController::class, 'login']);
Route::get('/inventories/add_inventory_executive', [InventoryController::class, 'add_inventory_executive']);
Route::get('/inventories/all_inventory_executives', [InventoryController::class, 'all_inventory_executives']);
// Route::get('/inventories/index', [InventoryController::class, 'index']);
// Route::post('/inventories/authenticate', [InventoryController::class, 'authenticate']);
// Route::get('/inventories/logout', [InventoryController::class, 'logout']);
Route::post('inventories/create_inventory_executive', [InventoryController::class, 'create_inventory_executive']);
// Inventorie Executives
// Route::get('/inventories', [InventoryController::class, 'login']);

// Route::get('/inventory_executives/index', [InventoryController::class, 'inventory_executive_index']);
// Route::get('/inventory_reporters/index', [InventoryController::class, 'inventory_reporter_index']);

Route::get('/inventory_executives/add_inward_genus', function () {
    return view('inventory_executives/add_inward_genus');
});

Route::post('/inventory_executives/create_inward_genus', [InventoryController::class, 'create_inward_genus']);

Route::get('/inventory_executives/add_inward_mrt_rejected', function () {
    return view('inventory_executives/add_inward_mrt_rejected');
});

Route::post('/inventory_executives/create_inward_mrt_rejected', [InventoryController::class, 'create_inward_mrt_rejected']);

// Route::get('/inventory_executives/add_inward_released_em_meter', function () {
//     return view('inventory_executives/add_inward_released_em_meter');
// });

Route::get('/inventory_executives/add_inward_released_em_meter', [InventoryController::class, 'add_inward_released_em_meter']);

Route::post('/inventory_executives/create_inward_released_em_meter', [InventoryController::class, 'create_inward_released_em_meter']);
Route::get('/inventory_executives/add_meter_sl_number_wise/{id}', [InventoryController::class, 'add_meter_sl_number_wise']);

Route::get('/inventory_executives/add_meter_into_box/{id}', [InventoryController::class, 'add_meter_into_box']);

Route::get('/inventory_executives/add_meter_to_stock', [InventoryController::class, 'add_meter_to_stock']);
Route::post('/inventory_executives/add_meter_to_warehouse/{id}', [InventoryController::class, 'add_meter_to_warehouse']);
Route::post('/inventory_executives/update_meter_into_box', [InventoryController::class, 'update_meter_into_box']);

Route::get('/inventory_executives/add_outward_mrt', function () {
    return view('inventory_executives/add_outward_mrt');
});

Route::post('/inventory_executives/create_outward_mrt', [InventoryController::class, 'create_outward_mrt']);

Route::get('/inventory_executives/add_outward_installation', [InventoryController::class, 'add_outward_installation']);

Route::get('get_sd_pincode', [InventoryController::class, 'get_sd_pincode'])->name('get_sd_pincode');
Route::get('get_meter_serial_no', [InventoryController::class, 'get_meter_serial_no'])->name('get_meter_serial_no');


Route::post('/inventory_executives/create_outward_installation', [InventoryController::class, 'create_outward_installation']);








Route::get('/inventory_executives/add_outward_released_em_meter', [InventoryController::class, 'add_outward_released_em_meter']);

Route::post('/inventory_executives/create_outward_released_em_meter', [InventoryController::class, 'create_outward_released_em_meter']);

// Route::get('/inventory_executives/view_inward_genus', function () {
//     return view('inventory_executives/view_inward_genus');});


Route::get('/inventory_executives/view_inward_genus', [InventoryController::class, 'view_inward_genus']);
Route::get('/inventory_executives/view_inward_mrt_rejected', [InventoryController::class, 'view_inward_mrt_rejected']);
Route::get('/inventory_executives/view_inward_released_em_meter', [InventoryController::class, 'view_inward_released_em_meter']);
Route::get('/inventory_executives/view_meter_sl_number_wise', [InventoryController::class, 'view_meter_sl_number_wise']);
Route::get('/inventory_executives/view_outward_mrt', [InventoryController::class, 'view_outward_mrt']);
Route::get('/inventory_executives/view_outward_installation', [InventoryController::class, 'view_outward_installation']);
Route::get('/inventory_executives/view_outward_released_em_meter', [InventoryController::class, 'view_outward_released_em_meter']);


// -------
Route::get('/inventory_executives/indent_form/{box_id}', [InventoryController::class, 'indent_form_view']);
Route::post('/inventory_executives/indent_form/{box_id}', [InventoryController::class, 'indent_form']);

Route::get('/inventory_executives/meter_stocks', [InventoryController::class, 'meter_stocks']);
Route::post('/inventory_executives/meter_stocks_filter', [InventoryController::class, 'meter_stocks_filter']);
Route::get('/inventory_executives/get_so_code/{division}', [InventoryController::class, 'get_so_code']);

Route::get('/inventory_executives/get_box/{division}', [InventoryController::class, 'get_box']);

Route::get('/inventory_executives/add_lot', [InventoryController::class, 'add_lot']);

Route::post('/inventory_executives/create_lot_no', [InventoryController::class, 'create_lot_no']);



Route::post('/inventory_executives/upload_meter/{lot_no}', [InventoryController::class, 'upload_meter']);

// Inventory Reporters

Route::get('/inventory_reporters/annexure1', [InventoryController::class, 'annexure1']);
Route::get('/inventory_reporters/annexure4_list', [InventoryController::class, 'annexure4_list']);
Route::get('/inventory_reporters/annexure3', [InventoryController::class, 'annexure3']);


Route::post('/inventory_reporters/create_annexure1', [InventoryController::class, 'create_annexure1']);

Route::get('/inventory_reporters/annexure4/{id}', [InventoryController::class, 'annexure4']);

Route::post('/inventory_reporters/create_annexure3', [InventoryController::class, 'create_annexure3']);



Route::get('/inventories/reports', [InventoryController::class, 'reports']);
Route::get('/inventories/filter_outward_reports', [InventoryController::class, 'filter_outward_reports']);


// Contractors
// Route::get('/contractors', [ContractorController::class, 'login']);
Route::get('/contractors/add_contractor_executive', [ContractorController::class, 'add_contractor_executive']);
Route::get('/contractors/all_contractor_executives', [ContractorController::class, 'all_contractor_executives']);
Route::get('/contractors/rejected_reports', [ContractorController::class, 'rejected_reports']);
Route::get('/contractors/rejected_report_view/{id}', [ContractorController::class, 'rejected_report_view']);
Route::get('/contractors/add_outward_installation', [ContractorController::class, 'add_outward_installation']);


// Route::get('/contractors/index', [ContractorController::class, 'index']);
// Route::post('/contractors/authenticate', [ContractorController::class, 'authenticate']);
// Route::get('/contractors/logout', [ContractorController::class, 'logout']);
Route::post('contractors/create_contractor_executive', [ContractorController::class, 'create_contractor_executive']);
Route::get('/contractors/delete_status_data/{id}', [ContractorController::class, 'delete_status_data']);


Route::get('/contractors/reports', [ContractorController::class, 'reports']);

// Qcs
// Route::get('/qcs', [QcController::class, 'login']);
Route::get('/qcs/add_qc_executive', [QcController::class, 'add_qc_executive']);
Route::get('/qcs/all_qc_executives', [QcController::class, 'all_qc_executives']);
Route::get('/qcs/qc_view', [QcController::class, 'qc_view']);
Route::get('/qcs/qc_view_detail/{id}', [QcController::class, 'qc_view_detail']);
Route::get('/qcs/edit_qc_report/{id}', [QcController::class, 'edit_qc_report']);
Route::get('/qcs/edit_qc_detail/{id}', [QcController::class, 'edit_qc_detail']);
// Route::get('/qcs/index', [QcController::class, 'index']);
// Route::post('/qcs/authenticate', [QcController::class, 'authenticate']);
// Route::get('/qcs/logout', [QcController::class, 'logout']);
Route::post('qcs/bulk_approve_qcs_report', [QcController::class, 'bulk_approve_qcs_report']);
Route::post('qcs/create_qc_executive', [QcController::class, 'create_qc_executive']);
Route::post('/qcs/reject_qc_reports_status/{id}', [QcController::class, 'reject_qc_reports_status']);
Route::post('/qcs/approve_qc_reports_status/{id}', [QcController::class, 'approve_qc_reports_status']);
Route::post('/qcs/update_qc_report/{id}', [QcController::class, 'update_qc_report']);
Route::get('/qcs/approved_meter_reports', [QcController::class, 'approved_meter_reports']);
Route::get('/qcs/rejected_meter_reports', [QcController::class, 'rejected_meter_reports']);

Route::get('/qcs/reports', [QcController::class, 'reports']);
Route::get('/qcs/executive_reports', [QcController::class, 'executive_reports']);





// Hescoms
// Route::get('/hescoms', [HescomController::class, 'login']);
Route::get('/hescoms/all_consumers', [HescomController::class, 'all_consumers']);
Route::get('/hescoms/add_hescom_executive', [HescomController::class, 'add_hescom_executive']);
Route::get('/hescoms/all_hescom_executives', [HescomController::class, 'all_hescom_executives']);
Route::get('/hescoms/hescom_view', [HescomController::class, 'hescom_view']);
Route::get('/hescoms/hescom_view_detail/{id}', [HescomController::class, 'hescom_view_detail']);
Route::get('/hescoms/approved_meter_reports', [HescomController::class, 'approved_meter_reports']);
Route::get('/hescoms/rejected_meter_reports', [HescomController::class, 'rejected_meter_reports']);
Route::post('/hescoms/reject_so_reports_status/{id}', [HescomController::class, 'reject_so_reports_status'])->name('reject_so_reports_status');
Route::post('/hescoms/reject_aee_reports_status/{id}', [HescomController::class, 'reject_aee_reports_status'])->name('reject_aee_reports_status');
Route::post('/hescoms/reject_aao_reports_status/{id}', [HescomController::class, 'reject_aao_reports_status'])->name('reject_aao_reports_status');


// Route::get('/hescoms/index', [HescomController::class, 'index']);
// Route::post('/hescoms/authenticate', [HescomController::class, 'authenticate']);
// Route::get('/hescoms/logout', [HescomController::class, 'logout']);
Route::post('hescoms/create_hescom_executive', [HescomController::class, 'create_hescom_executive']);
Route::post('/hescoms/update_so_reports_status/{id}', [HescomController::class, 'update_so_reports_status']);

Route::post('/hescoms/update_aee_reports_status/{id}', [HescomController::class, 'update_aee_reports_status']);

Route::post('/hescoms/update_aao_reports_status/{id}', [HescomController::class, 'update_aao_reports_status']);

Route::post('/hescoms/approve_aao_reports_status/{id}', [HescomController::class, 'approve_aao_reports_status']);
Route::post('/hescoms/approve_so_reports_status/{id}', [HescomController::class, 'approve_so_reports_status']);
Route::post('/hescoms/approve_aee_reports_status/{id}', [HescomController::class, 'approve_aee_reports_status']);
Route::post('hescoms/bulk_approve_hescoms_report', [HescomController::class, 'bulk_approve_hescoms_report']);

Route::get('/hescoms/error_reports', [HescomController::class, 'error_reports']);
Route::get('/hescoms/edit_error_reports/{id}', [HescomController::class, 'edit_error_reports']);
Route::post('hescoms/update_error_reports/{id}', [HescomController::class, 'update_error_reports']);

Route::post('hescoms/update_error_status', [HescomController::class, 'update_error_status']);

// Pages
Route::get('/pages/index', [PageController::class, 'index'])->name('index');
Route::get('/pages/add_old_meter_detail/{id}', [PageController::class, 'add_old_meter_detail']);
Route::get('/pages/add_meter_first_step', [PageController::class, 'add_meter_first_step']);
Route::get('/pages/add_new_meter_detail/{id}', [PageController::class, 'add_new_meter_detail']);
Route::get('/pages/home', [PageController::class, 'home']);
Route::get('/pages/login2', [PageController::class, 'login2']);

// Route::get('/pages/home', 'PageController@index')->name('pages.home');


Route::get('/pages/records', [PageController::class, 'records']);
Route::get('/pages/records2', [PageController::class, 'records2']);
Route::get('/pages/account', [PageController::class, 'account']);
Route::get('/pages', [PageController::class, 'login'])->name('pages_login');;
Route::post('/pages/authenticate', [PageController::class, 'authenticate']);
Route::post('pages/check_rr_number', [PageController::class, 'check_rr_number']);
// Route::post('user_location', [PageController::class, 'user_location']);
Route::post('/user_location', [App\Http\Controllers\PageController::class, 'storeUserLocation'])->name('user_location');
Route::get('pages/location_fetch/{lat}/{lon}', [PageController::class, 'location_fetch']);
Route::get('pages/load_location', [PageController::class, 'load_location']);
Route::get('pages/location', [PageController::class, 'location']);
Route::get('pages/new_location', [PageController::class, 'new_location']);
Route::post('pages/new_location', 'PageController@storeUserLocation')->name('storeUserLocation');

Route::get('/pages/logout', [PageController::class, 'logout']);


Route::post('/pages/update_old_meter_detail/{id}', [PageController::class, 'update_old_meter_detail']);
Route::post('/pages/update_new_meter_detail/{id}', [PageController::class, 'update_new_meter_detail']);


// bmr

Route::get('/bmrs/bmr_report', [BmrController::class, 'bmr_report']);
Route::get('/bmrs/successfull_records', [BmrController::class, 'successfull_records']);
Route::post('/bmrs/upload_successfull_records', [BmrController::class, 'upload_successfull_records']);

Route::get('/bmrs/error_records', [BmrController::class, 'error_records']);
Route::post('/bmrs/upload_error_records', [BmrController::class, 'upload_error_records']);

Route::post('/bmrs/download_excel', [BmrController::class, 'download_excel']);
Route::post('/bmrs/downloaded_batch', [BmrController::class, 'downloaded_batch']);
Route::get('/bmrs/bmr_report_single/{flag}', [BmrController::class, 'bmr_report_single']);
Route::get('/bmrs/successfull_report', [BmrController::class, 'successfull_report']);
Route::get('/bmrs/successfull_report_single/{account_id}', [BmrController::class, 'successfull_report_single']);


Route::post('/inventory_executives/delete_meter_from_box', [InventoryController::class, 'deleteMeterFromBox']);





// change upload file name
Route::get('/admins/change_file', [AdminController::class, 'change_file']);

// app apis

Route::post('/pages/authenticate_api', [PageController::class, 'authenticate_api']);



