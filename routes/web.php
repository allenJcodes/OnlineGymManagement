<?php

use App\Http\Controllers\ArchiveController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\ReservationController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GymSessionController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EquipmentTypeController;
use App\Http\Controllers\modules\UsersController;
use App\Http\Controllers\ManagePaymentModeController;
use App\Http\Controllers\modules\EquipmentController;
use App\Http\Controllers\modules\InventoryController;
use App\Http\Controllers\ManageSubscriptionController;
use App\Http\Controllers\UserAttendanceController;
use App\Http\Controllers\UserNotificationController;
use App\Models\User;

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

Route::get('/account/verify/{user}/{code}', function ($user, $code) {

    $user = User::where('id', $user)->where('verification_token', $code);

    if ($user) {
        $user->update([
            'verification_token' => null,
            'email_verified_at' => now()
        ]);

        return redirect()->route('login')->with('toast', [
            'status' => 'success',
            'message' => 'Account verified'
        ]);
    }

    return redirect()->route('login')->with('toast', [
        'status' => 'error',
        'message' => 'Code expired'
    ]);
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    // PROFILE
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // USERS
    Route::resource('user', UsersController::class);


    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('scheduling', SchedulingController::class);
    Route::get('getallschedules', [SchedulingController::class, 'getAllSchedules']);
    Route::get('getspecificschedule', [SchedulingController::class, 'getSpecificSchedule']);

    // RESERVATION
    // Route::get('reservation', [ReservationController::class, 'index'])->name('reservation');
    // Route::post('reserve', [ReservationController::class, 'reserve']);
    // Route::get('getuserreservations', [ReservationController::class, 'userReservations']);

    // MEMBERSHIP
    Route::resource('membership', MembershipController::class)->only(['index', 'store']);
    Route::delete('membership/{id}/cancel', [MembershipController::class, 'cancelMembership'])->name('membership.cancel');
    // Route::post('membership', [MembershipController::class, 'createMembership'])->name('membership.store');

    // MANAGE MEMBERSHIP
    Route::prefix('manage')->name('manage.')->group(function () {
        Route::resource('subscription', ManageSubscriptionController::class);
    });

    // PAYMENTS
    Route::get('/payments/report', [PaymentsController::class, 'printReports'])->name('payments.print');
    Route::post('/payments/updateStatus', [PaymentsController::class, 'updateStatus'])->name('payments.updateStatus');
    Route::resource('payments', PaymentsController::class)->only(['index', 'show']);

    // MANAGE PAYMENTS
    Route::prefix('manage')->name('manage.')->group(function () {
        Route::resource('payment_modes', ManagePaymentModeController::class);
    });

    // EQUIPMENT
    Route::resource('equipment', EquipmentController::class);

    // INVENTORY
    Route::resource('inventory', InventoryController::class)->except(['show']);
    Route::get('/inventory/getItemType', [InventoryController::class, 'getItemType'])->name('getItemType');

    // ATTENDANCE
    Route::resource('attendance', AttendanceController::class);
    // Route::get('attendance/{id}', [AttendanceController::class, 'viewAttendance']);
    // Route::get('attendance/attended/{id}/{attendanceId}', [AttendanceController::class, 'attended']);
    // Route::get('usernotification/{id}', [AttendanceController::class, 'userNotification']);
    Route::get('/user_notifications/clear', [UserNotificationController::class, 'clearNotifications'])->name('clearNotifications');

    // CONTENTS
    Route::prefix('contents')->name('contents.')->group(function () {
        Route::resource('', ContentController::class);
        Route::resource('gym_session', GymSessionController::class);
        Route::resource('learn', LearnController::class);
        Route::resource('faq', FAQController::class);
        Route::resource('contact', ContactController::class);
        Route::post("contact/updateMap", [ContactController::class, 'updateMap'])->name('contact.updateMap');
    });

    // EQUIPMENT TYPES
    Route::resource('equipment_types', EquipmentTypeController::class)->except('show');

    // INSTRUCTOR
    Route::resource('instructor', InstructorController::class);

    // CUSTOMER SUBSCRIPTIONS
    Route::resource('subscription', SubscriptionController::class);

    // USER_ATTENDANCE
    Route::resource('user_attendance', UserAttendanceController::class);

    Route::prefix('archive')->name('archive.')->group(function () {
        Route::resource('', ArchiveController::class);
        Route::get('users', [ArchiveController::class, 'usersIndex'])->name('users.index');
        Route::get('instructors', [ArchiveController::class, 'instructorsIndex'])->name('instructors.index');
        Route::get('gym_session', [ArchiveController::class, 'gymSessionIndex'])->name('gym_session.index');
        Route::get('learn', [ArchiveController::class, 'learnIndex'])->name('learn.index');
        Route::get('faq', [ArchiveController::class, 'faqIndex'])->name('faq.index');
        Route::get('contact', [ArchiveController::class, 'contactIndex'])->name('contact.index');
        Route::get('equipments', [ArchiveController::class, 'equipmentsIndex'])->name('equipments.index');
        Route::get('inventory', [ArchiveController::class, 'inventoryIndex'])->name('inventory.index');
        Route::get('manage_subscriptions', [ArchiveController::class, 'manageSubscriptionsIndex'])->name('manage_subscriptions.index');

        Route::put('users/restore', [UsersController::class, 'restore'])->name('users.restore');
        Route::put('instructors/restore', [InstructorController::class, 'restore'])->name('instructors.restore');
        Route::put('gym_session/restore', [GymSessionController::class, 'restore'])->name('gym_session.restore');
        Route::put('learn/restore', [LearnController::class, 'restore'])->name('learn.restore');
        Route::put('faq/restore', [FAQController::class, 'restore'])->name('faq.restore');
        Route::put('contact/restore', [ContactController::class, 'restore'])->name('contact.restore');
        Route::put('equipments/restore', [EquipmentController::class, 'restore'])->name('equipments.restore');
        Route::put('inventory/restore', [InventoryController::class, 'restore'])->name('inventory.restore');
        Route::put('manage_subscriptions/restore', [ManageSubscriptionController::class, 'restore'])->name('manage_subscriptions.restore');
    });
});
