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
    if (Session::has('user')) {
        return redirect('/account');
    }
    else{
        return view('login');
    }
});

Route::get('/register', function () {
    return view('register');
})->middleware('auth.myuser');

Route::get('/formpassword', function () {
    return view('formpassword');
})->middleware('auth.myuser');
//route with middleware
Route::get('/account', function () {
 return view('account');
})->middleware('auth.myuser');

Route::post('/Adduser', [UserController::class, 'register']);
Route::post('/auth', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/changepassword', [UserController::class, 'changepassword']);
