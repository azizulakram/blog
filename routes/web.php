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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'Admin\ProfileController@edit')->name('profile.edit');
Route::patch('profile', 'Admin\ProfileController@update')->name('profile.update');

Route::group(['middleware'=> ['auth','admin']], function(){

    Route::get('/dashboard',function() {
    return view('admin.dashboard');
    });

    Route::get('/role-register','Admin\DashboardController@registered')->name('role-register');

    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit')->name('role-edit');
    Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate')->name('role-register');
    Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete')->name('role-delete');

    Route::get('/abouts','Admin\AboutusController@index')->name('abouts');
    
});
