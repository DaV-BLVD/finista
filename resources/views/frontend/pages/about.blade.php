@extends('frontend.layouts.app')

@section('content')
    <div id="about" class="page-section active">
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
                                <i class="fas fa-handshake mr-2 text-sm"></i> {{ $header->badge_text }}
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
                                        <img src="{{ asset('storage/' . $header->image) }}" class="w-full h-96 object-cover">
                                        <div class="absolute inset-0 bg-black/10 pointer-events-none rounded-2xl"></div>
                                    </div>

                                    <div
                                        class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 w-96 h-6 bg-black/20 rounded-full blur-xl opacity-50 group-hover:scale-x-110 group-hover:-translate-y-1 transition duration-500">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div
                                class="relative bg-white/20 rounded-2xl p-1 shadow-2xl transform hover:scale-105 transition duration-500">
                                <div class="bg-primary rounded-xl overflow-hidden h-96 flex items-center justify-center">
                                    <i class="fa-solid fa-building-columns text-9xl text-white opacity-60"></i>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-100 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row gap-12 items-center mb-20">

                    {{-- About Section --}}
                    <div class="md:w-1/2">
                        <div class="bg-primary p-12 rounded-2xl text-white relative overflow-hidden">
                            <i class="fa-solid fa-quote-left text-6xl text-secondary opacity-20 absolute top-4 left-4"></i>
                            <h2 class="text-3xl font-bold mb-6 relative z-10">
                                {{ $about->title ?? 'About Finista' }}
                            </h2>
                            <p class="text-lg leading-relaxed relative z-10">
                                {{ $about->description ?? 'Finista was founded on the belief that banking should be accessible, transparent, and empowering. We combine traditional banking values with modern technology to serve our community.' }}
                            </p>
                        </div>
                    </div>

                    {{-- Mission Section --}}
                    <div class="md:w-1/2">
                        <h3 class="text-2xl font-bold text-primary mb-4">
                            {{ $mission->title ?? 'Our Mission' }}
                        </h3>
                        <p class="text-gray-600 mb-6">
                            {{ $mission->description ?? 'To provide secure, efficient, and innovative financial services that empower individuals and businesses to achieve their economic goals.' }}
                        </p>
                    </div>

                </div>



                {{-- Core Values --}}
                <section class="bg-white py-16">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-12">
                            <h2 class="text-3xl font-bold text-primary mb-4">Our Core Values</h2>
                            <p class="text-gray-600 max-w-2xl mx-auto">These principles guide our decisions and our
                                commitment to you every day.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                            @foreach ($coreValues as $value)
                                <div
                                    class="text-center p-6 border-b-4 {{ $value->border_color }} bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition">
                                    <i class="{{ $value->icon }} text-4xl {{ $value->icon_color }} mb-3"></i>
                                    <h3 class="font-bold text-xl text-primary mb-2">{{ $value->title }}</h3>
                                    <p class="text-gray-600 text-sm">{{ $value->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>


                <hr class="border-t border-gray-300" />

                <section class="bg-gray-100 py-20">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl font-bold text-primary mb-4">Our Journey</h2>
                            <p class="text-gray-600 max-w-2xl mx-auto">From a local institution to a digital banking leader.
                            </p>
                        </div>

                        <div class="relative max-w-4xl mx-auto">
                            <div class="absolute h-full w-1 bg-gray-300 left-4 md:left-1/2 transform md:-translate-x-1/2">
                            </div>

                            @foreach($journeys as $journey)
                                <div
                                    class="mb-8 flex justify-between items-center w-full {{ $loop->iteration % 2 == 0 ? 'flex-row-reverse' : '' }}">
                                    <div class="order-1 w-full md:w-5/12"></div>

                                    <div
                                        class="z-10 flex items-center order-1 {{ $journey->color == 'primary' ? 'bg-primary' : 'bg-secondary' }} shadow-xl w-8 h-8 rounded-full">
                                        <h1
                                            class="mx-auto font-semibold text-sm {{ $journey->color == 'primary' ? 'text-white' : 'text-primary' }}">
                                            {{ $journey->step }}
                                        </h1>
                                    </div>

                                    <div class="order-1 bg-white rounded-lg shadow-xl w-full md:w-5/12 px-6 py-4">
                                        <h3 class="text-lg font-bold text-primary">{{ $journey->title }}</h3>
                                        <p class="text-sm leading-snug tracking-wide text-gray-700 text-opacity-100">
                                            {{ $journey->description }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>


                <!-- Leadership Team -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-primary mb-4">Our Leadership</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Meet the experts driving Finista's vision forward.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse($leaders as $leader)
                        <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition text-center">
                            <div
                                class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-4 overflow-hidden flex items-center justify-center">
                                @if($leader->image)
                                    <img src="{{ asset('storage/' . $leader->image) }}" alt="{{ $leader->name }}"
                                        class="w-full h-full object-cover rounded-full">
                                @else
                                    <i class="fa-solid fa-user text-4xl text-gray-400"></i>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-primary">{{ $leader->name }}</h3>
                            <p class="text-secondary font-semibold text-sm mb-2">{{ $leader->position }}</p>
                            <p class="text-gray-500 text-sm">{{ $leader->description }}</p>
                        </div>
                    @empty
                        <p class="col-span-3 text-center text-gray-500">No leadership team members added yet.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection