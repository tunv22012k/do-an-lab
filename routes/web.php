<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('client')->group(function () {
    // login get page
    Route::get('login', [AuthController::class, 'index'])->name('login');

    // process submit login
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');

    // forgot_password get page
    Route::get('forgot_password', [AuthController::class, 'forgotPassword'])->name('forgot_password');

    // process submit forgot_password
    Route::post('submit_forgot_password', [AuthController::class, 'submitForgotPassword'])->name('submit_forgot_password');
});

Route::middleware('auth')->group(function () {
    // process submit logout
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});
