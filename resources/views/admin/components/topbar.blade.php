<header class="h-16 bg-white shadow flex items-center justify-between px-6 z-10">
    <div class="flex items-center gap-4">
        <button id="open-sidebar" class="md:hidden text-gray-600 focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>
        <div class="hidden md:flex items-center bg-gray-100 rounded-full px-4 py-2 w-64">
            <i class="fas fa-search text-gray-400 mr-2"></i>
            <input type="text" placeholder="Search..."
                class="bg-transparent border-none outline-none text-sm text-gray-600 w-full">
        </div>
    </div>

    <div class="flex items-center space-x-4">
        <div class="flex items-center gap-2">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                alt="User" class="h-8 w-8 rounded-full">
            <span class="hidden md:block font-medium text-gray-700 text-sm">
                {{ Auth::user()->name }}
            </span>
        </div>
    </div>
</header>