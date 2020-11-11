<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class StripHtmlTest extends TestCase
{
    public function testShouldStripHtml(): void
    {
        $filter = Filter::of('<b>test</b>')->stripHtml();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo('test'));
    }

    public function testShouldStripHtmlWithoutBold(): void
    {
        $filter = Filter::of('<u><b>test</b></u>')->stripHtml('<b>');

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo('<b>test</b>'));
    }
}
