<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        Carbon::setLocale('id'); // Atur Carbon ke Bahasa Indonesia
        setlocale(LC_TIME, 'id_ID.UTF-8'); // Pastikan locale sistem juga diatur ke ID
    }
}
