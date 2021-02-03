<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

class CamelizeTest extends TestCase
{
    public function testShouldCamelizeStringVer1(): void
    {
        $filter = Filter::of('primary-getallgroups-sys')->camelize();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('primaryGetallgroupsSys'));
    }

    public function testShouldCamelizeStringVer2(): void
    {
        $filter = Filter::of('primary and secondary')->camelize();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('primaryAndSecondary'));
    }
}
