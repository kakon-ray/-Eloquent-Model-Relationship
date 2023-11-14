<?php

use Illuminate\Support\Facades\Route;
use App\Models\Phone;
use App\Models\User;


// one to one relationship
// json viewer chrome extention add করতে হবে.

Route::get('/one-to-one', function () {
   
    // এখানে ইউজার আইডি ১ এর ফোন শো করবে।
    //  $phone = User::find(1);
    // $phone = User::find(1)->phone;

    // এখানে প্রতি ইউজার এর মধ্যে  তার ফোন পাবো।
    // $userPhone = User::with('phone')->get();
    // return $userPhone;

    // এখানে ফোন আইডি ১ এর  ইউজার শো করবে।
    // $users = Phone::find(1);
    // $users = Phone::find(1)->user;
    // return $users;


    // $users = User::all();
    // return view('welcome',compact('users'));

    // $phone = Phone::all();
    // return view('phone',compact('phone'));
});


Route::get('/one-to-many', function () {



});