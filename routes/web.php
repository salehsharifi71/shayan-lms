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
});

Route::get('/page/{slug}', 'HomeController@page')->name('page');
Auth::routes(['verify' => true]);
Route::get('/organizer/dashboard', 'Organizer\DashboardController@dashboard')->name('home');
Route::get('/organizer/site', 'Organizer\SiteController@index')->name('orgSite');
