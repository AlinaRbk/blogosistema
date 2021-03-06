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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('categories')->group(function() {
    Route::get('', 'App\Http\Controllers\CategoryController@index')->name('category.index');
    Route::get('create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
    Route::post('store', 'App\Http\Controllers\CategoryController@store')->name('category.store');
    Route::get('show/{category}', 'App\Http\Controllers\CategoryController@show')->name('category.show'); 

});
Route::prefix('posts')->group(function() {
    Route::get('', 'App\Http\Controllers\PostController@index')->name('post.index');
    Route::get('create', 'App\Http\Controllers\PostController@create')->name('post.create');
    Route::post('store', 'App\Http\Controllers\PostController@store')->name('post.store');

});