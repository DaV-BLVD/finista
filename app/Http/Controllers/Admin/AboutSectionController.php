<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AboutSection;

class AboutSectionController extends Controller
{
    public function index()
    {
        // Get both About and Mission sections
        $sections = AboutSection::all();
        return view('admin.about_section.index', compact('sections'));
    }

    public function edit(AboutSection $about_section)
    {
        // Route model binding allows us to edit a specific section
        return view('admin.about_section.edit', compact('about_section'));
    }

    public function update(Request $request, AboutSection $about_section)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $about_section->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('about_section.index')->with('success', 'Section updated successfully!');
    }
}
