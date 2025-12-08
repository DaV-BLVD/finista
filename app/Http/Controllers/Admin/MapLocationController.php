<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MapLocation;

class MapLocationController extends Controller
{
    public function index()
    {
        $locations = MapLocation::orderBy('sort_order')->get();
        return view('admin.mapLocations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.mapLocations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'sort_order' => 'nullable|integer'
        ]);

        MapLocation::create($request->all());

        return redirect()->route('map_locations.index')
            ->with('success', 'Map location created successfully.');
    }

    public function edit(MapLocation $map_location)
    {
        return view('admin.mapLocations.create', compact('map_location'));
    }

    public function update(Request $request, MapLocation $map_location)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'sort_order' => 'nullable|integer'
        ]);

        $map_location->update($request->all());

        return redirect()->route('map_locations.index')
            ->with('success', 'Map location updated successfully.');
    }

    public function destroy(MapLocation $map_location)
    {
        $map_location->delete();

        return redirect()->route('map_locations.index')
            ->with('success', 'Map location deleted successfully.');
    }
}
