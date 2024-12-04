<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\authmiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ARoutesController;
use App\Http\Controllers\Department\DRoutesController;
use App\Http\Controllers\Helpdesk\HelpdeskController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\RegisterController;
use Illuminate\Session\Middleware\AuthenticateSession;

Route::get('/', [RoutesController::class, 'landing']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'register'])->name('register');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'department', 'as' => 'department.'], function () {
        Route::get('/', [DRoutesController::class, 'dashboard'])->name('/');
        Route::get('profile', [DRoutesController::class, 'profile'])->name('profile');
        Route::get('tiket', [DRoutesController::class, 'tiket'])->name('utama');
        Route::get('setuju', [DRoutesController::class, 'index'])->name('setuju');
        Route::get('proses', [DRoutesController::class, 'proses'])->name('proses');
        Route::get('tolak', [DRoutesController::class, 'tolak'])->name('tolak');
        Route::get('selesai', [DRoutesController::class, 'selesai'])->name('selesai');
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [ARoutesController::class, 'index'])->name('/');
        Route::get('/profile', [ARoutesController::class, 'profile'])->name('profile');

        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', [ARoutesController::class, 'user'])->name('/');
            Route::get('add', [ARoutesController::class, 'adduser'])->name('add');
            Route::get('/edit/{id}', [ARoutesController::class, 'edituser'])->name('edit_user');
            Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
                Route::post('/store', [AdminController::class, 'userStore'])->name('store');
                Route::get('/delete/{id}', [AdminController::class, 'userDelete'])->name('delete');
                Route::post('/update/{id}', [AdminController::class, 'userUpdate'])->name('update');
            });
        });

        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('/', [ARoutesController::class, 'category'])->name('');
            Route::get('/add', [ARoutesController::class, 'addcategory'])->name('add');
            Route::get('/edit/{id}', [ARoutesController::class, 'editcategory'])->name('edit');
            Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
                Route::post('/store', [AdminController::class, 'categoryStore'])->name('store');
                Route::get('/delete/{id}', [AdminController::class, 'categoryDelete'])->name('delete');
                Route::post('/update/{id}', [AdminController::class, 'categoryUpdate'])->name('update');
            });
        });

        Route::group(['prefix' => 'department', 'as' => 'department.'], function () {
            Route::get('/', [ARoutesController::class, 'depart'])->name('/');
            Route::get('/add', [ARoutesController::class, 'adddepart'])->name('add');
            Route::get('/edit/{id}', [ARoutesController::class, 'editdepart'])->name('edit');
            Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
                Route::post('/store', [AdminController::class, 'departmentStore'])->name('store');
                Route::get('/delete/{id}', [AdminController::class, 'departmentDelete'])->name('delete');
                Route::post('/update/{id}', [AdminController::class, 'departmentUpdate'])->name('update');
            });
        });
    });
});
Route::get('logout', [DRoutesController::class, 'logout'])->name('logout');

//HAK AKSES HELPDESK
Route::get('helpdesk/dashboard', [HelpdeskController::class, 'index'])->name('dashboard');
Route::get('helpdesk/profile', [HelpdeskController::class, 'profile'])->name('profile');
Route::get('helpdesk/detail', [HelpdeskController::class, 'detail'])->name('detail');
Route::get('helpdesk/validasi', [HelpdeskController::class, 'validasi'])->name('validasi');

//HAK AKSES USER 
Route::get('user/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::get('user/add', [UserController::class, 'add_request'])->name('request');
Route::get('user/profile', [UserController::class, 'profile'])->name('profile');
