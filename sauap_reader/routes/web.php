<?php

use App\Http\Controllers\AdminController;
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
})->where('any', '.*');

Auth::routes();
Route::group(['prefix' => '/admins', 'middleware' => ['auth']], function() {
    Route::get('/', 'AdminController@index')->name('admin-home');
    Route::get('/books', 'AdminController@book')->name('admin-book');
    Route::post('/book/new', 'AdminController@add_book')->name('admin-new-book');
});
