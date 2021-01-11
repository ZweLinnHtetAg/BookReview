<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('books',[BookController::class,'index']);
Route::get('books-by-rate',[BookController::class,'booksByRate']);
