<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all(); 
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book')); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:books|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id'
        ]);

        Book::create($validated); 

        return redirect()->route('books.index')->with('success', 'Book created successfully!');
    }
}