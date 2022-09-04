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

Route::post('/inventory_list_update_reference_number/', 'Lacastilla_controller@inventory_list_update_reference_number')->name('inventory_list_update_reference_number');
Route::post('/inventory_list_update_type_object/', 'Lacastilla_controller@inventory_list_update_type_object')->name('inventory_list_update_type_object');
Route::post('/inventory_list_update_location_object/', 'Lacastilla_controller@inventory_list_update_location_object')->name('inventory_list_update_location_object');
Route::post('/inventory_list_update_description_title/', 'Lacastilla_controller@inventory_list_update_description_title')->name('inventory_list_update_description_title');
Route::post('/inventory_list_update_number_of_pieces/', 'Lacastilla_controller@inventory_list_update_number_of_pieces')->name('inventory_list_update_number_of_pieces');
Route::post('/inventory_list_update_lenght/', 'Lacastilla_controller@inventory_list_update_lenght')->name('inventory_list_update_lenght');
Route::post('/inventory_list_update_width/', 'Lacastilla_controller@inventory_list_update_width')->name('inventory_list_update_width');
Route::post('/inventory_list_update_weight/', 'Lacastilla_controller@inventory_list_update_weight')->name('inventory_list_update_weight');
Route::post('/inventory_list_update_height/', 'Lacastilla_controller@inventory_list_update_height')->name('inventory_list_update_height');
Route::post('/inventory_list_update_diameter/', 'Lacastilla_controller@inventory_list_update_diameter')->name('inventory_list_update_diameter');
Route::post('/inventory_list_update_medium_material/', 'Lacastilla_controller@inventory_list_update_medium_material')->name('inventory_list_update_medium_material');
Route::post('/inventory_list_update_maker_artist/', 'Lacastilla_controller@inventory_list_update_maker_artist')->name('inventory_list_update_maker_artist');
Route::post('/inventory_list_update_location_of_signature/', 'Lacastilla_controller@inventory_list_update_location_of_signature')->name('inventory_list_update_location_of_signature');
Route::post('/inventory_list_update_date_of_birth/', 'Lacastilla_controller@inventory_list_update_date_of_birth')->name('inventory_list_update_date_of_birth');
Route::post('/inventory_list_update_location_of_date_on_object/', 'Lacastilla_controller@inventory_list_update_location_of_date_on_object')->name('inventory_list_update_location_of_date_on_object');
Route::post('/inventory_list_update_writing_other_than_signature/', 'Lacastilla_controller@inventory_list_update_writing_other_than_signature')->name('inventory_list_update_writing_other_than_signature');
Route::post('/inventory_list_update_place_collected/', 'Lacastilla_controller@inventory_list_update_place_collected')->name('inventory_list_update_place_collected');
Route::post('/inventory_list_update_date_received/', 'Lacastilla_controller@inventory_list_update_date_received')->name('inventory_list_update_date_received');
Route::post('/inventory_list_update_original_as_shown/', 'Lacastilla_controller@inventory_list_update_original_as_shown')->name('inventory_list_update_original_as_shown');
Route::post('/inventory_list_update_object_original_used/', 'Lacastilla_controller@inventory_list_update_object_original_used')->name('inventory_list_update_object_original_used');
Route::post('/inventory_list_update_date_receipt/', 'Lacastilla_controller@inventory_list_update_date_receipt')->name('inventory_list_update_date_receipt');
Route::post('/inventory_list_update_item_description/', 'Lacastilla_controller@inventory_list_update_item_description')->name('inventory_list_update_item_description');
Route::post('/inventory_list_update_condition_of_object/', 'Lacastilla_controller@inventory_list_update_condition_of_object')->name('inventory_list_update_condition_of_object');
Route::post('/inventory_list_update_history/', 'Lacastilla_controller@inventory_list_update_history')->name('inventory_list_update_history');
Route::post('/inventory_list_update_purchase_or_received/', 'Lacastilla_controller@inventory_list_update_purchase_or_received')->name('inventory_list_update_purchase_or_received');
Route::post('/inventory_list_update_personal_story_of_this_object/', 'Lacastilla_controller@inventory_list_update_personal_story_of_this_object')->name('inventory_list_update_personal_story_of_this_object');










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
Route::get('/carousel_update/{id}', 'Lacastilla_controller@carousel_update')->name('carousel_update');
Route::post('/carousel_update_process', 'Lacastilla_controller@carousel_update_process')->name('carousel_update_process');
Route::post('/carousel_update_image', 'Lacastilla_controller@carousel_update_image')->name('carousel_update_image');




Route::get('/services_update/{id}', 'Lacastilla_controller@services_update')->name('services_update');
Route::post('/services_update_process', 'Lacastilla_controller@services_update_process')->name('services_update_process');
Route::post('/services_update_image', 'Lacastilla_controller@services_update_image')->name('services_update_image');


Route::get('/about_us/', 'Lacastilla_controller@about_us')->name('about_us');
Route::post('/about_us_process', 'Lacastilla_controller@about_us_process')->name('about_us_process');
Route::get('/about_us_update/{id}', 'Lacastilla_controller@about_us_update')->name('about_us_update');
Route::post('/about_us_update_process', 'Lacastilla_controller@about_us_update_process')->name('about_us_update_process');

