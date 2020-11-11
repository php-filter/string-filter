<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class LowerFirstTest extends TestCase
{
    public function testShouldLowerFirstLetterInString(): void
    {
        $filter = Filter::of('Big Ben')->lowerFirst();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->value(), self::identicalTo('big Ben'));
    }
}
