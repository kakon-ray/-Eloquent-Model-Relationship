<?php

use Illuminate\Support\Facades\Route;
use App\Models\Phone;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;


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
    // return view('one_to_one',compact('users'));

    // $phone = Phone::all();
    // return view('one_to_one2',compact('phone'));
});


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

Route::get('/many_to_many', function () {
        //  এখানে Post আইডি ১ এর  comments শো করবে।
            $post = Post::all();
            $postCategory = Post::with('catagories')->get();
            $categoryPost = Category::with('posts')->get();

            // return $categoryPost;
    
         return view('many_to_many',compact('categoryPost'));
});