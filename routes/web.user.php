<?php

use Illuminate\Support\Facades\Route;

Route::middleware('client')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
