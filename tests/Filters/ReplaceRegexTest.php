<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class ReplaceRegexTest extends TestCase
{
    public function testShouldReplaceRegex(): void
    {
        $filter = Filter::of('Big-Design-Up-Front')->replaceRegex('/[^a-zA-Z0-9]/', '');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('BigDesignUpFront'));
    }
}
