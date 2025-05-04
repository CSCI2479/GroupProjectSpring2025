<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;

class PostsController extends Controller
{
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search-form');
    
        $posts = Post::query()
            ->where('author', 'LIKE', "%{$search}%")
            ->orWhere('book', 'LIKE', "%{$search}%")
            ->orWhere('category', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the results compacted
        return view('search-form', compact('posts'));
    }
}
