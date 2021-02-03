<?php

declare(strict_types=1);

namespace Smart\StringFilter;

class Filter
{
    /** @var Value */
    private $value;

    /**
     * @param object|bool|string|int|float|null $value
     */
    public function __construct($value)
    {
        $this->value = new Value($value);
    }

    public function __toString(): string
    {
        return $this->valueString();
    }

    public static function of(string $value): self
    {
        return new self($value);
    }

    public function alnum(): self
    {
        $value = (string) preg_replace('/[^[:alnum:]]/u', '', $this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function alnumWith(string $chars): self
    {
        $regex = '/[^[:alnum:]'.$chars.']/u';
        $value = (string) preg_replace($regex, '', $this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function append(string $value): self
    {
        $value = $this->valueString().$value;
        $this->value = new Value($value);

        return $this;
    }

    public function extractBetween(string $startElement, string $endElement): self
    {
        $startElement = preg_quote($startElement, '/');
        $endElement = preg_quote($endElement, '/');
        $regex = '/'.$startElement.'(.*?)'.$endElement.'/';

        preg_match($regex, $this->valueString(), $match);
        $value = $match[1];
        $this->value = new Value($value);

        return $this;
    }

    public function info(): ValueInfo
    {
        return new ValueInfo($this->value);
    }

    public function letter(): self
    {
        $value = (string) preg_replace('/[^[:alpha:]]/u', '', $this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function letterWith(string $chars): self
    {
        $value = (string) preg_replace('/[^[:alpha:]'.$chars.']/u', '', $this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function limit(int $limit): self
    {
        $value = mb_substr($this->valueString(), 0, $limit);
        $this->value = new Value($value);

        return $this;
    }

    public function lower(): self
    {
        $value = mb_strtolower($this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function lowerFirst(): self
    {
        $value = mb_strtolower(mb_substr($this->valueString(), 0, 1)).mb_substr($this->valueString(), 1);
        $this->value = new Value($value);

        return $this;
    }

    public function htmlSpecialChars(): self
    {
        $value = htmlspecialchars($this->valueString(), ENT_QUOTES);
        $this->value = new Value($value);

        return $this;
    }

    public function htmlSpecialCharsDecode(): self
    {
        $value = htmlspecialchars_decode($this->valueString(), ENT_QUOTES);
        $this->value = new Value($value);

        return $this;
    }

    public function numeric(): self
    {
        $value = (string) preg_replace('/[^0-9]/', '', $this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function numericWith(string $chars): self
    {
        $value = (string) preg_replace('/[^0-9'.$chars.']/', '', $this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function prepend(string $value): self
    {
        $value .= $this->valueString();
        $this->value = new Value($value);

        return $this;
    }

    public function remove(string $toRemove): self
    {
        $value = str_replace($toRemove, '', $this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function removeMultipleSpaces(): self
    {
        $value = (string) preg_replace('/\s+/', ' ', $this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function repeat(int $multiplier): self
    {
        $value = str_repeat($this->valueString(), $multiplier);
        $this->value = new Value($value);

        return $this;
    }

    public function replace(string $search, string $replaceTo): self
    {
        $value = str_replace($search, $replaceTo, $this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function replaceRegex(string $regex, string $replaceTo): self
    {
        $value = (string) preg_replace($regex, $replaceTo, $this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function value(): Value
    {
        return $this->value;
    }

    public function valueString(): string
    {
        return $this->value->string();
    }

    public function reverse(): self
    {
        $value = strrev($this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function shuffle(): self
    {
        $value = str_shuffle($this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function stripHtml(?string $allowTags = null): self
    {
        if ($allowTags === null) {
            $value = strip_tags($this->valueString());
        } else {
            $value = strip_tags($this->valueString(), $allowTags);
        }

        $this->value = new Value($value);

        return $this;
    }

    public function strPadLeft(int $length, string $pad): self
    {
        $value = str_pad($this->valueString(), $length, $pad, STR_PAD_LEFT);
        $this->value = new Value($value);

        return $this;
    }

    public function strPadRight(int $length, string $pad): self
    {
        $value = str_pad($this->valueString(), $length, $pad, STR_PAD_RIGHT);
        $this->value = new Value($value);

        return $this;
    }

    public function substr(int $start, int $length): self
    {
        $value = mb_substr($this->valueString(), $start, $length);
        $this->value = new Value($value);

        return $this;
    }

    public function trim(): self
    {
        $value = trim($this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function trimLeft(): self
    {
        $value = ltrim($this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function trimRight(): self
    {
        $value = rtrim($this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function upper(): self
    {
        $value = mb_strtoupper($this->valueString());
        $this->value = new Value($value);

        return $this;
    }

    public function upperFirst(): self
    {
        $valueString = $this->valueString();
        $value = mb_strtoupper(mb_substr($valueString, 0, 1)).mb_substr($valueString, 1);
        $this->value = new Value($value);

        return $this;
    }

    public function upperWords(): self
    {
        $value = mb_convert_case($this->valueString(), MB_CASE_TITLE, 'UTF-8');
        $this->value = new Value($value);

        return $this;
    }

    public function wordWrap(int $afterChars, string $break = "\n"): self
    {
        $value = wordwrap($this->valueString(), $afterChars, $break, false);
        $this->value = new Value($value);

        return $this;
    }
}
