<?php declare(strict_types=1);

namespace Linker\Link\Domain\Repository;

use Linker\Link\Domain\Entity\Link;

interface LinkRepositoryInterface
{
    public function create(Link $link): void;
}
