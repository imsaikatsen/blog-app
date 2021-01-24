<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('posts/search','App\Http\Controllers\PostController@search');

Route::get('/', function () {
    return view('welcome');
});


Route::resource('posts', \App\Http\Controllers\PostController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::post('/comment/store/{id}', 'App\Http\Controllers\CommentController@store')->name('comment.add');






