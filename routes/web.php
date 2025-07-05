<?php

use App\Http\Controllers\StudentPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentPageController::class, 'index'])->name('home');
Route::get('/information', [StudentPageController::class, 'information'])->name('information');
Route::get('/information/{ID}', [StudentPageController::class, 'informationDetail'])->name('information.detail');
