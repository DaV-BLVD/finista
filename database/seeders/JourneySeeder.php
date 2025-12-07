<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JourneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('journeys')->insert([
            ['step' => 1, 'title' => '2005: Founding', 'description' => 'Finista established as a small community credit union in Capital City.', 'color' => 'secondary', 'created_at' => $now, 'updated_at' => $now],
            ['step' => 2, 'title' => '2012: Digital Launch', 'description' => 'Launched our first comprehensive online banking platform and mobile app.', 'color' => 'primary', 'created_at' => $now, 'updated_at' => $now],
            ['step' => 3, 'title' => '2020: Innovation Award', 'description' => 'Recognized for leading the industry in biometric security and instant transfers.', 'color' => 'secondary', 'created_at' => $now, 'updated_at' => $now],
            ['step' => 4, 'title' => 'Today: Future Ready', 'description' => 'Serving over 1 million customers globally with innovative, customer-centric banking.', 'color' => 'primary', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
