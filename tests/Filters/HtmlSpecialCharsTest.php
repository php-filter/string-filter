<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class HtmlSpecialCharsTest extends TestCase
{
    public function testShouldEncodeHtmlSpecialChars(): void
    {
        $filter = Filter::of('<a href="test">Test</a>')->htmlSpecialChars();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->valueString(), self::identicalTo('&lt;a href=&quot;test&quot;&gt;Test&lt;/a&gt;'));
    }
}
