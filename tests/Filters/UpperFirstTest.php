<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class UpperFirstTest extends TestCase
{
    public function testShouldUpperFirstLetterInString(): void
    {
        $filter = Filter::of('lucy')->upperFirst();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('Lucy'));
    }
}
