<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/page/{slug}', 'HomeController@page')->name('page');
Auth::routes(['verify' => true]);
Route::get('/organizer/dashboard', 'Organizer\DashboardController@dashboard')->name('home');
Route::any('/organizer/site', 'Organizer\SiteController@index')->name('orgSite');
Route::get('/organizer/package', 'Organizer\SiteController@package')->name('orgPackage');
Route::get('/organizer/class', 'Organizer\ClassController@classWebinar')->name('orgClass');
Route::any('/organizer/class/{id}', 'Organizer\ClassController@classWebinarEdit')->name('orgClassEdit');

Route::any('/support/', 'Organizer\ClassController@classWebinarEdit')->name('support');
Route::any('/support/new', 'Organizer\ClassController@classWebinarEdit')->name('supportNew');

Route::any('/payment/{kind}/{id?}', 'Bank\PaymentController@makePayment')->name('makePayment');
Route::any('/payment/callbackSaman', 'Bank\PaymentController@callbackSaman')->name('callbackSaman');
