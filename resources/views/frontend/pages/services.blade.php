@extends('frontend.layouts.app')

@section('content')
    <div id="services" class="page-section active">
        <section class="relative bg-primary text-white overflow-hidden">
            <div class="absolute inset-0 bg-blue-900 opacity-50"></div>
            <div
                class="absolute right-0 top-0 w-1/2 h-full bg-secondary opacity-10 skew-x-12 transform translate-x-20 hidden md:block">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div>
                        @if($header->title)
                            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">{!! $header->title !!}</h1>
                        @endif

                        @if($header->description)
                            <p class="text-lg text-blue-100 mb-8 max-w-lg">{{ $header->description }}</p>
                        @endif

                        @if($header->badge_text)
                            <div
                                class="inline-flex items-center px-4 py-1 bg-secondary/20 text-secondary rounded-full text-sm font-semibold mb-8 border border-secondary/30">
                                <i class="fas fa-lock mr-2 text-sm"></i> {{ $header->badge_text }}
                            </div>
                        @endif

                        <div class="flex flex-col sm:flex-row gap-4">
                            @if($header->button1_text)
                                <a href="{{ $header->button1_link }}"
                                    class="px-8 py-3 bg-secondary text-primary rounded-lg font-bold hover:bg-secondary/90 transition shadow-xl text-center flex items-center justify-center space-x-2">
                                    {{ $header->button1_text }}
                                </a>
                            @endif

                            @if($header->button2_text)
                                <a href="{{ $header->button2_link }}"
                                    class="px-8 py-3 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white/10 transition text-center flex items-center justify-center space-x-2">
                                    {{ $header->button2_text }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="hidden md:flex justify-center">
                        @if($header->image)
                            <div class="group perspective-1000">
                                <div
                                    class="bg-white rounded-3xl p-2 shadow-2xl transform transition duration-500 group-hover:rotate-y-3 group-hover:rotate-x-2 group-hover:scale-105 max-w-lg w-full">
                                    <div class="rounded-2xl overflow-hidden border-4 border-secondary relative shadow-inner">
                                        <img src="{{ asset('storage/' . $header->image) }}" class="w-full h-96 object-cover">
                                        <!-- Optional overlay for inner depth -->
                                        <div class="absolute inset-0 bg-black/10 pointer-events-none rounded-2xl"></div>
                                    </div>

                                    <!-- Dynamic floating shadow -->
                                    <div
                                        class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 w-72 h-6 bg-black/20 rounded-full blur-xl opacity-50 group-hover:scale-x-110 group-hover:translate-y-1 transition duration-500">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div
                                class="w-full h-80 bg-white/10 rounded-2xl shadow-2xl flex items-center justify-center text-white/50 border border-white/20">
                                <i class="fas fa-chart-line text-7xl animate-pulse"></i>
                            </div>
                        @endif
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

                    @foreach($steps as $step)
                        <div class="bg-gray-100 p-4">
                            <div
                                class="w-16 h-16 bg-white border-4 border-{{ $step->color }} rounded-full flex items-center justify-center text-xl font-bold text-primary mx-auto mb-4 z-10 relative">
                                {{ $step->order }}
                            </div>
                            <h3 class="font-bold text-lg mb-2">{{ $step->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $step->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- old one; non dynamic --}}
        {{-- <section class="py-24 bg-white relative overflow-hidden">
            <div
                class="absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-primary/5 rounded-full blur-3xl">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24 relative z-10">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                    <div class="lg:order-1 space-y-8">
                        <div>
                            <span class="text-secondary font-bold tracking-wider uppercase text-xs mb-2 block">Liquidity &
                                Access</span>
                            <h2 class="text-4xl font-extrabold text-slate-900 leading-tight">Instant Deposits & <br><span
                                    class="text-primary">Seamless Withdrawals</span></h2>
                            <p class="mt-4 text-lg text-gray-600 leading-relaxed">
                                Experience banking without boundaries. Whether dealing with high-volume physical cash or
                                digital instruments, our infrastructure ensures your funds are accessible 24/7/365 with
                                enterprise-grade security.
                            </p>
                        </div>

                        <div
                            class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition duration-300">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-xl font-bold text-gray-900">Omnichannel Cash Management</h3>
                                    <p class="mt-2 text-gray-600 text-sm">Our smart-branch technology bridges the physical
                                        and digital gap.</p>
                                    <ul class="mt-4 space-y-2">
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>High-Volume Capability:</strong> Deposit up to $10,000 daily via
                                                Smart ATMs.</span>
                                        </li>
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>Contactless Access:</strong> NFC and App-based QR
                                                withdrawals.</span>
                                        </li>
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>Instant Clearing:</strong> Zero waiting time for cash
                                                availability.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition duration-300">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-secondary text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-xl font-bold text-gray-900">Remote Cheque Capture</h3>
                                    <p class="mt-2 text-gray-600 text-sm">Processing cheques is now as simple as taking a
                                        photo.</p>
                                    <ul class="mt-4 space-y-2">
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>OCR Technology:</strong> Auto-detection of amounts and account
                                                numbers.</span>
                                        </li>
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>Video Teller Support:</strong> 24/7 VTM assistance for complex
                                                deposits.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:order-2 relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-secondary/20 rounded-2xl transform rotate-3 scale-105">
                        </div>
                        <div class="relative rounded-2xl shadow-2xl overflow-hidden border-4 border-white">
                            <img src="{{ asset('images/cash__withdrawal.png') }}" alt="Cash Management"
                                class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                    <div class="lg:order-1 relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-tl from-secondary/20 to-primary/20 rounded-2xl transform -rotate-3 scale-105">
                        </div>
                        <div class="relative rounded-2xl shadow-2xl overflow-hidden border-4 border-white">
                            <img src="{{ asset('images/digital__payment.png') }}" alt="Digital Payments"
                                class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">
                        </div>
                    </div>

                    <div class="lg:order-2 space-y-8">
                        <div>
                            <span class="text-primary font-bold tracking-wider uppercase text-xs mb-2 block">Ecosystem &
                                Automation</span>
                            <h2 class="text-4xl font-extrabold text-slate-900 leading-tight">Smart Payments & <br><span
                                    class="text-secondary">Global Transfers</span></h2>
                            <p class="mt-4 text-lg text-gray-600 leading-relaxed">
                                Simplify your financial obligations. From automated utility management to digital gifting,
                                control where your money goes with precision and ease using our unified dashboard.
                            </p>
                        </div>

                        <div
                            class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition duration-300">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-secondary text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-xl font-bold text-gray-900">Automated Utility Hub</h3>
                                    <p class="mt-2 text-gray-600 text-sm">Never miss a due date again with intelligent
                                        scheduling.</p>
                                    <ul class="mt-4 space-y-2">
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>Vendor Integration:</strong> Direct API connection to electricity,
                                                water, and ISP.</span>
                                        </li>
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>Smart Scheduling:</strong> Set recurring payments or approve
                                                one-time bills.</span>
                                        </li>
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>Digital Receipts:</strong> Instant PDF proof of payment for tax
                                                records.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition duration-300">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-xl font-bold text-gray-900">e-Gifting & Digital Vouchers</h3>
                                    <p class="mt-2 text-gray-600 text-sm">Send value instantly via the Finista App or Kiosk
                                        network.</p>
                                    <ul class="mt-4 space-y-2">
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>Wide Acceptance:</strong> Redeemable at 500+ premium partner
                                                stores.</span>
                                        </li>
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>Customization:</strong> Personalized messages and custom
                                                amounts.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                    <div class="lg:order-1 space-y-8">
                        <div>
                            <span class="text-secondary font-bold tracking-wider uppercase text-xs mb-2 block">Control &
                                Analytics</span>
                            <h2 class="text-4xl font-extrabold text-slate-900 leading-tight">Advanced Account <br><span
                                    class="text-primary">Management Suite</span></h2>
                            <p class="mt-4 text-lg text-gray-600 leading-relaxed">
                                We have removed the bureaucracy from banking. Open accounts in minutes, not days, and access
                                detailed financial reporting on demand.
                            </p>
                        </div>

                        <div
                            class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition duration-300">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-xl font-bold text-gray-900">Frictionless Onboarding</h3>
                                    <p class="mt-2 text-gray-600 text-sm">Join the ecosystem in under 15 minutes with our
                                        digital KYC.</p>
                                    <ul class="mt-4 space-y-2">
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>Paperless Process:</strong> Fully digital ID verification and
                                                biometrics.</span>
                                        </li>
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>Instant Provisioning:</strong> Virtual cards and account numbers
                                                issued immediately.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition duration-300">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-secondary text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-xl font-bold text-gray-900">Reporting & Analytics</h3>
                                    <p class="mt-2 text-gray-600 text-sm">Generate compliance-ready statements and track
                                        spending habits.</p>
                                    <ul class="mt-4 space-y-2">
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>E-Statement Vault:</strong> Secure cloud storage for up to 7 years
                                                of history.</span>
                                        </li>
                                        <li class="flex items-start text-sm text-gray-700">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span><strong>Custom Export:</strong> PDF, CSV, or Excel formats for tax and
                                                lending purposes.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:order-2 relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-secondary/20 rounded-2xl transform rotate-3 scale-105">
                        </div>
                        <div class="relative rounded-2xl shadow-2xl overflow-hidden border-4 border-white">
                            <img src="{{ asset('images/managing__account.png') }}" alt="Account Management"
                                class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">
                        </div>
                    </div>
                </div>

            </div>
        </section> --}}

        <section class="py-24 pb-0 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24 relative z-10">

                @foreach($features as $index => $feature)
                    @php $isImageLeft = $index % 2 !== 0; @endphp

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                        {{-- Content --}}
                        <div class="{{ $isImageLeft ? 'lg:order-2' : 'lg:order-1' }} space-y-8">
                            <div>
                                <span
                                    class="text-secondary font-bold tracking-wider uppercase text-xs mb-2 block">{{ $feature->category }}</span>
                                <h2 class="text-4xl font-extrabold text-slate-900 leading-tight">
                                    {{ $feature->title }} <br>
                                    <span class="text-primary">{{ $feature->subtitle }}</span>
                                </h2>
                                <p class="mt-4 text-lg text-gray-600 leading-relaxed">{{ $feature->description }}</p>
                            </div>

                            {{-- Cards --}}
                            @foreach($feature->cards as $card)
                                <div
                                    class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition duration-300">
                                    <h3 class="text-xl font-bold text-gray-900">{{ $card->title }}</h3>
                                    <p class="mt-2 text-gray-600 text-sm">{{ $card->description }}</p>

                                    @if($card->bullets->count())
                                        <ul class="mt-4 space-y-2">
                                            @foreach($card->bullets as $bullet)
                                                <li class="flex items-start text-sm text-gray-700">
                                                    <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    <span>{!! $bullet->bullet !!}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        {{-- Image --}}
                        <div class="{{ $isImageLeft ? 'lg:order-1' : 'lg:order-2' }} relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-secondary/20 rounded-2xl transform rotate-3 scale-105">
                            </div>
                            <div class="relative rounded-2xl shadow-2xl overflow-hidden border-4 border-white">
                                <img src="{{ asset('storage/' . $feature->image) }}" alt="{{ $feature->title }}"
                                    class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="py-12 bg-gray-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="bg-primary p-8 rounded-xl shadow-xl border border-primary flex flex-col justify-center items-center text-center">
                    <h3 class="text-2xl font-bold text-white mb-2">Can't Find Your Service?</h3>
                    <p class="text-blue-200 text-lg mb-6">Our dedicated support team is available 24/7 for custom financial
                        assistance.</p>
                    <a href="{{ url('/contact') }}"
                        class="px-8 py-3 bg-secondary text-primary rounded-lg font-bold hover:bg-yellow-400 text-lg">
                        Contact Support
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection