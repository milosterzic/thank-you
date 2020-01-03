<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', DashboardController::class . '@index')->name('dashboard');

Route::resource('dashboard/philanthropists', PhilanthropistsController::class)->except([
    'index', 'show',
]);

Route::post('dashboard/donations/notify', DonationsController::class . '@notify')->name('donations.notify');
