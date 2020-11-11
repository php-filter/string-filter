<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class TrimTest extends TestCase
{
    public function testShouldTrimString(): void
    {
        $filter = Filter::of(' test ')->trim();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->value(), self::identicalTo('test'));
    }
}
