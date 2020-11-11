<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class PrependTest extends TestCase
{
    public function testShouldPrependValueToString(): void
    {
        $filter = Filter::of('Smith')->prepend('John ');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo('John Smith'));
    }
}
