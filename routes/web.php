<?php

use App\Models\HighlightedProduct;
use Illuminate\Support\Facades\Route;

// frontend
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/dashboard/header_images', [HeaderImagesController::class, 'index'])->name('admin.dashboard.headerImages');

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

});

require __DIR__ . '/auth.php';
