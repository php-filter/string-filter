<?php

declare(strict_types=1);

namespace Smart\StringFilter;

class Value
{
    /**
     * @var float|int|string|null
     */
    private $value;

    /**
     * @param object|bool|string|int|float|null $value
     */
    public function __construct($value)
    {
        if (is_object($value)) {
            $toStringExist = method_exists($value, '__toString');

            if ($toStringExist) {
                $this->value = (string) $value;

                return;
            }

            throw new \InvalidArgumentException('Object must implement function __toString.');
        }

        if (is_bool($value)) {
            $this->value = $this->value ? 'true' : 'false';

            return;
        }

        $this->value = $value;
    }

    /**
     * @param object|string|int|float|null $value
     */
    public function equal($value): bool
    {
        return (new self($value))->value === $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }

    public function string(): string
    {
        return (string) $this->value;
    }

    public function int(): int
    {
        return (int) $this->value;
    }

    public function float(): float
    {
        return (float) $this->value;
    }

    public function bool(): bool
    {
        return $this->string() === '1' || $this->string() === 'true';
    }

    public function stringOrNull(): ?string
    {
        if ($this->value === null || $this->value === 'null') {
            return null;
        }

        return $this->string();
    }

    public function intOrNull(): ?int
    {
        if ($this->value === null || $this->value === 'null' || $this->value === '') {
            return null;
        }

        return $this->int();
    }

    public function floatOrNull(): ?float
    {
        if ($this->value === null || $this->value === 'null' || $this->value === '') {
            return null;
        }

        return $this->float();
    }
}
