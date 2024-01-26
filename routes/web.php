<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\User\CeritaCintaController;
use App\Http\Controllers\User\GalleryController;
use App\Http\Controllers\User\KadoNikahController;
use App\Http\Controllers\User\KirimUndangan;
use App\Http\Controllers\User\MempelaiController;
use App\Http\Controllers\User\MempelaiPriaController;
use App\Http\Controllers\User\MempelaiWanitaController;
use App\Http\Controllers\User\MusicBackgroundController;
use App\Http\Controllers\User\PhotoBackgroundController;
use App\Http\Controllers\User\SettingAcaraController;
use App\Http\Controllers\User\SettingUndanganController;
use App\Http\Controllers\User\TemaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Production
Route::domain(env('APP_URL'))->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);
});

// Development
// Route::get('/', [WelcomeController::class, 'index']);


Route::domain('{subdomain}.' . env('APP_URL'))->group(function () {
    Route::get('/', [WelcomeController::class, 'undangan'])->name('subdomain');
});


Route::get('/pernikahan/{name}', [WelcomeController::class, 'undangan']);

Route::get('/pilihan-tema', function () {
    return view('pilihan-tema.index');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/admin/users', 'users');
        Route::get('/admin/blog', 'blog');
        Route::get('/admin/get-users', 'getUsers')->name('admin.get-users');
        Route::post('/admin/update-user', 'updateUser')->name('admin.update-user');
        Route::post('/admin/delete-user', 'deleteUser')->name('admin.delete-user');
    });
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index');
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/get-article', 'getArticle')->name('get-article');
        Route::post('/create-article', 'createArticle')->name('create-article');
        Route::post('/create-category', 'createCategory')->name('create-category');
        Route::get('/get-category', 'getCategory')->name('get-category');
        Route::post('/create-tag', 'createTag')->name('create-tag');
        Route::get('/get-tag', 'getTag')->name('get-tag');
    });
});

Route::controller(KirimUndangan::class)->group(function () {
    Route::get('/kirim-undangan', 'index');
});

Route::controller(UndanganController::class)->group(function () {
    Route::post('/undangan/send-pesan', 'sendPesan');
});

Route::prefix('auth')->group(function () {
    Route::controller(RegisteredUserController::class)->group(function () {
        Route::post('/register', 'store');
    });
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
})->middleware(['auth', 'verified']);

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

    Route::controller(CeritaCintaController::class)->group(function () {
        Route::get('/cerita-cinta', 'index');
        Route::post('/cerita-cinta/store', 'store');
        Route::get('/cerita-cinta/get-data', 'getData');
        Route::post('/cerita-cinta/delete', 'destroy');
        Route::post('/cerita-cinta/update', 'update');
    });

    Route::controller(GalleryController::class)->group(function () {
        Route::get('/gallery', 'index');
        Route::get('/gallery/get-data', 'getData');
        Route::post('/gallery/store', 'store');
        Route::get('/gallery/destroy', 'destroy');
        Route::post('/gallery/update', 'update');
    });

    Route::controller(PhotoBackgroundController::class)->group(function () {
        Route::get('/photo-background', 'index');
        Route::get('/photo-background/get-data', 'getData');
        Route::post('/photo-background/store', 'store');
        Route::get('/photo-background/destroy', 'destroy');
        Route::post('/photo-background/update', 'update');
    });

    Route::controller(MusicBackgroundController::class)->group(function () {
        Route::get('/music-background', 'index');
        Route::post('/music-background/update', 'update');
    });

    Route::controller(KadoNikahController::class)->group(function () {
        Route::get('/kado-nikah', 'index');
        Route::get('/kado-nikah/get-data', 'getData');
        Route::get('/kado-nikah/store', 'store');
        Route::get('/kado-nikah/update', 'update');
        Route::get('/kado-nikah/delete', 'destroy');
    });

    Route::controller(TemaController::class)->group(function () {
        Route::get('/tema', 'index');
        Route::get('/tema/get-data', 'getData');
        Route::post('/tema/update', 'update');
    });
});

Route::controller(ArticlesController::class)->group(function () {
    Route::get('/cara-membuat-undangan', 'caraMembuatUndangan');
    Route::get('/FAQ', 'faq');
});

require __DIR__ . '/auth.php';
