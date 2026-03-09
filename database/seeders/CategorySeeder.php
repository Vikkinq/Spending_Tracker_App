<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Food', 'Transport', 'Bills', 'Entertainment', 'Health', 'Miscellaneous'];

        // Get the first user
        $firstUser = User::first();

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'user_id' => $firstUser->id, // assign actual UUID
            ]);
        }
    }
}