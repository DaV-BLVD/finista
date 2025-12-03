<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FooterContacts;
use Illuminate\Http\Request;

class FooterContactsController extends Controller
{
    public function index()
    {
        $footerContacts = FooterContacts::first(); // fetch the only contact
        return view('frontend.pages.home', compact('footerContacts'));
    }
}
