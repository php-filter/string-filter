<?php

declare(strict_types=1);

namespace Smart\Tests\FakeObject;

class FakeObjectWithToString
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
