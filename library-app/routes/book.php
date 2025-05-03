<?php

use App\Http\Controllers\Books\DeleteBookController;
use App\Http\Controllers\Books\UpdateBookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

//Create
Route::get('create', [BookController::class, 'create'])
    ->name('create');

Route::post('create', [RegisteredUserController::class, 'store']);

//Update and Delete
Route::get('/book', [ProfileController::class, 'edit'])->name('book.edit');
Route::patch('/book', [ProfileController::class, 'update'])->name('book.update');
Route::delete('/book', [ProfileController::class, 'destroy'])->name('book.destroy');