<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts');
});

Route::get('/register', [UserController::class, 'create'])->name('register.create');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
Route::get('/login', function () {
    return view('users.login'); // your login form view
})->name('login');

Route::post('/login/check', [AuthController::class, 'login'])->name('login.check');
//Route::post('/api/register', [AuthController::class, 'registerApi']);

//@include('api.php');
