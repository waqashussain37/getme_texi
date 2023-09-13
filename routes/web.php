<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;

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

Route::get('/nova-redirect/resources/{resource}/{id?}', 'NovaResourceRedirectController')->name('nova.resource');

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::post('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::get('/booking/{id}/vehicle', [BookingController::class, 'vehicle'])->name('booking.vehicle.index');
Route::get('/booking/{id}/vehicle/{vehicle_id}/select',
    [BookingController::class, 'selectVehicle'])->name('booking.vehicle.select');
Route::get('/booking/{id}/details', [BookingController::class, 'details'])->name('booking.details.index');
Route::get('/booking/{id}/add_extra/{extraId}', [BookingController::class, 'addExtra']);
Route::get('/booking/{id}/get_prices', [BookingController::class, 'getPrices']);

Route::middleware('auth')->group(function () {
    Route::get('/operator/dashboard',
        [\App\Http\Controllers\OperatorController::class, 'dashboard'])->name('operator.dashboard');
    Route::get('/operator/bookings',
        [\App\Http\Controllers\OperatorController::class, 'bookings'])->name('operator.bookings');
    Route::get('/operator/bookings/{id}/edit',
        [\App\Http\Controllers\OperatorController::class, 'editBooking'])->name('operator.edit_booking');
    Route::post('/operator/bookings/{id}/edit', [
        \App\Http\Controllers\OperatorController::class,
        'editBookingPost'
    ])->name('operator.edit_booking_post');
    Route::get('/operator/meeting_points',
        [\App\Http\Controllers\OperatorController::class, 'meetingPoints'])->name('operator.meeting_points');
    Route::get('/operator/meeting_points/add',
        [\App\Http\Controllers\OperatorController::class, 'addMeetingPoint'])->name('operator.add_meeting_point');
    Route::post('/operator/meeting_points/add', [
        \App\Http\Controllers\OperatorController::class,
        'addMeetingPointPost'
    ])->name('operator.add_meeting_point_post');
    Route::get('/operator/meeting_points/{id}/edit',
        [\App\Http\Controllers\OperatorController::class, 'editMeetingPoint'])->name('operator.edit_meeting_point');
    Route::get('/operator/meeting_points/{id}/delete',
        [\App\Http\Controllers\OperatorController::class, 'deleteMeetingPoint'])->name('operator.delete_meeting_point');
    Route::post('/operator/meeting_points/{id}/edit', [
        \App\Http\Controllers\OperatorController::class,
        'editMeetingPointPost'
    ])->name('operator.edit_meeting_point_post');
    Route::get('/operator/cars', [\App\Http\Controllers\OperatorController::class, 'cars'])->name('operator.cars');
    Route::get('/operator/cars/add',
        [\App\Http\Controllers\OperatorController::class, 'addCar'])->name('operator.add_car');
    Route::post('/operator/cars/add',
        [\App\Http\Controllers\OperatorController::class, 'addCarPost'])->name('operator.add_car_post');
    Route::get('/operator/cars/{id}/edit',
        [\App\Http\Controllers\OperatorController::class, 'editCar'])->name('operator.edit_car');
    Route::get('/operator/cars/{id}/delete',
        [\App\Http\Controllers\OperatorController::class, 'deleteCar'])->name('operator.delete_car');
    Route::post('/operator/cars/{id}/edit',
        [\App\Http\Controllers\OperatorController::class, 'editCarPost'])->name('operator.edit_car_post');
    Route::get('/operator/drivers',
        [\App\Http\Controllers\OperatorController::class, 'drivers'])->name('operator.drivers');
    Route::get('/operator/drivers/add',
        [\App\Http\Controllers\OperatorController::class, 'addDriver'])->name('operator.add_driver');
    Route::post('/operator/drivers/add',
        [\App\Http\Controllers\OperatorController::class, 'addDriverPost'])->name('operator.add_driver_post');
    Route::get('/operator/drivers/{id}/edit',
        [\App\Http\Controllers\OperatorController::class, 'editDriver'])->name('operator.edit_driver');
    Route::get('/operator/drivers/{id}/delete',
        [\App\Http\Controllers\OperatorController::class, 'deleteDriver'])->name('operator.delete_driver');
    Route::post('/operator/drivers/{id}/edit',
        [\App\Http\Controllers\OperatorController::class, 'editDriverPost'])->name('operator.edit_driver_post');
    Route::get('/operator/bookings/{id}/accept',
        [\App\Http\Controllers\OperatorController::class, 'acceptBooking'])->name('operator.accept_booking');
    Route::post('/operator/bookings/{id}/accept',
        [\App\Http\Controllers\OperatorController::class, 'acceptBookingPost'])->name('operator.accept_booking_post');
    Route::get('/operator/settings', [
        \App\Http\Controllers\OperatorController::class,
        'settings'
    ])->name('operator.settings');
    Route::post('/operator/settings', [
        \App\Http\Controllers\OperatorController::class,
        'settingsPost'
    ])->name('operator.settings_post');
    Route::get('/price_import', [
        \App\Http\Controllers\OperatorController::class,
        'priceImport'
    ])->name('operator.price_import');
    Route::post('/price_import', [
        \App\Http\Controllers\OperatorController::class,
        'priceImportPost'
    ])->name('operator.price_import_post');

});

Route::any('/driver/bookings', [\App\Http\Controllers\DriverController::class, 'bookings'])->name('driver.bookings');
Route::get('/driver/settings', [\App\Http\Controllers\DriverController::class, 'settings'])->name('driver.settings');
Route::post('/driver/settings',
    [\App\Http\Controllers\DriverController::class, 'updateSettings'])->name('driver.updateSettings');

Route::get('/page/{slug}', [\App\Http\Controllers\PageController::class, 'show'])->name('pages.show');
Route::get('/pages/faq', [\App\Http\Controllers\PageController::class, 'faq'])->name('pages.faq');
Route::get('/pages/contact', [\App\Http\Controllers\PageController::class, 'contact'])->name('pages.contact');
Route::post('/pages/contact',
    [\App\Http\Controllers\PageController::class, 'storeContact'])->name('pages.contact.store');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
