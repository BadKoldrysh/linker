<?php declare(strict_types=1);

namespace Linker\Link\Application\Service;

use Linker\Link\Application\Query\LinkQueryInterface;
use Linker\Link\Application\Query\LinkView;
use Linker\Link\Domain\Entity\Link;
use Linker\Link\Domain\Repository\LinkRepositoryInterface;

class LinkService
{
    private $hashGenerator;
    private $repository;
    private $linkQuery;

    public function __construct(
        HashGeneratorInterface $hashGenerator,
        LinkRepositoryInterface $repository,
        LinkQueryInterface $linkQuery
    ) {
        $this->hashGenerator = $hashGenerator;
        $this->repository = $repository;
        $this->linkQuery = $linkQuery;
    }

    public function make(string $oldUrl): LinkView
    {
        do {
            $hash = $this->hashGenerator->generate();
        } while (!$this->repository->isHashUnique($hash));

        $link = new Link($oldUrl, $hash);

        $this->repository->create($link);

        return $this->linkQuery->getOneById($link->getId());
    }
}
