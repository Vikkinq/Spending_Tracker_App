<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

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
        $user = User::inRandomOrder()->first(); // get a real user UUID
        $category = Category::where('user_id', $user->id)->inRandomOrder()->first(); // category for that user

        return [
            'user_id' => $user->id,       // actual UUID
            'category_id' => $category?->id, // fallback if null
            'title' => fake()->sentence(3),
            'amount' => fake()->randomFloat(1, 5, 500),
            'spent_on' => fake()->date(),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}