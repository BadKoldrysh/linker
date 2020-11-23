<?php declare(strict_types=1);

namespace Infrastructure\Link\Provider;

use Illuminate\Support\ServiceProvider;
use Infrastructure\Link\Query\LinkQuery;
use Infrastructure\Link\Repository\LinkRepository;
use Infrastructure\Link\Service\HashGenerator;
use Infrastructure\Link\Service\LinkGenerator;
use Linker\Link\Application\Query\LinkQueryInterface;
use Linker\Link\Application\Service\HashGeneratorInterface;
use Linker\Link\Application\Service\LinkGeneratorInterface;
use Linker\Link\Domain\Repository\LinkRepositoryInterface;

class LinkServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(LinkGeneratorInterface::class, function () {
            return new LinkGenerator(
                $this->app->make(HashGeneratorInterface::class),
                (string) config('generator.redirect_route_name')
            );
        });

        $this->app->bind(HashGeneratorInterface::class, function () {
            return new HashGenerator((int) config('generator.url_tail_length'));
        });

        $this->app->bind(LinkRepositoryInterface::class, LinkRepository::class);

        $this->app->bind(LinkQueryInterface::class, LinkQuery::class);
    }

    public function boot()
    {
        //
    }
}
