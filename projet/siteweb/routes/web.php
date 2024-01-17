<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MemoController;

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

Route::get('home', [MemoController::class, 'showPublicMemos'])->name('home');
Route::post('deletememo', [MemoController::class, 'deleteMemo'])->name('deletememo');
//showonememo
Route::get('showonememo', [MemoController::class, 'showOneMemo'])->name('showonememo');

Route::prefix('admin')->middleware('auth.myuser')->group(function () {
    Route::get('updateMemo', [MemoController::class, 'updateShowView'])->name('updateMemo');
    Route::put('updateMemo', [MemoController::class, 'UpdateMemo'])->name('updateMemo');
    Route::get('/updateMemoStatus',[MemoController::class, 'updateStatus'])->name('updateMemoStatus');
    Route::get('/formpassword', function () {
        return view('formpassword');
    })->name('formpassword');
    Route::get('/account', function () {
        return view('account');
    })->name('account');
    Route::get('/formmemo', function () {
        return view('formmemo');
    })->name('formmemo');
    Route::get('/showmemos', [MemoController::class, 'showMemos'])->name('showmemos');

    Route::post('/formmemoadd', [MemoController::class, 'createMemo'])->name('formmemoadd');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/changepassword', [UserController::class, 'changepassword'])->name('changepassword');


});
Route::post('/auth', [UserController::class, 'login'])->name('auth');
Route::post('/Adduser', [UserController::class, 'register'])->name('Adduser');
