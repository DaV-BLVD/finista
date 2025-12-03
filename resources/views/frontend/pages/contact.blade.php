@extends('frontend.layouts.app')

@section('content')
    <div id="contact" class="page-section active">
            <section class="relative bg-primary text-white py-20 md:py-24 overflow-hidden">
                <div class="absolute inset-0 bg-blue-900 opacity-50">
                </div>
                <div
                    class="absolute right-0 top-1/4 w-1/3 h-1/2 bg-secondary opacity-10 skew-y-12 transform translate-x-1/4">
                </div>

                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
                    <p class="text-lg text-secondary font-semibold uppercase tracking-widest mb-3">
                        Get in Touch
                    </p>
                    <h1 class="text-5xl md:text-6xl font-extrabold mb-4 leading-tight">
                        How Can We Help You?
                    </h1>
                    <p class="text-lg text-blue-100 max-w-2xl mx-auto">
                        Whether you have a complex inquiry or need technical support, our team is ready to assist you.
                        Connect with us through a method that suits you best.
                    </p>
                </div>
            </section>

            <section class="bg-white py-16">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-primary">Contact Channels</h2>
                        <p class="text-gray-600">Reach out via phone, email, or visit our headquarters.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                        <div class="text-center p-6 bg-gray-50 rounded-lg">
                            <i class="fa-solid fa-phone text-secondary text-2xl mb-2"></i>
                            <h3 class="font-bold text-primary">Phone</h3>
                            <p class="text-gray-600">+1 (555) 123-4567</p>
                        </div>
                        <div class="text-center p-6 bg-gray-50 rounded-lg">
                            <i class="fa-solid fa-envelope text-secondary text-2xl mb-2"></i>
                            <h3 class="font-bold text-primary">Email</h3>
                            <p class="text-gray-600">support@finista.com</p>
                        </div>
                        <div class="text-center p-6 bg-gray-50 rounded-lg">
                            <i class="fa-solid fa-location-dot text-secondary text-2xl mb-2"></i>
                            <h3 class="font-bold text-primary">HQ</h3>
                            <p class="text-gray-600">123 Finance Way, NY</p>
                        </div>
                    </div>

                    <div
                        class="w-full h-64 bg-gray-200 rounded-xl mb-12 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gray-300 opacity-50"></div>
                        <i class="fa-solid fa-map-location-dot text-6xl text-gray-400 z-10"></i>
                        <p class="absolute bottom-4 left-4 bg-white px-4 py-2 rounded shadow text-sm font-bold">Find us
                            on Google Maps</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        <form class="bg-gray-50 p-8 rounded-xl shadow-inner border border-gray-200 h-fit"
                            onsubmit="event.preventDefault(); alert('Message Sent!');">
                            <h3 class="text-xl font-bold text-primary mb-6">Send a Message</h3>
                            <div class="mb-4">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Name</label>
                                <input type="text"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                                <input type="email"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Service Inquiry</label>
                                <select
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition">
                                    <option>General Inquiry</option>
                                    <option>A/C Opening</option>
                                    <option>Utility Payment Issue</option>
                                    <option>Loan Information</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Message</label>
                                <textarea rows="3"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full bg-primary text-white font-bold py-3 rounded-lg hover:bg-blue-900 transition">Send
                                Message</button>
                        </form>

                        <div>
                            <h3 class="text-xl font-bold text-primary mb-6">Frequently Asked Questions</h3>
                            <div class="space-y-4">
                                <details class="group bg-gray-50 p-4 rounded-lg cursor-pointer">
                                    <summary class="flex justify-between items-center font-medium text-gray-900">
                                        <span>How do I open a new account?</span>
                                        <span class="transition group-open:rotate-180">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </span>
                                    </summary>
                                    <p class="text-gray-600 mt-4 text-sm">
                                        You can open an account by visiting any of our branches with a valid ID and
                                        proof of address, or by using the 'A/C Opening' service on this website.
                                    </p>
                                </details>
                                <details class="group bg-gray-50 p-4 rounded-lg cursor-pointer">
                                    <summary class="flex justify-between items-center font-medium text-gray-900">
                                        <span>What are the fees for withdrawals?</span>
                                        <span class="transition group-open:rotate-180">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </span>
                                    </summary>
                                    <p class="text-gray-600 mt-4 text-sm">
                                        Withdrawals from Finista ATMs are free for account holders. Withdrawals from
                                        other network ATMs may incur a small fee of $2.
                                    </p>
                                </details>
                                <details class="group bg-gray-50 p-4 rounded-lg cursor-pointer">
                                    <summary class="flex justify-between items-center font-medium text-gray-900">
                                        <span>How secure is the digital voucher system?</span>
                                        <span class="transition group-open:rotate-180">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </span>
                                    </summary>
                                    <p class="text-gray-600 mt-4 text-sm">
                                        Our digital vouchers are encrypted with 256-bit SSL technology. Each voucher has
                                        a unique one-time-use code for maximum security.
                                    </p>
                                </details>
                                <details class="group bg-gray-50 p-4 rounded-lg cursor-pointer">
                                    <summary class="flex justify-between items-center font-medium text-gray-900">
                                        <span>Can I pay international utility bills?</span>
                                        <span class="transition group-open:rotate-180">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </span>
                                    </summary>
                                    <p class="text-gray-600 mt-4 text-sm">
                                        Currently, we support utility payments for domestic providers only.
                                        International payments are coming soon.
                                    </p>
                                </details>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection