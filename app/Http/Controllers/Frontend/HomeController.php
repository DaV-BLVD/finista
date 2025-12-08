<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Stat;
use App\Models\Partner;
use App\Models\WhyFinista;
use App\Models\HighlightedProduct;
use App\Models\CoreValue;
use App\Models\Solution;
use App\Models\NewsPost;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all stats from the database
        $stats = Stat::orderBy('id')->get();

        // Fetch all partners ordered by ID (or you can use sort_order if you add that)
        $partners = Partner::orderBy('id')->get();

        $features = WhyFinista::orderBy('id')->get(); // for the features section

        $testimonials = Testimonial::orderBy('id')->get();

        $solutions = Solution::all();

        $highlightedProduct = HighlightedProduct::orderBy('order_index')->first(); // Only first product

        $news = NewsPost::orderBy('order_index')->get();

        // Pass to the view
        return view("frontend.pages.home", compact('stats', 'partners', 'features', 'testimonials', 'solutions', 'highlightedProduct', 'news'));
    }
}