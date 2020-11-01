<?php

namespace App\Providers;

use App\Services\LinkGenerator\LinkGenerator;
use App\Services\LinkGeneratorInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LinkGeneratorInterface::class, function() {
            return new LinkGenerator(config('generator.url_tail_length'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
