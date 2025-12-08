<?php

use App\Models\HighlightedProduct;
use Illuminate\Support\Facades\Route;

// frontend
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ContactInquiryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactInquiryController::class, 'store'])->name('contact.store');


// frontend End



// backend

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HeaderImagesController;
use App\Http\Controllers\Admin\FooterContactsController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\WhyFinistaController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\CoreValueController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\JourneyController;
use App\Http\Controllers\Admin\LeadershipTeamController;
use App\Http\Controllers\Admin\SolutionController;
use App\Http\Controllers\Admin\StepController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MoreProductController;
use App\Http\Controllers\Admin\MapLocationController;
use App\Http\Controllers\Admin\AdminContactInquiryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HighlightedProductController;
use App\Http\Controllers\Admin\NewsPostController;
use App\Http\Controllers\Admin\HeaderController;


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/admin/dashboard/footer_contacts', FooterContactsController::class);

    Route::resource('/admin/dashboard/stats', StatController::class);

    Route::resource('/admin/dashboard/partners', PartnerController::class);

    Route::resource('/admin/dashboard/why_finista', WhyFinistaController::class);

    Route::resource('/admin/dashboard/testimonials', TestimonialController::class);

    Route::resource('/admin/dashboard/core_values', CoreValueController::class);

    Route::resource('/admin/dashboard/about_section', AboutSectionController::class)->only(['edit', 'update', 'index']);

    Route::resource('/admin/dashboard/journeys', JourneyController::class)->except(['show']);

    Route::resource('/admin/dashboard/leadership', LeadershipTeamController::class)->except(['show']);

    Route::resource('/admin/dashboard/solutions', SolutionController::class);

    Route::resource('/admin/dashboard/steps', StepController::class);

    Route::resource('admin/dashboard/features', FeatureController::class);

    Route::resource('/admin/dashboard/products', ProductController::class);

    Route::resource('/admin/dashboard/more_products', MoreProductController::class);

    Route::resource('/admin/dashboard/map_locations', MapLocationController::class);

    Route::resource('/admin/dashboard/contact_inquiries', AdminContactInquiryController::class);

    Route::put('/admin/dashboard/contact_inquiries/{contactInquiry}/resolve', [AdminContactInquiryController::class, 'markResolved'])
        ->name('contact_inquiries.markResolved');

    Route::put('/admin/dashboard/contact_inquiries/{contactInquiry}/undo', [AdminContactInquiryController::class, 'undoResolved'])
        ->name('contact_inquiries.undoResolved');

    Route::resource('/admin/dashboard/faqs', FaqController::class);

    Route::resource('/admin/dashboard/highlighted_products', HighlightedProductController::class);

    Route::resource('/admin/dashboard/news', NewsPostController::class);

    Route::resource('/admin/dashboard/headers', HeaderController::class);
});

require __DIR__ . '/auth.php';
