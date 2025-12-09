@props(['title', 'count', 'icon' => 'fas fa-layer-group', 'color' => 'primary'])

{{-- Color Mapping Logic --}}
@php
    $themes = [
        'primary' => [
            'icon_bg' => 'bg-blue-50',
            'icon_text' => 'text-blue-600',
            'border' => 'bg-blue-500',
        ],
        'secondary' => [
            'icon_bg' => 'bg-yellow-50',
            'icon_text' => 'text-yellow-600',
            'border' => 'bg-yellow-500',
        ],
        'red' => [
            'icon_bg' => 'bg-red-50',
            'icon_text' => 'text-red-600',
            'border' => 'bg-red-500',
        ],
        'green' => [
            'icon_bg' => 'bg-green-50',
            'icon_text' => 'text-green-600',
            'border' => 'bg-green-500',
        ],
        'blue' => [ // Fallback for other blues
            'icon_bg' => 'bg-indigo-50',
            'icon_text' => 'text-indigo-600',
            'border' => 'bg-indigo-500',
        ]
    ];

    $theme = $themes[$color] ?? $themes['primary'];
@endphp

<div
    class="group relative bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

    {{-- Decorative Background Watermark (Big Faded Icon) --}}
    <div
        class="absolute -right-6 -top-6 text-gray-50 opacity-[0.05] group-hover:opacity-[0.1] transition-opacity duration-300 pointer-events-none transform rotate-12">
        <i class="{{ $icon }} text-9xl text-gray-800"></i>
    </div>

    <div class="relative z-10 flex justify-between items-start">
        <div class="flex flex-col">
            {{-- Title --}}
            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">{{ $title }}</span>

            {{-- Number Count --}}
            <span class="text-3xl font-black text-gray-800 tracking-tight">{{ $count }}</span>
        </div>

        {{-- Icon Box --}}
        <div
            class="h-12 w-12 rounded-xl flex items-center justify-center {{ $theme['icon_bg'] }} {{ $theme['icon_text'] }} shadow-sm transition-transform duration-300 group-hover:scale-110">
            <i class="{{ $icon }} text-xl"></i>
        </div>
    </div>


    {{-- Bottom Accent Bar --}}
    <div
        class="absolute bottom-0 left-0 w-full h-1 {{ $theme['border'] }} opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>
</div>