<?php

namespace Database\Seeders;

use Database\Seeders\ExpenseSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PlanSeeder;
use Database\Seeders\UserSeeder;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            PlanSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ExpenseSeeder::class,
        ]);
    }
}
