<?php

use App\Http\Controllers\Admin\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\WebsiteSettingController;

Route::prefix('admin')->middleware('auth')->group(function () {

    // Dashboard routes here
    Route::get('dashboard', [AdminController::class, 'dasboard'])->name('admin.dashboard');

    // User Controller Route Here
    Route::get('users-create', [UserController::class, 'userCreate'])->name('user.create');
    Route::get('user/{id}/edti', [UserController::class, 'edit'])->name('edit.user');
    Route::post('user/{id}/update', [UserController::class, 'updateUser'])->name('update.user');
    Route::post('users-store', [UserController::class, 'storeUser'])->name( 'user.store');
    Route::get('user-profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('update-profile/{id}/image', [UserController::class, 'profileImageUpdate'])->name('update.profile.image');
    Route::post('password/{id}/change', [UserController::class, 'passwordUpdate'])->name('update.password');
    Route::delete('delete/{id}/user', [UserController::class, 'destroyUser'])->name('user.destroy');


    // Website Setting Route Here
    Route::get('website/setting/', [WebsiteSettingController::class, 'websiteSetting'])->name('website_setting');
    Route::post('website/setting/update/', [WebsiteSettingController::class, 'websiteSettingUpdate'])->name('website_setting.update');

    // Home page banner route here
    Route::get('banner', [BannerController::class, 'index'])->name('banner.index');
    Route::post('banner/update/', [BannerController::class, 'update'])->name('banner.update');

    // Brand route here
    Route::resource('brand', BrandController::class);

    // About Controller here
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::post('about/update/', [AboutController::class, 'update'])->name('about.update');
});

