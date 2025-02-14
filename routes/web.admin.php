<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*ADMIN*/
Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
});
