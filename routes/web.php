<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentPageController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [StudentPageController::class, 'index'])->name('home');
Route::get('/information', [StudentPageController::class, 'information'])->name('information');
Route::get('/information/{ID}', [StudentPageController::class, 'informationDetail'])->name('information.detail');


Route::group(['middleware' => ['auth:student']], function () {
    Route::get('/editProfile', [AuthController::class, 'editProfile'])->name('editProfile');
    Route::put('/editProfile/{ID}', [AuthController::class, 'updateProfile'])->name('editProfile.updateProfile');
    Route::get('/courses', [StudentPageController::class, 'courses'])->name('courses');
    Route::get('/courses/{ID}', [StudentPageController::class, 'detailCourse'])->name('courses.detail');
});
