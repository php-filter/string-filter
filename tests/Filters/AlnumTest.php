<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class AlnumTest extends TestCase
{
    public function testShouldLeaveOnlyLettersAndNumbers(): void
    {
        $filter = Filter::of('LLeMs!ZaF_F3dEX 4')->alnum();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo('LLeMsZaFF3dEX4'));
    }

    public function testShouldLeaveOnlyLettersAndNumbersWithSpace(): void
    {
        $filter = Filter::of('LLeMs!ZaF_F3dEX 4')->alnum(true);

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo('LLeMsZaFF3dEX 4'));
    }
}
