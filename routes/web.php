<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\PartnerController; // Mengimpor PartnerController
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\FacilityController; // Mengimpor FacilityController
use App\Http\Controllers\SchoolProgramController;
use App\Models\SchoolProgram;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
// Tambahkan rute untuk menampilkan form login dan beri nama 'login'
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute yang dilindungi oleh middleware 'auth'
// Semua rute di dalam grup ini hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    // Jika pengguna mengakses '/admin', arahkan ke '/admin/dashboard'
    Route::get('/admin', function () {
        return redirect()->route('admin.dashboard');
    });

    // Rute untuk dashboard admin yang hanya bisa diakses setelah login
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Grup rute untuk manajemen konten di dashboard admin
    Route::prefix('admin')->name('admin.')->group(function () {
        // Rute untuk Berita
        Route::resource('news', NewsController::class);

        // Rute untuk Jurusan
        Route::resource('majors', MajorController::class);

        // Rute untuk Mitra Industri
        Route::resource('partners', PartnerController::class);

        // Rute untuk Testimoni
        Route::resource('testimonials', TestimonialController::class); 

        // Rute untuk Fasilitas
        Route::resource('facilities', FacilityController::class);
         
        // Rute untuk Fasilitas 
        Route::resource('programs', SchoolProgramController::class);
    });
});
