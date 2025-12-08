<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Step;
use App\Models\Feature;
use App\Models\Header;

class ServicesController extends Controller
{
    public function index()
    {
        $steps = Step::orderBy('order')->get();

        $features = Feature::with('cards.bullets')->get();

        $header = Header::where('page', 'services')->first();

        return view("frontend.pages.services", compact('steps', 'features', 'header'));
    }
}
