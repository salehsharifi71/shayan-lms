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
Route::any('/jm/{hash}', 'HomeController@joinQuickRoom')->name('showIframe');

if ( \App\Model\Organizer\Organizer::where('domain', request()->server->get('HTTP_HOST'))->first()) {
    Route::get('/', 'Sites\SiteController@index')->name('PublicSite');
    Route::get('/c/{hash}', 'Sites\SiteController@showClass')->name('PublicClass');
    Route::any('/login', 'Sites\AuthController@login')->name('login');
    Route::any('/register', 'Sites\AuthController@register')->name('register');
    Route::any('/dashboard', 'Sites\PanelController@dashboard')->name('siteDashboard');
    Route::any('/signUpMeeting/{hash}', 'Sites\PanelController@signUpMeeting')->name('signUpMeeting');
    Route::any('/joinMeeting/{hash}', 'Sites\PanelController@joinMeeting')->name('joinMeeting');
}elseif(request()->server->get('HTTP_HOST')==env('APP_LTE')||request()->server->get('HTTP_HOST')=='127.0.0.1:8000') {

    Auth::routes(['verify' => true]);
    Route::get('/', 'HomeController@landing')->name('welcome');
    Route::get('/salehgoto', 'HomeController@salehgoto');
    Route::any('/demo', 'HomeController@demo')->name('demo');
    Route::any('/meet/{hash}', 'HomeController@directAccess')->name('directAccess');
    Route::any('/joinIframe/{hash}', 'HomeController@joinIframe')->name('joinIframe');
    Route::any('/page/{slug}', 'HomeController@page')->name('page');
    Route::any('/organizer/articles/', 'BlogController@articles')->name('articles')->middleware('auth');
    Route::any('/organizer/article/{id}', 'BlogController@edit')->name('articleEdit')->middleware('auth');
    Route::any('/blog/', 'BlogController@index')->name('blogIndex');
    Route::any('/blog/{blog}', 'BlogController@single')->name('blogSingle');
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
    Route::get('/callbackZarinPal', 'Bank\PaymentController@callbackZarinPal')->name('callbackZarinPal');
    Route::any('/payment/{kind}/{id?}', 'Bank\PaymentController@makePayment')->name('makePayment');
}else{

    Route::get('{any?}/{?any}', function ( ) {
        //
        return "<center><a href='http://".env('APP_LTE')."'>".env('APP_LTE')."</a></center>";
    });

    Route::get('{any?}', function ( ) {
        //
        return "<center><a href='http://".env('APP_LTE')."'>".env('APP_LTE')."</a></center>";
    });
}

