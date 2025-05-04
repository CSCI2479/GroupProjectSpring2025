<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class LibrarySearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_books_by_title()
    {
        $book = Book::factory()->create();
    
        // Perform the search using the generated book title
        $response = $this->get("/search?query={$book->title}");
    
        // Assertions
        $response->assertStatus(200);
        $response->assertSee($book->title);
    }

    public function test_search_books_by_author()
    {
        
        $author = Author::factory()->create();
    
        // Create a book and associate it with the author
        $book = Book::factory()->create([
            'author_id' => $author->id
        ]);
    
        // Perform the search using the generated author's name
        $response = $this->get("/search?query={$author->name}");
    
        // Assertions
        $response->assertStatus(200);
        $response->assertSee($book->title);
    }

    public function test_search_books_by_category()
    {
            $category = Category::factory()->create();
        
            // Create a book and associate it with the category
            $book = Book::factory()->create([
                'category_id' => $category->id
            ]);
        
            // Perform the search using the generated category name
            $response = $this->get("/search?query={$category->name}");
        
            // Assertions
            $response->assertStatus(200);
            $response->assertSee($book->title);
        }
     

    public function test_no_results()
    {
        // Generate a random search query that is unlikely to exist
        $query = 'xyz123_nonexistent';
    
        // Perform the search
        $response = $this->get("/search?query={$query}");
    
        // Assertions - Ensure no books are returned
        $response->assertStatus(200);
        $response->assertDontSee('title');
    }

}
