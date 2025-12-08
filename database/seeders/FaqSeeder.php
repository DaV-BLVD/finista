<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::insert([
            [
                'question' => 'How do I open a new account?',
                'answer' => 'You can open an account by visiting any of our branches or using the A/C Opening service online.',
                'sort_order' => 1,
            ],
            [
                'question' => 'What are the fees for withdrawals?',
                'answer' => 'Withdrawals from Finista ATMs are free for account holders. Other network ATMs may charge a small fee.',
                'sort_order' => 2,
            ],
            [
                'question' => 'How secure is the digital voucher system?',
                'answer' => 'Our vouchers are encrypted with 256-bit SSL technology and monitored by AI fraud detection.',
                'sort_order' => 3,
            ],
            [
                'question' => 'Can I pay international utility bills?',
                'answer' => 'Currently, only domestic providers are supported. International payments will be enabled soon.',
                'sort_order' => 4,
            ],
        ]);
    }
}
