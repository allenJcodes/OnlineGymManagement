<?php

use App\Http\Controllers\modules\EquipmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchedulingController;

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

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('scheduling', SchedulingController::class);

    // EQUIPMENT
    Route::get('equipment', [EquipmentController::class, 'index'])->name('equipment');
    Route::get('AddEquipment', [EquipmentController::class, 'AddEquipment'])->name('AddEquipment');
});
