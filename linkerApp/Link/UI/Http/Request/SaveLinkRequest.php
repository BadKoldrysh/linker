<?php

declare(strict_types=1);

namespace Linker\Link\UI\Http\Request;

use App\Http\Responses\JsonErrorResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SaveLinkRequest extends FormRequest
{
    private const URL = 'url';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::URL => [
                'required',
                'min:7',
                'max:3000',
                'url',
            ],
        ];
    }

    public function getUrl(): string
    {
        return $this->validated()[self::URL];
    }

    protected function failedValidation(Validator $validator): void
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(new JsonErrorResponse($errors));
    }
}
