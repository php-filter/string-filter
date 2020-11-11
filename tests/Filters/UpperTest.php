<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class UpperTest extends TestCase
{
    public function testShouldUpperAllLettersInString(): void
    {
        $filter = Filter::of('lucy Brown')->upper();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->value(), self::identicalTo('LUCY BROWN'));
    }
}
