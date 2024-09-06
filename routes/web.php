<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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


// Products routes 
Route::prefix('product')->group(function () {

Route::view('product_form','pages.products.products_form')->name('product.form');
Route::post('create',[ProductController::class,'create_product'])->name('create.product');
Route::get('show',[ProductController::class,'show_products'])->name('show.product');
Route::get('edit/{id}',[ProductController::class,'edit_product'])->name('edit.product');
Route::put('update/{id}',[ProductController::class,'update_product'])->name('update.product');
Route::delete('delete/{id}',[ProductController::class,'delete_product'])->name('product.destroy');
});


Route::prefix('categories')->group(function () {


Route::view('categories_form','pages.categories.category_form')->name('category.form');
Route::post('create',[CategoryController::class,'create_category'])->name('create.category');
Route::get('show',[CategoryController::class,'show_categories'])->name('show.category');
Route::get('edit/{id}',[CategoryController::class,'edit_category'])->name('edit.category');
Route::put('update/{id}',[CategoryController::class,'update_category'])->name('update.category');
Route::delete('delete/{id}',[CategoryController::class,'delete_category'])->name('category.destroy');
});