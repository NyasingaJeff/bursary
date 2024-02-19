<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
})->name('landingPage');


Route::get('/otp/{otp}/{phoneNumber}', [App\Http\Controllers\HomeController::class, 'otp'])->name('otp');


Route::get('/homeDash' ,[App\Http\Controllers\HomeController::class, 'homeDash'])->name('homeDash');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('/firstRegistration', [App\Http\Controllers\HomeController::class, 'firstRegistration'])->name('firstRegistration');
#Reesend Code
Route::get('/resendOtp',[App\Http\Controllers\HomeController::class, 'resendOtp'])->name("resendOtp");
#viewDashboard
Route::get('/dashBoard',[App\Http\Controllers\HomeController::class, 'dashBoard'])->name('dashBoard');
#checkOtp
Route::post('/checkOtp',[App\Http\Controllers\HomeController::class, 'checkOtp'])->name("checkOtp");



Route::post('/withdrawalRequest',[App\Http\Controllers\TransactionsController::class, 'withdrawalRequest'])->name("withdrawalRequest")->middleware('activeUsers');

Route::post('/sendTransaction',[App\Http\Controllers\TransactionsController::class, 'sendTransaction'])->name("sendTransaction");

Route::get('/allTransactions',[App\Http\Controllers\TransactionsController::class, 'index'])->name("allTransactions");

#accept
Route::get('/recieveTransaction/{id}',[App\Http\Controllers\TransactionsController::class, 'recieveTransaction'])->name("recieveTransaction");

#Reject
Route::get('/rejectTransaction/{id}',[App\Http\Controllers\TransactionsController::class, 'rejectTransaction'])->name("rejectTransaction");

#Reverse
Route::get('/reverseTransaction/{id}',[App\Http\Controllers\TransactionsController::class, 'reverseTransaction'])->name("reverseTransaction");

#all Registrations 
Route::get('/users',[App\Http\Controllers\HomeController::class, 'users'])->name("users");

#Approve the user Request
Route::get("/approveClient/{id}", [App\Http\Controllers\HomeController::class, 'approveClient'])->name("approveClient");

#For Some Reason...  
Route::post("/rejectClient/{id}", [App\Http\Controllers\HomeController::class, 'rejectClient'])->name("rejectClient");

#wallet
Route::get("/transactions", [App\Http\Controllers\HomeController::class, 'wallet'])->name("wallet");

#profile
#pass in the id just incase the admin wants to view a specific
Route::get("/profile", [App\Http\Controllers\HomeController::class, 'profile'])->name("profile");

#notifications
Route::get("/notifications", [App\Http\Controllers\HomeController::class, 'notifications'])->name("notifications");

#download le various files
Route::get("/download/{id}/{fileName}",[App\Http\Controllers\HomeController::class, 'download'])->name("download");

#chnge Password
Route::post("/changePassword",[App\Http\Controllers\Auth\PasswordChangeController::class, 'changePassword'])->name('changePassword');

#read Notification
Route::get("/readNotification/{id}",[App\Http\Controllers\HomeController::class, 'readNotification'])->name('readNotification');

#register new users password
Route::get("/newUSerAccount/{token}" ,[App\Http\Controllers\HomeController::class, 'newUSerAccount'] )->name("newUSerAccount");


Route::post("/beneficiaryRegistration",[App\Http\Controllers\HomeController::class, 'beneficiaryRegistration'])->name('beneficiaryRegistration');

Route::get("/getLocations",[App\Http\Controllers\HomeController::class, 'getLocations'])->name('getLocations');


// Mpesa STK Push Callback Route
Route::post('v1/confirm', [App\Http\Controllers\MpesaSTKPUSHController::class, 'STKConfirm'])->name('mpesa.confirm');

Auth::routes();


