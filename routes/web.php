<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);


Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);

Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);

Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);

Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);

Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

Route::get('users', [App\Http\Controllers\Admin\usersController::class, 'index']);
Route::get('users/{user_id}', [App\Http\Controllers\Admin\usersController::class, 'edit']);
Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\usersController::class, 'update']);


});
