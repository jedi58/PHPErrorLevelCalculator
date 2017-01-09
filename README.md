# PHPErrorLevelCalculator
Class for converting PHP constants for error levels from integers to strings and vice-versa.

[![Build Status](https://travis-ci.org/jedi58/PHPErrorLevelCalculator.svg?branch=master)](https://travis-ci.org/jedi58/PHPErrorLevelCalculator)
[![Code Climate](https://codeclimate.com/github/jedi58/PHPErrorLevelCalculator/badges/gpa.svg)](https://codeclimate.com/github/jedi58/PHPErrorLevelCalculator)

## Examples
```php
ErrorLevelCalculator::toString(32767);
```
This will return the string `E_ALL`. It is also possible to construct more complicated examples such as:

```php
ErrorLevelCalculator::toString(32765);
```
This will return `E_ALL & ~E_WARNING`. In addition to this, they can be built as:

```php
ErrorLevelCalculator::toString(3);
```
This would return `E_ERROR | E_WARNING`.


The opposite of this is also true, the following:

```php
ErrorLevelCalculator::toCode('E_ERROR | E_WARNING');
```

Would return `3`.
