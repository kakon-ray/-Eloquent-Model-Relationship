<?php

use Illuminate\Support\Facades\Route;
use App\Models\Phone;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Machanic;


// json viewer chrome extention add করতে হবে.

//  এই পদ্ধতিতে একটি টেবিল  এর একটি ডেটা এর সাথে অন্য একটি টেবিল এর একটি ডেটা কানেক্ট করা যায়।
// যেমন ইউজার এর সাথে ফোন এর কানেকশন।
Route::get('/one-to-one', function () {
   
    // এখানে ইউজার আইডি ১ এর ফোন শো করবে।
    //  $phone = User::find(1);
    // $phone = User::find(1)->phone;

    // এখানে প্রতি ইউজার এর মধ্যে  তার ফোন পাবো।
    $userPhone = User::with('phone')->get();
    return $userPhone;

    // এখানে ফোন আইডি ১ এর  ইউজার শো করবে।
    // $users = Phone::find(1);
    // $users = Phone::find(1)->user;
    // return $users;


    // $users = User::all();
    // return view('one_to_one',compact('users'));

    // $phone = Phone::all();
    // return view('one_to_one2',compact('phone'));
});

// এই রিলেশনশিপে একটি টেবিল এর একটি ডেটা এর সাথে অন্য টেবিলের মাল্টিপল ডেটা কানেক্ট করে। 
// যেমন পোস্ট এর সাথে কমেন্ট এর কানেকশন।
Route::get('/one_to_many', function () {
 //  এখানে Post আইডি ১ এর  comments শো করবে।
    $post = Post::find(1);
    $comments = Post::find(1)->comments;
     // এখানে প্রতি Post এর মধ্যে all comments পাবো।
    $postComment = Post::with('comments')->get();
    // return $postComment;

 return view('one_to_many',compact('postComment'));
});

Route::get('/one_to_many2', function () {
    //  এখানে Post আইডি ১ এর  comments শো করবে।
        $comments = Comment::all();

     return view('one_to_many2',compact('comments'));
});

// এই রিলেশনশিপে একটি টেবিল এর মাল্টিপল ডেটার সাথে অন্য টেবিলের মাল্টিপল ডেটা কানেক্ট করে। 
// যেমন পোস্ট এবং ক্যাটাগরি এর কানেকশন।
Route::get('/many_to_many', function () {
        // 
            $post = Post::all();
            $postCategory = Post::with('catagories')->get();
            $categoryPost = Category::with('posts')->get();

            // return $categoryPost;
    
         return view('many_to_many',compact('categoryPost'));
});


// এই রিলেশনশিপে একটি টেবিল এর একটি ডেটা এর সাথে তৃতীয় একটি টেবিল এর একটি ডেটা কানেক্ট করতে দ্বিতীয় একটি টেবিল ব্যাবহার করা হয়।
Route::get('/has_one_through', function () {
    // যখন েএকটি টেবিল এ ডাটা তৃতীয় টেবিল থেকে নিব তখন এই পদ্ধতি ব্যাবহার করবো।
   
            $carinfo = Machanic::with('carOwner')->get();
            return $carinfo;

         return view('has_one_through',compact('carinfo'));
});

// এই রিলেশনশিপে একটি টেবিল এর মাল্টিপল ডেটা এর সাথে তৃতীয় একটি টেবিল এর মাল্টিপল ডেটা কানেক্ট করতে দ্বিতীয় একটি টেবিল ব্যাবহার করা হয়।
Route::get('/has_many_through', function () {
    // যখন েএকটি টেবিল এ ডাটা তৃতীয় টেবিল থেকে নিব তখন এই পদ্ধতি ব্যাবহার করবো।
   
            $carinfo = Machanic::with('carOwners')->get();
            return $carinfo;

         return view('has_one_through',compact('carinfo'));
});