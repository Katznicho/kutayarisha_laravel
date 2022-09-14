<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $plans = [
            [
                'name' => 'Free',
                'price' => 0,
                'description' => 'Free Plan',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Basic',
                'price' => 50000,
                'description' => 'Basic Plan',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard',
                'price' => 100000,
                'description' => 'Basic Plan',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium',
                'price' => 150000,
                'description' => 'Premium Plan',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        //loop through the plans and insert them into the database
        foreach ($plans as $plan) {
            DB::table('plans')->insert($plan);
        }
        //DB::table('plans')->insert($plans);
    }
}
