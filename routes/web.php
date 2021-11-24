<?php

use App\Http\Controllers\MahasiswaController;
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

Route::get('/', 'ArsipsuratController@index');
Route::get('/lihat_surat/{id}', 'ArsipsuratController@lihat');
Route::get('/arsip/delete/{id}', 'ArsipsuratController@destroy');
Route::get('/about', function () {
    return view('about');
});
Route::post('/simpanarsip', 'ArsipsuratController@store')->name('simpanarsip');
Route::post('/editarsip', 'ArsipsuratController@update')->name('editarsip');
