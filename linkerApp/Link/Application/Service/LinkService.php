<?php declare(strict_types=1);

namespace Linker\Link\Application\Service;

use App\Services\LinkGeneratorInterface;
use Linker\Link\Application\Query\LinkQueryInterface;
use Linker\Link\Application\Query\LinkView;
use Linker\Link\Domain\Entity\Link;
use Linker\Link\Domain\Repository\LinkRepositoryInterface;

class LinkService
{
    private $linkGenerator;
    private $repository;
    private $linkQuery;

    public function __construct(
        LinkGeneratorInterface $linkGenerator,
        LinkRepositoryInterface $repository,
        LinkQueryInterface $linkQuery
    ) {
        $this->linkGenerator = $linkGenerator;
        $this->repository = $repository;
        $this->linkQuery = $linkQuery;
    }

    public function make(string $oldUrl): LinkView
    {
        $link = new Link($oldUrl, $this->linkGenerator->generate());

        $this->repository->create($link);

        return $this->linkQuery->getOneById($link->getId());
    }
}
