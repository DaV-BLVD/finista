<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    /**
     * Display a listing of the headers.
     */
    public function index()
    {
        $headers = Header::all();
        return view('admin.headers.index', compact('headers'));
    }

    /**
     * Show the form for creating a new header.
     */
    public function create()
    {
        return view('admin.headers.create'); // same Blade used for create/edit
    }

    /**
     * Store a newly created header in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button1_text' => 'nullable|string|max:255',
            'button1_link' => 'nullable|string|max:255',
            'button2_text' => 'nullable|string|max:255',
            'button2_link' => 'nullable|string|max:255',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('headers', 'public');
        }

        Header::create($data);

        return redirect()->route('headers.index')->with('success', 'Header created successfully!');
    }

    /**
     * Show the form for editing the specified header.
     */
    public function edit(Header $header)
    {
        return view('admin.headers.create', compact('header')); // same Blade used for create/edit
    }

    /**
     * Update the specified header in storage.
     */
    public function update(Request $request, Header $header)
    {
        $data = $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button1_text' => 'nullable|string|max:255',
            'button1_link' => 'nullable|string|max:255',
            'button2_text' => 'nullable|string|max:255',
            'button2_link' => 'nullable|string|max:255',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            if ($header->image) {
                Storage::disk('public')->delete($header->image);
            }
            $data['image'] = $request->file('image')->store('headers', 'public');
        }

        $header->update($data);

        return redirect()->route('headers.index')->with('success', 'Header updated successfully!');
    }

    /**
     * Remove the specified header from storage.
     */
    public function destroy(Header $header)
    {
        if ($header->image) {
            Storage::disk('public')->delete($header->image);
        }

        $header->delete();

        return redirect()->route('headers.index')->with('success', 'Header deleted successfully!');
    }
}
