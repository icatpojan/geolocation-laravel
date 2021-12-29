<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::get('get-ip-address', [UserController::class, 'get_ip_address']);
Route::get('get-latitude', [UserController::class, 'get_latitude']);
Route::get('mark-location', [UserController::class, 'mark_location']);
