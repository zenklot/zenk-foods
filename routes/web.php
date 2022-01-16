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

        // Transaction
        // Route::post('api/transaction/notification', 'TransactionController@store');
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
            Route::post('/dashboard/order/satu-kota', 'OrderController@satu_kota');
            Route::get('/dashboard/api/data-menu', 'DashboardController@api_order_menu')->name('dashboard.api_order_menu');
            Route::get('/dashboard/api/data_indonesia/satu_kota', 'DashboardController@api_satu_kota');
            Route::get('/dashboard/api/data_indonesia/beda_kota', 'DashboardController@api_beda_kota');

            // Transaction
            Route::resource('dashboard/transaction', TransactionController::class)->only(['index', 'show']);
            // Route::get('/dashboard/transaction', 'TransactionController@index')->name('transaction.index');
            // Route::get('/dashboard/transaction', 'TransactionController@index')->name('transaction.index');
            
            Route::group(['middleware' => ['permission']], function()
            {
                Route::resource('/admin/roles', RolesController::class);
                Route::resource('/admin/permissions', PermissionsController::class);

                Route::get('/admin' , 'AdminController@index')->name('admin.index');

                // UsersController
                Route::group(['prefix' => 'admin/users'], function() {
                    Route::get('/', 'UsersController@index')->name('users.index');
                    Route::get('/create', 'UsersController@create')->name('users.create');
                    Route::post('/create', 'UsersController@store')->name('users.store');
                    Route::get('/{user}/show', 'UsersController@show')->name('users.show');
                    Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
                    Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
                    Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
                });
            });
        });
    });


});
