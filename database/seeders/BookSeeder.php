<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Book;

class BookSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booksApiResponse = Http::get('https://fakerapi.it/api/v1/books', [
            '_quantity' => 250
        ]);

        if($booksApiResponse->ok())
        {
            $booksData = $booksApiResponse->json();
            foreach($booksData['data'] as $book)
            {
                $book = Book::updateOrCreate([
                    'title' => $book['title'],
                    'author' => $book['author'],
                    'genre' => $book['genre'],
                    'isbn' => $book['isbn']
                ],[
                    'description' => $book['description'],
                    'image' => $book['image'],
                    'published' => $book['published'],
                    'publisher' => $book['publisher']
                ]);
                $book->addToIndex();
            }
        }
    }
}
