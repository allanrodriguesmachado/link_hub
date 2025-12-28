<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BioLinkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Google\LoginController as LoginControllerGoogle;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/google', [LoginControllerGoogle::class, 'redirectToProvider'])->name('google.provider');

Route::get('/auth/google/callback', [LoginControllerGoogle::class, 'handleProviderCallback'])->name('google.callback');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/authenticate', [LoginController::class, 'authentication'])->name('auth.authentication');
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
    Route::post('/store', [RegisterController::class, 'store'])->name('auth.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('auth.logout');
    Route::get('/dashboard', DashboardController::class)->name('user.dashboard');
    Route::get('/dashboard/create', [LinkController::class, 'create'])->name('link.create');
    Route::post('/link/store', [LinkController::class, 'store'])->name('link.store');
    Route::get('/link/{link}', [LinkController::class, 'edit'])->name('link.edit');
    Route::put('/link/{link}', [LinkController::class, 'update'])->name('link.update');
    Route::delete('/destroy/{link}', [LinkController::class, 'destroy'])->name('link.destroy');
    Route::patch( '/up/{link}', [LinkController::class, 'up'])->name('link.up');
    Route::patch( '/down/{link}', [LinkController::class, 'down'])->name('link.down');

    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/{user:handler}', BioLinkController::class);
