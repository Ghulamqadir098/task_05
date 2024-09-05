<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::check()){

        return view('pages.dashboard');

    }
    else{

        return view('pages.login_form');
    }
});

Route::prefix('dashboard')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::view('home','pages.dashboard')->name('dashboard.home');
    });
});

// Atuhtentication routes
Route::prefix('auth')->group(function () {
    Route::view('signup_form','pages.signup_form')->name('register');
    Route::post('signup', [AuthController::class,'signup'])->name('register.user');
    Route::post('login', [AuthController::class,'login'])->name('login.user');
    Route::get('logout', [AuthController::class,'logout'])->name('logout.user');
});


