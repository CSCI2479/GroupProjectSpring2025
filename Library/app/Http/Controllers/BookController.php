<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index() {
        $books = Book::all();
        return response()->json($books);
    }

    public function show($id) {
        $books = Book::find($id);
        if (!$books) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($books);
    }
}
