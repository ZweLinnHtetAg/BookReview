<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () { 
    
    Route::resource('books',BookController::class);
    Route::get('review-books/{book}',[BookController::class,'review'])->name('review-book');
    
    Route::resource('reviews',ReviewController::class);

});
