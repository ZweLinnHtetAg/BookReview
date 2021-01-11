@extends('template.master')
@section('heading','Books')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-6 my-2">
                <div class="card">
                    <div class="card-header">
                        {{ $book->name }}
                        <p class="float-right"> By  {{ $book->author }}</p>
                    </div>
                    <div class="card-body">
                        <h5 class="text-primary"> Category </h5>
                            <p> {{  $book->category }}</p>
                        <h5 class="text-primary">Short Description</h5>
                        <p>
                        {{  $book->short_description }}</p>
                    </div>
                    <div class="card-footer">
                        <p class="float-left"> Published at {{ date('d M Y', strtotime($book->published_date)) }} </p>
                        <a href="{{ url('books/'.$book->id) }}" class="btn btn-outline-dark float-right">View Detail</a>
                    </div>
                </div>
            </div> 
        @endforeach
           
    </div>
</div>
@endsection
