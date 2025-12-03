<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyFinista;
use Illuminate\Http\Request;

class WhyFinistaController extends Controller
{
    // List all features
    public function index()
    {
        $features = WhyFinista::orderBy('id')->get();
        return view('admin.whyFinista.index', compact('features'));
    }

    // Show create form
    public function create()
    {
        return view('admin.whyFinista.create');
    }

    // Store new feature
    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'border_color' => 'nullable|string',
        ]);

        WhyFinista::create($validated);

        return redirect()->route('why_finista.index')
            ->with('success', 'Feature added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $feature = WhyFinista::findOrFail($id);
        return view('admin.whyFinista.create', compact('feature'));
    }

    // Update existing feature
    public function update(Request $request, $id)
    {
        $feature = WhyFinista::findOrFail($id);

        $validated = $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'border_color' => 'nullable|string',
        ]);

        $feature->update($validated);

        return redirect()->route('why_finista.index')
            ->with('success', 'Feature updated successfully.');
    }

    // Delete a feature
    public function destroy($id)
    {
        $feature = WhyFinista::findOrFail($id);
        $feature->delete();

        return redirect()->route('why_finista.index')
            ->with('success', 'Feature deleted successfully.');
    }
}
