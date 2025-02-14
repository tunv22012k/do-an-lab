<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('client')->group(function () {
    // login get page
    Route::get('login', [AuthController::class, 'index'])->name('login');

    // process submit login
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
});

Route::middleware('auth')->group(function () {
    // process submit logout
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});
