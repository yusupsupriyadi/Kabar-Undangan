<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\User\MempelaiController;
use App\Http\Controllers\User\MempelaiPriaController;
use App\Http\Controllers\User\MempelaiWanitaController;
use App\Http\Controllers\User\SettingAcaraController;
use App\Http\Controllers\User\SettingUndanganController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('home.welcome');
});

Route::prefix('auth')->group(function () {
    Route::controller(RegisteredUserController::class)->group(function () {
        Route::post('/register', 'store');
    });
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
})->middleware(['auth', 'verified']);

Route::controller(UndanganController::class)->group(function () {
    Route::get('/undangan/{id}', 'index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(RegisteredUserController::class)->group(function () {
        Route::get('/complete-register', 'completeRegister')->name('complete-register');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/data-couple', 'dataCouple');
    });

    Route::prefix('mempelai')->group(function () {
        Route::controller(MempelaiController::class)->group(function () {
            Route::get('/get-data-mempelai-pria', 'getDataMempelaiPria');
            Route::get('/get-data-mempelai-wanita', 'getDataMempelaiWanita');
            Route::get('/store-data-mempelai-pria', 'storeMempelaiPria');
            Route::get('/update-data-mempelai-pria', 'updateMempelaiPria');
            Route::get('/store-data-mempelai-wanita', 'storeMempelaiWanita');
            Route::get('/update-data-mempelai-wanita', 'updateMempelaiWanita');
        });
    });

    Route::controller(SettingUndanganController::class)->group(function () {
        Route::get('/setting-undangan', 'index');
        Route::get('/setting-undangan/store', 'store');
    });

    Route::controller(SettingAcaraController::class)->group(function () {
        Route::get('/setting-acara', 'index');
        Route::get('/setting-acara/store', 'store');
    });

    Route::controller(MempelaiPriaController::class)->group(function () {
        Route::get('/mempelai-pria', 'index');
        Route::post('/mempelai-pria/store', 'store');
    });

    Route::controller(MempelaiWanitaController::class)->group(function () {
        Route::get('/mempelai-wanita', 'index');
        Route::post('/mempelai-wanita/store', 'store');
    });
});

require __DIR__ . '/auth.php';
