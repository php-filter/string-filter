<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class ReplaceTest extends TestCase
{
    public function testShouldReplaceString(): void
    {
        $filter = Filter::of('Big Design Up Front')->replace('Design Up Front', 'Ball Of Mud');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('Big Ball Of Mud'));
    }
}
