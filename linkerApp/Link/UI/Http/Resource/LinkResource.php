<?php

declare(strict_types=1);

namespace Linker\Link\UI\Http\Resource;

use Illuminate\Http\Resources\Json\JsonResource;
use Linker\Link\Application\Query\LinkView;

class LinkResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var LinkView
     */
    public $resource;

    public function toArray($request)
    {
        return [
            'hash' => $this->resource->getHash(),
        ];
    }
}
