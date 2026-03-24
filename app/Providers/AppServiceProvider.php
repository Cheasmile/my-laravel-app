<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // បន្ថែមជួរនេះ

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // បន្ថែមជួរនេះ ដើម្បីបង្ខំឱ្យប្រើ HTTPS ពេលនៅលើ Render
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
