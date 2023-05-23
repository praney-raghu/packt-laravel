<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Http\Resources\Book as BookResource;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends BaseController
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $books = Book::complexSearch([
                'body' => [
                    "query" => [
                        "bool" => [
                            "should" => [
                                [
                                    "wildcard" => [
                                        "title" => "*" . $request->input('search') . "*"
                                    ]
                                ],
                                [
                                    "wildcard" => [
                                        "genre" => "*" . $request->input('search') . "*"
                                    ]
                                ],
                                [
                                    "wildcard" => [
                                        "author" => "*" . $request->input('search') . "*"
                                    ]
                                ],
                                [
                                    "wildcard" => [
                                        "isbn" => "*" . $request->input('search') . "*"
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ])->toArray();
        } else {
            $books = Book::paginate();
        }
        $booksData = BookResource::collection($books)->response()->getData();
        return $this->sendResponse($booksData, 'Books fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation error', $validator->errors(), 422);
        }
        $book = Book::create($input);
        return $this->sendResponse(new BookResource($book), 'Book created.');
    }

    public function show($id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return $this->sendError('Book does not exist.');
        }
        return $this->sendResponse(new BookResource($book), 'Book fetched.');
    }

    public function update(Request $request, Book $book)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation error', $validator->errors(), 422);
        }
        $book->title = $input['title'];
        $book->description = $input['description'];
        $book->save();

        return $this->sendResponse(new BookResource($book), 'Book updated.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return $this->sendResponse([], 'Book deleted.');
    }
}
