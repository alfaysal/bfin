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

Route::get('/details/{id}','FrontEnd\BlogController@blogDetails')->name('blog_details');


Route::group(['prefix' => 'admin'], function () {

    Route::get('/','Admin\Auth\LoginController@showLoginForm')->name('admin-login');
    Route::post('/save','Admin\Auth\LoginController@login')->name('admin_login_save');
    Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin_logout');
   
});

Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function () {

    Route::get('/home','BackEnd\BackEndController@index')->name('admin-home');
   
});

Route::group(['prefix' => 'section','middleware' => 'auth:admin'], function () {

    Route::get('/page','BackEnd\SectionController@index')->name('section');
    Route::get('/data','BackEnd\SectionController@sectionData')->name('section_data');
    Route::post('/store','BackEnd\SectionController@sectionSave');
    Route::post('/edit','BackEnd\SectionController@sectionEdit');
    Route::post('/update','BackEnd\SectionController@sectionUpdate');
    Route::post('/delete','BackEnd\SectionController@sectionDelete');
   
});

Route::group(['prefix' => 'tag','middleware' => 'auth'], function () {

    Route::get('/page','FrontEnd\TagController@index')->name('tag');
    Route::post('/store','FrontEnd\TagController@tagSave')->name('add_tag');
    Route::post('/edit','FrontEnd\TagController@sectionEdit');
    Route::post('/update','FrontEnd\TagController@sectionUpdate');
    Route::post('/delete','FrontEnd\TagController@sectionDelete');
   
});



Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {

    Route::get('/dashboard','FrontEnd\ProfileController@userDashboard')->name('user_dashboard');
   
});

Route::group(['prefix' => 'blog', 'middleware' => 'auth'], function () {

    Route::get('/create','FrontEnd\BlogController@createBlog')->name('create_blog');
    Route::post('/save','FrontEnd\BlogController@saveBlog')->name('save_stories');
    Route::post('/comment/save','FrontEnd\CommentController@commentSave')->name('add_comment');
    Route::post('/comment/reply/save','FrontEnd\CommentController@commentReplySave')->name('reply_save');
   
});