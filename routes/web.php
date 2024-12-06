<?php

use App\Http\Middleware\user;

use App\Http\Middleware\admin;
use App\Http\Middleware\logged;
use App\Http\Middleware\helpdesk;
use App\Http\Middleware\department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\URoutesController;
use App\Http\Controllers\Admin\ARoutesController;
use App\Http\Controllers\Helpdesk\HRoutesController;
use App\Http\Controllers\Helpdesk\HelpdeskController;
use App\Http\Controllers\Department\DRoutesController;

Route::get('/', [RoutesController::class, 'landing']);

Route::group(['middleware' => logged::class], function () {
    Route::get('/login', [RoutesController::class, 'index'])->name('login');
    Route::get('/register', [RoutesController::class, 'register'])->name('register');
    Route::post('/login', [Controller::class, 'login'])->name('login');
    Route::post('/register', [Controller::class, 'registerr'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'department', 'as' => 'department.'], function () {
        Route::get('/', [DRoutesController::class, 'dashboard'])->name('/');
        Route::get('tiket', [DRoutesController::class, 'tiket'])->name('utama');
        Route::get('setuju', [DRoutesController::class, 'index'])->name('setuju');
        Route::get('proses', [DRoutesController::class, 'proses'])->name('proses');
        Route::get('tolak', [DRoutesController::class, 'tolak'])->name('tolak');
        Route::get('selesai', [DRoutesController::class, 'selesai'])->name('selesai');
    });
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => admin::class], function () {
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
    Route::group(['prefix' => 'helpdesk', 'as' => 'helpdesk.', 'middleware' => helpdesk::class], function () {
        Route::get('/', [HRoutesController::class, 'index'])->name('/');
        Route::get('/validation', [HRoutesController::class, 'validation'])->name('validation');
        Route::get('/detail/{id}', [HRoutesController::class, 'detail'])->name('detail');
        Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
            Route::post('/store', [HelpdeskController::class, 'helpdeskStore'])->name('store');
            Route::get('/delete/{id}', [HelpdeskController::class, 'helpdeskDelete'])->name('delete');
            Route::post('/update/{id}', [HelpdeskController::class, 'helpdeskUpdate'])->name('update');
        });
    });
    Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => user::class], function () {
        Route::get('/', [URoutesController::class, 'index'])->name('/');
        Route::get('/add', [URoutesController::class, 'add'])->name('add');
        Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
            Route::post('/store', [UserController::class, 'userStore'])->name('store');
            Route::get('/delete/{id}', [UserController::class, 'userDelete'])->name('delete');
            Route::post('/update/{id}', [UserController::class, 'userUpdate'])->name('update');
        });
    });
    Route::get('/profile', [RoutesController::class, 'profile'])->name('profile');
});
Route::get('logout', [Controller::class, 'logout'])->name('logout');
