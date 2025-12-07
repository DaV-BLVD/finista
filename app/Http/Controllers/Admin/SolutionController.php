<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::orderBy('id')->get();
        return view('admin.solutions.index', compact('solutions'));
    }

    public function create()
    {
        return view('admin.solutions.create'); // create and edit in same file
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'color' => 'required|in:primary,secondary',
            'description' => 'required|string',
        ]);

        Solution::create($request->only('title', 'icon', 'color', 'description'));

        return redirect()->route('solutions.index')->with('success', 'Solution added successfully!');
    }

    public function edit(Solution $solution)
    {
        return view('admin.solutions.create', compact('solution'));
    }

    public function update(Request $request, Solution $solution)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'color' => 'required|in:primary,secondary',
            'description' => 'required|string',
        ]);

        $solution->update($request->only('title', 'icon', 'color', 'description'));

        return redirect()->route('solutions.index')->with('success', 'Solution updated successfully!');
    }

    public function destroy(Solution $solution)
    {
        $solution->delete();
        return redirect()->route('solutions.index')->with('success', 'Solution deleted successfully!');
    }
}

