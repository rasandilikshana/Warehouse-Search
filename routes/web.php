<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\AcademicDevController;
use App\Http\Controllers\AllAccessController;
use App\Http\Controllers\ConstructController;
use App\Http\Controllers\ConstructDevController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemProcessController;

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return view('home');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('editor-home', [EditorController::class, 'index'])->name('editor-home');
    Route::get('academic-home', [AcademicController::class, 'index'])->name('academic-home');
    Route::get('construct-home', [ConstructController::class, 'index'])->name('construct-home');
    Route::get('allaccess-home', [AllAccessController::class, 'index'])->name('allaccess-home');
    Route::get('academic-dev-home', [AcademicDevController::class, 'index'])->name('academic-dev-home');
    Route::get('construct-dev-home', [ConstructDevController::class, 'index'])->name('construct-dev-home');
    Route::get('/developer-item-master', function () {return view('item-process');});

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
        Route::post('upload-excel', 'uploadExcel')->name('products.upload.excel');
        Route::controller(ProductController::class)->prefix('products')->group(function () {
            Route::get('export-excel', 'exportExcel')->name('products.export.excel');
        });
    });

    Route::controller(ServiceController::class)->prefix('services')->group(function () {
        Route::get('', 'index')->name('services');
        Route::get('create', 'create')->name('services.create');
        Route::post('store', 'store')->name('services.store');
        Route::get('show/{id}', 'show')->name('services.show');
        Route::get('edit/{id}', 'edit')->name('services.edit');
        Route::put('edit/{id}', 'update')->name('services.update');
        Route::delete('destroy/{id}', 'destroy')->name('services.destroy');
        Route::post('upload-excel', 'uploadExcel')->name('services.upload.excel');
        Route::controller(ServiceController::class)->prefix('services')->group(function () {
            Route::get('export-excel', 'exportExcel')->name('services.export.excel');
        });
    });

    Route::controller(ItemProcessController::class)->prefix('itemprocesss')->group(function () {
        Route::get('', 'index')->name('itemprocesss');
        Route::get('create', 'create')->name('itemprocesss.create');
        Route::post('store', 'store')->name('itemprocesss.store');
        Route::get('show/{id}', 'show')->name('itemprocesss.show');
        Route::get('edit/{id}', 'edit')->name('itemprocesss.edit');
        Route::put('edit/{id}', 'update')->name('itemprocesss.update');
        Route::delete('destroy/{id}', 'destroy')->name('itemprocesss.destroy');
        Route::post('upload-excel', 'uploadExcel')->name('itemprocesss.upload.excel');
        Route::controller(ItemProcessController::class)->prefix('itemprocesss')->group(function () {
            Route::get('export-excel', 'exportExcel')->name('itemprocesss.export.excel');
        });
    });

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('', 'index')->name('users');
        Route::get('create', 'create')->name('users.create');
        Route::post('store', 'store')->name('users.store');
        Route::get('show/{id}', 'show')->name('users.show');
        Route::get('edit/{id}', 'edit')->name('users.edit');
        Route::put('edit/{id}', 'update')->name('users.update');
        Route::delete('destroy/{id}', 'destroy')->name('users.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});


Route::get('/material-search', function () {
    return view('material-search');
});
Route::get('/service-search', function () {
    return view('service-search');
});


