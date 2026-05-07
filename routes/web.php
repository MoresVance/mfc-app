<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::get('/booking', fn () => redirect()->route('bookings.create'))->name('booking');
Route::get('/login', [AuthController::class, 'createLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/signup', [AuthController::class, 'createRegister'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/availability', [AvailabilityController::class, 'index'])->name('availability');

Route::middleware('auth')->group(function (): void {
	Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
	Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
	Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
	Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
	Route::post('/bookings/{booking}/upload-payment', [BookingController::class, 'uploadPayment'])->name('bookings.upload-payment');
});

Route::middleware(['auth', 'admin'])
	->prefix('admin')
	->name('admin.')
	->group(function (): void {
		Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
		Route::get('/bookings/calendar', [AdminBookingController::class, 'calendar'])->name('bookings.calendar');
		Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])->name('bookings.show');
		Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.update-status');
		Route::patch('/availability/{date}/status', [AvailabilityController::class, 'setDateStatus'])
			->where('date', '\\d{4}-\\d{2}-\\d{2}')
			->name('availability.set-date-status');
	});

Route::redirect('/index.php', '/');
Route::redirect('/booking/create', '/booking');
Route::redirect('/login.php', '/login');
Route::redirect('/signup.php', '/signup');
Route::redirect('/user/availability.php', '/availability');
