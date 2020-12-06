<?php declare(strict_types=1);

namespace Infrastructure\Link\Repository;

use Infrastructure\Link\Model\Link;
use Linker\Link\Domain\Entity\Link as LinkEntity;
use Linker\Link\Domain\Repository\LinkRepositoryInterface;

class LinkRepository implements LinkRepositoryInterface
{
    public function create(LinkEntity $link): void
    {
        /** @var Link $model */
        $model = Link::query()
            ->create([
                'old_url' => $link->getOldUrl(),
                'hash' => $link->getHash(),
            ]);

        $link->setId($model->getId());
    }

    public function isHashUnique(string $hash): bool
    {
        $link = Link::query()
            ->select()
            ->where('hash', '=', $hash)
            ->first();

        return is_null($link);
    }
}
