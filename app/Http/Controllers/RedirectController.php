<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirectTo(string $hash)
    {
        $linkTo = Link::query()
            ->select('old_url')
            ->where('new_url', '=', url("/$hash"))
            ->first();

        return Redirect::to($linkTo->old_url);
    }
}
