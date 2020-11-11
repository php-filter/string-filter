<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class StrPadLeftTest extends TestCase
{
    public function testShouldStrPadLeftString(): void
    {
        $filter = Filter::of('2/10/2020')->strPadLeft(12, '0');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->value(), self::identicalTo('0002/10/2020'));
    }
}
