<?php declare(strict_types=1);

namespace Infrastructure\Link\Provider;

use Illuminate\Support\ServiceProvider;
use Infrastructure\Link\Service\HashGenerator;
use Infrastructure\Link\Service\LinkGenerator;
use Linker\Link\Application\Service\HashGeneratorInterface;
use Linker\Link\Application\Service\LinkGeneratorInterface;
use Linker\Link\Domain\Repository\LinkRepository;
use Linker\Link\Domain\Repository\LinkRepositoryInterface;

class LinkServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(LinkGeneratorInterface::class, function () {
            return new LinkGenerator(
                $this->app->make(HashGeneratorInterface::class),
                config('generator.redirect_route_name')
            );
        });

        $this->app->bind(HashGeneratorInterface::class, function () {
            return new HashGenerator(config('generator.url_tail_length'));
        });

        $this->app->bind(LinkRepositoryInterface::class, LinkRepository::class);
    }

    public function boot()
    {
        //
    }
}
