<?php declare(strict_types=1);

namespace Linker\Link\UI\Http\Controller;

use App\Http\Responses\JsonOkResponse;
use Linker\Link\Application\Service\LinkService;
use Linker\Link\UI\Http\Request\SaveLinkRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Linker\Link\UI\Http\Resource\LinkResource;

class LinkController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLink(SaveLinkRequest $saveLinkRequest, LinkService $service): JsonOkResponse
    {
        $oldUrl = $saveLinkRequest->getUrl();

        $link = $service->make($oldUrl);

        return new JsonOkResponse(new LinkResource($link));
    }
}
