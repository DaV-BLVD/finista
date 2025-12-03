@extends('frontend.layouts.app')

@section('content')
    <div id="services" class="page-section active">
        <section class="relative bg-primary text-white overflow-hidden">
            <div class="absolute inset-0 bg-blue-900 opacity-50"></div>
            <div class="absolute right-0 top-0 w-1/2 h-full bg-secondary opacity-10 skew-x-12 transform translate-x-20">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                            <span class="text-secondary">Our</span> Services
                        </h1>
                        <p class="text-lg text-blue-100 mb-8 max-w-lg">
                            Comprehensive financial solutions designed for individuals and businesses.
                        </p>
                        <div
                            class="inline-block px-3 py-1 bg-secondary/20 text-secondary rounded-full text-sm font-semibold mb-6 border border-secondary/30">
                            With Trusted Products
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button onclick="navigateTo('services')"
                                class="px-8 py-3 bg-secondary text-primary rounded-lg font-bold hover:bg-yellow-400 transition shadow-lg text-center">
                                Our Services
                            </button>
                            <button onclick="navigateTo('contact')"
                                class="px-8 py-3 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white/10 transition text-center">
                                Open Account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works / Process -->
        <section class="py-12 bg-gray-100 border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-10">
                    <h2 class="text-2xl font-bold text-primary">Start Banking in 3 Simple Steps</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center relative">
                    <div
                        class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-gray-200 -z-10 transform -translate-y-1/2">
                    </div>
                    <div class="bg-gray-100 p-4">
                        <div
                            class="w-16 h-16 bg-white border-4 border-secondary rounded-full flex items-center justify-center text-xl font-bold text-primary mx-auto mb-4 z-10 relative">
                            1</div>
                        <h3 class="font-bold text-lg mb-2">Register Online</h3>
                        <p class="text-sm text-gray-600">Fill out our secure digital form with your basic details.
                        </p>
                    </div>
                    <div class="bg-gray-100 p-4">
                        <div
                            class="w-16 h-16 bg-white border-4 border-secondary rounded-full flex items-center justify-center text-xl font-bold text-primary mx-auto mb-4 z-10 relative">
                            2</div>
                        <h3 class="font-bold text-lg mb-2">Verify Identity</h3>
                        <p class="text-sm text-gray-600">Upload your ID or visit a branch for quick verification.
                        </p>
                    </div>
                    <div class="bg-gray-100 p-4">
                        <div
                            class="w-16 h-16 bg-white border-4 border-secondary rounded-full flex items-center justify-center text-xl font-bold text-primary mx-auto mb-4 z-10 relative">
                            3</div>
                        <h3 class="font-bold text-lg mb-2">Start Banking</h3>
                        <p class="text-sm text-gray-600">Get your account number instantly and start transacting.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

                    <div class="md:order-1">
                        <h2 class="text-3xl font-bold text-primary mb-4">1. Instant Deposits & Withdrawals</h2>

                        <h3 class="text-xl font-semibold text-gray-800 mb-2 mt-4">A. Cash Deposit/Withdrawal</h3>
                        <p class="text-gray-600 mb-4">Access or deposit your money instantly, 24/7. Our advanced
                            ATMs and smart branches accept large cash volumes securely.</p>
                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                            <li>High-Volume Acceptance: Deposit up to \$10,000 daily at smart ATMs.</li>
                            <li>Cardless Withdrawal: Use our app to withdraw cash without a physical card.</li>
                            <li>Instant Credit: Funds are immediately available for use.</li>
                        </ul>

                        <h3 class="text-xl font-semibold text-gray-800 mb-2 mt-6">B. Cheque Deposit</h3>
                        <p class="text-gray-600 mb-4">Deposit cheques quickly using your mobile phone or at any VTM
                            (Video Teller Machine).</p>
                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                            <li>Mobile Check Deposit: Snap a photo and deposit on the go.</li>
                            <li>Rapid Clearing: Cheques clear faster than the industry average.</li>
                        </ul>
                    </div>

                    <div class="md:order-2">
                        <div class="aspect-w-16 aspect-h-9 rounded-xl shadow-2xl overflow-hidden border-4 border-secondary">
                            <img src="{{ asset('images/cash__withdrawal.png') }}" alt="">
                        </div>
                    </div>
                </div>

                <hr class="border-t border-gray-200" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

                    <div class="md:order-1">
                        <div class="aspect-w-16 aspect-h-9 rounded-xl shadow-2xl overflow-hidden border-4 border-primary">
                            <img src="{{ asset('images/digital__payment.png') }}" alt="">
                        </div>
                    </div>

                    <div class="md:order-2">
                        <h2 class="text-3xl font-bold text-primary mb-4">2. Digital Payments & Transfers</h2>

                        <h3 class="text-xl font-semibold text-gray-800 mb-2 mt-4">A. Utility Payment</h3>
                        <p class="text-gray-600 mb-4">Never miss a bill. Automate payments for your essential
                            services directly from your account. Supports all major utility providers.</p>
                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                            <li>Scheduled Payments: Set up recurring payments for electricity, water, gas, and
                                internet.</li>
                            <li>Instant Confirmation: Get immediate receipts for every payment.</li>
                        </ul>

                        <h3 class="text-xl font-semibold text-gray-800 mb-2 mt-6">B. Digital Voucher</h3>
                        <p class="text-gray-600 mb-4">The modern way to gift or pay. Purchase, send, and redeem
                            digital vouchers instantly via the Finista App or Kiosk.</p>
                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                            <li>Merchant Network: Vouchers valid at over 500 partner stores and services.</li>
                            <li>Custom Value: Create vouchers for any amount you need.</li>
                        </ul>
                    </div>
                </div>

                <hr class="border-t border-gray-200" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

                    <div class="md:order-1">
                        <h2 class="text-3xl font-bold text-primary mb-4">3. Account Management & Support</h2>

                        <h3 class="text-xl font-semibold text-gray-800 mb-2 mt-4">A. A/C Opening (Onboarding)</h3>
                        <p class="text-gray-600 mb-4">Open a new checking, savings, or investment account digitally
                            in less than 15 minutes. We handle the paperwork.</p>
                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                            <li>Paperless Onboarding: Fully digital application and ID verification.</li>
                            <li>Instant Account Number: Get access to online banking immediately upon approval.
                            </li>
                        </ul>

                        <h3 class="text-xl font-semibold text-gray-800 mb-2 mt-6">B. Printing Statement & Reports
                        </h3>
                        <p class="text-gray-600 mb-4">Request detailed transaction statements and financial reports
                            instantly, perfect for taxes or lending applications.</p>
                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                            <li>E-Statement Delivery: Choose instant email delivery or secure cloud storage.
                            </li>
                            <li>Custom Date Ranges: Generate reports for specific periods with ease.</li>
                        </ul>
                    </div>

                    <div class="md:order-2">
                        <div class="aspect-w-16 aspect-h-9 rounded-xl shadow-2xl overflow-hidden border-4 border-secondary">
                            <img src="{{ asset('images/managing__account.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-12 bg-gray-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="bg-primary p-8 rounded-xl shadow-xl border border-primary flex flex-col justify-center items-center text-center">
                    <h3 class="text-2xl font-bold text-white mb-2">Can't Find Your Service?</h3>
                    <p class="text-blue-200 text-lg mb-6">Our dedicated support team is available 24/7 for custom
                        financial assistance.</p>
                    <button onclick="navigateTo('contact')"
                        class="px-8 py-3 bg-secondary text-primary rounded-lg font-bold hover:bg-yellow-400 text-lg">Contact
                        Support</button>
                </div>
            </div>
        </section>
    </div>
@endsection