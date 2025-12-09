<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Header;
use App\Models\Stat;
use App\Models\Partner;
use App\Models\WhyFinista;
use App\Models\HighlightedProduct;
use App\Models\Solution;
use App\Models\Testimonial;
use App\Models\NewsPost;
use App\Models\Step;
use App\Models\Feature;
use App\Models\Product;
use App\Models\MoreProduct;
use App\Models\CoreValue;
use App\Models\Journey;
use App\Models\LeadershipTeam;
use App\Models\MapLocation;
use App\Models\ContactInquiry;
use App\Models\Faq;
use App\Models\FooterContacts;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'usersCount' => User::count(),
            'headersCount' => Header::count(),
            'statsCount' => Stat::count(),
            'partnersCount' => Partner::count(),
            'whyFinistaCount' => WhyFinista::count(),
            'highlightedProductsCount' => HighlightedProduct::count(),
            'solutionsCount' => Solution::count(),
            'testimonialsCount' => Testimonial::count(),
            'newsCount' => NewsPost::count(),
            'stepsCount' => Step::count(),
            'featuresCount' => Feature::count(),
            'productsCount' => Product::count(),
            'moreProductsCount' => MoreProduct::count(),
            'coreValuesCount' => CoreValue::count(),
            'journeysCount' => Journey::count(),
            'leadershipCount' => LeadershipTeam::count(),
            'mapLocationsCount' => MapLocation::count(),
            'inquiriesCount' => ContactInquiry::count(),
            'faqsCount' => Faq::count(),
            'footerContactsCount' => FooterContacts::count(),
        ]);
    }
}
