<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductFeature;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'title' => 'Self-Service Banking Kiosk',
                'subtitle' => '24/7 Accessibility',
                'description' => 'Empower your customers with the freedom of banking on their schedule. Our kiosks alleviate branch congestion by handling routine transactions with speed and precision.',
                'color' => 'secondary',
                'layout' => 'image-left',
                'image' => 'images/kiosk__machine.png',
                'features' => ['Instant Bill Settlement', 'Instant Card Issuance', 'Digital Voucher Market', 'Mini-Statements'],
            ],
            [
                'title' => 'All-in-One Smart Machine',
                'subtitle' => 'Full-Stack Automation',
                'description' => 'A complete bank branch condensed into a single terminal. Capable of handling complex financial workflows, from loan origination to high-value transfers.',
                'color' => 'primary',
                'layout' => 'text-left',
                'image' => 'images/all_in_one.png',
                'features' => ['Bulk Cash Deposits', 'Cheque Processing', 'Inter-bank Transfers', 'Loan Pre-Assessment'],
            ],
            [
                'title' => 'Virtual Teller Machine (VTM)',
                'subtitle' => 'Hybrid Experience',
                'description' => 'Bridge the gap between physical and digital. The VTM connects customers with live tellers via high-definition video for personalized assistance and advisory services.',
                'color' => 'secondary',
                'layout' => 'image-left',
                'image' => 'images/vtm.png',
                'features' => ['HD Video Interface', 'Secure Onboarding', 'Document Verification', 'Remote Advisory'],
            ],
            [
                'title' => 'Intelligent Product Scanner',
                'subtitle' => 'Trust Infrastructure',
                'description' => 'Ensure supply chain integrity with our advanced verification terminal. Designed for merchants and logistics, it validates authenticity instantly via multi-format scanning.',
                'color' => 'primary',
                'layout' => 'text-left',
                'image' => 'images/scanner.png',
                'features' => ['NFC & RFID Reading', 'High-Speed QR/Barcode', 'Real-time Cloud Sync', 'Fraud Prevention'],
            ],
        ];

        foreach ($products as $productData) {
            $features = $productData['features'];
            unset($productData['features']);

            $product = Product::create($productData);

            foreach ($features as $feature) {
                ProductFeature::create([
                    'product_id' => $product->id,
                    'feature' => $feature,
                ]);
            }
        }
    }
}
