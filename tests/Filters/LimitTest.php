<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class LimitTest extends TestCase
{
    public function testShouldLimitString(): void
    {
        $filter = Filter::of('this is ')->limit(4);

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('this'));
    }
}
