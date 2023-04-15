<?php

use App\Http\Controllers\Auth\LoginRegisterController;
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
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
Route::get('/home', [LoginRegisterController::class, 'index'])->name('home');
Route::get('/register', [LoginRegisterController::class,'register'])->name('register');
Route::post('/store', [LoginRegisterController::class,'store'])->name('store');
Route::get('/login', [LoginRegisterController::class,'login'])->name('login');
Route::post('/authenticate', [LoginRegisterController::class,'authenticate'])->name('authenticate');
Route::post('/logout', [LoginRegisterController::class,'logout'])->name('logout');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [LoginRegisterController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
});