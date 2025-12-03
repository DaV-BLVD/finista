<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\FooterContacts;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.layouts.footer', function ($view) {
            $footerContacts = FooterContacts::first(); // fetch the only contact
            $view->with('footerContacts', $footerContacts);
        });
    }
}
