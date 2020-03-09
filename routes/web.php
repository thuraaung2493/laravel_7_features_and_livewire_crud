<?php

use App\Post;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

// Livewire
Route::view('/contacts', 'admin.contacts');

// Fluent String Operations
Route::get('/', function () {
    return (string) Str::of('  Laravel Framework 6.x ')
                       ->trim()
                       ->replace('6.x', '7.x')
                       ->slug();
});

// Route Model Binding
Route::get('/users/{user}/posts/{post:slug}', function (User $user, Post $post) {
    // return $user->posts()->findOrFail($post->id); #before use laravel v7
    return $post;
});

// HTTP Client
Route::get('/news', 'NewsController');
Route::get('/mf/banks', 'MfBanksController');
Route::get('/mf/login', 'MfLoginController');
Route::get('/mf/latest-loan/{customerId}', 'MfController@getLatestLoan');
Route::get('/mf/image-upload', 'MfController@imageUpload');

Route::get('query-time-casts', function () {
    $users = User::select([
        'users.*',
        'last_posted_at' => Post::selectRaw('MAX(created_at)')
                ->whereColumn('user_id', 'users.id'),
    ])->withCasts([
        'last_posted_at' => 'date',
    ])->first();

    dd($users->last_posted_at);
});
