# PHP String Filters
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg)](https://php.net/)
![Tests](https://github.com/php-filter/string-filter/workflows/Testing/badge.svg?=1.x)
[![Latest Version](https://img.shields.io/github/tag/php-filter/string-filter.svg)](https://github.com/php-filter/string-filter/releases)
![GitHub](https://img.shields.io/github/license/php-filter/string-filter.svg)

PHP String Filter is a library to perform character string transformation using a chain. You can use the most popular filters built into PHP and additional ones added by the author and community.

**Example filter:**

```php
$value = Filter::of('/_big_ball_of_mud_/')
            ->replace('/', '')
            ->replace('_', '')
            ->upperFirst(true);

// 'Big Ball Of Mud'
```

**An example of a reusable filter grouping:**

```php
$groupFilters = function ($value) {
	return Filter::of($value)->trim()->upperFirst()->append('.');
};

$groupFilters(' wikipedia is a free online encyclopedia');

// 'Wikipedia is a free online encyclopedia.'
```

**Example of value information:**

```php
$info = Filter::of('wikipedia is a free online encyclopedia, created and edited by by volunteers')->info();

$info->length(); // 76
$info->wordsCount(); // 12
$info->phaseCount('ee'); // 2
```

## License

PHP String Filters is released under the MIT Licence. See the bundled LICENSE file for details.

## Author

[@Miłosz Karolczyk](https://www.linkedin.com/in/milosz-karolczyk/)
