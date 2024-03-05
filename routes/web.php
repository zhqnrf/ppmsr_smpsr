<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\StorageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/daftar', [SantriController::class, 'create'])->name('santri-daftar');
Route::post('/daftar', [SantriController::class, 'store'])->name('santri-daftar.store');

Route::get('/', function () {
    if ((auth()->user()->role ?? false) == 'admin') {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('signin');
    }
});

Route::middleware('guest')->group(function () {
    Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('/signin', function () {
    })->name('signin.submit');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/signup', function () {
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard')->name('dashboard');
});
