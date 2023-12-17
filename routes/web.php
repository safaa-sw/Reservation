<?php

use Illuminate\Support\Facades\Route;
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

/** Routes For Store Home Page */
Route::get('/', function () {
    return redirect()->route('visaRes');
});
Route::get('/visaRes', [App\Http\Controllers\HomeController::class, 'visaRes'])->name('visaRes');
/********************************************************************************************************* */


/** Routes For User */
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//welcome page for guest reservation request
Route::get('/welcomeguestreq/{id}', 'App\Http\Controllers\GuestReqController@welcomeGuest')->name('welcomeguestreq');

//reservation request routes
Route::get('/mobileInfo/{guestId}', 'App\Http\Controllers\GuestReqController@mobileInfo')->name('guestreqs.mobileInfo');
Route::post('/mobileInfo/{guestId}', 'App\Http\Controllers\GuestReqController@addMobileInfo')->name('guestreqs.mobileInfo');
Route::get('/passportInfo/{guestReqId}', 'App\Http\Controllers\GuestReqController@passportInfo')->name('guestreqs.passportInfo');
Route::post('/passportInfo/{guestReqId}', 'App\Http\Controllers\GuestReqController@addPassportInfo')->name('guestreqs.passportInfo');
Route::get('/accommodationInfo/{guestReqId}', 'App\Http\Controllers\GuestReqController@accommodationInfo')->name('guestreqs.accommodationInfo');
Route::post('/accommodationInfo/{guestReqId}', 'App\Http\Controllers\GuestReqController@addAccommodationInfo')->name('guestreqs.accommodationInfo');
Route::get('/companionInfo/{guestReqId}', 'App\Http\Controllers\GuestReqController@companionInfo')->name('guestreqs.companionInfo');
Route::post('/companionInfo/{guestReqId}', 'App\Http\Controllers\GuestReqController@addCompanionInfo')->name('guestreqs.companionInfo');

//final page for guest reservation request
Route::get('/finalGuest', 'App\Http\Controllers\GuestReqController@finalGuest')->name('finalGuest');


/********************************************************************************************************* */


/** Routes For Admin */
Route::prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin/home');
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin/login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin/login');
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin/logout');

    Route::middleware('auth:admin')->group(function () {
        //guest function
        Route::resource('guests', 'App\Http\Controllers\GuestController');

        //guest requests functions
        Route::resource('guestreqs', 'App\Http\Controllers\GuestReqController');

        //send welcome Email to guest
        Route::get('send-guest-email/{id}', [App\Http\Controllers\SendEmailController::class, 'guestMail'])->name('send-guest-email');

        //send email to guest to inform him that his reservation request is accept
        Route::get('send-guest-req-email/{id}', [App\Http\Controllers\SendEmailController::class, 'guestReqMail'])->name('send-guest-req-email');

        //show companion info
        Route::get('/companionShow/{guestReqId}', 'App\Http\Controllers\GuestReqController@companionShow')->name('guestreqs.companionShow');
    });
});
/********************************************************************************************************* */
