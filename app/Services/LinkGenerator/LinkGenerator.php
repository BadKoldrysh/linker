<?php

namespace App\Services\LinkGenerator;

use App\Services\HashGenerator\HashGenerator;
use App\Services\LinkGeneratorInterface;

class LinkGenerator implements LinkGeneratorInterface
{
    /**
     * @var HashGenerator
     */
    private $hashGenerator;

    public function __construct(HashGenerator $hashGenerator)
    {
        $this->hashGenerator = $hashGenerator;
    }

    public function generate(): string
    {
        return $this->hashGenerator->generate();
    }
}
