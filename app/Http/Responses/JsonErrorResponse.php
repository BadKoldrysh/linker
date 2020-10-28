<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class JsonErrorResponse extends JsonResponse
{
    public function __construct(array $errors)
    {
        parent::__construct(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
