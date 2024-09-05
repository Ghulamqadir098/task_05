<?php

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


