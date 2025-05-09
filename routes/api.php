<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// api
Route::post('/pages/authenticate_api', [PageController::class, 'authenticate_api']);
Route::get('/pages/add_meter_first_step', [PageController::class, 'add_meter_first_step']);
Route::post('/pages/check_rr_number_api', [PageController::class, 'check_rr_number_api']);
Route::get('/pages/add_old_meter_detail_api/{id}', [PageController::class, 'add_old_meter_detail_api']);
Route::post('/pages/update_old_meter_detail_api/{id}', [PageController::class, 'update_old_meter_detail_api']);
Route::get('/pages/add_new_meter_detail_api/{id}', [PageController::class, 'add_new_meter_detail_api']);
Route::post('/pages/update_new_meter_detail_api/{id}', [PageController::class, 'update_new_meter_detail_api']);
Route::get('/pages/home_api', [PageController::class, 'home_api']);
Route::get('/pages/logout_api', [PageController::class, 'logout_api']);
Route::get('pages/location_api', [PageController::class, 'location_api']);


// Route::get('/pages/index', [PageController::class, 'index'])->name('index');
// Route::get('/pages/login2', [PageController::class, 'login2']);
// Route::get('/pages/records', [PageController::class, 'records']);
// Route::get('/pages/records2', [PageController::class, 'records2']);
// Route::get('/pages/account', [PageController::class, 'account']);
// Route::get('/pages', [PageController::class, 'login'])->name('pages_login');;
// Route::post('/user_location', [App\Http\Controllers\PageController::class, 'storeUserLocation'])->name('user_location');
// Route::get('pages/location_fetch/{lat}/{lon}', [PageController::class, 'location_fetch']);
// Route::get('pages/load_location', [PageController::class, 'load_location']);
// Route::get('pages/new_location', [PageController::class, 'new_location']);
// Route::post('pages/new_location', 'PageController@storeUserLocation')->name('storeUserLocation');
//


