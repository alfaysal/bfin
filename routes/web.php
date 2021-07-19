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
    return view('front-end.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {

    Route::get('/','Admin\Auth\LoginController@showLoginForm')->name('admin-login');
    Route::post('/save','Admin\Auth\LoginController@login')->name('admin_login_save');
   
});

Route::get('admin/home','BackEnd\BackEndController@index')->name('admin-home')->middleware('auth:admin');


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {

    Route::get('/dashboard','FrontEnd\ProfileController@userDashboard')->name('user_dashboard');
    


});

Route::group(['prefix' => 'blog', 'middleware' => 'auth'], function () {

    Route::get('/dashboard','FrontEnd\BlogController@createBlog')->name('create_blog');
   
});