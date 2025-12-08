<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterContacts;
use App\Models\MapLocation;
use App\Models\Feature;
use App\Models\Faq;
use App\Models\Header;

class ContactController extends Controller
{
    public function index()
    {

        $channels = FooterContacts::orderBy('sort_order')->get();

        $locations = MapLocation::orderBy('sort_order')->get();

        $features = Feature::orderBy('order_index')->get(); // fetch all features

        $faqs = Faq::orderBy('sort_order')->get();

        $header = Header::where('page', 'contact')->first();

        return view("frontend.pages.contact", compact("channels", 'locations', 'features', 'faqs','header'));
    }
}
