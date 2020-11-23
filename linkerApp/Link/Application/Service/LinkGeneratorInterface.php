<?php

namespace Linker\Link\Application\Service;

interface LinkGeneratorInterface
{
    public function generate(): string;

    public function getRoute(string $hash): string;
}
