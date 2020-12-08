<?php

declare(strict_types=1);

namespace Linker\Link\UI\Http\Controller;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Linker\Link\Application\Service\LinkService;

class RedirectController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $linkService;

    public function __construct(LinkService $linkService)
    {
        $this->linkService = $linkService;
    }

    public function redirectTo(string $hash): RedirectResponse
    {
        $linkTo = $this->linkService->getOneByHash($hash);

        if (is_null($linkTo)) {
            return Redirect::back()->with('errors', ['This link was not found']);
        }
        return Redirect::to($linkTo->getOldUrl());
    }
}

