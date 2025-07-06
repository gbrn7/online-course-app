<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentPageController;
use Illuminate\Support\Facades\Route;

Route::get('/signIn', [AuthController::class, 'index'])->name('signIn');
Route::post('/signIn', [AuthController::class, 'authenticate'])->name('signIn.auth');
Route::post('/signOut', [AuthController::class, 'signOut'])->name('signOut');

Route::get('/', [StudentPageController::class, 'index'])->name('home');
Route::get('/information', [StudentPageController::class, 'information'])->name('information');
Route::get('/information/{ID}', [StudentPageController::class, 'informationDetail'])->name('information.detail');


Route::group(['middleware' => ['auth:student']], function () {
    Route::get('/editProfile', [AuthController::class, 'editProfile'])->name('editProfile');
    Route::put('/editProfile/{ID}', [AuthController::class, 'updateProfile'])->name('editProfile.updateProfile');
});
