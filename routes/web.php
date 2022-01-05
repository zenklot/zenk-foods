<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::group(['namespace' => 'App\Http\Controllers'], function()
{

    Route::group(['middleware' => ['guest']], function ()
    {
        // Main
        Route::get('/', 'MainController@index')->name('main.index');
        Route::get('/menu', 'MainController@menu');
        Route::get('/booking', 'MainController@booking');
        Route::get('/order', 'MainController@order');

        // Register
        Route::get('/register', 'RegisterController@index')->name('register.index');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        // Login
        Route::get('/login', 'LoginController@index')->name('login.index');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });


    Route::group(['middleware' => ['auth']], function()
    {
        // verifikasi router
        Route::get('/email/verify', 'VerificationController@index')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
        Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');        
        Route::post('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::group(['middleware' => ['verified']], function()
        {
            Route::get('/dashboard/booking', 'DashboardController@booking')->name('dashboard.booking');
            Route::get('/dashboard/order', 'DashboardController@order')->name('dashboard.order');
        });
    });


});






// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

// Auth::routes(['verify' => true]);
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout'])->middleware(['auth','verified']);

// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', function(){
//     return view('dashboard.index', ['active' => 'home']);
// })->middleware(['auth','verified']);
