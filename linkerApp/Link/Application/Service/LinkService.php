<?php declare(strict_types=1);

namespace Linker\Link\Application\Service;

use App\Services\LinkGeneratorInterface;
use Linker\Link\Domain\Entity\Link;
use Linker\Link\Domain\Repository\LinkRepositoryInterface;

class LinkService
{
    private $linkGenerator;
    private $repository;

    public function __construct(LinkGeneratorInterface $linkGenerator, LinkRepositoryInterface $repository)
    {
        $this->linkGenerator = $linkGenerator;
        $this->repository = $repository;
    }

    public function make(string $oldUrl): Link
    {
        $link = new Link($oldUrl, $this->linkGenerator->generate());

        $this->repository->create($link);
        return $link;
    }
}
