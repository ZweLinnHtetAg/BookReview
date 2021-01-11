<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['rating','description','user_id','book_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Book()
    {
        return $this->belongsTo(Book::class);
    }
}
