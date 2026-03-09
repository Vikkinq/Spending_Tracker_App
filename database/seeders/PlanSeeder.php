<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::insert([
            [
                'name' => 'Free',
                'slug' => 'free',
                'price' => 0,
                'max_expenses' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Starter',
                'slug' => 'starter',
                'price' => 50,
                'max_expenses' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pro',
                'slug' => 'pro',
                'price' => 150,
                'max_expenses' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ultimate',
                'slug' => 'ultimate',
                'price' => 250,
                'max_expenses' => null, // unlimited
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}