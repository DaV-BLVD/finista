<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeadershipTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeadershipTeamController extends Controller
{
    public function index()
    {
        $leaders = LeadershipTeam::latest()->get();
        return view('admin.leadership.index', compact('leaders'));
    }

    public function create()
    {
        return view('admin.leadership.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('leaders', 'public');
        }

        LeadershipTeam::create($validated);

        return redirect()->route('leadership.index')->with('success', 'Leader Added Successfully!');
    }

    public function edit(LeadershipTeam $leadership)
    {
        return view('admin.leadership.create', compact('leadership'));
    }


    public function update(Request $request, LeadershipTeam $leadership)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($leadership->image) {
                Storage::disk('public')->delete($leadership->image);
            }
            $validated['image'] = $request->file('image')->store('leaders', 'public');
        }

        $leadership->update($validated);

        return redirect()->route('leadership.index')->with('success', 'Leader Updated Successfully!');
    }

    public function destroy(LeadershipTeam $leadership)
    {
        if ($leadership->image) {
            Storage::disk('public')->delete($leadership->image);
        }

        $leadership->delete();

        return redirect()->route('leadership.index')->with('success', 'Leader Deleted Successfully!');
    }
}
