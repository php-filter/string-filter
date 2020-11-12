<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class ExtractBetweenTest extends TestCase
{
    public function testShouldExtractStringBetweenElementNumbers(): void
    {
        $filter = Filter::of('<div>test</div>')->extractBetween('<div>', '</div>');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->value(), self::identicalTo('test'));
    }
}
