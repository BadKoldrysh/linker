<?php

declare(strict_types=1);

namespace App\Services\HashGenerator;

use App\Services\HashGeneratorInterface;
use Illuminate\Support\Str;

class HashGenerator implements HashGeneratorInterface
{
    /**
     * Tail length
     *
     * @var int
     */
    private $tailLength;

    public function __construct(int $length)
    {
        $this->tailLength = $length;
    }

    public function generate(): string
    {
        return Str::random($this->tailLength);
    }
}
