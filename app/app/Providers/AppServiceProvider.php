<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    public function boot(UrlGenerator $url): void
    {
        $url->forceScheme('https');
        $url->forceRootUrl(env('APP_URL'));
    }

    public function register(): void
    {
        //
    }
}
