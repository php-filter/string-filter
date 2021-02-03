<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class StrPadRightTest extends TestCase
{
    public function testShouldStrPadRightString(): void
    {
        $filter = Filter::of('0002/10/2')->strPadRight(12, '0');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('0002/10/2000'));
    }
}
