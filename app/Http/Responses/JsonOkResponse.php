<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class JsonOkResponse extends JsonResponse
{
    /** @var array HEADERS */
    private const HEADERS = [
        'Content-Type' => 'application/json; charset=UTF-8',
    ];

    public function __construct($data)
    {
        parent::__construct($data, 200, self::HEADERS);
    }
}
