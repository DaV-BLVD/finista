<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function index()
    {
        $journeys = Journey::orderBy('step')->get();
        return view('admin.journeys.index', compact('journeys'));
    }

    public function edit(Journey $journey)
    {
        return view('admin.journeys.edit', compact('journey'));
    }

    public function update(Request $request, Journey $journey)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|in:primary,secondary',
        ]);

        $journey->update($request->only('title', 'description', 'color'));

        return redirect()->route('journeys.index')->with('success', 'Journey step updated!');
    }

    public function destroy(Journey $journey)
    {
        $journey->delete();
        return redirect()->route('journeys.index')->with('success', 'Journey step deleted!');
    }

    // Display form to create a new journey step
    public function create()
    {
        return view('admin.journeys.create');
    }

    // Store new journey step
    public function store(Request $request)
    {
        $request->validate([
            'step' => 'required|integer|unique:journeys,step',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|in:primary,secondary',
        ]);

        Journey::create($request->only('step', 'title', 'description', 'color'));

        return redirect()->route('journeys.index')->with('success', 'Journey step created!');
    }
}
