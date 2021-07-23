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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


Route::group(['prefix' => 'blog'], function () {

   Route::get('/details/{id}','FrontEnd\BlogController@blogDetails')->name('blog_details');
   Route::get('/tag/search/{id}','FrontEnd\BlogController@TagCategorized')->name('blog_tag_search');
   Route::get('/section/search/{id}','FrontEnd\BlogController@SectionCategorized')->name('blog_section_search');
   Route::post('/search','FrontEnd\BlogController@BlogSearch')->name('blog_search');
   
});


Route::group(['prefix' => 'admin'], function () {

    Route::get('/','Admin\Auth\LoginController@showLoginForm')->name('admin-login');
    Route::post('/save','Admin\Auth\LoginController@login')->name('admin_login_save');
    Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin_logout');
   
});

Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function () {

    Route::get('/home','BackEnd\BackEndController@index')->name('admin-home');
    Route::get('/all/users','BackEnd\BackEndController@allUsers')->name('all_users');
    Route::post('/user/blocked','BackEnd\BackEndController@userBlocked')->name('blocked_user');
   
});

Route::group(['prefix' => 'blog','middleware' => 'auth:admin'], function () {

    Route::get('/index','BackEnd\BackEndController@blogIndex')->name('all_blogs');
    Route::get('/details/backend/{id}','BackEnd\BackEndController@blogDetailsBackEnd')->name('blog_detail_backend');
    Route::get('/comment/delete/{id}','BackEnd\BackEndController@CommentDelete')->name('comment_delete');
    Route::get('/comment/reply/delete/{id}','BackEnd\BackEndController@CommentReplyDelete')->name('comment_reply_delete');
    Route::post('/blocked','BackEnd\BackEndController@blogBlocked')->name('blocked_status');
    Route::post('/search/backend','BackEnd\BackEndController@blogSearchBackend')->name('search_back_end');
   
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
    Route::get('/blogs','FrontEnd\ProfileController@MyBlogs')->name('my_blogs');
    Route::get('/info/edit/{id}','FrontEnd\ProfileController@editUserInfo')->name('edit_user_info');
    Route::post('/info/update','FrontEnd\ProfileController@updateUserInfo')->name('update_profile');
   
});

Route::group(['prefix' => 'blog', 'middleware' => 'auth'], function () {

    Route::get('/create','FrontEnd\BlogController@createBlog')->name('create_blog');
    Route::post('/save','FrontEnd\BlogController@saveBlog')->name('save_stories');
    Route::post('/update','FrontEnd\BlogController@updateBlog')->name('edit_stories');
    Route::get('/delete/{id}','FrontEnd\BlogController@deleteBlog')->name('blog_delete');
    Route::get('/edit/{id}','FrontEnd\BlogController@editBlog')->name('blog_edit');
    Route::post('/comment/save','FrontEnd\CommentController@commentSave')->name('add_comment');
    Route::post('/comment/reply/save','FrontEnd\CommentController@commentReplySave')->name('reply_save');
   
});