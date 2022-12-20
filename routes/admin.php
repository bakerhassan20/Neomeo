<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;



Route::get('/login',[AdminController::class,'adminLogin'])->name('admin.login');
Route::post('/login',[AdminController::class,'checkAdminLogin'])->name('save.admin.login');


Route::group(['middleware' => ['auth:admin']], function() {
    Route::get('/',[AdminController::class,'index2'])->name('admin.home');
    Route::resource('roles','App\Http\Controllers\Admin\RoleController');
    Route::resource('admins','App\Http\Controllers\Admin\AdminController');

    });


Route::prefix('profile')->name('profile.')->middleware('auth:admin')->group(function () {
        Route::get('/',[ProfileController::class,'index'])->name('index');
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
        Route::put('/update',[ProfileController::class,'update'])->name('update');
        Route::put('/update-password',[ProfileController::class,'update_password'])->name('update-password');
        Route::put('/update_email',[ProfileController::class,'update_email'])->name('update_email');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
