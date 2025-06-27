<?php

use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'home']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'role:super_admin,admin,trainer,student']], function () {
    Route::resource('/user', App\Http\Controllers\UserController::class);
    Route::resource('trainings', TrainingController::class);
    Route::get('/trainings/{id}/details', [TrainingController::class, 'addDetailsPage'])->name('details.edit');
    Route::get('/trainings/{training}/details', [TrainingController::class, 'addDetailsPage'])->name('trainings.details');
    Route::put('/trainings/{training}/details', [TrainingController::class, 'addDetails'])->name('trainings.details.update');

    // Specific upload routes for different user roles
    Route::put('/trainings/{training}/upload-admin-files', [TrainingController::class, 'uploadAdminFiles'])->name('trainings.upload-admin-files');
    Route::put('/trainings/{training}/upload-trainer-files', [TrainingController::class, 'uploadTrainerFiles'])->name('trainings.upload-trainer-files');

    // File download and delete routes
    Route::get('/trainings/{training}/download/{file}', [TrainingController::class, 'downloadFile'])->name('trainings.download-file');
    Route::delete('/trainings/{training}/delete/{file}', [TrainingController::class, 'deleteFile'])->name('trainings.delete-file');
    Route::resource('/role', App\Http\Controllers\RoleController::class);
    Route::resource('/company', App\Http\Controllers\CompanyController::class);
    Route::put('/user/{id}/status/{status}', [UserController::class, 'updateStatus'])->name('user.updateStatus');
    Route::resource('/header', App\Http\Controllers\Home\HeaderController::class);
    Route::resource('/features', App\Http\Controllers\Home\FeaturesController::class);
    Route::resource('/mission', App\Http\Controllers\Home\MissionController::class);
    Route::resource('trainings.tasks', App\Http\Controllers\TaskController::class);

    // Task submission routes
    Route::get('trainings/{training}/tasks/{task}/submit', [App\Http\Controllers\TaskSubmissionController::class, 'create'])
        ->name('trainings.tasks.submissions.create');
    Route::post('trainings/{training}/tasks/{task}/submit', [App\Http\Controllers\TaskSubmissionController::class, 'store'])
        ->name('trainings.tasks.submissions.store');
    Route::put('trainings/{training}/tasks/{task}/submissions/{submission}/review', [App\Http\Controllers\TaskSubmissionController::class, 'review'])
        ->name('trainings.tasks.submissions.review');
});
Route::get('/download/{training}',  [TrainingController::class, 'getDownload'])->name('download');
