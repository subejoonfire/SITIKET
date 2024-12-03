<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\authmiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ARoutesController;
use App\Http\Controllers\Department\DRoutesController;
use App\Http\Controllers\Helpdesk\HelpdeskController;
use App\Http\Controllers\RegisterController;
use Illuminate\Session\Middleware\AuthenticateSession;

Route::get('/', [RoutesController::class, 'landing']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'register'])->name('register');

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
        Route::get('/user', [ARoutesController::class, 'user'])->name('user');
        Route::get('/profile', [ARoutesController::class, 'profile'])->name('profile');
        Route::get('/add', [ARoutesController::class, 'adduser'])->name('add');
        Route::get('/edit/{id}', [ARoutesController::class, 'edit_user'])->name('edit_user');

        Route::get('/category', [ARoutesController::class, 'category'])->name('category');
        Route::get('/addcategory', [ARoutesController::class, 'addcategory'])->name('addcategory');
        Route::get('/editcategory', [ARoutesController::class, 'editcategory'])->name('editcategory');

        Route::get('/depart', [ARoutesController::class, 'depart'])->name('depart');
        Route::get('/add_depart', [ARoutesController::class, 'add_depart'])->name('add_depart');
        Route::get('/editdepart', [ARoutesController::class, 'editdepart'])->name('editdepart');
        
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::post('store', [AdminController::class, 'store'])->name('store');
            Route::get('delete/{id}', [AdminController::class, 'delete'])->name('delete');
            Route::post('update', [AdminController::class, 'update'])->name('update');
        });
    });    
});
Route::get('logout', [DRoutesController::class, 'logout'])->name('logout');

//HAK AKSES HELPDESK
Route::post('/helpdesk', [HelpdeskController::class, 'index'])->name('helpdesk');

