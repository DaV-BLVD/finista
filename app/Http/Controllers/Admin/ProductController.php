<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductFeature;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('features')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'color' => 'required|in:primary,secondary',
            'layout' => 'required|in:image-left,text-left',
            'image' => 'nullable|image|max:2048',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $product = Product::create($data);

        if (!empty($data['features'])) {
            foreach ($data['features'] as $feature) {
                ProductFeature::create([
                    'product_id' => $product->id,
                    'feature' => $feature
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $product->load('features');
        return view('admin.products.create', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'color' => 'required|in:primary,secondary',
            'layout' => 'required|in:image-left,text-left',
            'image' => 'nullable|image|max:2048',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image)
                Storage::disk('public')->delete($product->image);

            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($data);

        // Sync features
        $product->features()->delete();
        if (!empty($data['features'])) {
            foreach ($data['features'] as $feature) {
                ProductFeature::create([
                    'product_id' => $product->id,
                    'feature' => $feature
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image)
            Storage::disk('public')->delete($product->image);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
