<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::get('/booking', function () {
	return view('booking-form', [
		'today' => now()->format('Y-m-d'),
		'services' => [
			['id' => 1, 'name' => 'Balloon Backdrop', 'price' => 1000, 'emoji' => '🎈', 'category' => 'packages', 'priceLabel' => 'Custom quote'],
			['id' => 2, 'name' => 'Entrance Arch', 'price' => 1500, 'emoji' => '🌸', 'category' => 'packages', 'priceLabel' => 'Custom quote'],
			['id' => 3, 'name' => 'Full Venue Setup', 'price' => 3000, 'emoji' => '🎀', 'category' => 'packages', 'priceLabel' => 'Custom quote'],
			['id' => 4, 'name' => 'Party Host', 'price' => 3500, 'emoji' => '🎤', 'category' => 'entertainment'],
			['id' => 5, 'name' => 'Clown', 'price' => 1000, 'emoji' => '🤡', 'category' => 'entertainment'],
			['id' => 6, 'name' => 'Magician', 'price' => 5000, 'emoji' => '🎩', 'category' => 'entertainment'],
			['id' => 7, 'name' => 'Mascot', 'price' => 1500, 'emoji' => '🐻', 'category' => 'entertainment'],
			['id' => 8, 'name' => 'Bubble Show', 'price' => 2500, 'emoji' => '🫧', 'category' => 'entertainment'],
			['id' => 9, 'name' => 'Balloon Twister', 'price' => 2500, 'emoji' => '🎈', 'category' => 'entertainment'],
			['id' => 10, 'name' => 'Face Painting', 'price' => 2500, 'emoji' => '🎨', 'category' => 'entertainment'],
			['id' => 11, 'name' => 'Cotton Candy', 'price' => 1800, 'emoji' => '🍭', 'category' => 'foodcarts'],
			['id' => 12, 'name' => 'Popcorn', 'price' => 1800, 'emoji' => '🍿', 'category' => 'foodcarts'],
			['id' => 13, 'name' => 'Hotdog', 'price' => 1800, 'emoji' => '🌭', 'category' => 'foodcarts'],
			['id' => 14, 'name' => 'Ice Cream', 'price' => 2800, 'emoji' => '🍦', 'category' => 'foodcarts'],
			['id' => 15, 'name' => 'French Fries', 'price' => 2800, 'emoji' => '🍟', 'category' => 'foodcarts'],
			['id' => 16, 'name' => 'Street Foods', 'price' => 2800, 'emoji' => '🌮', 'category' => 'foodcarts'],
			['id' => 17, 'name' => 'Corndog', 'price' => 2800, 'emoji' => '🌭', 'category' => 'foodcarts'],
			['id' => 18, 'name' => 'Hotdog Waffle', 'price' => 2800, 'emoji' => '🧇', 'category' => 'foodcarts'],
			['id' => 21, 'name' => 'Balloon Stand / Pillars', 'price' => 0, 'emoji' => '🎀', 'category' => 'decor', 'priceLabel' => 'Custom quote'],
			['id' => 22, 'name' => 'Balloon Bouquets', 'price' => 0, 'emoji' => '💐', 'category' => 'decor', 'priceLabel' => 'Custom quote'],
			['id' => 23, 'name' => 'Balloon Centerpieces', 'price' => 0, 'emoji' => '🎁', 'category' => 'decor', 'priceLabel' => 'Custom quote'],
		],
	]);
})->name('booking');
Route::view('/login', 'auth.login')->name('login');
Route::view('/signup', 'auth.signup')->name('signup');
Route::view('/availability', 'availability')->name('availability');
Route::redirect('/bookings', '/booking')->name('bookings.index');

Route::post('/bookings', function () {
	return redirect()->route('booking')->with('booking_success', true);
})->name('bookings.store');

Route::redirect('/index.php', '/');
Route::redirect('/booking/create', '/booking');
Route::redirect('/login.php', '/login');
Route::redirect('/signup.php', '/signup');
Route::redirect('/user/availability.php', '/availability');
