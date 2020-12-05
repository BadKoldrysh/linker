<?php

declare(strict_types=1);

namespace Infrastructure\Link\Query;

use Infrastructure\Link\Model\Link;
use Linker\Link\Application\Query\LinkQueryInterface;
use Linker\Link\Application\Query\LinkView;
use Linker\Link\Application\Service\LinkGeneratorInterface;

class LinkQuery implements LinkQueryInterface
{
    private $linkGenerator;

    public function __construct(LinkGeneratorInterface $linkGenerator)
    {
        $this->linkGenerator = $linkGenerator;
    }

    public function getOneById(int $id): ?LinkView
    {
        $model = Link::query()->find($id);

        if ($model instanceof Link) {
            return new LinkView($model->getOldUrl(), $this->linkGenerator->getRoute($model->getHash()));
        }

        return null;
    }
}
