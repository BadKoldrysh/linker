<?php declare(strict_types=1);

namespace Linker\Link\Domain\Entity;

class Link
{
    private $id;
    private $oldUrl;
    private $hash;

    public function __construct(string $oldUrl, string $hash, ?int $id = null)
    {
        $this->oldUrl = $oldUrl;
        $this->hash = $hash;
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

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setOldUrl(string $oldUrl): void
    {
        $this->oldUrl = $oldUrl;
    }

    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }
}
