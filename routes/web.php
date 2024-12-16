<?php

use App\Http\Middleware\user;

use App\Http\Middleware\admin;
use App\Http\Middleware\logged;
use App\Http\Middleware\helpdesk;
use App\Http\Middleware\pic;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\URoutesController;
use App\Http\Controllers\Admin\ARoutesController;
use App\Http\Controllers\Helpdesk\HRoutesController;
use App\Http\Controllers\Helpdesk\HelpdeskController;
use App\Http\Controllers\PIC\PRoutesController;
use App\Http\Controllers\PIC\PICController;

Route::get('/', [RoutesController::class, 'landing']);

Route::group(['middleware' => logged::class], function () {
    Route::get('/login', [RoutesController::class, 'index'])->name('login');
    Route::get('/register', [RoutesController::class, 'register'])->name('register');
    Route::post('/login', [Controller::class, 'login'])->name('login');
    Route::post('/register', [Controller::class, 'registerr'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'pic', 'as' => 'pic.', 'middleware' => pic::class], function () {
        Route::get('/', [PRoutesController::class, 'dashboard'])->name('/');
        Route::group(['prefix' => 'ticket', 'as' => 'ticket.'], function () {
            Route::get('/', [PRoutesController::class, 'ticket'])->name('/');
            Route::get('approved', [PRoutesController::class, 'approved'])->name('approved');
            Route::get('declined', [PRoutesController::class, 'declined'])->name('declined');
            Route::get('processed', [PRoutesController::class, 'processed'])->name('processed');
            Route::get('done', [PRoutesController::class, 'done'])->name('processed');
            Route::get('review/{type}/{id}', [PRoutesController::class, 'review'])->name('review');
        });
        Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
            Route::get('approved/{id}', [PICController::class, 'approved'])->name('approved');
            Route::get('declined/{id}', [PICController::class, 'declined'])->name('declined');
            Route::get('processed/{id}', [PICController::class, 'processed'])->name('processed');
            Route::get('done/{id}', [PICController::class, 'done'])->name('processed');
        });
        Route::post('message_store/{id}', [PICController::class, 'message_store'])->name('message_store/{id}');
    });
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => admin::class], function () {
        Route::get('/', [ARoutesController::class, 'index'])->name('/');
        Route::get('/profile', [ARoutesController::class, 'profile'])->name('profile');

        Route::group(['prefix' => 'module', 'as' => 'module.'], function () {
            Route::get('/', [ARoutesController::class, 'module'])->name('index');
            Route::get('add', [ARoutesController::class, 'addmodule'])->name('addmodule');
            Route::get('/edit/{id}', [ARoutesController::class, 'editmodule'])->name('edit');
            Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
                Route::post('/store', [AdminController::class, 'moduleStore'])->name('store');
                Route::get('/delete/{id}', [AdminController::class, 'moduleDelete'])->name('delete');
                Route::post('/update/{id}', [AdminController::class, 'moduleUpdate'])->name('update');
            });
        });
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', [ARoutesController::class, 'user'])->name('/');
            Route::get('add', [ARoutesController::class, 'adduser'])->name('add');
            Route::get('/edit/{id}', [ARoutesController::class, 'edituser'])->name('edit');
            Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
                Route::post('/store', [AdminController::class, 'userStore'])->name('store');
                Route::get('/delete/{id}', [AdminController::class, 'userDelete'])->name('delete');
                Route::post('/update/{id}', [AdminController::class, 'userUpdate'])->name('update');
            });
        });
        // Route::group(['prefix' => 'department', 'as' => 'department.'], function () {
        //     Route::get('/', [ARoutesController::class, 'depart'])->name('/');
        //     Route::get('/add', [ARoutesController::class, 'adddepart'])->name('add');
        //     Route::get('/edit/{id}', [ARoutesController::class, 'editdepart'])->name('edit');
        //     Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
        //         Route::post('/store', [AdminController::class, 'departmentStore'])->name('store');
        //         Route::get('/delete/{id}', [AdminController::class, 'departmentDelete'])->name('delete');
        //         Route::post('/update/{id}', [AdminController::class, 'departmentUpdate'])->name('update');
        //     });
        // });
        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('/', [ARoutesController::class, 'category'])->name('/');
            Route::get('/add', [ARoutesController::class, 'addcategory'])->name('add');
            Route::get('/edit/{id}', [ARoutesController::class, 'editcategory'])->name('edit');
            Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
                Route::post('/store', [AdminController::class, 'categoryStore'])->name('store');
                Route::get('/delete/{id}', [AdminController::class, 'categoryDelete'])->name('delete');
                Route::post('/update/{id}', [AdminController::class, 'categoryUpdate'])->name('update');
            });
        });
    });
    Route::group(['prefix' => 'helpdesk', 'as' => 'helpdesk.', 'middleware' => helpdesk::class], function () {
        Route::get('/', [HRoutesController::class, 'index'])->name('/');
        Route::get('/history', [HRoutesController::class, 'history'])->name('history');
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
        Route::get('review/{id}', [URoutesController::class, 'review'])->name('review/{id}');
        Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
            Route::post('/store', [UserController::class, 'userStore'])->name('store');
            Route::get('/delete/{id}', [UserController::class, 'userDelete'])->name('delete');
            Route::post('/update/{id}', [UserController::class, 'userUpdate'])->name('update');
        });
        Route::post('message_store/{id}', [UserController::class, 'message_store'])->name('message_store/{id}');
    });
    Route::get('/profile', [RoutesController::class, 'profile'])->name('profile');
    Route::post('update/profile', [RoutesController::class, 'profile_update'])->name('update/profile');
    Route::post('/profile/image', [Controller::class, 'image_update'])->name('profile/image');
    Route::post('message_store/{id}', [Controller::class, 'message_store'])->name('message_store/{id}');
});
Route::get('logout', [Controller::class, 'logout'])->name('logout');
