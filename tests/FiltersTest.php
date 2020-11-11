<?php

declare(strict_types=1);

namespace Smart\Tests;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Filter;

class FiltersTest extends TestCase
{
    public function testShouldChainFilterString(): void
    {
        $filter = Filter::of('/_big_ball_of_mud_/')
            ->replace('/', ' ')
            ->replace('_', ' ')
            ->trim()
            ->upperFirst(true);

        self::assertThat($filter, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filter->result(), self::identicalTo('Big Ball Of Mud'));
    }

    public function testShouldGroupFilterAndRun(): void
    {
        $value = ' wikipedia is a free online encyclopedia';

        $groupFilters = function ($value) {
            return Filter::of($value)->trim()->upperFirst()->append('.');
        };

        $filters = $groupFilters($value);

        self::assertThat($filters, self::containsOnlyInstancesOf(Filter::class));
        self::assertThat($filters->result(), self::identicalTo('Wikipedia is a free online encyclopedia.'));
    }

    public function testShouldGetInfoAboutValue(): void
    {
        $info = Filter::of('wikipedia is a free online encyclopedia, created and edited by by volunteers')->info();

        self::assertThat($info->wordsCount(), self::equalTo(12));
        self::assertThat($info->length(), self::equalTo(76));
        self::assertThat($info->phaseCount('ee'), self::equalTo(2));
    }
}
