<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AboutSectionSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('about_sections')->updateOrInsert(
            ['type' => 'about'],
            [
                'title' => 'About Finista',
                'description' => 'Finista was founded on the belief that banking should be accessible, transparent, and empowering. We combine traditional banking values with modern technology to serve our community.',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('about_sections')->updateOrInsert(
            ['type' => 'mission'],
            [
                'title' => 'Our Mission',
                'description' => 'To provide secure, efficient, and innovative financial services that empower individuals and businesses to achieve their economic goals.',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );
    }
}
