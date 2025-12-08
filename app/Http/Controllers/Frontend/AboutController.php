<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoreValue;
use App\Models\AboutSection;
use App\Models\Journey;
use App\Models\LeadershipTeam;
use App\Models\Header;

class AboutController extends Controller
{
    public function index()
    {
        $coreValues = CoreValue::all();

        $about = AboutSection::where('type', 'about')->first();
        $mission = AboutSection::where('type', 'mission')->first();

        $journeys = Journey::orderBy('step')->get();

        $leaders = LeadershipTeam::all(); // Or orderBy('id') if you want a specific order

        $header = Header::where('page', 'about')->first();

        return view("frontend.pages.about", compact('coreValues', 'about', 'mission', 'journeys', 'leaders', 'header'));

    }
}
