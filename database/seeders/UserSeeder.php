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
        $freePlan = Plan::where('slug', 'free')->first();

        User::create([
            'name' => 'Symon',
            'email' => 'symon@gmail.com',
            'password' => Hash::make('symon2312'), 
            'plan_id' => $freePlan->id,
        ]);
    }
}