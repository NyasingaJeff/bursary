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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

#this will handle the api to send the otp
// 

Route::get("/validate/{idNo}" ,[App\Http\Controllers\HomeController::class, 'validator'] )->name("validator");

// push le stk using the normal Js 
Route::get('/v1/mpesatest/stk/push/{idNumber}/{phoneNumber}', [App\Http\Controllers\MpesaSTKPUSHController::class, 'STKPush']);

Route::post('v1/confirm', [App\Http\Controllers\MpesaSTKPUSHController::class, 'STKConfirm'])->name('mpesa.confirm');

Route::get("fieldValidator/{modelName}/{fieldName}/{value}",[\App\Http\Controllers\HomeController::class,'fieldValidator']);
