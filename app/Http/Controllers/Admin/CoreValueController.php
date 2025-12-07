<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    public function index()
    {
        $values = CoreValue::orderBy('id', 'asc')->get();
        return view('admin.core-values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.core-values.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'border_color' => 'required|string',
            'icon_color' => 'required|string',
        ]);

        CoreValue::create($request->all());

        return redirect()->route('core_values.index')->with('success', 'Core Value created successfully!');
    }

    public function edit(CoreValue $coreValue)
    {
        return view('admin.core-values.edit', compact('coreValue'));
    }

    public function update(Request $request, CoreValue $coreValue)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'border_color' => 'required|string',
            'icon_color' => 'required|string',
        ]);

        $coreValue->update($request->all());

        return redirect()->route('core_values.index')->with('success', 'Core Value updated successfully!');
    }

    public function destroy(CoreValue $coreValue)
    {
        $coreValue->delete();

        return redirect()->route('core_values.index')->with('success', 'Core Value deleted successfully!');
    }
}
