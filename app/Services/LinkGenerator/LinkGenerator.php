<?php

namespace App\Services\LinkGenerator;

use App\Services\LinkGeneratorInterface;
use Illuminate\Support\Str;

class LinkGenerator implements LinkGeneratorInterface
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
