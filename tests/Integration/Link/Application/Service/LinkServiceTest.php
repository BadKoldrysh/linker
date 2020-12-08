<?php

declare(strict_types=1);

namespace Tests\Integration\Link\Application\Service;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase;
use Linker\Link\Application\Query\LinkQueryInterface;
use Linker\Link\Application\Service\HashGeneratorInterface;
use Linker\Link\Application\Service\LinkService;
use Linker\Link\Domain\Repository\LinkRepositoryInterface;

class LinkServiceTest extends TestCase
{
    public function createApplication()
    {
        $app = require __DIR__ . '/../../../../../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function testGetOneByHash(): void
    {
        $hash = '1234ab';
        $linkQuery = $this->createMock(LinkQueryInterface::class);
        $linkQuery->expects(self::once())->method('getOneByHash');
        $service = new LinkService(app(HashGeneratorInterface::class), app(LinkRepositoryInterface::class), $linkQuery);

        $service->getOneByHash($hash);
    }
}
