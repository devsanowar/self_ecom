<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('sanowar', [AdminController::class, 'dasboard'])->name('dashboard');
});
