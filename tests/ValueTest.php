<?php

declare(strict_types=1);

namespace Smart\Tests;

use PHPUnit\Framework\TestCase;
use Smart\StringFilter\Value;
use Smart\Tests\FakeObject\FakeObjectWithoutToString;
use Smart\Tests\FakeObject\FakeObjectWithToString;

class ValueTest extends TestCase
{
    public function testShouldConvertObjectToStringValue(): void
    {
        $object = new FakeObjectWithToString('works!');
        $value = new Value($object);

        self::assertThat($value->string(), self::identicalTo('works!'));
    }

    public function testConvertObjectToStringValueShouldGenerateExceptionBecauseNotImplementedMethodToString(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectErrorMessage('Object must implement function __toString.');

        $object = new FakeObjectWithoutToString('works!');
        $value = new Value($object);

        self::assertThat($value->string(), self::identicalTo('works!'));
    }

    public function testShouldConvertValueToString(): void
    {
        $value = new Value(11);

        self::assertThat($value->string(), self::identicalTo('11'));
    }

    public function testShouldConvertValueToStringOrNull(): void
    {
        $value = new Value(999);
        $value1 = new Value('null');

        self::assertThat($value->stringOrNull(), self::identicalTo('999'));
        self::assertThat($value1->stringOrNull(), self::identicalTo(null));
    }

    public function testShouldConvertValueToInt(): void
    {
        $value = new Value('11');

        self::assertThat($value->int(), self::identicalTo(11));
    }

    public function testShouldConvertValueToIntOrNull(): void
    {
        $value = new Value('11.00');
        $value1 = new Value(null);

        self::assertThat($value->intOrNull(), self::identicalTo(11));
        self::assertThat($value1->intOrNull(), self::identicalTo(null));
    }

    public function testShouldConvertValueToFloat(): void
    {
        $value = new Value('11.234');

        self::assertThat($value->float(), self::identicalTo(11.234));
    }

    public function testShouldConvertFloatValueToInt(): void
    {
        $value = new Value(11.234);

        self::assertThat($value->int(), self::identicalTo(11));
    }

    public function testShouldConvertValueToFloatOrNull(): void
    {
        $value = new Value('99.234');
        $value1 = new Value(null);

        self::assertThat($value->floatOrNull(), self::identicalTo(99.234));
        self::assertThat($value1->floatOrNull(), self::identicalTo(null));
    }

    public function testShouldConvertValueToBoolTrue(): void
    {
        $value = new Value('1');
        $value1 = new Value(1);
        $value2 = new Value('true');

        self::assertThat($value->bool(), self::identicalTo(true));
        self::assertThat($value1->bool(), self::identicalTo(true));
        self::assertThat($value2->bool(), self::identicalTo(true));
    }

    public function testShouldConvertValueToBoolFalse(): void
    {
        $value = new Value('0');
        $value1 = new Value(0);
        $value2 = new Value('false');

        self::assertThat($value->bool(), self::identicalTo(false));
        self::assertThat($value1->bool(), self::identicalTo(false));
        self::assertThat($value2->bool(), self::identicalTo(false));
    }

    public function testShouldEqualValueAndReturnTrue(): void
    {
        $value = new Value(11);

        self::assertThat($value->equal(11), self::isTrue());
    }

    public function testShouldEqualValueAndReturnFalse(): void
    {
        $value = new Value(11);

        self::assertThat($value->equal('11'), self::isFalse());
    }
}
