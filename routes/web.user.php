<?php

use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('client')->group(function () {
    // home
    Route::get('/', [HomeController::class, 'index'])->name('user.index');
});
