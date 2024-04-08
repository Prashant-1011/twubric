<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('auth/twitter', 'App\Http\Controllers\Auth\LoginController@redirectToTwitter');
Route::get('auth/twitter/callback', 'App\Http\Controllers\Auth\LoginController@handleTwitterCallback');

Route::get('follower/show','App\Http\Controllers\FollowerController@show')->name('follower.show');
Route::get('follower/index','App\Http\Controllers\FollowerController@index')->name('follower.index');