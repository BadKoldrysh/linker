<?php declare(strict_types=1);

namespace Linker\Link\Domain\Entity;

class Link
{
    private $id;
    private $oldUrl;
    private $newUrl;

    public function __construct(string $oldUrl, string $newUrl, ?int $id = null)
    {
        $this->oldUrl = $oldUrl;
        $this->newUrl = $newUrl;
        $this->id = $id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOldUrl(): string
    {
        return $this->oldUrl;
    }

    public function getNewUrl(): string
    {
        return $this->newUrl;
    }

    public function setOldUrl(string $oldUrl): void
    {
        $this->oldUrl = $oldUrl;
    }

    public function setNewUrl(string $newUrl): void
    {
        $this->newUrl = $newUrl;
    }
}
