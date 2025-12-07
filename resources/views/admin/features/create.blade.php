@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold text-primary mb-6">{{ isset($feature) ? 'Edit Feature' : 'Add Feature' }}</h1>

        {{-- Display Errors --}}
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded shadow">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($feature) ? route('features.update', $feature) : route('features.store') }}" method="POST"
            enctype="multipart/form-data" id="featureForm">
            @csrf
            @if(isset($feature)) @method('PUT') @endif

            {{-- Category --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Category</label>
                <input type="text" name="category" value="{{ old('category', $feature->category ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            {{-- Title --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title', $feature->title ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            {{-- Highlighted Title / Subtitle --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Highlighted Title</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $feature->subtitle ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description"
                    class="w-full border rounded px-3 py-2">{{ old('description', $feature->description ?? '') }}</textarea>
            </div>

            {{-- Image --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Image</label>
                <input type="file" name="image" class="w-full border rounded px-3 py-2">
                @if(isset($feature) && $feature->image)
                    <img src="{{ asset('storage/' . $feature->image) }}" class="h-24 mt-2 rounded shadow">
                @endif
            </div>

            <hr class="my-6 border-gray-300">

            {{-- Feature Cards --}}
            <h2 class="text-xl font-bold mb-4">Feature Cards</h2>
            <div id="cardsContainer">
                @if(isset($feature) && $feature->cards)
                    @foreach($feature->cards as $cardIndex => $card)
                        <div class="card mb-4 p-4 border rounded shadow relative" data-index="{{ $cardIndex }}">
                            <button type="button" class="absolute top-2 right-2 text-red-500 font-bold"
                                onclick="removeCard(this)">✕</button>

                            {{-- Card Title --}}
                            <div class="mb-2">
                                <label class="font-medium">Card Title</label>
                                <input type="text" name="cards[{{ $cardIndex }}][title]" value="{{ $card->title }}"
                                    class="w-full border rounded px-3 py-2">
                            </div>

                            {{-- Card Description --}}
                            <div class="mb-2">
                                <label class="font-medium">Card Description</label>
                                <textarea name="cards[{{ $cardIndex }}][description]"
                                    class="w-full border rounded px-3 py-2">{{ $card->description }}</textarea>
                            </div>

                            {{-- Bullets --}}
                            <div class="bulletsContainer mb-2">
                                <label class="font-medium">Bullets</label>
                                @foreach($card->bullets as $bulletIndex => $bullet)
                                    <div class="flex items-center mb-1">
                                        <input type="text" name="cards[{{ $cardIndex }}][bullets][{{ $bulletIndex }}]"
                                            value="{{ $bullet->bullet }}" class="w-full border rounded px-3 py-2 mr-2">
                                        <button type="button" class="text-red-500 font-bold" onclick="removeBullet(this)">✕</button>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" class="mb-2 px-3 py-1 bg-green-500 text-white rounded shadow"
                                onclick="addBullet(this)">Add Bullet</button>
                        </div>
                    @endforeach
                @endif
            </div>

            <button type="button" class="mb-6 px-4 py-2 bg-primary text-white rounded shadow" onclick="addCard()">Add Card</button>

            <div class="flex space-x-3">
                <button type="submit"
                    class="px-4 py-2 bg-secondary text-primary rounded font-semibold shadow hover:bg-yellow-400">
                    {{ isset($feature) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('features.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancel</a>
            </div>
        </form>
    </div>

    {{-- Scripts --}}
    <script>
        let cardIndex = {{ isset($feature) ? $feature->cards->count() : 0 }};

        function addCard() {
            const container = document.getElementById('cardsContainer');
            const cardHTML = `
                    <div class="card mb-4 p-4 border rounded shadow relative" data-index="${cardIndex}">
                        <button type="button" class="absolute top-2 right-2 text-red-500 font-bold" onclick="removeCard(this)">✕</button>
                        <div class="mb-2">
                            <label class="font-medium">Card Title</label>
                            <input type="text" name="cards[${cardIndex}][title]" class="w-full border rounded px-3 py-2">
                        </div>
                        <div class="mb-2">
                            <label class="font-medium">Card Description</label>
                            <textarea name="cards[${cardIndex}][description]" class="w-full border rounded px-3 py-2"></textarea>
                        </div>
                        <div class="bulletsContainer mb-2">
                            <label class="font-medium">Bullets</label>
                        </div>
                        <button type="button" class="mb-2 px-3 py-1 bg-green-500 text-white rounded shadow" onclick="addBullet(this)">Add Bullet</button>
                    </div>`;
            container.insertAdjacentHTML('beforeend', cardHTML);
            cardIndex++;
        }

        function removeCard(btn) {
            btn.closest('.card').remove();
        }

        function addBullet(btn) {
            const card = btn.closest('.card');
            const bulletsContainer = card.querySelector('.bulletsContainer');
            const bulletCount = bulletsContainer.querySelectorAll('input').length;
            const cardIdx = card.dataset.index;

            const bulletHTML = `
                    <div class="flex items-center mb-1">
                        <input type="text" name="cards[${cardIdx}][bullets][${bulletCount}]" class="w-full border rounded px-3 py-2 mr-2">
                        <button type="button" class="text-red-500 font-bold" onclick="removeBullet(this)">✕</button>
                    </div>`;
            bulletsContainer.insertAdjacentHTML('beforeend', bulletHTML);
        }

        function removeBullet(btn) {
            btn.closest('div').remove();
        }
    </script>
@endsection