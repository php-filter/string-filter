# PHP String Filters
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.3-8892BF.svg)](https://php.net/)
![Tests](https://github.com/php-filter/string-filter/workflows/Testing/badge.svg?=1.x)
[![Latest Version](https://img.shields.io/github/tag/php-filter/string-filter.svg)](https://github.com/php-filter/string-filter/releases)
![GitHub](https://img.shields.io/github/license/php-filter/string-filter.svg)

PHP String Filter is a library to perform character string transformation using a chain. You can use the most popular filters built into PHP and additional ones added by the author and community.

Support the following **input data** types: **string, integer, float, boolean, null and object** (must have a __toString method)
Support the following **output data** types: string, **int, float, bool and stringOrNull, intOrNull, floatOrNull**

**Example value:**

```php
$filter = Filter::of(10.00)->value()->int() // 10
$filter = Filter::of(10.00)->value()->string() // '10.00'
$filter = Filter::of(true)->value()->string() // 'true'
$filter = Filter::of(null)->value()->intOrNull() // null
```

**Filter list:**

| Filter                                    | Input                                           | Output                                          |
| ----------------------------------------- | ----------------------------------------------- | ----------------------------------------------- |
| alnum()                                   | `LLeMs!ZaF_F3dEX 4`                             | `LLeMsZaFF3dEX4`                                |
| alnumWith('_')                            | `LLeMs!$%ZaF_F3dEX 4`                           | `LLeMsZaF_F3dEX4`                               |
| append('Smith')                           | `John`                                          | `JohnSmith`                                     |
| extractBetween('`<div>`',  '`</div>`')    | `<div>test</div>`                               | `test`                                          |
| htmlSpecialCharsDecode()                  | `&lt;a href=&quot;test&quot;&gt;Test&lt;/a&gt;` | `<a href="test">Test</a>`                       |
| htmlSpecialChars()                        | `<a href="test">Test</a>`                       | `&lt;a href=&quot;test&quot;&gt;Test&lt;/a&gt;` |
| letter()                                  | `girl_123`                                      | `girl`                                          |
| letterWith('_')                           | `girl_123!`                                     | `girl_`                                         |
| limit(4)                                  | `this is`                                       | `this`                                          |
| lowerFirst()                              | `Big Ben`                                       | `big Ben`                                       |
| lower()                                   | `Lucy Brown`                                    | `lucy brown`                                    |
| numeric()                                 | `a123`                                          | `123`                                           |
| numericWith('.')                          | `10.31 zl`                                      | `10.31`                                         |
| prepend('John ')                          | `Smith`                                         | `JohnSmith`                                     |
| removeMultipleSpaces()                    | `Replacing     multiple spaces`                 | `Replacing multiple spaces`                     |
| remove(`toRemove` ' Up Front')            | `Big Design Up Front`                           | `Big Design`                                    |
| repeat(`multiplier` 3)                    | `test`                                          | `testtesttest`                                  |
| replaceRegex('/[^a-zA-Z0-9]/', '')        | `Big-Design-Up-Front`                           | `BigDesignUpFront`                              |
| replace('Design Up Front', 'Ball Of Mud') | `Big Design Up Front`                           | `Big Ball Of Mud`                               |
| reverse()                                 | `test`                                          | `tset`                                          |
| shuffle()                                 | `test`                                          | `tset`                                          |
| stripHtml('`<b>`')                        | `<u><b>test</b></u>`                            | `dsadsa`                                        |
| strPadLeft(12, '0');                      | `2/10/2020`                                     | `0002/10/2020`                                  |
| strPadRight(12, '0');                     | `0002/10/2`                                     | `0002/10/2000`                                  |
| substr(0, 4);                             | `test 123`                                      | `test`                                          |
| trimLeft()                                | ` test `                                        | `test `                                         |
| trimRight()                               | ` test `                                        | ` test`                                         |
| trim()                                    | ` test `                                        | `test`                                          |
| upperFirst()                              | `lucy`                                          | `Lucy`                                          |
| upper()                                   | `lucy Brown`                                    | `LUCY BROWN`                                    |
| upperWords()                              | `lucy lue`                                      | `Lucy Lue`                                      |
| wordWrap(3, '`</br>`')                    | `Big Design Up Front`                           | `Big</br>Design</br>Up</br>Front`               |

**Filter example:**

For a list of filters and more examples of their application, see [unit tests](https://github.com/php-filter/string-filter/tree/main/tests/Filters).

```php

$filter = Filter::of('/_big_ball_of_mud_/')
            ->replace('/', '')
            ->replace('_', '')
            ->upperWords();

$filter->valueString(); // 'Big Ball Of Mud'
```

**An example of a reusable filter grouping:**

```php
$groupFilters = function ($value) {
	return Filter::of($value)->trim()->upperFirst()->append('.');
};

$filter = $groupFilters(' wikipedia is a free online encyclopedia');

$filter->valueString(); // 'Wikipedia is a free online encyclopedia.'

```

**Example of value information:**

```php
$info = Filter::of('wikipedia is a free online encyclopedia, created and edited by by volunteers')->info();

$info->length(); // 76
$info->wordsCount(); // 12
$info->phaseCount('ee'); // 2
```

## Roadmap

- [ ] Add more filters
- [ ] Description of all filters with examples
- [ ] You tell me...

## License

PHP String Filters is released under the MIT License. See the bundled LICENSE file for details.

## Author

[@Miłosz Karolczyk](https://www.linkedin.com/in/milosz-karolczyk/)
