<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin', 'AdminController@index')->name('admin');
    });
 
    Route::group(['middleware' => 'dosen'], function () {
        Route::get('/dosen', 'DosenController@index')->name('dosen');
    });

    Route::group(['middleware' => 'mahasiswa'], function () {
        Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa');
    });
 
    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
    })->name('logout');
 
});
