@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-full mx-auto">

        {{-- Dashboard Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight flex items-center">
                    <i class="fas fa-th-large mr-3 text-secondary"></i>
                    Dashboard Overview
                </h1>
                <p class="text-gray-500 mt-1 ml-1">Manage your website content and analytics.</p>
            </div>

            {{-- Optional Date or Action --}}
            <div class="hidden sm:block text-sm text-gray-400 font-medium">
                {{ now()->format('l, F j, Y') }}
            </div>
        </div>

        {{-- Content Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">

            {{-- Row 1: Core Management --}}
            <x-admin.card title="Users" :count="$usersCount" icon="fas fa-users" color="primary" />
            <x-admin.card title="Headers" :count="$headersCount" icon="fas fa-heading" color="secondary" />
            <x-admin.card title="Partners" :count="$partnersCount" icon="fas fa-handshake" color="blue" />
            <x-admin.card title="Products" :count="$productsCount" icon="fas fa-box-open" color="primary" />

            {{-- Row 2: Content & Marketing --}}
            <x-admin.card title="Highlighted Products" :count="$highlightedProductsCount" icon="fas fa-star"
                color="secondary" />
            <x-admin.card title="More Products" :count="$moreProductsCount" icon="fas fa-boxes" color="blue" />
            <x-admin.card title="Solutions" :count="$solutionsCount" icon="fas fa-lightbulb" color="primary" />
            <x-admin.card title="Features" :count="$featuresCount" icon="fas fa-list-ul" color="secondary" />

            {{-- Row 3: Engagement --}}
            <x-admin.card title="Testimonials" :count="$testimonialsCount" icon="fas fa-comment-dots" color="green" />
            <x-admin.card title="News" :count="$newsCount" icon="fas fa-newspaper" color="primary" />
            <x-admin.card title="Inquiries" :count="$inquiriesCount" icon="fas fa-envelope" color="red" />
            <x-admin.card title="FAQs" :count="$faqsCount" icon="fas fa-question-circle" color="secondary" />

            {{-- Row 4: Company Info --}}
            <x-admin.card title="Why Finista" :count="$whyFinistaCount" icon="fas fa-info" color="blue" />
            <x-admin.card title="Core Values" :count="$coreValuesCount" icon="fas fa-heart" color="red" />
            <x-admin.card title="Journey" :count="$journeysCount" icon="fas fa-road" color="secondary" />
            <x-admin.card title="Leadership" :count="$leadershipCount" icon="fas fa-user-tie" color="primary" />

            {{-- Row 5: Utility & Footer --}}
            <x-admin.card title="Steps" :count="$stepsCount" icon="fas fa-shoe-prints" color="secondary" />
            <x-admin.card title="Stats" :count="$statsCount" icon="fas fa-chart-line" color="green" />
            <x-admin.card title="Map Locations" :count="$mapLocationsCount" icon="fas fa-map-marked-alt" color="blue" />
            <x-admin.card title="Footer Contacts" :count="$footerContactsCount" icon="fas fa-address-book"
                color="primary" />

        </div>
    </div>
@endsection