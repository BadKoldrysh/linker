<?php

declare(strict_types=1);

namespace Linker\Link\Application\Query;

class LinkView
{
    /** @var string $oldUrl */
    private $oldUrl;

    /** @var string $hash */
    private $hash;

    public function __construct(string $oldUrl, string $hash)
    {
        $this->oldUrl = $oldUrl;
        $this->hash = $hash;
    }

    public function getOldUrl(): string
    {
        return $this->oldUrl;
    }

    public function getHash(): string
    {
        return $this->hash;
    }
}
