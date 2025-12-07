<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Step;
use App\Models\Feature;

class ServicesController extends Controller
{
    public function index()
    {
        $steps = Step::orderBy('order')->get();

        $features = Feature::with('cards.bullets')->get();

        return view("frontend.pages.services", compact('steps', 'features'));
    }
}
