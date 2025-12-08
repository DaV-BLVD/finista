@extends('frontend.layouts.app')

@section('content')
    <div id="contact" class="page-section active">
        <section class="relative bg-primary text-white overflow-hidden">
            <div class="absolute inset-0 bg-blue-900 opacity-50"></div>
            <div
                class="absolute right-0 top-0 w-1/2 h-full bg-secondary opacity-10 skew-x-12 transform translate-x-20 hidden md:block">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div>
                        @if($header->badge_text)
                            <div
                                class="inline-flex items-center px-4 py-1 bg-secondary/20 text-secondary rounded-full text-sm font-semibold mb-6 border border-secondary/30">
                                <i class="fas fa-headset mr-2 text-sm"></i> {{ $header->badge_text }}
                            </div>
                        @endif

                        @if($header->title)
                            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">{!! $header->title !!}</h1>
                        @endif

                        @if($header->description)
                            <p class="text-lg text-blue-100 mb-8 max-w-lg">{{ $header->description }}</p>
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
                                    class="bg-white rounded-3xl p-2 shadow-2xl transform transition duration-500 group-hover:rotate-y-2 group-hover:-rotate-x-2 group-hover:scale-105 max-w-lg w-full relative">

                                    <div class="rounded-2xl overflow-hidden border-4 border-secondary relative shadow-inner">
                                        <img src="{{ asset('storage/' . $header->image) }}" class="w-full h-80 object-cover">
                                        <div class="absolute inset-0 bg-black/10 pointer-events-none rounded-2xl"></div>
                                    </div>

                                    <div
                                        class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 w-80 h-5 bg-black/20 rounded-full blur-xl opacity-50 group-hover:scale-x-110 group-hover:-translate-y-1 transition duration-500">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div
                                class="relative bg-white/20 rounded-2xl p-1 shadow-2xl transform hover:scale-105 transition duration-500">
                                <div class="bg-primary rounded-xl overflow-hidden h-80 flex items-center justify-center">
                                    <i class="fas fa-question-circle text-7xl text-white opacity-60"></i>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>



        <section class="bg-white pt-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-primary">Contact Channels</h2>
                    <p class="text-gray-600">Reach out via phone, email, or visit our headquarters.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-1">

                    {{-- Phones --}}
                    <div class="text-center p-6 bg-gray-50 rounded-lg">
                        <i class="fa-solid fa-phone text-secondary text-2xl mb-2"></i>
                        <h3 class="font-bold text-primary">Phone</h3>
                        <p class="text-gray-600">
                            @foreach($channels as $channel)
                                {{ $channel->phone_no }}<br>
                            @endforeach
                        </p>
                    </div>

                    {{-- Emails --}}
                    <div class="text-center p-6 bg-gray-50 rounded-lg">
                        <i class="fa-solid fa-envelope text-secondary text-2xl mb-2"></i>
                        <h3 class="font-bold text-primary">Email</h3>
                        <p class="text-gray-600">
                            @foreach($channels as $channel)
                                {{ $channel->gmail }}<br>
                            @endforeach
                        </p>
                    </div>

                    {{-- Addresses --}}
                    <div class="text-center p-6 bg-gray-50 rounded-lg">
                        <i class="fa-solid fa-location-dot text-secondary text-2xl mb-2"></i>
                        <h3 class="font-bold text-primary">HQ</h3>
                        <p class="text-gray-600">
                            @foreach($channels as $channel)
                                {{ $channel->address }}<br>
                            @endforeach
                        </p>
                    </div>
                </div>

                <section class="py-24 bg-white relative font-sans">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                        {{-- Header Section --}}
                        <div class="text-center mb-12">
                            <h2 class="text-3xl font-bold text-primary" id="locations">Our Locations</h2>
                            <p class="text-gray-600">Click a branch below to view it on the map.</p>
                        </div>

                        {{-- Map Visualization --}}
                        <div
                            class="w-full h-96 lg:h-[550px] rounded-2xl overflow-hidden shadow-2xl relative mb-12 border-4 border-gray-100 transition duration-300 hover:shadow-indigo-200">
                            <iframe id="mapIframe" {{-- NOTE: Corrected the map URL prefix for standard Google Maps
                                embedding --}}
                                src="https://maps.google.com/maps?q={{ $locations[0]->latitude }},{{ $locations[0]->longitude }}&z=15&output=embed"
                                class="w-full h-full" frameborder="0" style="border:0;" allowfullscreen
                                loading="lazy"></iframe>

                            {{-- Location Title Overlay --}}
                            <p id="mapTitle"
                                class="absolute bottom-4 left-4 bg-white px-4 py-2 rounded-xl shadow-lg text-lg font-bold text-gray-800 transition duration-300">
                                {{ $locations[0]->title }}
                            </p>
                        </div>

                        {{-- Branch Cards --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($locations as $index => $location)
                                <div id="location-{{ $index }}"
                                    class="location-card cursor-pointer p-6 bg-white rounded-xl border-2 border-gray-200 shadow-md hover:shadow-xl hover:border-indigo-500 transition duration-300 transform hover:-translate-y-1"
                                    onclick="updateMap({{ $index }})">
                                    <div class="flex items-center space-x-3">
                                        <i class="fas fa-map-marker-alt text-xl text-indigo-600 flex-shrink-0"></i>
                                        <h3 class="font-extrabold text-xl text-gray-900">{{ $location->title }}</h3>
                                    </div>
                                    <div class="mt-3 space-y-1">
                                        <p class="text-gray-600 text-sm flex items-center">
                                            {{ $location->address }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                {{-- JavaScript Section --}}
                <script>
                    // Ensure this script is placed after the section or included in your main JS bundle
                    const locations = @json($locations);

                    const iframe = document.getElementById('mapIframe');
                    const title = document.getElementById('mapTitle');
                    const cards = document.querySelectorAll('.location-card');

                    // Function to handle map updates and card active state
                    function updateMap(index) {
                        // Clear active state from all cards
                        cards.forEach(card => {
                            card.classList.remove('border-indigo-600', 'shadow-indigo-400', 'bg-indigo-50');
                            card.classList.add('border-gray-200');
                        });

                        const loc = locations[index];
                        // Correct Google Maps embed format for latitude/longitude
                        iframe.src = `https://maps.google.com/maps?q=${loc.latitude},${loc.longitude}&z=15&output=embed`;
                        title.textContent = loc.title;

                        // Set active state on the clicked card
                        document.getElementById(`location-${index}`).classList.remove('border-gray-200');
                        document.getElementById(`location-${index}`).classList.add('border-indigo-600', 'shadow-indigo-400', 'bg-indigo-50');
                    }

                    // Initialize map with the first location and set its card as active
                    document.addEventListener('DOMContentLoaded', () => {
                        if (locations.length > 0) {
                            updateMap(0);
                        }
                    });
                </script>
            </div>
        </section>
        <section class="w-full pb-20 bg-white font-sans relative">

            {{-- Decorative Background Elements --}}
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
                <div class="absolute top-20 left-10 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="absolute bottom-20 right-10 w-[500px] h-[500px] bg-secondary/5 rounded-full blur-3xl"></div>
            </div>

            {{--
            UPDATES HERE:
            1. Changed max-w-7xl to max-w-screen-2xl for wider coverage.
            2. Increased padding (px-6 lg:px-16 xl:px-24) to keep it looking polished on huge screens.
            --}}
            <div class="max-w-screen-2xl mx-auto px-6 sm:px-8 lg:px-16 xl:px-24 relative z-10">

                {{-- Increased gap to gap-20 lg:gap-32 to fill the wider space --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-32 items-start">

                    {{-- LEFT COLUMN: Contact Form --}}
                    <div class="w-full">
                        <div
                            class="bg-white p-8 sm:p-12 rounded-[2rem] shadow-2xl border border-gray-100 relative overflow-hidden">

                            {{-- Subtle top accent --}}
                            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-primary to-secondary"></div>

                            <div class="mb-10">
                                <h3 class="text-4xl font-extrabold text-slate-900 tracking-tight">Send a Message</h3>
                                <p class="text-gray-500 mt-3 text-lg">We'd love to hear from you. Fill out the form below
                                    and we'll get back to you shortly.</p>
                            </div>

                            @if(session('success'))
                                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded shadow">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                                @csrf
                                <!-- Name Input -->
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Full
                                        Name</label>
                                    <input type="text" name="name" placeholder="John Doe" required
                                        class="w-full px-6 py-4 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 outline-none transition duration-200 font-medium text-gray-700 placeholder-gray-400">
                                </div>

                                <!-- Email Input -->
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Email
                                        Address</label>
                                    <input type="email" name="email" placeholder="john@example.com" required
                                        class="w-full px-6 py-4 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 outline-none transition duration-200 font-medium text-gray-700 placeholder-gray-400">
                                </div>

                                <!-- Service Select -->
                                <div>
                                    <label
                                        class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Service
                                        Inquiry</label>
                                    <select name="service"
                                        class="w-full px-6 py-4 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 outline-none transition duration-200 font-medium text-gray-700 cursor-pointer">
                                        @foreach($features as $feature)
                                            <option value="{{ $feature->title }}">
                                                {{ $feature->title }} {{ $feature->subtitle }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <!-- Message -->
                                <div>
                                    <label
                                        class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Message</label>
                                    <textarea name="message" rows="5" placeholder="How can we help you today?"
                                        class="w-full px-6 py-4 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 outline-none transition duration-200 font-medium text-gray-700 placeholder-gray-400 resize-none"></textarea>
                                </div>

                                <!-- Submit -->
                                <button type="submit"
                                    class="w-full bg-primary text-white font-bold text-lg py-5 rounded-xl shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 active:translate-y-0 transition-all duration-300 ease-in-out">
                                    Send Message
                                </button>
                            </form>


                        </div>
                    </div>

                    {{-- RIGHT COLUMN: FAQ Section --}}
                    <div class="w-full flex flex-col justify-center h-full pt-8 lg:pt-0">
                        <div class="mb-12">
                            <span class="text-secondary font-bold tracking-wider uppercase text-sm mb-3 block">Support
                                Center</span>
                            <h3 class="text-5xl font-extrabold text-slate-900 tracking-tight mb-6">Frequently Asked
                                Questions</h3>
                            <p class="text-xl text-gray-600 leading-relaxed max-w-2xl">
                                Find quick answers to common questions about our banking services, security protocols, and
                                digital account management systems.
                            </p>
                        </div>

                        <div class="space-y-6">
                            @foreach($faqs as $faq)
                                <details
                                    class="group bg-white border border-gray-100 rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-lg open:shadow-xl open:border-gray-200 open:bg-gray-50/50">
                                    <summary
                                        class="flex justify-between items-center p-6 sm:p-8 cursor-pointer list-none select-none">
                                        <span
                                            class="font-bold text-xl text-slate-800 group-open:text-primary transition-colors">{{ $faq->question }}</span>
                                        <span
                                            class="ml-6 flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-500 group-open:bg-primary group-open:text-white transition-all duration-300 group-open:rotate-180">
                                            <i class="fa-solid fa-chevron-down text-base"></i>
                                        </span>
                                    </summary>
                                    <div class="px-6 sm:px-8 pb-8 pt-0 text-gray-600 text-lg leading-relaxed">
                                        {!! nl2br(e($faq->answer)) !!}
                                    </div>
                                </details>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection