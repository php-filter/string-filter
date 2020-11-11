<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class AppendTest extends TestCase
{
    public function testShouldAppendValueToString(): void
    {
        $filter = Filter::of('John')->append(' Smith');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->value(), self::identicalTo('John Smith'));
    }
}
