<?php

declare(strict_types=1);

namespace Linker\Link\Application\Query;

class LinkView
{
    /** @var string $oldUrl */
    private $oldUrl;

    /** @var string $newUrl */
    private $newUrl;

    public function __construct(string $oldUrl, string $newUrl)
    {
        $this->oldUrl = $oldUrl;
        $this->newUrl = $newUrl;
    }

    public function getOldUrl(): string
    {
        return $this->oldUrl;
    }

    public function getNewUrl(): string
    {
        return $this->newUrl;
    }
}
