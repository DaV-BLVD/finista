<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('id')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'type' => 'required|in:brand,feature',
        ]);

        Partner::create($validated);

        return redirect()->route('partners.index')
            ->with('success', 'Partner added successfully.');
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.create', compact('partner')); // reuse create Blade
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $validated = $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'type' => 'required|in:brand,feature',
        ]);

        $partner->update($validated);

        return redirect()->route('partners.index')
            ->with('success', 'Partner updated successfully.');
    }

    public function destroy($id)
    {
        Partner::destroy($id);
        return redirect()->route('partners.index')
            ->with('success', 'Partner deleted successfully.');
    }
}
