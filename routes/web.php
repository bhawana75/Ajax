<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DropDownController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\LocalLevelController;

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
    return view('welcome');
});
Route::resource('province', ProvinceController::class);
Route::resource('district', DistrictController::class);
Route::resource('locallevel', LocalLevelController::class);
Route::resource('dropdown', DropDownController::class);

Route::get('getdistrict', [DropDownController::class, 'getDistrict'])->name('getDistrict');
Route::get('getlocallevel', [DropDownController::class, 'getLocalLevel'])->name('getLocalLevel');




