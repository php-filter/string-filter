<?php

declare(strict_types=1);

namespace Smart\StringFilter;

class ValueInfo
{
    /** @var Value */
    private $value;

    public function __construct(Value $value)
    {
        $this->value = $value;
    }

    public function length(): int
    {
        return strlen($this->value->string());
    }

    public function count(): int
    {
        return $this->length();
    }

    public function wordsCount(): int
    {
        return str_word_count($this->value->string(), 0);
    }

    public function phaseCount(string $phase): int
    {
        return substr_count($this->value->string(), $phase);
    }
}
