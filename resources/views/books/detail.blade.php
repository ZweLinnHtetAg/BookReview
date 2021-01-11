@extends('template.master')
@section('heading','Book Detail')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('books.index') }}" class="btn btn-primary float-right my-3">Back</a>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{ $book->name }}</td>
                    </tr>
                    <tr>
                        <td>Author</td>
                        <td>{{ $book->author }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $book->category }}</td>
                    </tr>
                    <tr>
                        <td>Published Date</td>
                        <td>{{ $book->published_date }}</td>
                    </tr>
                    <tr>
                        <td>Distributor</td>
                        <td>{{ $book->distributor }}</td>
                    </tr>
                    <tr>
                        <td>Short Description</td>
                        <td>{{ $book->short_description }}</td>
                    </tr>
                    <tr>
                        <td>Uploaded By </td>
                        <td>
                            {{ $book->user->name }}
                            @if($book->user->name == Auth::user()->name)
                            ( you )
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td> Average Rating</td>
                        <td> {{ $average_rating }} </td>
                    </tr>

                    <!-- check this book is uploaded by logged in user -->

                    @if(Auth::user()->id != $book->user_id )

                    <tr>
                        <td>Your Rating</td>
                        <td>

                            @php

                            # to check already reviewed or not 

                            $reviewers = [];
                            foreach ($book->reviews as $review) {
                                array_push($reviewers, $review->user_id); 
                            } 
                            @endphp

                            @if(in_array(Auth::user()->id, $reviewers)) 
                                You already reviewed
                            @else
                                <a href="{{ url('review-books/'.$book->id) }}" class="btn btn-primary float-right">Review And Rate Now</a>
                            @endif

                            @else

                            </td>

                            @endif
                            
                        
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-8 mt-4">
            @if(count($book->reviews) > 0 )
            <h5>Reviews</h5>
            @foreach($book->reviews as $review)
            <div class="card my-3">
                <div class="card-header">
                    <p>
                        <h5>Rating - {{ $review->rating  }} <span class="text-muted"> out of </span>5</h5> By <span class="text-dark"> {{ $review->User->name  }} </span>
                    </p>
                </div>
                <div class="card-body">
                    {{ $review->description  }}
                </div>
            </div>
            @endforeach
            @endif
        </div>
           
    </div>
</div>
@endsection
