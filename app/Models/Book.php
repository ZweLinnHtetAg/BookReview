<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name','author','category','short_description','distributor','published_date','user_id'];

    public function Reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}

