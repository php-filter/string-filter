<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class ShuffleTest extends TestCase
{
    public function testShouldShuffleString(): void
    {
        $filter = Filter::of('test')->shuffle();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertEquals(4, $filter->getInfo()->length());
    }
}
