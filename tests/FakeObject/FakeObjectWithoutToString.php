<?php

declare(strict_types=1);

namespace Smart\Tests\FakeObject;

class FakeObjectWithoutToString
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }
}
