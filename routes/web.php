<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

// Route::get('/index', function () {
//     return view('welcome');
// });

// Route::get('/home', 'View_controller@index')->name('home');
// Route::get('/', [App\Http\Controllers\View_controller::class, 'index'])->name('welcome');


Route::get('/', 'View_controller@index')->name('home');

Route::get('booking', 'View_controller@booking')->name('booking');
Route::post('booking_process', 'View_controller@booking_process')->name('booking_process');
Route::get('logout', 'View_controller@logout')->name('logout');
Route::get('client_reservation', 'View_controller@client_reservation')->name('client_reservation');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth', 'verified']);

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');





Route::get('/lacastilla_admin', 'Lacastilla_controller@lacastilla_admin')->name('lacastilla_admin');
Route::get('/inventory_list', 'Lacastilla_controller@inventory_list')->name('inventory_list')->middleware(['auth', 'verified']);
Route::get('/inventory_add', 'Lacastilla_controller@inventory_add')->name('inventory_add')->middleware(['auth', 'verified']);
Route::post('/inventory_add_save', 'Lacastilla_controller@inventory_add_save')->name('inventory_add_save')->middleware(['auth', 'verified']);
Route::get('/carousel', 'Lacastilla_controller@carousel')->name('carousel')->middleware(['auth', 'verified']);
Route::post('/carousel_save', 'Lacastilla_controller@carousel_save')->name('carousel_save')->middleware(['auth', 'verified']);
Route::get('/services', 'Lacastilla_controller@services')->name('services')->middleware(['auth', 'verified']);
Route::post('/services_save', 'Lacastilla_controller@services_save')->name('services_save')->middleware(['auth', 'verified']);
Route::post('/message_submit', 'Lacastilla_controller@message_submit')->name('message_submit');
Route::get('/message', 'Lacastilla_controller@message')->name('message')->middleware(['auth', 'verified']);
Route::get('/message_reply/{id}', 'Lacastilla_controller@message_reply')->name('message_reply')->middleware(['auth', 'verified']);
Route::post('/message_process', 'Lacastilla_controller@message_process')->name('message_process')->middleware(['auth', 'verified']);
Route::get('/message_view_reply/{id}', 'Lacastilla_controller@message_view_reply')->name('message_view_reply')->middleware(['auth', 'verified']);
Route::get('/schedule', 'Lacastilla_controller@schedule')->name('schedule')->middleware(['auth', 'verified']);
Route::post('/schedule_process', 'Lacastilla_controller@schedule_process')->name('schedule_process')->middleware(['auth', 'verified']);

Route::get('/reservations', 'Lacastilla_controller@reservations')->name('reservations')->middleware(['auth', 'verified']);
Route::get('/reservation_approved/{id}', 'Lacastilla_controller@reservation_approved')->name('reservation_approved')->middleware(['auth', 'verified']);
