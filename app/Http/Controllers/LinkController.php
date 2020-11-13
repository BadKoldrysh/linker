<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveLinkRequest;
use App\Models\Link;
use App\Services\LinkGeneratorInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class LinkController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLink(SaveLinkRequest $saveLinkRequest, LinkGeneratorInterface $linkGenerator): Response
    {
        $oldUrl = $saveLinkRequest->get('url');

        $link = Link::query()->create([
            'old_url' => $oldUrl,
            'new_url' => $linkGenerator->generate(),
        ]);

        return new Response($link);
    }
}
