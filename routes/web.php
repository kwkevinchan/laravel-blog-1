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
//前台
Route::get('/', 'BlogController@index');
Route::get('/news', 'BlogController@index_news');
Route::get('/games', 'BlogController@index_games');
Route::get('/anime', 'BlogController@index_anime');
Route::post('/blog', 'BlogController@blog_create');
//後台
Route::group(['middleware' =>['auth:web']], function(){
    Route::resource('/blogs', 'BlogController');
    Route::delete('/blog/{blog}', 'BlogController@blog_delete');
    Route::get('/blog_back', 'BlogController@index_back');
});

//auth範例
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
