<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class ReverseTest extends TestCase
{
    public function testShouldReverseString(): void
    {
        $filter = Filter::of('test')->reverse();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo('tset'));
    }
}
