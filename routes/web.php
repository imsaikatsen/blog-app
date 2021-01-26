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


Auth::routes(['verify' => true]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('posts/search','App\Http\Controllers\PostController@search');
Route::resource('posts', \App\Http\Controllers\PostController::class);

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::post('/comment/store/{id}', 'App\Http\Controllers\CommentController@store')->name('comment.add');


Route::post('/sendmail/send/{id}','App\Http\Controllers\SendEmailController@send');
Route::get('posts/pdf/{id}','App\Http\Controllers\PostController@createPDF');








