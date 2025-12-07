<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\FeatureCard;
use App\Models\FeatureCardBullet;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::with(['cards.bullets'])->orderBy('id', 'asc')->get();
        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Create Feature
        $data = $request->only(['category', 'title', 'subtitle', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('features', 'public');
        }

        $feature = Feature::create($data);

        // Save Cards
        if ($request->cards) {
            foreach ($request->cards as $index => $card) {
                $newCard = FeatureCard::create([
                    'feature_id' => $feature->id,
                    'title' => $card['title'] ?? '',
                    'description' => $card['description'] ?? '',
                    'order_index' => $index,
                ]);

                // Save Bullets
                if (isset($card['bullets'])) {
                    foreach ($card['bullets'] as $bIndex => $bullet) {
                        FeatureCardBullet::create([
                            'feature_card_id' => $newCard->id,
                            'bullet' => $bullet,
                            'order_index' => $bIndex,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('features.index')->with('success', 'Feature created successfully');
    }

    public function edit(Feature $feature)
    {
        $feature->load('cards.bullets');
        return view('admin.features.create', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        // Validate
        $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Update feature
        $data = $request->only(['category', 'title', 'subtitle', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('features', 'public');
        }

        $feature->update($data);

        // Delete existing cards + bullets
        foreach ($feature->cards as $card) {
            $card->bullets()->delete();
            $card->delete();
        }

        // Re-create cards & bullets
        if ($request->cards) {
            foreach ($request->cards as $index => $card) {
                $newCard = FeatureCard::create([
                    'feature_id' => $feature->id,
                    'title' => $card['title'] ?? '',
                    'description' => $card['description'] ?? '',
                    'order_index' => $index,
                ]);

                if (isset($card['bullets'])) {
                    foreach ($card['bullets'] as $bIndex => $bullet) {
                        FeatureCardBullet::create([
                            'feature_card_id' => $newCard->id,
                            'bullet' => $bullet,
                            'order_index' => $bIndex,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('features.index')->with('success', 'Feature updated successfully');
    }

    public function destroy(Feature $feature)
    {
        foreach ($feature->cards as $card) {
            $card->bullets()->delete();
            $card->delete();
        }

        $feature->delete();

        return redirect()->route('features.index')->with('success', 'Feature deleted successfully');
    }
}
