@extends('template.master')
@section('heading',"Review for $book->name")
@section('content')
<div class="container">
    <div class="row justify-content-end">
           <div class="col-8">
               <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                   <input type="hidden" name="book_id" value="{{ $book->id }}">
                   <div class="form-group">
                       <label for="rating">Rating</label>
                       <select name="rating" class="form-control">
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                       </select>
                   </div>
                   <div class="form-group">
                    <label for="review">Review</label>
                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-block btn-primary float-right">Submit</button>
               </form>
           </div>
    </div>
</div>
@endsection
