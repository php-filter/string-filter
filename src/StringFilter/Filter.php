<?php

declare(strict_types=1);

namespace Smart\StringFilter;

final class Filter
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function of(string $value): self
    {
        return new self($value);
    }

    public function alnum(bool $withSpace = false): self
    {
        if ($withSpace === false) {
            $regex = '/[^[:alnum:]]/u';
        } else {
            $regex = '/[^[:alnum:][:space:]]/u';
        }

        $this->value = (string) preg_replace($regex, '', $this->value);

        return $this;
    }

    public function append(string $value): self
    {
        $this->value .= $value;

        return $this;
    }

    public function info(): ValueInfo
    {
        return new ValueInfo($this);
    }

    public function letter(): self
    {
        $this->value = (string) preg_replace('/[^[:alpha:]]/u', '', $this->value);

        return $this;
    }

    public function limit(int $limit): self
    {
        $this->value = substr($this->value, 0, $limit);

        return $this;
    }

    public function lower(): self
    {
        $this->value = mb_strtolower($this->value);

        return $this;
    }

    public function lowerFirst(): self
    {
        $this->value = lcfirst($this->value);

        return $this;
    }

    public function numeric(): self
    {
        $this->value = (string) preg_replace('/[^0-9]/', '', $this->value);

        return $this;
    }

    public function prepend(string $value): self
    {
        $this->value = $value.$this->value;

        return $this;
    }

    public function remove(string $toRemove): self
    {
        $this->value = str_replace($toRemove, '', $this->value);

        return $this;
    }

    public function repeat(int $multiplier): self
    {
        $this->value = str_repeat($this->value, $multiplier);

        return $this;
    }

    public function replace(string $search, string $replaceTo): self
    {
        $this->value = str_replace($search, $replaceTo, $this->value);

        return $this;
    }

    public function replaceRegex(string $regex, string $replaceTo): self
    {
        $this->value = (string) preg_replace($regex, $replaceTo, $this->value);

        return $this;
    }

    public function result(): string
    {
        return $this->value;
    }

    public function reverse(): self
    {
        $this->value = strrev($this->value);

        return $this;
    }

    public function shuffle(): self
    {
        $this->value = str_shuffle($this->value);

        return $this;
    }

    public function stripHtml(?string $allowTags = null): self
    {
        if ($allowTags === null) {
            $this->value = strip_tags($this->value);
        } else {
            $this->value = strip_tags($this->value, $allowTags);
        }

        return $this;
    }

    public function strPadLeft(int $length, string $pad): self
    {
        $this->value = str_pad($this->value, $length, $pad, STR_PAD_LEFT);

        return $this;
    }

    public function strPadRight(int $length, string $pad): self
    {
        $this->value = str_pad($this->value, $length, $pad, STR_PAD_RIGHT);

        return $this;
    }

    public function substr(int $start, int $length): self
    {
        $this->value = substr($this->value, $start, $length);

        return $this;
    }

    public function trim(): self
    {
        $this->value = trim($this->value);

        return $this;
    }

    public function trimLeft(): self
    {
        $this->value = ltrim($this->value);

        return $this;
    }

    public function trimRight(): self
    {
        $this->value = rtrim($this->value);

        return $this;
    }

    public function upper(): self
    {
        $this->value = mb_strtoupper($this->value);

        return $this;
    }

    public function upperFirst(bool $allWords = false): self
    {
        if ($allWords === false) {
            $this->value = ucfirst($this->value);
        } else {
            $this->value = ucwords($this->value);
        }

        return $this;
    }

    public function wordWrap(int $afterChars, string $break = "\n"): self
    {
        $this->value = wordwrap($this->value, $afterChars, $break, false);

        return $this;
    }
}
