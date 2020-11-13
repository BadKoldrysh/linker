<?php declare(strict_types=1);

namespace Linker\Link\UI\Http\Controller;

use Linker\Link\Application\Service\LinkService;
use Linker\Link\UI\Http\Request\SaveLinkRequest;
use App\Models\Link;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class LinkController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLink(SaveLinkRequest $saveLinkRequest, LinkService $service): Response
    {
        $oldUrl = $saveLinkRequest->get('url');

        $link = $service->make($oldUrl);

        return new Response($link);
    }
}
