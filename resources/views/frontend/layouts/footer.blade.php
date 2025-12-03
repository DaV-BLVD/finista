<footer class="bg-primary text-white py-7 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start">
            <div class="mb-8 md:mb-0 w-full md:w-1/4">
                <div class="flex items-center gap-2 mb-2">
                    <img src="logo.png" alt="Finista Logo" class="w-10 pr-1">
                    <span class="font-bold text-2xl">Finista</span>
                </div>
                <p class="text-blue-200 text-sm">Your trusted partner in financial growth.</p>
            </div>

            <div
                class="flex flex-col sm:flex-row gap-8 md:gap-12 lg:gap-16 mb-8 md:mb-0 w-full md:w-auto justify-between">

                <div>
                    <h4 class="font-semibold text-white mb-3">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-blue-200 hover:text-secondary transition text-sm">About Us</a>
                        </li>
                        <li><a href="#" class="text-blue-200 hover:text-secondary transition text-sm">Careers</a>
                        </li>
                        <li><a href="#" class="text-blue-200 hover:text-secondary transition text-sm">Press</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-secondary transition text-sm">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-white mb-3">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-blue-200 hover:text-secondary transition text-sm">Investments</a>
                        </li>
                        <li><a href="#" class="text-blue-200 hover:text-secondary transition text-sm">Wealth
                                Planning</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-secondary transition text-sm">Financial
                                Tools</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-secondary transition text-sm">Client
                                Portal</a></li>
                    </ul>
                </div>

                <!-- Dynamic Contact Us -->
                <div>
                    <h4 class="font-semibold text-white mb-3">Contact Us</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="text-blue-200">
                            <i class="fa-solid fa-envelope w-4"></i>
                            {{ $footerContacts?->gmail ?? 'info@finista.com' }}
                        </li>
                        <li class="text-blue-200">
                            <i class="fa-solid fa-phone w-4"></i>
                            {{ $footerContacts?->phone_no ?? '(555) 123-4567' }}
                        </li>
                        <li class="text-blue-200">
                            <i class="fa-solid fa-location-dot w-4"></i>
                            {{ $footerContacts?->address ?? '123 Finance St, City' }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex gap-6 mt-6 md:mt-0">
                <a href="#" class="text-blue-200 hover:text-secondary transition"><i
                        class="fa-brands fa-facebook text-xl"></i></a>
                <a href="#" class="text-blue-200 hover:text-secondary transition"><i
                        class="fa-brands fa-twitter text-xl"></i></a>
                <a href="#" class="text-blue-200 hover:text-secondary transition"><i
                        class="fa-brands fa-instagram text-xl"></i></a>
                <a href="#" class="text-blue-200 hover:text-secondary transition"><i
                        class="fa-brands fa-linkedin text-xl"></i></a>
            </div>
        </div>

        <div class="border-t border-blue-800 mt-4 pt-2 text-sm text-blue-300">
            &copy; 2023 Finista Financial Services. All rights reserved.
        </div>
    </div>
</footer>