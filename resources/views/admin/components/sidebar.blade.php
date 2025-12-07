<aside id="sidebar" class="bg-primary text-white w-64 hidden md:flex flex-col transition-all duration-300 z-20">
    <div class="h-16 flex items-center justify-center border-b border-gray-700 shadow-lg">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="" class="w-12 border-secondary rounded-md">
        </a>
    </div>

    <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto styled-scrollbar">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg
            {{ request()->routeIs('admin.dashboard') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fas fa-tachometer-alt w-6"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        <a href="#"
            class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg {{ request()->routeIs('admin.users') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fas fa-users w-6"></i>
            <span class="font-medium">Users</span>
        </a>

        <a href="{{ route('admin.dashboard.headerImages') }}"
            class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg {{ request()->routeIs('admin.dashboard.headerImages') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fas fa-image w-6"></i>
            <span class="font-medium">Header Images</span>
        </a>

        <a href="{{ route('stats.index') }}"
            class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg {{ request()->routeIs('stats.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-solid fa-chart-area w-6"></i>
            <span class="font-medium">Stats</span>
        </a>

        <a href="{{ route('partners.index') }}"
            class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg {{ request()->routeIs('partners.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-solid fa-handshake w-6"></i>
            <span class="font-medium">Partners</span>
        </a>

        <a href="{{ route('why_finista.index') }}" class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg 
            {{ request()->routeIs('why_finista.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-solid fa-circle-question w-6"></i>
            <span class="font-medium">Why Finista</span>
        </a>

        <a href="#"
            class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg 
            {{ request()->routeIs('highlighted_product.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-brands fa-product-hunt w-6"></i>
            <span class="font-medium">Highlighted Product</span>
        </a>

        <a href="{{ route('solutions.index') }}" class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg 
            {{ request()->routeIs('solutions.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-solid fa-lightbulb w-6"></i>
            <span class="font-medium">Discover Solutions</span>
        </a>

        <a href="{{ route('testimonials.index') }}" class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg 
            {{ request()->routeIs('testimonials.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-solid fa-quote-left w-6"></i>
            <span class="font-medium">Testimonials</span>
        </a>

        <a href="{{ route('steps.index') }}" class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg 
            {{ request()->routeIs('steps.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-solid fa-shoe-prints w-6"></i>
            <span class="font-medium">Steps</span>
        </a>

        <a href="{{ route('features.index') }}" class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg 
            {{ request()->routeIs('features.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-solid fa-file-circle-plus w-6"></i>
            <span class="font-medium">Features List</span>
        </a>

        <a href="{{ route('products.index') }}" class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg 
            {{ request()->routeIs('products.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-solid fa-clipboard-list w-6"></i>
            <span class="font-medium">Products List</span>
        </a>

        <a href="{{ route('core_values.index') }}" class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg 
            {{ request()->routeIs('core_values.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-solid fa-sun w-6"></i>
            <span class="font-medium">Core Values</span>
        </a>

        <a href="{{ route('journeys.index') }}" class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg 
            {{ request()->routeIs('journeys.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-solid fa-road w-6"></i>
            <span class="font-medium">Journey</span>
        </a>

        <a href="{{ route('leadership.index') }}" class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg 
            {{ request()->routeIs('leadership.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fa-solid fa-hand-fist w-6"></i>
            <span class="font-medium">Leadership</span>
        </a>

        <a href="{{ route('footer_contacts.index') }}"
            class="flex items-center px-4 py-3 hover:bg-[#ffae00] hover:rounded-lg {{ request()->routeIs('footer_contacts.*') ? 'bg-[#ffae00] text-black font-semibold rounded-lg' : '' }}">
            <i class="fas fa-phone w-6"></i>
            <span class="font-medium">Footer Contacts</span>
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

<div id="mobile-sidebar"
    class="fixed inset-0 z-40 bg-dark text-white w-64 transform -translate-x-full transition-transform duration-300 md:hidden flex flex-col">
    <div class="h-16 flex items-center justify-between px-6 border-b border-gray-700">
        <span class="text-xl font-bold">Menu</span>
        <button id="close-sidebar" class="text-white focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <nav class="flex-1 px-2 py-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 bg-primary rounded">Dashboard</a>
        <a href="#" class="block px-4 py-2 hover:bg-primary hover:bg-opacity-50 rounded">Users</a>
    </nav>
</div>