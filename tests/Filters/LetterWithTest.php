<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class LetterWithTest extends TestCase
{
    public function testShouldLeaveOnlyLettersAndSpecifiedCharacters(): void
    {
        $filter = Filter::of('girl_123!')->letterWith('_');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('girl_'));
    }
}
