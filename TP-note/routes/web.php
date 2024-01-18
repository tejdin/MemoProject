<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\MovieController;

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

Route::view('/', 'signin');
Route::view('/signin','signin')->name('view_signin');
Route::view('/signup', 'signup')->name('view_signup');

Route::post('/authenticate', [UserController::class, 'connect'])->name('user_authenticate');
Route::post('/adduser', [UserController::class, 'create'])->name('user_adduser');

Route::prefix('admin')->middleware('auth.myuser')->group(function () {
	Route::view('/account', 'account')->name('view_account');
	Route::view('/formpassword','formpassword')->name('view_formpassword');

	Route::post('/changepassword', [UserController::class, 'updatePassword'])->name('user_changepassword');
	Route::get('/deleteuser', [UserController::class, 'delete'])->name('user_deleteuser');
	Route::get('/signout', [UserController::class, 'disconnect'])->name('user_signout');
	Route::prefix('movie')->group(function () {
		Route::view('/formmovie','formmovie')->name('view_formmovie');
		Route::post('/addmovie', [MovieController::class, 'create'])->name('movie_addmovie');
		Route::get('/list', [MovieController::class, 'showMovies'])->name('movie_list');
		Route::get('/one/{id}', [MovieController::class, 'showOneMovie'])->name('movie_one');
		Route::get('/userlist', [MovieController::class, 'showUserMovies'])->name('movie_userlist');
		Route::get('/delete/{id}', [MovieController::class, 'delete'])->name('movie_delete');



	});
});
