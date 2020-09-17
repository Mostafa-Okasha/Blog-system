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
Route::get('/posts','PostController@index');
Route::get('/posts/show/{id}','PostController@show');

Route::group(['middleware' => ['isloggedin']], function () {

    //create
    Route::get('/posts/create','PostController@create');
    Route::post('/posts/store','PostController@store');
    //update
    Route::get('/posts/edit/{id}','PostController@edit');
    Route::post('/posts/update/{id}','PostController@update');
    //delete
    Route::get('/posts/delete/{id}','PostController@delete');

    //crud admins

    Route::get('/admins','UserController@index');
    Route::get('/admins/show/{id}','UserController@show');
    //create
    Route::get('/admins/create','UserController@create');
    Route::post('/admins/store','UserController@store');
    //update
    Route::get('/admins/edit/{id}','UserController@edit');
    Route::post('/admins/update/{id}','UserController@update');
    //delete
    Route::get('/admins/delete/{id}','UserController@delete');
    //logout
    Route::get('/admins/logout','UserController@logout');



});


    //comments

    Route::get('/comments','CommentController@index');
    Route::get('/comments/show/{id}','CommentController@show');
    //create
    Route::get('/comments/create','CommentController@create');
    Route::post('/comments/store','CommentController@store');
    //update
    Route::get('/comments/edit/{id}','CommentController@edit');
    Route::post('/comments/update/{id}','CommentController@update');
    //delete
    Route::get('/comments/delete/{id}','CommentController@delete');


//login
Route::get('/admins/login','UserController@login');
Route::post('/admins/handlelog','UserController@handlelog');
//contact us
Route::get('/messages/message','MessageController@message');
Route::post('/messages/store','MessageController@store');
