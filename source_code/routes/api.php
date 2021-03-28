<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Book;
use Laravel\Sanctum\Sanctum;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('token/get', 'AuthController@get_token');
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::get('/cover/{name}', 'BookController@get_cover')->name('get_cover');

 
Route::get('/book/info/{id}', 'ApiController@get_book');

// Route::get('/search/{fragment}', 'SearchController@get_search_from_books');
Route::post('/search', 'SearchController@get_search_from_books');

Route::get('/sections', 'ApiController@get_sections');
Route::get('/sections/{id}', 'ApiController@get_section_info');

Route::get('/author/{id}', 'ApiController@author_info');

Route::get('/test/{id}', 'ApiController@get_test_info');

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::post('/book/progress', 'ApiController@book_progress');
    Route::get('/book/{name}', 'BookController@get_book')->name('get_book');

    Route::get('/profile', 'ApiController@get_profile');

    Route::post('/library/add', 'ApiController@library_add');
    Route::post('/library/delete', 'ApiController@library_delete');
    Route::get('/library/books', 'ApiController@get_library_books');
});