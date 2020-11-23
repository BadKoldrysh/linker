<?php

declare(strict_types=1);

namespace Linker\Link\Application\Query;

interface LinkQueryInterface
{
    public function getOneById(int $id): ?LinkView;
}
