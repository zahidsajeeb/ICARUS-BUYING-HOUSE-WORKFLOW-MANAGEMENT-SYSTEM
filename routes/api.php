<?php

use App\Http\Controllers\API\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SampleController;
use App\Http\Controllers\API\SettingsController;
use App\Http\Controllers\API\OrderController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'order','middleware' => 'auth:sanctum'], function() {
    Route::get('/order_list', [OrderController::class,'order_list']);
    Route::get('/fabric_order_list', [OrderController::class,'fabric_order_list']);
    Route::post('order_store', [OrderController::class,'order_store']);
    Route::get('commercial_order_info_edit/{id}', [OrderController::class,'commercial_order_info_edit']);
    Route::post('commercial_order_info_update/{id}', [OrderController::class,'commercial_order_info_update']);
    Route::delete('order_delete/{id}', [OrderController::class,'order_delete']);


    Route::get('fabric_order_info_form/{id}', [OrderController::class,'fabric_order_info_form']);
    Route::post('fabric_order_info_store/{id}', [OrderController::class,'fabric_order_info_store']);
    Route::get('fabric_order_info_edit/{id}', [OrderController::class,'fabric_order_info_edit']);
    Route::post('fabric_order_info_update/{id}', [OrderController::class,'fabric_order_info_update']);


    Route::get('trims_order_info_form/{id}', [OrderController::class,'trims_order_info_form']);
    Route::post('trims_order_info_store/{id}', [OrderController::class,'trims_order_info_store']);
    Route::get('trims_order_info_edit/{id}', [OrderController::class,'trims_order_info_edit']);
    Route::post('trims_order_info_update/{id}', [OrderController::class,'trims_order_info_update']);


    Route::get('merchant_order_info_form/{id}', [OrderController::class,'merchant_order_info_form']);
    Route::post('merchant_order_info_store/{id}', [OrderController::class,'merchant_order_info_store']);
    Route::get('merchant_order_info_edit/{id}', [OrderController::class,'merchant_order_info_edit']);
    Route::post('merchant_order_info_update/{id}', [OrderController::class,'merchant_order_info_update']);


    Route::get('production_order_info_form/{id}', [OrderController::class,'production_order_info_form']);
    Route::post('production_order_info_store/{id}', [OrderController::class,'production_order_info_store']);
    Route::get('production_order_info_edit/{id}', [OrderController::class,'production_order_info_edit']);
    Route::post('production_order_info_update/{id}', [OrderController::class,'production_order_info_update']);


    Route::get('admin_report', [OrderController::class,'admin_report']);
});


Route::group(['prefix' => 'posts','middleware' => 'auth:sanctum'], function() {
    Route::get('/', [PostsController::class,'index']);
    Route::post('add', [PostsController::class,'add']);
    Route::post('update/{id}', [PostsController::class,'update']);
    Route::get('edit/{id}', [PostsController::class,'edit']);
    Route::delete('delete/{id}', [PostsController::class,'delete']);
});
Route::group(['prefix' => 'settings','middleware' => 'auth:sanctum'], function() {
    Route::get('/user_list', [SettingsController::class,'user_list']);
    Route::post('user_save', [SettingsController::class,'user_save']);
    Route::get('user_edit/{id}', [SettingsController::class,'user_edit']);
    Route::post('user_update/{id}', [SettingsController::class,'user_update']);
    Route::delete('user_delete/{id}', [SettingsController::class,'user_delete']);

//    Route::get('/buyer_list', [SettingsController::class,'buyer_list']);
//    Route::post('buyer_save', [SettingsController::class,'buyer_save']);
//    Route::get('buyer_edit/{id}', [SettingsController::class,'buyer_edit']);
//    Route::post('buyer_update/{id}', [SettingsController::class,'buyer_update']);
//    Route::delete('buyer_delete/{id}', [SettingsController::class,'buyer_delete']);
});

Route::group(['prefix' => 'settings','middleware' => 'auth:sanctum'], function() {
    Route::get('/get_user_role', [SettingsController::class,'get_user_role']);
    Route::get('/role_list', [SettingsController::class,'role_list']);
    Route::post('role_save', [SettingsController::class,'role_save']);
    Route::get('role_edit/{id}', [SettingsController::class,'role_edit']);
    Route::post('role_update/{id}', [SettingsController::class,'role_update']);
    Route::delete('role_delete/{id}', [SettingsController::class,'role_delete']);
});

Route::group(['prefix' => 'sample','middleware' => 'auth:sanctum'], function() {
    Route::get('/', [SampleController::class,'pending_requisition']);
    Route::get('all_requisition', [SampleController::class,'all_requisition']);
    Route::post('requisition_store', [SampleController::class,'requisition_store']);
    Route::get('approval/{id}', [SampleController::class,'approval']);
    Route::delete('approve/{id}', [SampleController::class,'approve']);

    Route::get('approval/{id}', [SampleController::class,'approval']);
    Route::get('/sample_add_more_one_list', [SampleController::class,'sample_add_more_one_list']);
    Route::get('/sample_add_more_two_list', [SampleController::class,'sample_add_more_two_list']);

    Route::post('add_pattern_date/{id}', [SampleController::class,'add_pattern_date']);
    Route::post('add_submission_date/{id}', [SampleController::class,'add_submission_date']);

    Route::post('change_status/{id}', [SampleController::class,'change_status']);

    Route::get('/buyer_list', [SampleController::class,'buyer_list']);
    Route::post('buyer_save', [SampleController::class,'buyer_save']);
    Route::get('buyer_edit/{id}', [SampleController::class,'buyer_edit']);
    Route::post('buyer_update/{id}', [SampleController::class,'buyer_update']);
    Route::delete('buyer_delete/{id}', [SampleController::class,'buyer_delete']);
});
