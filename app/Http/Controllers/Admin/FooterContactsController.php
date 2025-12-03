<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContacts;
use Illuminate\Http\Request;

class FooterContactsController extends Controller
{
    // Show the single contact (or empty)
    public function index()
    {
        $footerContacts = FooterContacts::first(); // Only one
        return view('admin.footerContacts.index', compact('footerContacts'));
    }

    // Show create form (only if no contact exists)
    public function create()
    {
        if (FooterContacts::exists()) {
            return redirect()->route('footer_contacts.index')
                ->with('info', 'A contact already exists. You can edit it.');
        }

        return view('admin.footerContacts.create');
    }

    // Store new contact
    public function store(Request $request)
    {
        // Prevent creating more than one contact
        if (FooterContacts::exists()) {
            return redirect()->route('footer_contacts.index')
                ->with('info', 'Only one contact is allowed. Edit the existing one.');
        }

        // Validate input
        $validated = $request->validate([
            'gmail' => 'required|email',
            'phone_no' => 'required',
            'address' => 'required',
            'sort_order' => 'nullable|integer',
        ]);

        // Set a default sort_order if not provided
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        // Create the contact
        FooterContacts::create($validated);

        return redirect()->route('footer_contacts.index')
            ->with('success', 'Contact added successfully.');
    }


    // Show edit form
    public function edit($id)
    {
        $footerContacts = FooterContacts::findOrFail($id);
        return view('admin.footerContacts.edit', compact('footerContacts'));
    }

    // Update existing contact
    public function update(Request $request, $id)
    {
        $footerContact = FooterContacts::findOrFail($id);

        $validated = $request->validate([
            'gmail' => 'required|email',
            'phone_no' => 'required',
            'address' => 'required',
            'sort_order' => 'nullable|integer', // make it nullable
        ]);

        // If sort_order is not provided, keep existing
        $validated['sort_order'] = $validated['sort_order'] ?? $footerContact->sort_order;

        $footerContact->update($validated);

        return redirect()->route('footer_contacts.index')
            ->with('success', 'Contact updated successfully.');
    }


    // Delete contact
    public function destroy($id)
    {
        FooterContacts::destroy($id);

        return redirect()->route('footer_contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
