<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $existOrNot = Review::where('user_id',Auth::user()->id)->where('book_id',$request->book_id)->get();

        if(count($existOrNot) == 0)
        {
            Review::create([
                'rating'=> $request->rating,
                'description'=> $request->description,
                'book_id' => $request->book_id,
                'user_id' => Auth::user()->id
                ]);
    
        }
        
        return redirect('books/'.$request->book_id);
    }

    public function show(Review $review)
    {
        //
    }

    public function edit(Review $review)
    {
        //
    }

    
    public function update(Request $request, Review $review)
    {
        //
    }


    public function destroy(Review $review)
    {
        //
    }
}
