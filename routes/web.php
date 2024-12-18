<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VoteController;

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/vote', [VoteController::class, 'index'])->name('vote.index');
Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
