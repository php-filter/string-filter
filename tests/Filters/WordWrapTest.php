<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class WordWrapTest extends TestCase
{
    public function testShouldWordWrapStringAfterSixChars(): void
    {
        $filter = Filter::of('lucy Brown')->wordWrap(6, '</br>');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->value(), self::identicalTo('lucy</br>Brown'));
    }

    public function testShouldWordWrapStringAfterTreeChars(): void
    {
        $filter = Filter::of('Big Design Up Front')->wordWrap(3, '</br>');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->value(), self::identicalTo('Big</br>Design</br>Up</br>Front'));
    }
}
