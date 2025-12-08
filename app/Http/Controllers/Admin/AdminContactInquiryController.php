<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInquiry;

class AdminContactInquiryController extends Controller
{
    // List all inquiries
    public function index()
    {
        $inquiries = ContactInquiry::latest()->paginate(10);
        return view('admin.contact_inquiries.index', compact('inquiries'));
    }

    // Show edit form
    public function edit(ContactInquiry $contactInquiry)
    {
        return view('admin.contact_inquiries.edit', compact('contactInquiry'));
    }

    // Update inquiry
    public function update(Request $request, ContactInquiry $contactInquiry)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $contactInquiry->update($request->only(['name', 'email', 'service', 'message']));

        return redirect()->route('contact_inquiries.index')->with('success', 'Inquiry updated successfully.');
    }

    // Delete inquiry
    public function destroy(ContactInquiry $contactInquiry)
    {
        $contactInquiry->delete();
        return redirect()->route('contact_inquiries.index')->with('success', 'Inquiry deleted successfully.');
    }

    // Mark as resolved
    public function markResolved(ContactInquiry $contactInquiry)
    {
        $contactInquiry->is_resolved = true;
        $contactInquiry->save();

        return redirect()->route('contact_inquiries.index')->with('success', 'Inquiry marked as resolved.');
    }

    public function undoResolved(ContactInquiry $contactInquiry)
    {
        $contactInquiry->is_resolved = false;
        $contactInquiry->save();

        return redirect()->route('contact_inquiries.index')->with('success', 'Inquiry marked as pending.');
    }
}
