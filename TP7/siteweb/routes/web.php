<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');


Route::get('/register', function () {
    return view('register');
})->name('register');


Route::prefix('admin')->middleware('auth.myuser')->group(function () {
    Route::get('/formpassword', function () {
        return view('formpassword');
    })->name('formpassword');
    Route::get('/account', function () {
        return view('account');
    })->name('account');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/changepassword', [UserController::class, 'changepassword'])->name('changepassword');


});
Route::post('/auth', [UserController::class, 'login'])->name('auth');
Route::post('/Adduser', [UserController::class, 'register'])->name('Adduser');
