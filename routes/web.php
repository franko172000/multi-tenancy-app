<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
//Subdomain routes
Route::domain('{username}.'.env('APP_DOMAIN'))->group(function () {
    Route::middleware('validateDomain')->group(function (){
        Route::get('/', [HomeController::class, 'tenantIndex'])->name('tenant.home');


        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        Route::middleware('auth')->group(function () {
            Route::put('password', [PasswordController::class, 'update'])->name('tenant.password.update');
            Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout-subdomain');
        });
    });
});

Route::domain(env('APP_DOMAIN'))->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    require __DIR__.'/auth.php';
});
