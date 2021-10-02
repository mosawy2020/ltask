<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\adminController;

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
// route home page
Route::get('/',[App\Http\Controllers\HomeController::class ,'movies'] )->name('home');

// route authontication
Auth::routes();

// route for verifiy email with roken
Route::get('/verify/{token}',[App\Http\Controllers\Auth\RegisterController::class,'verifyEmail'])->name('user.verify');

// route albums page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('albums');

// route group for admin 
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login',[adminController::class, 'adminlogin']);
    Route::post('/login',[adminController::class, 'checkadminlogin'])->name('save.admin.login');
    Route::get('/dashboard',[adminController::class, 'dashboard'])->middleware('auth:admin')->name('dashboard');
    Route::get('/layout',[adminController::class, 'layout'])->middleware('auth:admin')->name('layout');
    Route::get('/users',[adminController::class, 'users'])->middleware('auth:admin')->name('users');
    Route::get('/index',[adminController::class, 'index'])->name('admin.index');
    Route::get('/album-user/{id}',[adminController::class,'showlabum'])->name('users.show.album');
    Route::resource('album-admin',adminController::class);
});




//resource route for handle album
Route::resource('album', 'App\Http\Controllers\album\albumController');


// route for edit user info
Route::resource('info', 'App\Http\Controllers\user\infoController');


// route for admin edit and manage users
Route::group(['prefix' => 'edits','middleware' => 'auth:admin'], function () {
Route::resource('users', 'App\Http\Controllers\Admin\usersController');
Route::resource('admins',  'App\Http\Controllers\Admin\editAdminController');

Route::resource('roles',  'App\Http\Controllers\Admin\roleController');
});

