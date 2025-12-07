<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CoreValue;

class CoreValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CoreValue::insert([
            [
                'icon' => 'fa-solid fa-handshake-angle',
                'title' => 'Integrity & Trust',
                'description' => 'We operate with complete transparency...',
                'border_color' => 'border-secondary/70',
                'icon_color' => 'text-secondary',
            ],
            [
                'icon' => 'fa-solid fa-lightbulb',
                'title' => 'Innovation Driven',
                'description' => 'We embrace cutting-edge technology...',
                'border_color' => 'border-primary/70',
                'icon_color' => 'text-primary',
            ],
            [
                'icon' => 'fa-solid fa-headset',
                'title' => 'Customer Focus',
                'description' => 'Your financial success is our priority...',
                'border_color' => 'border-secondary/70',
                'icon_color' => 'text-secondary',
            ],
            [
                'icon' => 'fa-solid fa-users-line',
                'title' => 'Community Impact',
                'description' => 'We invest in local growth...',
                'border_color' => 'border-primary/70',
                'icon_color' => 'text-primary',
            ],
        ]);
    }
}
