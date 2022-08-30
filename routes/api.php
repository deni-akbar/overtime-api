<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(["prefix"=>"employee"],function(){
    Route::post("/store",[EmployeeController::class,"store"])->name('employee.store');
});

Route::group(["prefix"=>"overtime"],function(){
    Route::post("/store",[OvertimeController::class,"store"])->name('overtime.store');
});

Route::group(["prefix"=>"overtime-pays"],function(){
    Route::get("/calculate/{month}",[OvertimeController::class,"overtimePays"])->name('overtime.calculate');
});

Route::group(["prefix"=>"setting"],function(){
    Route::post("/update",[SettingController::class,"update"])->name('setting.update');
});
