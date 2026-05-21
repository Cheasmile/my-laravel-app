<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; // 🎯 ត្រូវប្រាកដថាមានថែមជួរដេកមួយនេះ

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
        // 🎯 ដំណោះស្រាយសំខាន់៖ បង្ខំប្រវែង String ត្រឹម 191 ដើម្បីកុំឱ្យ MySQL 8.0 ផ្ទុះ Error
        Schema::defaultStringLength(191);
    }
}