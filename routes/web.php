<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('feedback', function () {
    return view('feedback');
})->name('feedback');

Route::get('recommender', function () {
    return view('recommender');
})->name('recommender');
