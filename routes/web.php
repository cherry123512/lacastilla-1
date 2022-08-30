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
Route::get('/inventory_list', 'Lacastilla_controller@inventory_list')->name('inventory_list');
Route::get('/inventory_add', 'Lacastilla_controller@inventory_add')->name('inventory_add');
Route::post('/inventory_add_save', 'Lacastilla_controller@inventory_add_save')->name('inventory_add_save');
Route::get('/carousel', 'Lacastilla_controller@carousel')->name('carousel');
Route::post('/carousel_save', 'Lacastilla_controller@carousel_save')->name('carousel_save');
Route::get('/services', 'Lacastilla_controller@services')->name('services');
Route::post('/services_save', 'Lacastilla_controller@services_save')->name('services_save');
Route::post('/message_submit', 'Lacastilla_controller@message_submit')->name('message_submit');
Route::get('/message', 'Lacastilla_controller@message')->name('message');
Route::get('/message_reply/{id}', 'Lacastilla_controller@message_reply')->name('message_reply');
Route::post('/message_process', 'Lacastilla_controller@message_process')->name('message_process');
Route::get('/message_view_reply/{id}', 'Lacastilla_controller@message_view_reply')->name('message_view_reply');
Route::get('/schedule', 'Lacastilla_controller@schedule')->name('schedule');
Route::post('/schedule_process', 'Lacastilla_controller@schedule_process')->name('schedule_process');

Route::get('/reservations', 'Lacastilla_controller@reservations')->name('reservations');
Route::get('/reservation_approved/{id}', 'Lacastilla_controller@reservation_approved')->name('reservation_approved');


Route::get('/carousel_list', 'Lacastilla_controller@carousel_list')->name('carousel_list');
Route::get('/carousel_status/{id}', 'Lacastilla_controller@carousel_status')->name('carousel_status');

