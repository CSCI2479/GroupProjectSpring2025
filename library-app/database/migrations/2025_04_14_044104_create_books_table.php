<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();                  // Primary key
        $table->string('title');       // Title of the book
        $table->foreignId('author_id')->constrained();   // Foreign key for Author
        $table->integer('category_id')->unsigned();
        //$table->foreignId('category_id')->constrained(); // Foreign key for Category
        $table->timestamps();          // Created at and Updated at timestamps
    });
}
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
