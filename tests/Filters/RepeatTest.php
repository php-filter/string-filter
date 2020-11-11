<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class RepeatTest extends TestCase
{
    public function testShouldRepeatString(): void
    {
        $filter = Filter::of('test')->repeat(3);

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo('testtesttest'));
    }
}
