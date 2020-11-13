<?php declare(strict_types=1);

namespace Linker\Link\Domain\Entity;

class Link
{
    private $oldUrl;
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
