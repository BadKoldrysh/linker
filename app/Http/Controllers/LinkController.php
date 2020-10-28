<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveLinkRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class LinkController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLink(SaveLinkRequest $saveLinkRequest): Response
    {

        dd($saveLinkRequest->all());

        return new Response('hello world');
    }
}
