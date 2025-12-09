<aside id="sidebar" class="bg-primary text-white w-64 hidden md:flex flex-col transition-all duration-300 z-20">
    <div class="h-16 flex items-center justify-center border-b border-gray-700 shadow-lg">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="" class="w-12 border-secondary rounded-md">
        </a>
    </div>

    <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto styled-scrollbar">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fas fa-tachometer-alt w-6"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        {{-- Users (super admin only) --}}
        @if(Auth::user()->role === 'super_admin')
            <a href="{{ route('users.index') }}"
                class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg {{ request()->routeIs('users.index') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
                <i class="fas fa-users w-6"></i>
                <span class="font-medium">Users</span>
            </a>
        @endif

        @php
            // Dropdown definitions
            $dropdowns = [
                [
                    'title' => 'Home Page',
                    'icon' => 'fas fa-home',
                    'routes' => ['headers.*', 'stats.*', 'partners.*', 'why_finista.*', 'highlighted_products.*', 'solutions.*', 'testimonials.*', 'news.*'],
                    'links' => [
                        ['route' => 'headers.index', 'icon' => 'fas fa-image', 'text' => 'Header Images'],
                        ['route' => 'stats.index', 'icon' => 'fa-solid fa-chart-area', 'text' => 'Stats'],
                        ['route' => 'partners.index', 'icon' => 'fa-solid fa-handshake', 'text' => 'Partners'],
                        ['route' => 'why_finista.index', 'icon' => 'fa-solid fa-circle-question', 'text' => 'Why Finista'],
                        ['route' => 'highlighted_products.index', 'icon' => 'fa-solid fa-computer', 'text' => 'Highlighted Product'],
                        ['route' => 'solutions.index', 'icon' => 'fa-solid fa-lightbulb', 'text' => 'Discover Solutions'],
                        ['route' => 'testimonials.index', 'icon' => 'fa-solid fa-quote-left', 'text' => 'Testimonials'],
                        ['route' => 'news.index', 'icon' => 'fa-solid fa-radio', 'text' => 'News'],
                    ],
                ],
                [
                    'title' => 'Steps & Features',
                    'icon' => 'fas fa-layer-group',
                    'routes' => ['steps.*', 'features.*'],
                    'links' => [
                        ['route' => 'steps.index', 'icon' => 'fa-solid fa-shoe-prints', 'text' => 'Steps'],
                        ['route' => 'features.index', 'icon' => 'fa-solid fa-file-circle-plus', 'text' => 'Features List'],
                    ],
                ],
                [
                    'title' => 'Products',
                    'icon' => 'fa-solid fa-box',
                    'routes' => ['products.*', 'more_products.*'],
                    'links' => [
                        ['route' => 'products.index', 'icon' => 'fa-solid fa-clipboard-list', 'text' => 'Products List'],
                        ['route' => 'more_products.index', 'icon' => 'fa-solid fa-clipboard-list', 'text' => 'More Products'],
                    ],
                ],
                [
                    'title' => 'About',
                    'icon' => 'fa-solid fa-building',
                    'routes' => ['about_section.*', 'core_values.*', 'journeys.*', 'leadership.*'],
                    'links' => [
                        ['route' => 'about_section.index', 'icon' => 'fa-solid fa-sun', 'text' => 'About Section'],
                        ['route' => 'core_values.index', 'icon' => 'fa-solid fa-sun', 'text' => 'Core Values'],
                        ['route' => 'journeys.index', 'icon' => 'fa-solid fa-road', 'text' => 'Journey'],
                        ['route' => 'leadership.index', 'icon' => 'fa-solid fa-hand-fist', 'text' => 'Leadership'],
                    ],
                ],
                [
                    'title' => 'Contact',
                    'icon' => 'fa-solid fa-headset',
                    'routes' => ['map_locations.*', 'contact_inquiries.*', 'faqs.*'],
                    'links' => [
                        ['route' => 'map_locations.index', 'icon' => 'fa-solid fa-location-dot', 'text' => 'Map Locations'],
                        ['route' => 'contact_inquiries.index', 'icon' => 'fa-solid fa-person-circle-question', 'text' => 'Inquiries'],
                        ['route' => 'faqs.index', 'icon' => 'fa-brands fa-battle-net', 'text' => 'FAQs'],
                    ],
                ],
            ];
        @endphp

        {{-- Generate Dropdowns --}}
        @foreach($dropdowns as $dropdown)
            @php
                $isActive = false;
                foreach ($dropdown['routes'] as $pattern) {
                    if (request()->routeIs($pattern)) {
                        $isActive = true;
                        break;
                    }
                }
            @endphp
            <div x-data="{ open: {{ $isActive ? 'true' : 'false' }} }" class="mb-2">
                <button @click="open = !open"
                    class="flex items-center w-full px-4 py-3 text-white rounded-lg justify-between hover:bg-[#ffae00] transition {{ $isActive ? 'bg-[#ffae00] text-black font-semibold' : '' }}">
                    <span class="flex items-center space-x-2">
                        <i class="{{ $dropdown['icon'] }} w-6"></i>
                        <span class="font-medium">{{ $dropdown['title'] }}</span>
                    </span>
                    <i :class="open ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'"
                        class="transition-transform duration-300"></i>
                </button>

                <div x-show="open" x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-screen"
                    x-transition:leave="transition ease-in duration-400" x-transition:leave-start="opacity-100 max-h-screen"
                    x-transition:leave-end="opacity-0 max-h-0" class="mt-1 overflow-hidden space-y-1 pl-6">
                    @foreach($dropdown['links'] as $link)
                        <a href="{{ route($link['route']) }}"
                            class="flex items-center px-4 py-2 rounded-lg hover:bg-[#ffae00] {{ request()->routeIs(explode('.', $link['route'])[0] . '.*') ? 'bg-[#ffae00] text-black font-semibold' : 'text-white' }}">
                            <i class="{{ $link['icon'] }} w-6"></i>
                            <span class="font-medium">{{ $link['text'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach

        {{-- Footer Contacts --}}
        <a href="{{ route('footer_contacts.index') }}"
            class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg {{ request()->routeIs('footer_contacts.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fas fa-phone w-6"></i>
            <span class="font-medium">Contacts</span>
        </a>
    </nav>

    <div class="p-4 border-t border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex w-full items-center px-4 py-2 text-gray-300 hover:text-white transition-colors">
                <i class="fas fa-sign-out-alt w-6"></i>
                <span class="font-medium ml-2">Logout</span>
            </button>
        </form>
    </div>
</aside>