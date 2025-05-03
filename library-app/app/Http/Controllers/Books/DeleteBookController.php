<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\View\View;

class DeleteBookController extends Controller
{
    
    public function destroy(Request $request): RedirectResponse
    {

        $book = $request->book();

        $book->delete();

        return Redirect::to('dashboard'); //Redirect to search view/dashboard

    }

}
