<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/vote', [VoteController::class, 'index'])->name('vote.index');
Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::post('users/store', [DashboardController::class, 'userStore'])->name('users.store');
Route::post('users/update/{id}', [DashboardController::class, 'userUpdate'])->name('users.update');
Route::post('users/destroy/{id}', [DashboardController::class, 'userDestroy'])->name('users.destroy');
