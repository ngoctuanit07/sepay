<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // public function boot()
    public function boot()
    {
        Paginator::useBootstrap();
        \Illuminate\Support\Facades\Event::listen(
            \SePay\SePay\Events\SePayWebhookEvent::class,
            \App\Listeners\SePayWebhookListener::class,
        );
        //If env is production, then disable debug mode
        if (config('app.env') === 'production') {
            config(['app.debug' => false]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
