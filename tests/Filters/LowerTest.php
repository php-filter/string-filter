<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class LowerTest extends TestCase
{
    public function testShouldLowerAllLettersInString(): void
    {
        $filter = Filter::of('Lucy Brown')->lower();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('lucy brown'));
    }
}
