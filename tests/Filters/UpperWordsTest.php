<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class UpperWordsTest extends TestCase
{
    public function testShouldUpperWordsInString(): void
    {
        $filter = Filter::of('lucy lue')->upperWords();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('Lucy Lue'));
    }
}
