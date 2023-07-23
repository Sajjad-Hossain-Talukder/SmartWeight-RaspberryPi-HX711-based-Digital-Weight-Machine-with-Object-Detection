<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin;
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

Route::get('/',[admin::class,'home']);

Route::get('weight',[admin::class,'weight']);

Route::get('calibration',[admin::class,'calib']);

Route::post('check-calibration',[admin::class,'check_calib']);

Route::get('measure',[admin::class,'measure']);

Route::post('add-to-cart',[admin::class,'add_to_cart']);

Route::get('checkout',[admin::class,'checkout']);

Route::get('decalibrate', [admin::class, 'decalibrate']);

Route::post('delete/{id}', [admin::class, 'delete']);

Route::get('print', [admin::class, 'print']);
