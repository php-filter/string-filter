<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class LetterTest extends TestCase
{
    public function testShouldLeaveOnlyLetters(): void
    {
        $filter = Filter::of('girl_123')->letter();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo('girl'));
    }
}
