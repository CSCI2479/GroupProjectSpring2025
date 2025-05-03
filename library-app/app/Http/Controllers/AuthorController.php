<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all(); 
        return view('authors.index', compact('authors')); 
    }

    public function show($id)
    {
        $author = Author::findOrFail($id); 
        return view('authors.show', compact('author')); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:authors|max:255'
        ]);

        Author::create($validated); 

        return redirect()->route('authors.index')->with('success', 'Author created successfully!');
    }
}