<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class NumericWithTest extends TestCase
{
    public function testShouldLeaveOnlyNumbersAndSpecifiedCharacters(): void
    {
        $filter = Filter::of('10.31 zl')->numericWith('.');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->value()->float(), self::identicalTo(10.31));
    }
}
