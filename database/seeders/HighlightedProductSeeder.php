<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HighlightedProduct;

class HighlightedProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HighlightedProduct::create([
            'title' => 'Our Main Highlighted Product',
            'subtitle' => 'Kiosk Machine',
            'description' => 'A kiosk machine is a self-service banking unit that allows customers to quickly perform essential transactions—such as deposits, withdrawals, account inquiries, and bill payments—without waiting in line at a service counter.',
            'features' => [
                'Self-Service Transactions',
                'Instant Processing',
                'User-Friendly Interface'
            ],
            'image' => 'kiosk__home.png',
            'order_index' => 0,
        ]);
    }
}
