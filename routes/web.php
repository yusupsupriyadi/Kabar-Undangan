<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\MempelaiController;
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
    return view('home.welcome');
});

Route::prefix('auth')->group(function () {
    Route::controller(RegisteredUserController::class)->group(function () {
        Route::post('/register', 'store');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(RegisteredUserController::class)->group(function () {
        Route::get('/complete-register', 'completeRegister');
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
});

require __DIR__ . '/auth.php';
