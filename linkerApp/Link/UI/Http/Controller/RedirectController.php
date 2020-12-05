<?php

declare(strict_types=1);

namespace Linker\Link\UI\Http\Controller;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Infrastructure\Link\Model\Link;

class RedirectController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirectTo(string $hash): RedirectResponse
    {
        /** @var Link $linkTo */
        $linkTo = Link::query()
            ->select()
            ->where('hash', '=', $hash)
            ->first();

        return Redirect::to($linkTo->getOldUrl());
    }
}

