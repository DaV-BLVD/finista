@extends('frontend.layouts.app')

@section('content')
    <div id="products" class="page-section active">
        <section class="relative bg-primary text-white overflow-hidden">
            <div class="absolute inset-0 bg-blue-900 opacity-50"></div>
            <div
                class="absolute right-0 top-0 w-1/2 h-full bg-secondary opacity-10 skew-x-12 transform translate-x-20 hidden md:block">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center text-center md:text-left">
                    <div>
                        @if($header->badge_text)
                            <div
                                class="inline-block px-3 py-1 bg-secondary/20 text-secondary rounded-full text-sm font-semibold mb-6 border border-secondary/30">
                                {{ $header->badge_text }}
                            </div>
                        @endif

                        @if($header->title)
                            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">{!! $header->title !!}</h1>
                        @endif

                        @if($header->description)
                            <p class="text-lg text-blue-100 mb-8 max-w-lg md:max-w-none">{{ $header->description }}</p>
                        @endif

                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            @if($header->button1_text)
                                <a href="{{ $header->button1_link }}"
                                    class="px-8 py-3 bg-secondary text-primary rounded-lg font-bold hover:bg-yellow-400 transition shadow-lg text-center">
                                    {{ $header->button1_text }}
                                </a>
                            @endif

                            @if($header->button2_text)
                                <a href="{{ $header->button2_link }}"
                                    class="px-8 py-3 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white/10 transition text-center">
                                    {{ $header->button2_text }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="hidden md:flex justify-center">
                        @if($header->image)
                            <div class="group perspective-1000">
                                <div
                                    class="bg-white rounded-3xl p-2 shadow-2xl transform transition duration-500 group-hover:rotate-y-2 group-hover:-rotate-x-2 group-hover:scale-105 max-w-lg w-full relative">

                                    <div class="rounded-2xl overflow-hidden border-4 border-secondary relative shadow-inner">
                                        <img src="{{ asset('storage/' . $header->image) }}" class="w-full h-80 object-cover">
                                        <div class="absolute inset-0 bg-black/10 pointer-events-none rounded-2xl"></div>
                                    </div>

                                    <!-- Dynamic floating shadow -->
                                    <div
                                        class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 w-80 h-6 bg-black/20 rounded-full blur-xl opacity-50 group-hover:scale-x-110 group-hover:-translate-y-1 transition duration-500">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div
                                class="w-full h-72 bg-white/10 rounded-xl shadow-2xl flex items-center justify-center text-white/50 border border-white/20">
                                <i class="fas fa-university text-5xl"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>



        <!-- ## ✨ Product Highlights -->

        {{-- <section class="py-24 bg-white relative font-sans">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-32">
                <div class="group relative">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <div class="order-2 lg:order-1 relative">
                            <div
                                class="absolute -inset-4 bg-gradient-to-r from-secondary/10 to-transparent rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition duration-1000">
                            </div>
                            <div
                                class="relative rounded-2xl shadow-2xl shadow-gray-200 overflow-hidden border border-gray-100 bg-white">
                                <img src="{{ asset('images/kiosk__machine.png') }}" alt="Self Service Kiosk"
                                    class="w-full h-auto object-cover transform transition duration-700 hover:scale-105">
                            </div>
                        </div>
                        <div class="order-1 lg:order-2 space-y-6">
                            <div>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-secondary/10 text-secondary mb-4">
                                    24/7 Accessibility
                                </span>
                                <h3 class="text-4xl font-extrabold text-slate-900 tracking-tight">Self-Service Banking Kiosk
                                </h3>
                                <p class="text-lg text-slate-600 leading-relaxed mt-4">
                                    Empower your customers with the freedom of banking on their schedule. Our kiosks
                                    alleviate branch congestion by handling routine transactions with speed and precision.
                                </p>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 h-6 w-6 flex items-center justify-center rounded-full bg-secondary/10 text-secondary mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-sm font-medium text-slate-700">Instant Bill Settlement</p>
                                </div>
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 h-6 w-6 flex items-center justify-center rounded-full bg-secondary/10 text-secondary mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-sm font-medium text-slate-700">Instant Card Issuance</p>
                                </div>
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 h-6 w-6 flex items-center justify-center rounded-full bg-secondary/10 text-secondary mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-sm font-medium text-slate-700">Digital Voucher Market</p>
                                </div>
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 h-6 w-6 flex items-center justify-center rounded-full bg-secondary/10 text-secondary mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-sm font-medium text-slate-700">Mini-Statements</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="group relative">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <div class="order-1 space-y-6">
                            <div>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-primary/10 text-primary mb-4">
                                    Full-Stack Automation
                                </span>
                                <h3 class="text-4xl font-extrabold text-slate-900 tracking-tight">All-in-One Smart Machine
                                </h3>
                                <p class="text-lg text-slate-600 leading-relaxed mt-4">
                                    A complete bank branch condensed into a single terminal. Capable of handling complex
                                    financial workflows, from loan origination to high-value transfers, reducing operational
                                    overhead.
                                </p>
                            </div>

                            <div class="bg-slate-50 rounded-xl p-6 border border-slate-100">
                                <ul class="space-y-4">
                                    <li class="flex items-center text-slate-700">
                                        <svg class="w-5 h-5 text-primary mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-sm font-semibold">Bulk Cash & Cheque Deposit Processing</span>
                                    </li>
                                    <li class="flex items-center text-slate-700">
                                        <svg class="w-5 h-5 text-primary mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                        </svg>
                                        <span class="text-sm font-semibold">Inter-bank & Intra-bank Fund Transfers</span>
                                    </li>
                                    <li class="flex items-center text-slate-700">
                                        <svg class="w-5 h-5 text-primary mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                            </path>
                                        </svg>
                                        <span class="text-sm font-semibold">Loan Application & Pre-Assessment</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="order-2 relative">
                            <div
                                class="absolute -inset-4 bg-gradient-to-l from-primary/10 to-transparent rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition duration-1000">
                            </div>
                            <div
                                class="relative rounded-2xl shadow-2xl shadow-gray-200 overflow-hidden border border-gray-100 bg-white">
                                <img src="{{ asset('images/all_in_one.png') }}" alt="Smart Machine"
                                    class="w-full h-auto object-cover transform transition duration-700 hover:scale-105">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="group relative">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <div class="order-2 lg:order-1 relative">
                            <div
                                class="absolute -inset-4 bg-gradient-to-r from-secondary/10 to-transparent rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition duration-1000">
                            </div>
                            <div
                                class="relative rounded-2xl shadow-2xl shadow-gray-200 overflow-hidden border border-gray-100 bg-white">
                                <img src="{{ asset('images/vtm.png') }}" alt="VTM Machine"
                                    class="w-full h-auto object-cover transform transition duration-700 hover:scale-105">
                            </div>
                        </div>
                        <div class="order-1 lg:order-2 space-y-6">
                            <div>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-secondary/10 text-secondary mb-4">
                                    Hybrid Experience
                                </span>
                                <h3 class="text-4xl font-extrabold text-slate-900 tracking-tight">Virtual Teller Machine
                                    (VTM)</h3>
                                <p class="text-lg text-slate-600 leading-relaxed mt-4">
                                    Bridge the gap between physical and digital. The VTM connects customers with live
                                    tellers via high-definition video for personalized assistance, document verification,
                                    and advisory services.
                                </p>
                            </div>

                            <div class="grid grid-cols-1 gap-4 pt-4">
                                <div
                                    class="p-4 rounded-lg bg-white border border-gray-100 shadow-sm hover:shadow-md transition">
                                    <h4 class="font-bold text-slate-900 flex items-center">
                                        <svg class="w-5 h-5 text-secondary mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        HD Video Interface
                                    </h4>
                                    <p class="text-sm text-slate-500 mt-1">Real-time interaction with remote banking staff.
                                    </p>
                                </div>
                                <div
                                    class="p-4 rounded-lg bg-white border border-gray-100 shadow-sm hover:shadow-md transition">
                                    <h4 class="font-bold text-slate-900 flex items-center">
                                        <svg class="w-5 h-5 text-secondary mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        Secure Onboarding
                                    </h4>
                                    <p class="text-sm text-slate-500 mt-1">Biometric scanning and digital signature capture.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="group relative">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <div class="order-1 space-y-6">
                            <div>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-primary/10 text-primary mb-4">
                                    Trust Infrastructure
                                </span>
                                <h3 class="text-4xl font-extrabold text-slate-900 tracking-tight">Intelligent Product
                                    Scanner</h3>
                                <p class="text-lg text-slate-600 leading-relaxed mt-4">
                                    Ensure supply chain integrity with our advanced verification terminal. Designed for
                                    merchants and logistics, it validates authenticity instantly via multi-format scanning.
                                </p>
                            </div>

                            <div class="space-y-4 pt-2">
                                <p class="text-slate-600">
                                    By leveraging NFC, RFID, and high-speed QR recognition, this terminal protects your
                                    brand reputation and prevents revenue loss from counterfeit goods.
                                </p>
                                <div class="flex flex-wrap gap-3">
                                    <span
                                        class="px-3 py-1 rounded-md bg-gray-100 text-gray-600 text-sm font-medium">NFC/RFID</span>
                                    <span
                                        class="px-3 py-1 rounded-md bg-gray-100 text-gray-600 text-sm font-medium">QR/Barcode</span>
                                    <span
                                        class="px-3 py-1 rounded-md bg-gray-100 text-gray-600 text-sm font-medium">Real-time
                                        Cloud Sync</span>
                                </div>
                            </div>
                        </div>
                        <div class="order-2 relative">
                            <div
                                class="absolute -inset-4 bg-gradient-to-l from-primary/10 to-transparent rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition duration-1000">
                            </div>
                            <div
                                class="relative rounded-2xl shadow-2xl shadow-gray-200 overflow-hidden border border-gray-100 bg-white">
                                <img src="{{ asset('images/scanner.png') }}" alt="Product Scanner"
                                    class="w-full h-auto object-cover transform transition duration-700 hover:scale-105">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section> --}}

        <section class="py-24 bg-white relative font-sans overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-32">
                @foreach($products as $product)
                    @php $isImageLeft = $product->layout === 'image-left'; @endphp
                    <div class="group relative">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                            {{-- Image --}}
                            <div class="{{ $isImageLeft ? 'order-2 lg:order-1' : 'order-2' }} relative">
                                <div
                                    class="absolute -inset-4 bg-gradient-to-{{ $product->color === 'primary' ? 'l' : 'r' }} from-{{ $product->color }}/10 to-transparent rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition duration-1000">
                                </div>
                                <div
                                    class="relative rounded-2xl shadow-2xl shadow-gray-200 overflow-hidden border border-gray-100 bg-white">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                                        class="w-full h-auto object-cover transform transition duration-700 hover:scale-105">
                                </div>
                            </div>

                            {{-- Text --}}
                            <div class="{{ $isImageLeft ? 'order-1 lg:order-2' : 'order-1' }} space-y-6">
                                <div>
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-{{ $product->color }}/10 text-{{ $product->color }} mb-4">
                                        {{ $product->subtitle }}
                                    </span>
                                    <h3 class="text-4xl font-extrabold text-slate-900 tracking-tight">{{ $product->title }}</h3>
                                    <p class="text-lg text-slate-600 leading-relaxed mt-4">{{ $product->description }}</p>
                                </div>

                                {{-- Features Grid --}}
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                                    @foreach($product->features as $feature)
                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 h-6 w-6 flex items-center justify-center rounded-full bg-{{ $product->color }}/10 text-{{ $product->color }} mt-0.5">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm font-medium text-slate-700">{{ $feature->feature }}</p>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>



        <!-- ## 💳 Additional Services Grid -->

        <!-- ## 💡 IoT Product Grid -->
        {{-- <section class="py-20 bg-gray-50 font-sans">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Smart Thermostat -->
                    <div
                        class="service-card bg-primary text-white p-8 rounded-xl shadow-xl border-4 border-secondary transition duration-300 transform hover:scale-[1.02] col-span-full lg:col-span-2">
                        <div class="flex items-center mb-4">
                            <div
                                class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center text-primary text-3xl mr-4">
                                <i class="fa-solid fa-temperature-half"></i>
                            </div>
                            <h3 class="text-2xl font-extrabold">Smart Thermostat</h3>
                        </div>
                        <p class="text-blue-100 text-base">
                            Automatically adjust your home temperature, save energy, and control climate remotely
                            via mobile app or voice assistant integration.
                        </p>
                    </div>

                    <!-- Smart Security Camera -->
                    <div
                        class="service-card bg-white p-6 rounded-xl shadow-md border border-gray-100 transition duration-300 md:col-span-2 lg:col-span-1 hover:shadow-lg">
                        <div
                            class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center text-secondary text-xl mb-4">
                            <i class="fa-solid fa-video"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Smart Security Camera</h3>
                        <p class="text-gray-600 text-sm">Monitor your home in real-time with motion detection, night
                            vision, and cloud storage alerts accessible from anywhere.</p>
                    </div>

                    <!-- IoT Smart Lock -->
                    <div
                        class="service-card bg-white p-6 rounded-xl shadow-md border border-gray-100 transition duration-300 hover:shadow-lg">
                        <div
                            class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary text-xl mb-4">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">IoT Smart Lock</h3>
                        <p class="text-gray-600 text-sm">Control door access remotely, grant temporary codes, and
                            receive real-time entry notifications for enhanced security.</p>
                    </div>

                    <!-- Smart Light Bulb -->
                    <div
                        class="service-card bg-white p-6 rounded-xl shadow-md border border-gray-100 transition duration-300 flex flex-col justify-between hover:shadow-lg">
                        <div>
                            <div
                                class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center text-secondary text-xl mb-4">
                                <i class="fa-solid fa-lightbulb"></i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Smart Light Bulb</h3>
                            <p class="text-gray-600 text-sm">Adjust brightness and color, schedule lighting, and
                                control lights remotely for energy efficiency and convenience.</p>
                        </div>
                    </div>

                    <!-- Smart Air Quality Sensor -->
                    <div
                        class="service-card bg-white p-6 rounded-xl shadow-md border border-gray-100 transition duration-300 hover:shadow-lg">
                        <div
                            class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary text-xl mb-4">
                            <i class="fa-solid fa-wind"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Smart Air Quality Sensor</h3>
                        <p class="text-gray-600 text-sm">Track indoor air quality, temperature, humidity, and VOCs,
                            and receive alerts to maintain a healthy environment.</p>
                    </div>

                    <!-- IoT Water Leak Detector -->
                    <div
                        class="service-card bg-white p-6 rounded-xl shadow-md border border-gray-100 transition duration-300 hover:shadow-lg">
                        <div
                            class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center text-secondary text-xl mb-4">
                            <i class="fa-solid fa-droplet"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">IoT Water Leak Detector</h3>
                        <p class="text-gray-600 text-sm">Detect leaks early, prevent water damage, and receive
                            instant notifications to safeguard your home or business.</p>
                    </div>

                    <!-- Smart Smoke & Fire Detector -->
                    <div
                        class="service-card bg-white p-6 rounded-xl shadow-md border border-gray-100 transition duration-300 hover:shadow-lg">
                        <div
                            class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary text-xl mb-4">
                            <i class="fa-solid fa-fire-flame-curved"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Smart Smoke & Fire Detector</h3>
                        <p class="text-gray-600 text-sm">Get early alerts for smoke or fire hazards, with real-time
                            notifications to mobile devices for safety assurance.</p>
                    </div>

                    <!-- IoT Hub -->
                    <div
                        class="bg-secondary p-6 rounded-xl shadow-xl border-2 border-primary flex flex-col justify-center items-center text-center transition duration-300 hover:bg-yellow-400">
                        <h3 class="text-lg font-bold text-primary mb-2">Central IoT Hub</h3>
                        <p class="text-gray-900 text-sm mb-4">Connect all your smart devices seamlessly, monitor and
                            control your IoT ecosystem from a single app.</p>
                        <button onclick="navigateTo('contact')"
                            class="px-4 py-2 bg-primary text-white rounded font-bold hover:bg-blue-900 text-sm w-full transition duration-300">
                            Contact Specialist
                        </button>
                    </div>

                </div>
            </div>
        </section> --}}

        <section class="py-20 bg-gray-50 font-sans">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($items as $item)

                        @if($item->type === 'large')
                            <div
                                class="service-card bg-primary text-white p-8 rounded-xl shadow-xl border-4 border-secondary 
                                                            transition duration-300 hover:scale-[1.02] col-span-full lg:col-span-{{ $item->column_span }}">

                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center text-primary text-3xl mr-4">
                                        <i class="{{ $item->icon }}"></i>
                                    </div>
                                    <h3 class="text-2xl font-extrabold">{{ $item->title }}</h3>
                                </div>

                                <p class="text-blue-100">{{ $item->description }}</p>
                            </div>
                        @endif

                        @if($item->type === 'regular')
                            <div
                                class="service-card bg-white p-6 rounded-xl shadow-md border border-gray-100 transition hover:shadow-lg">

                                <div
                                    class="w-12 h-12 bg-{{ $item->color }}/10 rounded-full flex items-center justify-center text-{{ $item->color }} text-xl mb-4">
                                    <i class="{{ $item->icon }}"></i>
                                </div>

                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $item->title }}</h3>
                                <p class="text-gray-600 text-sm">{{ $item->description }}</p>
                            </div>
                        @endif

                        @if($item->type === 'cta')
                            <div class="bg-secondary p-6 rounded-xl shadow-xl border-2 border-primary text-center">

                                <h3 class="text-lg font-bold text-primary mb-2">{{ $item->title }}</h3>
                                <p class="text-gray-900 text-sm mb-4">{{ $item->description }}</p>

                                <a href="{{ $item->button_url }}"
                                    class="px-4 py-2 bg-primary text-white rounded font-bold hover:bg-blue-900 text-sm w-full block">
                                    {{ $item->button_text }}
                                </a>
                            </div>
                        @endif

                    @endforeach

                </div>

            </div>
        </section>



    </div>
@endsection