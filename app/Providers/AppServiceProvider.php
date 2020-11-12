<?php

namespace App\Providers;

use App\Services\HashGenerator\HashGenerator;
use App\Services\HashGeneratorInterface;
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
        $this->app->bind(LinkGeneratorInterface::class, function () {
            return new LinkGenerator($this->app->make(HashGeneratorInterface::class));
        });

        $this->app->bind(HashGeneratorInterface::class, function () {
            return new HashGenerator(config('generator.url_tail_length'));
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
