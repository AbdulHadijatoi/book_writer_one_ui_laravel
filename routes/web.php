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

Route::get('/dashboard', function () {
    return view('dashboard');
});



Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');

Route::group(['middleware' => 'guest'], function () {
    Route::view('/login', 'auth/login');
    Route::view('/signup', 'auth/signup');
//     Route::post('login-user', [AuthController::class, 'loginUser'])->name('login_user'); 
//     Route::get('register', [AuthController::class, 'register'])->name('register');
//     Route::post('register-user', [AuthController::class, 'registerUser'])->name('register_user'); 
//     Route::get('logout', [AuthController::class, 'logOut'])->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});


require __DIR__.'/auth.php';