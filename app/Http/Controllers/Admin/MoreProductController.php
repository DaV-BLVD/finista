<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MoreProductController extends Controller
{
    // Index page
    public function index()
    {
        $moreProducts = MoreProduct::orderBy('order_index')->get();
        return view('admin.moreProducts.index', compact('moreProducts'));
    }

    // Create form
    public function create()
    {
        return view('admin.moreProducts.create');
    }

    // Store new item
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:large,regular,cta',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'color' => 'required|in:primary,secondary',
            'column_span' => 'nullable|integer|min:1|max:2',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'order_index' => 'nullable|integer|min:0',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('more_products', 'public');
        }

        MoreProduct::create($data);

        return redirect()->route('more_products.index')
            ->with('success', 'Product item created successfully.');
    }

    // Edit form
    public function edit(MoreProduct $more_product)
    {
        return view('admin.moreProducts.create', ['item' => $more_product]);
    }

    // Update existing item
    public function update(Request $request, MoreProduct $more_product)
    {
        $data = $request->validate([
            'type' => 'required|in:large,regular,cta',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'color' => 'required|in:primary,secondary',
            'column_span' => 'nullable|integer|min:1|max:2',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'order_index' => 'nullable|integer|min:0',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($more_product->image) {
                Storage::disk('public')->delete($more_product->image);
            }
            $data['image'] = $request->file('image')->store('more_products', 'public');
        }

        $more_product->update($data);

        return redirect()->route('more_products.index')
            ->with('success', 'Product item updated successfully.');
    }

    // Delete item
    public function destroy(MoreProduct $more_product)
    {
        if ($more_product->image) {
            Storage::disk('public')->delete($more_product->image);
        }

        $more_product->delete();

        return redirect()->route('more_products.index')
            ->with('success', 'Product item deleted successfully.');
    }
}

