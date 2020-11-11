<?php

declare(strict_types=1);

namespace Smart\Tests\Filters;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

final class HtmlSpecialCharsDecodeTest extends TestCase
{
    public function testShouldEncodeHtmlSpecialChars(): void
    {
        $filter = Filter::of('&lt;a href=&quot;test&quot;&gt;Test&lt;/a&gt;')->htmlSpecialCharsDecode();

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->value(), self::identicalTo('<a href="test">Test</a>'));
    }
}
