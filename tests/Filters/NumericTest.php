<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class NumericTest extends TestCase
{
    public function testShouldLeaveOnlyNumbers(): void
    {
        $filter = Filter::of('a123')->numeric();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->value(), self::identicalTo('123'));
    }
}
