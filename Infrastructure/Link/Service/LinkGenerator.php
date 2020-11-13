<?php declare(strict_types=1);

namespace Infrastructure\Link\Service;

use Linker\Link\Application\Service\HashGeneratorInterface;
use Linker\Link\Application\Service\LinkGeneratorInterface;

class LinkGenerator implements LinkGeneratorInterface
{
    private $hashGenerator;
    private $routeName;

    public function __construct(HashGeneratorInterface $hashGenerator, string $routeName)
    {
        $this->hashGenerator = $hashGenerator;
        $this->routeName = $routeName;
    }

    public function generate(): string
    {
        $hash = $this->hashGenerator->generate();

        return $this->getRoute($hash);
    }

    public function getRoute(string $hash): string
    {
        return route($this->routeName, ['hash' => $hash]);
    }
}
