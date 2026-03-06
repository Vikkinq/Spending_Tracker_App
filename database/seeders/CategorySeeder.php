<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Food', 'Transport', 'Bills', 'Entertainment', 'Health', 'Miscellaneous'];

        foreach ($categories as $name) {
            Category::create(['name' => $name, 'user_id' => 2]); // assign to first user
        }
    }
}
