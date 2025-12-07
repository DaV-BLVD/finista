<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadershipTeamSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('leadership_team')->insert([
            [
                'name' => 'Alexandra Chen',
                'position' => 'Chief Executive Officer',
                'description' => '20+ years in global finance and strategic banking.',
                'image' => null, // Add path if you have image
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Ross',
                'position' => 'Head of Operations',
                'description' => 'Expert in operational efficiency and customer success.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Sarah O'Connor",
                'position' => 'CTO',
                'description' => 'Leading our digital transformation and security initiatives.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
