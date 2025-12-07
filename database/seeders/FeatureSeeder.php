<?php

// database/seeders/FeatureSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;
use App\Models\FeatureCard;
use App\Models\FeatureCardBullet;

class FeatureSeeder extends Seeder
{
    public function run()
    {
        $feature = Feature::create([
            'category' => 'Liquidity & Access',
            'title' => 'Instant Deposits &',
            'subtitle' => 'Seamless Withdrawals',
            'description' => 'Experience banking without boundaries...',
            'image' => 'images/cash__withdrawal.png',
            'order_index' => 1
        ]);

        $card1 = FeatureCard::create([
            'feature_id' => $feature->id,
            'title' => 'Omnichannel Cash Management',
            'description' => 'Our smart-branch technology bridges the physical and digital gap.',
            'order_index' => 1
        ]);

        FeatureCardBullet::create(['feature_card_id' => $card1->id, 'bullet' => '<strong>High-Volume Capability:</strong> Deposit up to $10,000 daily via Smart ATMs', 'order_index' => 1]);
        FeatureCardBullet::create(['feature_card_id' => $card1->id, 'bullet' => '<strong>Contactless Access:</strong> NFC and App-based QR withdrawals', 'order_index' => 2]);
        FeatureCardBullet::create(['feature_card_id' => $card1->id, 'bullet' => '<strong>Instant Clearing:</strong> Zero waiting time for cash availability', 'order_index' => 3]);

        $card2 = FeatureCard::create([
            'feature_id' => $feature->id,
            'title' => 'Remote Cheque Capture',
            'description' => 'Processing cheques is now as simple as taking a photo.',
            'order_index' => 2
        ]);

        FeatureCardBullet::create(['feature_card_id' => $card2->id, 'bullet' => '<strong>OCR Technology:</strong> Auto-detection of amounts and account numbers', 'order_index' => 1]);
        FeatureCardBullet::create(['feature_card_id' => $card2->id, 'bullet' => '<strong>Video Teller Support:</strong> 24/7 VTM assistance for complex deposits', 'order_index' => 2]);
    }
}
