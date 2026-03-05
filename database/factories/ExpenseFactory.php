<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        'title' => fake()->sentence(3),
        'amount' => fake()->randomFloat(1, 5, 500),
        'spent_on' => fake()->date(),
        'notes' => fake()->optional()->sentence(),
    ];
}
}
