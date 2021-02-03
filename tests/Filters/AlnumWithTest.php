<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class AlnumWithTest extends TestCase
{
    public function testShouldLeaveOnlyLettersAndNumbersWithSpace(): void
    {
        $filter = Filter::of('LLeMs!$%ZaF_F3dEX 4')->alnumWith(' _');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('LLeMsZaF_F3dEX 4'));
    }
}
