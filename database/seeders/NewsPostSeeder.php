<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsPost;

class NewsPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsPost::create([
            'title' => '5 Smart Ways to Start Automating Today',
            'subtitle' => 'Simple strategies to grow wealth securely.',
            'image' => 'news/saving_money.png',
            'order_index' => 1,
        ]);

        NewsPost::create([
            'title' => 'Unlocking the Power of Automation',
            'subtitle' => 'Guide to new features including biometric payments.',
            'image' => 'news/mobile_banking.png',
            'order_index' => 2,
        ]);

        NewsPost::create([
            'title' => 'Market Outlook: Economic Forecast for Q4 2025',
            'subtitle' => 'Analysis on trends and opportunities.',
            'image' => 'news/cityscape.png',
            'order_index' => 3,
        ]);
    }
}
