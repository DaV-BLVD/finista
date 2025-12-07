<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function index()
    {
        $steps = Step::orderBy('order')->get();
        return view('admin.steps.index', compact('steps'));
    }

    public function create()
    {
        return view('admin.steps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
            'color' => 'required|in:primary,secondary',
        ]);

        Step::create($request->all());

        return redirect()->route('steps.index')->with('success', 'Step created successfully!');
    }

    public function edit(Step $step)
    {
        return view('admin.steps.create', compact('step'));
    }

    public function update(Request $request, Step $step)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
            'color' => 'required|in:primary,secondary',
        ]);

        $step->update($request->all());

        return redirect()->route('steps.index')->with('success', 'Step updated successfully!');
    }

    public function destroy(Step $step)
    {
        $step->delete();
        return redirect()->route('steps.index')->with('success', 'Step deleted successfully!');
    }
}
