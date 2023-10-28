<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UserController;
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
        return redirect()->route('main');
    }
    return redirect()->route('login');
});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/main', 'main')->name('main');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/home', [LoginRegisterController::class, 'index'])->name('home');
    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/main', [LoginRegisterController::class, 'main'])->name('main');
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index']);


    Route::get('/usuarios', [UserController::class, 'index']);
    Route::get('/usuario/registrar', [UserController::class, 'create']);
    Route::post('/usuario/registrar', [UserController::class, 'store']);
    Route::get('/usuario/{usuario}/editar', [UserController::class, 'edit']);
    Route::put('/usuario/{usuario}', [UserController::class, 'update']);
    Route::delete('/usuario/{usuario}', [UserController::class, 'destroy']);

    //rutas empresa 
    Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas');
    Route::get('/empresa/registrar', [EmpresaController::class, 'create']);
    Route::post('/empresa/registrar', [EmpresaController::class, 'store']);
    Route::get('/empresa/{empresa}/editar', [EmpresaController::class, 'edit']);
    Route::put('/empresa/{empresa}', [EmpresaController::class, 'update']);
    Route::delete('/empresa/{empresa}', [EmpresaController::class, 'destroy']);

    Route::get('/proyectos', [ProyectoController::class, 'index']);
    Route::get('/proyecto/registrar', [ProyectoController::class, 'create']);
    Route::post('/proyecto/registrar', [ProyectoController::class, 'store']);
    Route::get('/proyecto/{proyecto}/editar', [ProyectoController::class, 'edit']);
    Route::put('/proyecto/{proyecto}', [ProyectoController::class, 'update']);
    Route::delete('/proyecto/{proyecto}', [ProyectoController::class, 'destroy']);
    Route::get('/proyecto/{proyecto}/seguimiento', [ProyectoController::class, 'show']);

});
