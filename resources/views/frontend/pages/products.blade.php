@extends('frontend.layouts.app')

@section('content')
    <div id="products" class="page-section active">
            <section class="relative bg-primary text-white py-20 md:py-32 overflow-hidden">
                <div class="absolute inset-0 bg-blue-900 opacity-50"></div>
                <!-- <div
            class="absolute left-0 bottom-0 w-1/3 h-1/2 bg-secondary opacity-10 skew-y-12 transform -translate-x-1/4">
        </div> -->

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
                    <h1 class="text-5xl md:text-6xl font-extrabold mb-4 font-sans leading-tight">
                        Innovative Banking Solutions 🏦
                    </h1>

                    <h2 class="text-xl md:text-2xl text-secondary font-semibold mb-6">
                        Redefining the Future of Self-Service and Digital Finance.
                    </h2>

                    <p class="text-lg text-blue-100 max-w-3xl mx-auto font-sans">
                        From our 24/7 automated machines to world-class wealth management, explore the diverse range of
                        products and services designed to make banking **instant, secure, and uniquely convenient** for
                        you.
                    </p>
                </div>
            </section>

            <!-- ## ✨ Product Highlights -->

            <section class="py-16 bg-white border-b border-gray-100 font-sans">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-first lg:order-first">
                            <div class="rounded-xl shadow-2xl overflow-hidden border-4 border-secondary">
                                <img src="{{ asset('images/kiosk__machine.png') }}" alt="">
                            </div>
                        </div>
                        <div class="order-last lg:order-last">
                            <h2 class="text-xs font-bold text-secondary uppercase tracking-widest mb-2">Instant Access
                            </h2>
                            <h3 class="text-3xl font-bold text-primary mb-4">Self-Service Banking Kiosk</h3>
                            <p class="text-lg text-gray-700 mb-4">
                                The Power of Banking in Your Hands.
                            </p>
                            <p class="text-gray-600">
                                Our 'Self-Service Kiosks' are deployed in high-traffic areas for instant, convenient
                                access to basic banking tasks. You can check balances, print temporary statements, pay
                                bills, and even purchase digital vouchers quickly and securely without waiting in line.
                            </p>
                            <ul class="mt-4 text-sm text-gray-600 space-y-2 list-disc list-inside">
                                <li>Quick Bill Payment and Top-ups</li>
                                <li>Temporary Card Printing</li>
                                <li>Balance Inquiry and Mini-Statements</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-16 bg-gray-100 border-b border-gray-100 font-sans">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-last lg:order-first">
                            <h2 class="text-xs font-bold text-primary uppercase tracking-widest mb-2">Complete
                                Automation</h2>
                            <h3 class="text-3xl font-bold text-primary mb-4">All-in-One Smart Machine</h3>
                            <p class="text-lg text-gray-700 mb-4">
                                24/7 Branch Capabilities, Built into a Machine.
                            </p>
                            <p class="text-gray-600">
                                The 'All-in-One Smart Machine' goes beyond the capabilities of a standard ATM. It
                                allows high-limit cash and cheque deposits, instant fund transfers, and detailed loan
                                pre-assessment applications. This terminal is designed to minimize your need to visit a
                                traditional branch.
                            </p>
                            <ul class="mt-4 text-sm text-gray-600 space-y-2 list-disc list-inside">
                                <li>High-Limit Cash/Cheque Deposit</li>
                                <li>Instant Fund Transfers (Internal/External)</li>
                                <li>Loan Inquiry and Application Submission</li>
                            </ul>
                        </div>
                        <div class="order-first lg:order-last">
                            <div class="rounded-xl shadow-2xl overflow-hidden border-4 border-primary">
                                <img src="{{ asset('images/all_in_one.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-16 bg-white border-b border-gray-100 font-sans">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-first lg:order-first">
                            <div class="rounded-xl shadow-2xl overflow-hidden border-4 border-secondary">
                                <img src="{{ asset('images/vtm.png') }}" alt="">
                            </div>
                        </div>
                        <div class="order-last lg:order-last">
                            <h2 class="text-xs font-bold text-secondary uppercase tracking-widest mb-2">Human Touch,
                                Digitally</h2>
                            <h3 class="text-3xl font-bold text-primary mb-4">Virtual Teller Machine (VTM)</h3>
                            <p class="text-lg text-gray-700 mb-4">
                                Face-to-Face Banking When You Need It.
                            </p>
                            <p class="text-gray-600">
                                The 'VTM' offers the personalized service of a branch teller via live video
                                conference. Use it for complex services like new account opening, resolving debit/credit
                                card issues, or getting detailed advice, all guided by a remote banking representative.
                            </p>
                            <ul class="mt-4 text-sm text-gray-600 space-y-2 list-disc list-inside">
                                <li>Live Video Chat with a Teller</li>
                                <li>New Account & Card Opening</li>
                                <li>Signature Verification and Document Scanning</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-16 bg-gray-100 border-b border-gray-100 font-sans">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-last lg:order-first">
                            <h2 class="text-xs font-bold text-primary uppercase tracking-widest mb-2">Complete
                                Automation</h2>
                            <h3 class="text-3xl font-bold text-primary mb-4">Product Scanner</h3>
                            <p class="text-lg text-gray-700 mb-4">
                                A product scanner that verifies the authenticity of items instantly using barcodes, QR
                                codes, or NFC tags.
                            </p>
                            <p class="text-gray-600">
                                This scanner allows businesses and customers to quickly check if a product is genuine.
                                By scanning barcodes, QR codes, or embedded NFC/RFID tags, it confirms authenticity,
                                helps prevent counterfeit products, and ensures trust in the supply chain.
                            </p>
                            <ul class="mt-4 text-sm text-gray-600 space-y-2 list-disc list-inside">
                                <li>Instant Authenticity Check</li>
                                <li>Counterfeit Prevention</li>
                                <li>Data Logging & Traceability</li>
                            </ul>
                        </div>
                        <div class="order-first lg:order-last">
                            <div class="rounded-xl shadow-2xl overflow-hidden border-4 border-primary">
                                <img src="{{ asset('images/scanner.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ## 💳 Additional Services Grid -->

            <!-- ## 💡 IoT Product Grid -->
            <section class="py-20 bg-gray-50 font-sans">
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
            </section>

        </div>
@endsection