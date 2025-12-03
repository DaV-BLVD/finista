<nav class="bg-primary shadow-lg fixed w-full z-50 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">

            {{-- logo and company title name --}}
            <div id="logo" class="shrink-0 flex items-center cursor-pointer">
                <a href="{{ url('/') }}">
                    <div class="flex items-center gap-3">
                        <div class="bg-secondary text-primary p-2 rounded-lg shadow-md">
                            <img src="{{ asset('images/logo.png') }}" alt="Finista Logo" class="w-10">
                        </div>
                        <span class="font-bold text-2xl text-white tracking-wide">Finista</span>
                    </div>
                </a>
            </div>

            {{-- navbar for bigger screens --}}
            <div id="desktop-menu" class="hidden md:flex md:items-center md:space-x-1">
                <a href="{{ url('/') }}"
                    class="nav-link px-5 py-2 font-semibold rounded-lg transition duration-300 
                    {{ request()->is('/') ? 'bg-blue-900 text-secondary' : 'text-white hover:text-secondary hover:bg-blue-900' }}">
                    Home
                </a>
                <a href="{{ url('/services') }}"
                    class="nav-link px-5 py-2 font-semibold rounded-lg transition duration-300
                    {{ request()->is('services') ? 'bg-blue-900 text-secondary' : 'text-white hover:text-secondary hover:bg-blue-900' }}">
                    Services
                </a>
                <a href="{{ url('/products') }}"
                    class="nav-link px-5 py-2 font-semibold rounded-lg transition duration-300
                    {{ request()->is('products') ? 'bg-blue-900 text-secondary' : 'text-white hover:text-secondary hover:bg-blue-900' }}">
                    Products
                </a>
                <a href="{{ url('/about') }}"
                    class="nav-link px-5 py-2 font-semibold rounded-lg transition duration-300
                    {{ request()->is('about') ? 'bg-blue-900 text-secondary' : 'text-white hover:text-secondary hover:bg-blue-900' }}">
                    About
                </a>
                <div class="pl-4">
                    <a href="{{ url('/contact') }}"
                        class="nav-link px-6 py-2 rounded-full font-bold transition shadow-lg transform hover:scale-105
                        {{ request()->is('contact') ? 'underline underline-offset-4 bg-secondary' : 'bg-secondary text-primary hover:bg-yellow-400' }}">
                        Contact Us
                    </a>
                </div>
            </div>

            {{-- toggle button for smaller screens --}}
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-secondary hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">

                    <span id="menu-icon-open">
                        <i class="fas fa-bars text-2xl"></i>
                    </span>

                    <span id="menu-icon-close" class="hidden">
                        <i class="fas fa-times text-2xl"></i>
                    </span>

                </button>
            </div>

        </div>
    </div>

    {{-- navbar for smaller screens --}}
    <div id="mobile-menu" class="md:hidden max-h-0 overflow-hidden transition-all duration-300 ease-out bg-primary">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ url('/') }}"
                class="mobile-nav-link block px-3 py-2 rounded-md text-base font-medium w-full text-left
               {{ request()->is('/') ? 'bg-blue-900 text-secondary' : 'text-white hover:text-secondary hover:bg-blue-900' }}">
                Home
            </a>
            <a href="{{ url('/services') }}"
                class="mobile-nav-link block px-3 py-2 rounded-md text-base font-medium w-full text-left
               {{ request()->is('services') ? 'bg-blue-900 text-secondary' : 'text-white hover:text-secondary hover:bg-blue-900' }}">
                Services
            </a>
            <a href="{{ url('/products') }}"
                class="mobile-nav-link block px-3 py-2 rounded-md text-base font-medium w-full text-left
               {{ request()->is('products') ? 'bg-blue-900 text-secondary' : 'text-white hover:text-secondary hover:bg-blue-900' }}">
                Products
            </a>
            <a href="{{ url('/about') }}"
                class="mobile-nav-link block px-3 py-2 rounded-md text-base font-medium w-full text-left
               {{ request()->is('about') ? 'bg-blue-900 text-secondary' : 'text-white hover:text-secondary hover:bg-blue-900' }}">
                About
            </a>
            <a href="{{ url('/contact') }}"
                class="mobile-nav-link block px-3 py-2 rounded-md text-base font-medium w-full text-left
               {{ request()->is('contact') ? 'bg-blue-900 text-secondary' : 'text-white hover:text-secondary hover:bg-blue-900' }}">
                Contact Us
            </a>
        </div>
    </div>
</nav>