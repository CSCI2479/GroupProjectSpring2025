<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\View\View;

class UpdateBookController extends Controller
{

    public function update(BookUpdateRequest $request): RedirectResponse
    {

        $book = Book::findOrFail($id);

        $request->book()->fill($request->validated());

        $request->book()->save();

        return Redirect::route('dashboard')->with('status', 'book-updated');

    }

}
