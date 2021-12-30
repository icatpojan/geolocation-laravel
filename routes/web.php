<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\NexmoController;

//maps developer
Route::get('get-ip-address', [UserController::class, 'get_ip_address']);
Route::get('get-latitude', [UserController::class, 'get_latitude']);
Route::get('mark-location', [UserController::class, 'mark_location']);
Route::get('set-mark', [UserController::class, 'set_mark']);
Route::get('polylines', [UserController::class, 'polylines']);
Route::get('jarak', [UserController::class, 'jarak']);


// sms gateway
Route::get('/nexmo', [NexmoController::class, 'index']);
Route::post('/nexmo', [NexmoController::class, 'store'])->name('nexmo.submit');
