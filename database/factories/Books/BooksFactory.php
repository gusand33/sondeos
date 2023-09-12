<?php

namespace Database\Factories\Books;

use App\Models\Books\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books\Books>
 */
class BooksFactory extends Factory
{
    protected $model = Books::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author' => fake()->name(),
            'price' => fake()->numerify(),
            'publication_date' => fake()->dateTimeBetween('-10 years', 'now'),
            'gender_id' => random_int(1, 13),
        ];
    }
}
