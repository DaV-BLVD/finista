<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MoreProduct;

class MoreProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MoreProduct::truncate();

        MoreProduct::create([
            'type' => 'large',
            'title' => 'Smart Thermostat',
            'description' => 'Automatically adjust your home temperature...',
            'icon' => 'fa-solid fa-temperature-half',
            'color' => 'primary',
            'column_span' => 2,
            'order_index' => 1,
        ]);

        MoreProduct::create([
            'type' => 'regular',
            'title' => 'Smart Security Camera',
            'description' => 'Monitor your home in real-time...',
            'icon' => 'fa-solid fa-video',
            'color' => 'secondary',
            'order_index' => 2,
        ]);

        MoreProduct::create([
            'type' => 'regular',
            'title' => 'IoT Smart Lock',
            'description' => 'Control door access remotely...',
            'icon' => 'fa-solid fa-lock',
            'color' => 'primary',
            'order_index' => 3,
        ]);

        MoreProduct::create([
            'type' => 'regular',
            'title' => 'Smart Light Bulb',
            'description' => 'Adjust brightness and color...',
            'icon' => 'fa-solid fa-lightbulb',
            'color' => 'secondary',
            'order_index' => 4,
        ]);

        MoreProduct::create([
            'type' => 'regular',
            'title' => 'Smart Air Quality Sensor',
            'description' => 'Track indoor air quality...',
            'icon' => 'fa-solid fa-wind',
            'color' => 'primary',
            'order_index' => 5,
        ]);

        MoreProduct::create([
            'type' => 'regular',
            'title' => 'IoT Water Leak Detector',
            'description' => 'Detect leaks early...',
            'icon' => 'fa-solid fa-droplet',
            'color' => 'secondary',
            'order_index' => 6,
        ]);

        MoreProduct::create([
            'type' => 'regular',
            'title' => 'Smart Smoke & Fire Detector',
            'description' => 'Get early alerts for smoke...',
            'icon' => 'fa-solid fa-fire-flame-curved',
            'color' => 'primary',
            'order_index' => 7,
        ]);

        MoreProduct::create([
            'type' => 'cta',
            'title' => 'Central IoT Hub',
            'description' => 'Connect all your smart devices seamlessly...',
            'button_text' => 'Contact Specialist',
            'button_url' => '/contact',
            'color' => 'secondary',
            'order_index' => 8,
        ]);
    }
}
