<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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
//verifikasi email user
Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
  Route::get('/', [HomeController::class, 'index']);
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Login
Route::get('/login', function () {
  return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('post.login');

// Register
Route::get('/register', function () {
  return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('post.register');

// Setting Profile
Route::get('/setting', function () {
  return view('setting');
})->name('setting-profile');


Route::put('update-user/{id}', [AuthController::class, 'update']);
Route::post('/setting', [AuthController::class, 'updateProfileImage'])->name('update.profile.image');
