<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class TrimRightTest extends TestCase
{
    public function testShouldRightTrimString(): void
    {
        $filter = Filter::of(' test ')->trimRight();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo(' test'));
    }
}
