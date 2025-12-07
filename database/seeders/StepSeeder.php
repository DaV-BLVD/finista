<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Step;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Step::insert([
            ['title' => 'Register Online', 'description' => 'Fill out our secure digital form with your basic details.', 'order' => 1, 'color' => 'primary'],
            ['title' => 'Verify Identity', 'description' => 'Upload your ID or visit a branch for quick verification.', 'order' => 2, 'color' => 'primary'],
            ['title' => 'Start Banking', 'description' => 'Get your account number instantly and start transacting.', 'order' => 3, 'color' => 'primary'],
        ]);
    }
}
