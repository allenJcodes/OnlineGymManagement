<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\modules\UsersController;
use App\Http\Controllers\modules\EquipmentController;
use App\Http\Controllers\modules\InventoryController;


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


// TODO: create controller for welcome page
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    // PROFILE
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // USERS
    Route::get('users', [UsersController::class, 'index'])->name('users');
    Route::get('addUsers', [UsersController::class, 'addUsers'])->name('addUsers');
    Route::post('registerUser', [UsersController::class, 'registerUser'])->name('registerUser');
    Route::get('/editUser/{id}', [UsersController::class, 'editUser'])->name('editUser');
    Route::post('/updateUser/{id}', [UsersController::class, 'updateUser'])->name('updateUser');
    Route::post('/deleteUser', [UsersController::class, 'deleteUser'])->name('deleteUser');

    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('scheduling', SchedulingController::class);
    Route::get('getallschedules', [SchedulingController::class, 'getAllSchedules']);
    Route::get('getspecificschedule', [SchedulingController::class, 'getSpecificSchedule']);
    Route::get('editschedule/{id}', [SchedulingController::class, 'editSchedule']);
    Route::post('deleteschedule', [SchedulingController::class, 'deleteSchedule']);

    //RESERVATION
    Route::get('reservation', [ReservationController::class, 'index'])->name('reservation');
    Route::post('reserve', [ReservationController::class, 'reserve']);
    Route::get('getuserreservations', [ReservationController::class, 'userReservations']);

    Route::get('membership', [MembershipController::class, 'index'])->name('membership');
    Route::post('membership', [MembershipController::class, 'createMembership']);

    // PAYMENTS
    Route::get("payments", [PaymentsController::class, 'index'])->name('payments');
    Route::get("getuserpayments", [PaymentsController::class, 'getUserPayments']);
    Route::post("updatereferencenumber", [PaymentsController::class, 'updateReferenceNumber']);

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
    Route::get('/editItem/{id}', [InventoryController::class, 'editItem'])->name('editItem');
    Route::post('/updateItem/{id}', [InventoryController::class, 'updateItem'])->name('updateItem');
    Route::post('/deleteItem', [InventoryController::class, 'deleteItem'])->name('deleteItem');

    // ATTENDANCE
    Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance');
    Route::get('attendance/{id}', [AttendanceController::class, 'viewAttendance']);
    Route::get('attendance/attended/{id}/{attendanceId}', [AttendanceController::class, 'attended']);
    Route::get('usernotification/{id}', [AttendanceController::class, 'userNotification']);
});
