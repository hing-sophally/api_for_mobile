<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'registerApi']);
Route::post('/login', [AuthController::class, 'loginApi']);
