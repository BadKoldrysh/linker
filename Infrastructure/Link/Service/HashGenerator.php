<?php declare(strict_types=1);

namespace Infrastructure\Link\Service;

use Illuminate\Support\Str;
use Linker\Link\Application\Service\HashGeneratorInterface;

class HashGenerator implements HashGeneratorInterface
{
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
