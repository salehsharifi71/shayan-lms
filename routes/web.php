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
Route::get('/organizer/teachers', 'Organizer\ClassController@classWebinar')->name('orgTeachers');
Route::get('/organizer/users', 'Organizer\ClassController@classWebinar')->name('orgUsers');
Route::any('/organizer/class/{id}', 'Organizer\ClassController@classWebinarEdit')->name('orgClassEdit');
Route::any('/organizer/class/{id}/teacher', 'Organizer\ClassController@classTeacherEdit')->name('orgClassTeacher');
Route::any('/organizer/class/{id}/student', 'Organizer\ClassController@classStudentEdit')->name('orgClassStudent');
Route::post('/organizer/addUser', 'Organizer\ClassController@addUser')->name('addUser');
Route::get('/organizer/classUser/{action}/{id}', 'Organizer\ClassController@changeUser')->name('changeUser');
Route::get('/organizer/changeTeacher/{action}/{id}', 'Organizer\ClassController@changeTeacher')->name('changeTeacher');
Route::any('/organizer/quickLogin/{id}', 'Organizer\ClassController@quickLogin')->name('orgQuickLogin');

Route::any('/support/', 'Organizer\ClassController@classWebinarEdit')->name('support');
Route::any('/support/new', 'Organizer\ClassController@classWebinarEdit')->name('supportNew');

Route::any('/callbackSaman', 'Bank\PaymentController@callbackSaman')->name('callbackSaman');
Route::any('/payment/{kind}/{id?}', 'Bank\PaymentController@makePayment')->name('makePayment');


