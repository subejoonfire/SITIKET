<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Department\DRoutesController;
use App\Http\Controllers\Admin\ARoutesController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoutesController;

Route::get('/', [RoutesController::class, 'landing']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('department/dashboard', [DRoutesController::class, 'dashboard'])->name('department/dashboard');
Route::get('department/profile', [DRoutesController::class, 'profile'])->name('department/profile');
Route::get('/setuju', [DRoutesController::class, 'index'])->name('tiket_setuju');
Route::get('/proses', [DRoutesController::class, 'proses'])->name('tiket_proses');
Route::get('/tolak', [DRoutesController::class, 'tolak'])->name('tiket_tolak');
Route::get('/selesai', [DRoutesController::class, 'selesai'])->name('tiket_selesai');
Route::get('/tiket', [DRoutesController::class, 'tiket'])->name('tiket_utama');
