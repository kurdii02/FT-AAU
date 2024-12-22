<?php

use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['role:super_admin']], function () {
    Route::resource('/user', App\Http\Controllers\UserController::class)->middleware('auth');
    Route::resource('/role', App\Http\Controllers\RoleController::class)->middleware('auth');
    Route::resource('/trainings', App\Http\Controllers\StudentController::class)->middleware('auth');
    Route::resource('trainings', TrainingController::class);
    Route::resource('/company', App\Http\Controllers\CompanyController::class)->middleware('auth');
    Route::put('/user/{id}/status/{status}', [UserController::class, 'updateStatus'])->name('user.updateStatus');
});
