<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class RemoveMultipleSpacesTest extends TestCase
{
    public function testShouldRemoveMultipleSpacesFromString(): void
    {
        $filter = Filter::of('Replacing     multiple spaces')->removeMultipleSpaces();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('Replacing multiple spaces'));
    }
}
