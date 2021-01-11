<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase,
            'author' => $this->faker->name,
            'category' => $this->faker->word,
            'short_description' => $this->faker->realText(rand(100,150)),
            'distributor' => $this->faker->name,
            'published_date' => $this->faker->dateTime(),
            'user_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
