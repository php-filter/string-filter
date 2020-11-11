<?php

declare(strict_types=1);

namespace Smart\StringFilter;

final class ValueInfo
{
    private Filter $filter;

    public function __construct(Filter $filter)
    {
        $this->filter = $filter;
    }

    public function length(): int
    {
        return strlen($this->filter->result());
    }

    public function count(): int
    {
        return $this->length();
    }

    public function wordsCount(): int
    {
        return str_word_count($this->filter->result(), 0);
    }

    public function phaseCount(string $phase): int
    {
        return substr_count($this->filter->result(), $phase);
    }
}
