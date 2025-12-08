<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MapLocation;

class MapLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MapLocation::create([
            'title' => 'Headquarters',
            'latitude' => 40.712776,
            'longitude' => -74.005974,
            'sort_order' => 0,
        ]);

        MapLocation::create([
            'title' => 'Branch Office',
            'latitude' => 34.052235,
            'longitude' => -118.243683,
            'sort_order' => 1,
        ]);
    }
}
