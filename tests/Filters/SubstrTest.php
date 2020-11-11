<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class SubstrTest extends TestCase
{
    public function testShouldSubstrString(): void
    {
        $filter = Filter::of('test 123')->substr(0, 4);

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo('test'));
    }
}
