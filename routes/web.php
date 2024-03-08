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
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ManageSubscriptionController;
use App\Http\Controllers\EquipmentTypeController;
use App\Http\Controllers\modules\UsersController;
use App\Http\Controllers\modules\EquipmentController;
use App\Http\Controllers\modules\InventoryController;
use Illuminate\Support\Facades\Auth;

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
    Route::get('addUser', [UsersController::class, 'addUser'])->name('addUser');
    Route::post('registerUser', [UsersController::class, 'registerUser'])->name('registerUser');
    Route::get('/editUser/{id}', [UsersController::class, 'editUser'])->name('editUser');
    Route::put('/updateUser/{id}', [UsersController::class, 'updateUser'])->name('updateUser');
    Route::delete('/deleteUser/{id}', [UsersController::class, 'deleteUser'])->name('deleteUser');

    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('scheduling', SchedulingController::class);
    Route::get('getallschedules', [SchedulingController::class, 'getAllSchedules']);
    Route::get('getspecificschedule', [SchedulingController::class, 'getSpecificSchedule']);
    Route::get('editschedule/{id}', [SchedulingController::class, 'editSchedule']);
    Route::post('deleteschedule', [SchedulingController::class, 'deleteSchedule']);

    // RESERVATION
    Route::get('reservation', [ReservationController::class, 'index'])->name('reservation');
    Route::post('reserve', [ReservationController::class, 'reserve']);
    Route::get('getuserreservations', [ReservationController::class, 'userReservations']);

    // MEMBERSHIP
    Route::get('membership', [MembershipController::class, 'index'])->name('membership');
    Route::post('membership', [MembershipController::class, 'createMembership'])->name('membership.store');

    // MANAGE MEMBERSHIP

    Route::prefix('manage')->name('manage.')->group(function() {
        Route::resource('subscription', ManageSubscriptionController::class);
    });

    // PAYMENTS
    Route::get("payments", [PaymentsController::class, 'index'])->name('payments');
    Route::get("getuserpayments", [PaymentsController::class, 'getUserPayments']);
    Route::post("updatereferencenumber", [PaymentsController::class, 'updateReferenceNumber']);

    // EQUIPMENT
    Route::resource('equipment', EquipmentController::class);

    // INVENTORY
    Route::resource('inventory', InventoryController::class);

    // ATTENDANCE
    Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance');
    Route::get('attendance/{id}', [AttendanceController::class, 'viewAttendance']);
    Route::get('attendance/attended/{id}/{attendanceId}', [AttendanceController::class, 'attended']);
    Route::get('usernotification/{id}', [AttendanceController::class, 'userNotification']);

    // CONTENTS
    Route::prefix('contents')->name('contents.')->group(function () {
        Route::resource('', ContentController::class);
        Route::resource('learn', LearnController::class);
        Route::resource('faq', FAQController::class);
        Route::resource('contact', ContactController::class);
    });

    // EQUIPMENT TYPES
    Route::resource('equipment_types', EquipmentTypeController::class)->except('show');

    // INSTRUCTOR
    Route::resource('instructor', InstructorController::class);
});
