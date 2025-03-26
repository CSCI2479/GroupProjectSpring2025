<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route to display books
Route::get('/orders', [BookController::class, 'index']);