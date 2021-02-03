<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class TrimLeftTest extends TestCase
{
    public function testShouldLeftTrimString(): void
    {
        $filter = Filter::of(' test ')->trimLeft();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('test '));
    }

    public function testShouldLeftTrimStringWithSpecifiedCharacters(): void
    {
        $filter = Filter::of('.test ')->trimLeft('.');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('test '));
    }
}
