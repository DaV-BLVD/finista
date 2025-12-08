<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Header;

class HeaderSeeder extends Seeder
{
    public function run()
    {
        $pages = [
            'home' => [
                'badge_text' => 'Trusted Financial Partner',
                'title' => 'Banking Made Simple & Secure',
                'subtitle' => '',
                'description' => 'Experience seamless financial services tailored to your needs.',
                'button1_text' => 'Our Services',
                'button1_link' => '/services',
                'button2_text' => 'Open Account',
                'button2_link' => '/contact',
            ],

            'services' => [
                'badge_text' => 'With Trusted Products',
                'title' => 'Our Comprehensive Services',
                'subtitle' => '',
                'description' => 'Comprehensive financial solutions delivered with security.',
                'button1_text' => 'Our Services',
                'button1_link' => '/services',
                'button2_text' => 'Open Account',
                'button2_link' => '/contact',
            ],

            'products' => [
                'badge_text' => 'Innovative Banking Solutions',
                'title' => 'Redefining Digital Finance.',
                'subtitle' => '',
                'description' => 'Explore the diverse range of products designed to make banking instant.',
                'button1_text' => 'Explore Products',
                'button1_link' => '/products',
                'button2_text' => 'Open Account',
                'button2_link' => '/contact',
            ],

            'about' => [
                'badge_text' => 'About Us',
                'title' => 'Get to Know Our Story.',
                'subtitle' => '',
                'description' => 'Discover our commitment to automating banking processes.',
                'button1_text' => 'Our Products',
                'button1_link' => '/products',
                'button2_text' => 'Contact Support',
                'button2_link' => '/contact',
            ],

            'contact' => [
                'badge_text' => 'Get in Touch',
                'title' => 'How Can We Help You?',
                'subtitle' => '',
                'description' => 'Whether you have a complex inquiry or need technical support.',
                'button1_text' => 'Send an Inquiry',
                'button1_link' => '/#contact-form',
                'button2_text' => 'Find Our Locations',
                'button2_link' => '/locations',
            ],
        ];

        foreach ($pages as $page => $data) {
            Header::create(array_merge(['page' => $page], $data));
        }
    }
}
