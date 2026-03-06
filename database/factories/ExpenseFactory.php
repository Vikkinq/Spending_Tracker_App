<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'user_id' => 2,
        'category_id' => Category::inRandomOrder()->first()->id,
        'title' => fake()->sentence(3),
        'amount' => fake()->randomFloat(1, 5, 500),
        'spent_on' => fake()->date(),
        'notes' => fake()->optional()->sentence(),
    ];
}
}
