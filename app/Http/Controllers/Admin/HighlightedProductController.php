<?php

// app/Http/Controllers/Admin/HighlightedProductController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HighlightedProduct;
use Illuminate\Support\Facades\Storage;

class HighlightedProductController extends Controller
{
    public function index()
    {
        $products = HighlightedProduct::all();
        $canAdd = $products->count() === 0; // Only allow adding if none exists

        return view('admin.highlighted_product.index', compact('products', 'canAdd'));
    }

    public function create()
    {
        return view('admin.highlighted_product.create'); // no $product for create
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'image' => 'nullable|image',
            'order_index' => 'nullable|integer',
        ]);

        // Set default order_index to 0 if not provided
        $data['order_index'] = $data['order_index'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('highlighted_products', 'public');
        }

        HighlightedProduct::create($data);

        return redirect()->route('highlighted_products.index')->with('success', 'Product created successfully!');
    }


    public function edit(HighlightedProduct $highlightedProduct)
    {
        $product = $highlightedProduct; // send $product to blade
        return view('admin.highlighted_product.create', compact('product'));
    }

    public function update(Request $request, HighlightedProduct $highlightedProduct)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'image' => 'nullable|image',
            'order_index' => 'nullable|integer',
        ]);

        // Set default order_index to 0 if not provided
        $data['order_index'] = $data['order_index'] ?? 0;

        if ($request->hasFile('image')) {
            // delete old image
            if ($highlightedProduct->image) {
                Storage::disk('public')->delete($highlightedProduct->image);
            }
            $data['image'] = $request->file('image')->store('highlighted_products', 'public');
        }

        $highlightedProduct->update($data);

        return redirect()->route('highlighted_products.index')->with('success', 'Product updated successfully!');
    }


    public function destroy(HighlightedProduct $highlightedProduct)
    {
        if ($highlightedProduct->image) {
            Storage::disk('public')->delete($highlightedProduct->image);
        }
        $highlightedProduct->delete();
        return redirect()->route('highlighted_products.index')->with('success', 'Product deleted successfully!');
    }
}
