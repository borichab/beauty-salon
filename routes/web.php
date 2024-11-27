<?php

use App\SliderImages;
use App\parlours;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ParlourController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderImage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    $photos = SliderImages::all();
    $parlours = parlours::where('availability', 'available')->get();
    return view('welcome', compact('photos', 'parlours'));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Parlour, User, and Service Resources
Route::resource('/parlours', ParlourController::class);
Route::get('parlours/{id}', [ParlourController::class, 'show']);
Route::get('parlours/{id}/edit', [ParlourController::class, 'edit']);
Route::put('parlours/{id}', [ParlourController::class, 'update']);

Route::resource('/users', UserController::class);
Route::resource('/service', ServiceController::class);
Route::get('/admin/dashboard', [ServiceController::class, 'indexServ'])->name('dashboard');
Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
Route::put('service/{id}', [ServiceController::class, 'update'])->name('service.update');
Route::post('service/{id}/disable', [ServiceController::class, 'disable'])->name('service.disable');


// Slider image routes
Route::resource('/addSliderImage', SliderImage::class);

// Parlour details route
Route::get('/parlour/{parlour}', [ParlourController::class, 'parlourIndex'])->name('parlour');

// User info route
Route::get('/users/{user}', [UserController::class, 'userInfo'])->name('user');

// Appointments routes
Route::middleware('auth')->group(function () {
    Route::get('/appointments/create', [AppointmentController::class, 'showForm'])->name('appointments.create')->middleware('auth');
    Route::get('/appointmentrequests', [AppointmentController::class, 'manageAppointments'])->name('appointmentrequests');

    Route::post('/appointments', [AppointmentController::class, 'create'])->name('appointments.store');

    Route::patch('/appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
});

