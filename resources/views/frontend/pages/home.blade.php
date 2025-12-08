@extends('frontend.layouts.app')

@section('content')
    <div id="home" class="page-section active">
        <!-- Hero Section -->
        <section class="relative bg-primary text-white overflow-hidden">
            <div class="absolute inset-0 bg-blue-900 opacity-50"></div>
            <div class="absolute right-0 top-0 w-1/2 h-full bg-secondary opacity-10 skew-x-12 transform translate-x-20">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div>
                        <div
                            class="inline-block px-3 py-1 bg-secondary/20 text-secondary rounded-full text-sm font-semibold mb-6 border border-secondary/30">
                            Trusted Financial Partner
                        </div>
                        <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                            Banking Made <span class="text-secondary">Simple</span> & Secure
                        </h1>
                        <p class="text-lg text-blue-100 mb-8 max-w-lg">
                            Experience seamless financial services tailored to your needs. From digital vouchers to
                            instant deposits, Finista is here for you.
                        </p>
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
                    <div class="relative hidden md:block">
                        <!-- Abstract Graphic Representation -->
                        <div
                            class="relative bg-gradient-to-tr from-secondary to-yellow-300 rounded-2xl p-1 shadow-2xl transform rotate-3 hover:rotate-0 transition duration-500">
                            <div class="bg-white rounded-xl overflow-hidden h-96 flex items-center justify-center">
                                <i class="fa-solid fa-building-columns text-9xl text-primary opacity-80"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="bg-[#00284d] py-12 text-white border-b border-blue-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    @foreach($stats as $stat)
                        <div>
                            <div class="text-3xl md:text-4xl font-bold {{ $stat->color ?? 'text-secondary' }} mb-2">
                                {{ $stat->value }}
                            </div>
                            <div class="text-sm text-blue-200 uppercase tracking-wide">{{ $stat->label }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <section class="relative py-16 bg-gray-100 overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gray-100 transform skew-y-1 -translate-y-1/2 z-0">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <h3 class="text-center text-2xl font-extrabold text-primary mb-12">
                    Trusted by millions and backed by industry leaders
                </h3>

                <div
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-y-12 gap-x-6 items-center justify-items-center">

                    @foreach($partners as $partner)
                        <div class="text-center">
                            @if($partner->type === 'brand')
                                <i
                                    class="fa-brands {{ $partner->icon }} text-6xl text-primary/70 hover:text-primary transition duration-300 transform hover:scale-105"></i>
                                <p class="text-xs font-semibold text-gray-500 mt-2 tracking-wider">{{ $partner->title }}</p>
                            @else
                                <div
                                    class="w-20 h-20 flex items-center justify-center {{ $partner->type === 'feature' ? 'bg-secondary/10' : '' }} rounded-xl mx-auto mb-2">
                                    <i class="fa-solid {{ $partner->icon }} text-4xl text-secondary"></i>
                                </div>
                                <div class="text-sm font-bold text-gray-700">{{ $partner->title }}</div>
                                <p class="text-xs font-semibold text-gray-500 tracking-wider">{{ $partner->subtitle }}</p>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>

        </section>

        <!-- Quick Features Preview -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-primary font-bold tracking-wide uppercase text-sm mb-2">Why Finista?</h2>
                    <h3 class="text-3xl font-bold text-gray-900">Your Finance, Your Way</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($features as $feature)
                        <div class="p-6 bg-gray-50 rounded-xl border-l-4 border-{{ $feature->border_color }} shadow-sm">
                            <i class="fa-solid {{ $feature->icon }} text-3xl text-primary mb-4"></i>
                            <h4 class="text-xl font-bold mb-2">{{ $feature->title }}</h4>
                            <p class="text-gray-600">{{ $feature->subtitle }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Highlighted Product --}}
        <section class="bg-gray-100 py-20 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-center gap-16">
                    <div class="md:w-1/2">
                        <div
                            class="bg-white p-2 rounded-3xl shadow-2xl rotate-3 transform hover:rotate-0 transition duration-500 max-w-xs mx-auto">
                            <div
                                class="bg-primary rounded-2xl h-[500px] flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0">
                                    <img src="{{ asset('storage/' . $highlightedProduct->image) }}"
                                        alt="{{ $highlightedProduct->subtitle }}"
                                        class="w-full h-full object-cover opacity-70" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/2">
                        <h1 class="text-3xl md:text-4xl font-bold text-primary mb-6">{{ $highlightedProduct->title }}</h1>
                        <h2 class="text-2xl md:text-3xl font-bold text-secondary mb-3">{{ $highlightedProduct->subtitle }}
                        </h2>
                        <p class="text-lg text-gray-600 mb-8">{{ $highlightedProduct->description }}</p>
                        <ul class="space-y-4 mb-8">
                            @foreach($highlightedProduct->features as $feature)
                                <li class="flex items-center gap-3">
                                    <i class="fa-solid fa-check-circle text-green-500 text-xl"></i>
                                    <span class="text-gray-700">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        {{-- Leave the "Need Immediate Help?" section as-is --}}
                        <div class="space-y-4 max-w-sm">
                            <div class="p-6 bg-gray-100 rounded-xl shadow-lg border-l-4 border-secondary">
                                <div class="flex items-center mb-3">
                                    <i class="fa-solid fa-headset text-3xl text-primary mr-4"></i>
                                    <h4 class="text-xl font-bold text-gray-900">Need Immediate Help?</h4>
                                </div>
                                <p class="text-gray-600 text-sm mb-4">
                                    Connect with a banking specialist instantly via live chat or request a personalized
                                    callback.
                                </p>
                                <div class="flex gap-3">
                                    <button onclick="openLiveChat()"
                                        class="flex-1 px-4 py-2 bg-secondary text-primary rounded-lg font-bold text-sm hover:bg-yellow-400 transition shadow-md">
                                        <i class="fa-solid fa-comment-dots mr-1"></i> Email
                                    </button>
                                    <button onclick="openCallbackForm()"
                                        class="flex-1 px-4 py-2 border-2 border-primary text-primary rounded-lg font-bold text-sm hover:bg-primary hover:text-white transition">
                                        <i class="fa-solid fa-phone mr-1"></i> Request Call
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>




        <section class="py-20 bg-white border-t border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-primary">Discover All Our Solutions</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto mt-2">
                        We offer a full spectrum of financial tools for every stage of your life.
                    </p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 text-center">

                    @forelse($solutions as $solution)
                        <div
                            class="p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                            <i class="{{ $solution->icon }} text-4xl text-{{ $solution->color }} mb-3"></i>

                            <h4 class="font-bold text-lg text-gray-900">{{ $solution->title }}</h4>
                            <p class="text-sm text-gray-500 mt-1">{{ $solution->description }}</p>
                        </div>
                    @empty
                        <p class="col-span-4 text-center text-gray-500">No solutions added yet.</p>
                    @endforelse
                </div>

                <div class="text-center mt-12">
                    <a href="{{ url('/services') }}"
                        class="inline-block px-8 py-3 bg-secondary text-primary rounded-lg font-bold hover:bg-yellow-400 transition shadow-md">
                        Explore Our Services <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>

            </div>
        </section>


        <section class="py-20 bg-primary/5 text-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">

                    <div class="lg:col-span-2 text-center lg:text-left">
                        <h2 class="text-xs font-semibold text-secondary uppercase tracking-widest mb-2">Interactive
                            Tool</h2>
                        <h3 class="text-3xl md:text-4xl font-extrabold text-primary mb-4">What's on your Mind?</h3>
                        <p class="text-lg text-gray-700 max-w-xl mb-6 lg:mb-0">
                            Use our Products to automate your work and services to mamke your Life Better!
                        </p>
                    </div>

                    <div
                        class="lg:col-span-1 p-8 bg-white rounded-xl shadow-2xl border-b-4 border-secondary transition duration-500 hover:shadow-primary/20">
                        <div class="text-center">
                            <i class="fa-solid fa-calculator text-5xl text-secondary mb-4"></i>
                            <h4 class="font-bold text-xl text-gray-900 mb-4">Get in Touch!</h4>
                            <p class="text-gray-600 text-sm mb-6">Plan Your Automation and Reach out to us!</p>
                            <a href="{{ url('/contact') }}"
                                class="w-full block text-center px-6 py-3 bg-primary text-white rounded-lg font-bold hover:bg-blue-900 transition shadow-md">
                                Start Planning Now
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-primary/95 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="flex flex-col md:flex-row items-center justify-between bg-primary p-10 rounded-2xl shadow-2xl border-4 border-secondary/50">
                    <div class="md:w-2/3 text-center md:text-left mb-8 md:mb-0">
                        <h2 class="text-3xl md:text-4xl font-extrabold mb-3">
                            Dreaming of a Automation?
                        </h2>
                        <p class="text-lg text-blue-100 max-w-xl">
                            Get pre-approved in minutes with our competitive automated products' rates and dedicated
                            advisors.
                        </p>
                    </div>
                    <div class="md:w-1/3 flex justify-center md:justify-end">
                        <a href="{{ url('/products') }}"
                            class="px-8 py-4 bg-secondary text-primary rounded-lg font-bold text-lg hover:bg-yellow-400 transition transform hover:scale-105 shadow-xl inline-block text-center">
                            Explore Products <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>

                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-primary">What Our Clients Say</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($testimonials as $t)
                        <div class="p-8 bg-gray-50 rounded-2xl relative">
                            <i class="fa-solid fa-quote-left text-2xl text-gray-200 absolute top-4 right-4"></i>
                            <p class="text-gray-600 mb-6 italic">"{{ $t->message }}"</p>

                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-{{ $t->image_color }} rounded-full flex items-center justify-center text-white font-bold">
                                    {{ $t->initials ?? \Illuminate\Support\Str::upper(substr($t->name, 0, 2)) }}
                                </div>
                                <div>
                                    <div class="font-bold text-primary">{{ $t->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $t->designation }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        {{-- <section class="py-20 bg-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-primary mb-2">Finista Insights & News</h2>
                    <p class="text-lg text-gray-600">Stay updated with our latest news and expert financial tips.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">
                        <div class="h-40 bg-primary/20 flex items-center justify-center text-primary text-4xl">
                            <img src="saving__money.png" alt="">
                        </div>
                        <div class="p-6">
                            <h4 class="font-bold text-lg text-gray-900 mb-2">5 Smart Ways to Start Automating Today
                            </h4>
                            <p class="text-gray-600 text-sm mb-4">Our advisors share simple strategies for beginners
                                to grow their wealth securely.</p>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">
                        <div class="h-40 bg-secondary/20 flex items-center justify-center text-secondary text-4xl">
                            <img src="mobile__banking__interface.png" alt="">
                        </div>
                        <div class="p-6">
                            <h4 class="font-bold text-lg text-gray-900 mb-2">Unlocking the Power of the Automation
                            </h4>
                            <p class="text-gray-600 text-sm mb-4">A step-by-step guide to the app's newest features,
                                including biometric payments.</p>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">
                        <div class="h-40 bg-primary/20 flex items-center justify-center text-primary text-4xl">
                            <img src="cityscape.png" alt="">
                        </div>
                        <div class="p-6">
                            <h4 class="font-bold text-lg text-gray-900 mb-2">Market Outlook: Economic Forecast for
                                Q4 2025</h4>
                            <p class="text-gray-600 text-sm mb-4">Our Chief Economist's analysis on market trends
                                and investment opportunities.</p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-12">
                    <button onclick="navigateTo('blog')"
                        class="px-6 py-3 border-2 border-primary text-primary rounded-lg font-bold hover:bg-primary hover:text-white transition duration-300">
                        About Us
                    </button>
                </div>
            </div>
        </section> --}}

        <section class="py-20 bg-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-primary mb-2">Finista Insights & News</h2>
                    <p class="text-lg text-gray-600">Stay updated with our latest news and expert financial tips.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($news as $item)
                        <div
                            class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">
                            <div class="h-40 bg-primary/20 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="" class="h-full object-contain">
                            </div>

                            <div class="p-6">
                                <h4 class="font-bold text-lg text-gray-900 mb-2">{{ $item->title }}</h4>
                                <p class="text-gray-600 text-sm mb-4">{{ $item->subtitle }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <button onclick="navigateTo('blog')"
                        class="px-6 py-3 border-2 border-primary text-primary rounded-lg font-bold hover:bg-primary hover:text-white transition duration-300">
                        About Us
                    </button>
                </div>

            </div>
        </section>

    </div>
@endsection