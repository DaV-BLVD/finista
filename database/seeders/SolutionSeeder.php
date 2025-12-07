<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Solution;

class SolutionSeeder extends Seeder
{
    public function run()
    {
        Solution::insert([
            [
                'title' => 'Savings & Checking',
                'icon' => 'fa-solid fa-piggy-bank',
                'color' => 'secondary',
                'description' => 'Daily banking made easy.',
            ],
            [
                'title' => 'Mortgages & Loans',
                'icon' => 'fa-solid fa-house-chimney-window',
                'color' => 'primary',
                'description' => 'Financing for every ambition.',
            ],
            [
                'title' => 'Wealth & Investing',
                'icon' => 'fa-solid fa-chart-line',
                'color' => 'secondary',
                'description' => 'Grow your portfolio with experts.',
            ],
            [
                'title' => 'Business Solutions',
                'icon' => 'fa-solid fa-briefcase',
                'color' => 'primary',
                'description' => 'Tools for corporate growth.',
            ],
        ]);
    }
}


