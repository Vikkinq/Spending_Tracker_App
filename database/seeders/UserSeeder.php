<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the Free plan
        $freePlan = Plan::where('slug', 'free')->first();

        // Create a demo user
        User::create([
            'name' => 'Symon',
            'email' => 'symon@gmail.com',
            'password' => Hash::make('symon2312'), // default password
            'plan_id' => $freePlan->id,
        ]);
    }
}