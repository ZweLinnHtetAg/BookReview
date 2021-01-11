<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
 
    protected $model = Review::class;

    public function definition()
    {
        return [
            'rating' => $this->faker->numberBetween(1,5),
            'book_id' => $this->faker->numberBetween(1,30),
            'user_id' => $this->faker->numberBetween(1,10),
            'description' => $this->faker->realText(rand(100,200)),
            
        ];
    }
}
