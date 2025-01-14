<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\TopbarBanner;
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
        // Fetch the active banner
        $banner = TopbarBanner::where('is_active', 1)->first();
        
        // Fetch the first 6 categories
        $allCategories = Category::limit(6)->get();
        
        // Share both the banner and categories with all views
        view()->share('banner', $banner);
        view()->share('allCategories', $allCategories);
    }
    
    
}
