<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class RemoveTest extends TestCase
{
    public function testShouldReplaceString(): void
    {
        $filter = Filter::of('Big Design Up Front')->remove(' Up Front');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo('Big Design'));
    }
}
