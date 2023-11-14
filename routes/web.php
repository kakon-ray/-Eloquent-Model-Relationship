<?php

use Illuminate\Support\Facades\Route;
use App\Models\Phone;
use App\Models\User;

Route::get('/users', function () {
    $users = User::all();

    return view('welcome',compact('users'));
});
Route::get('/phone', function () {
    $phone = Phone::all();

    return view('phone',compact('phone'));
});
