<?php

use App\Http\Controllers\modules\EquipmentController;
use App\Http\Controllers\modules\InventoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchedulingController;
use App\Models\Equipment;
use App\Models\Inventory;

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
    Route::post('CreateEquipment', [EquipmentController::class, 'CreateEquipment'])->name('CreateEquipment');
    Route::get('/editEquipment/{id}', [EquipmentController::class, 'editEquipment'])->name('editEquipment');
    Route::post('/updateEquipment/{id}', [EquipmentController::class, 'updateEquipment'])->name('updateEquipment');
    Route::post('/deleteEquipment', [EquipmentController::class, 'deleteEquipment'])->name('deteleEquipment');

    // INVENTORY
    Route::get('inventory', [InventoryController::class, 'index'])->name('inventory');
    Route::get('addItem', [InventoryController::class, 'addItem'])->name('addItem');
    Route::post('createItem', [InventoryController::class, 'createItem'])->name('createItem');
});
