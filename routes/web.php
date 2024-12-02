<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Department\DRoutesController;
use App\Http\Controllers\Admin\ARoutesController;
use Illuminate\Session\Middleware\AuthenticateSession;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoutesController;
use App\Http\Middleware\authmiddleware;

Route::get('/', [RoutesController::class, 'landing']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'department', 'as' => 'department.'], function () {
        Route::get('dashboard', [DRoutesController::class, 'dashboard'])->name('dashboard');
        Route::get('profile', [DRoutesController::class, 'profile'])->name('profile');
        Route::get('tiket', [DRoutesController::class, 'tiket'])->name('tiket_utama');
        Route::get('setuju', [DRoutesController::class, 'index'])->name('tiket_setuju');
        Route::get('proses', [DRoutesController::class, 'proses'])->name('tiket_proses');
        Route::get('tolak', [DRoutesController::class, 'tolak'])->name('tiket_tolak');
        Route::get('selesai', [DRoutesController::class, 'selesai'])->name('tiket_selesai');
    });
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', [ARoutesController::class, 'index'])->name('dashboard');
        Route::get('/user', [ARoutesController::class, 'user'])->name('dashboard');
        Route::get('/profile', [ARoutesController::class, 'profile'])->name('profile');
        Route::get('/add', [ARoutesController::class, 'adduser'])->name('add');
    });
});
Route::get('logout', [DRoutesController::class, 'logout'])->name('logout');
