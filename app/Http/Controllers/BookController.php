<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index',compact('books'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Review::create([
            'name'=> $request->name,
            'author'=> $request->author,
            'category' => $request->category,
            'short_description' => $request->short_description,
            'distributor' => $request->distributor,
            'published_date' => $request->published_date,
            'user_id' => Auth::user()->id
            ]);

        return redirect('books');
    }

    public function show(Book $book)
    {
        $total_rating = 0;
        foreach($book->Reviews as $review)
        {
            $total_rating  += $review->rating;  
        }
        if($total_rating !=0)
        
        $average_rating = $total_rating/count($book->Reviews);

        else $average_rating = "No Reviewed Data";
        
        return view("books.detail",compact('book','average_rating'));
    }

    public function edit(Book $book)
    {
        //
    }

    public function update(Request $request, Book $book)
    {
        //
    }

    public function destroy(Book $book)
    {
        //
    }

    public function review(Book $book)
    {
        return view('books.rating',compact('book'));
    }
}
