# JSON5-php

[![Build status](https://img.shields.io/travis/Hiroto-K/JSON5-php/master.svg?style=flat-square)](https://travis-ci.org/Hiroto-K/JSON5-php)
[![License](https://img.shields.io/github/license/Hiroto-K/JSON5-php.svg?style=flat-square)](https://github.com/Hiroto-K/JSON5-php/blob/master/LICENSE)
![](https://img.shields.io/badge/platform-Console-808080.svg?style=flat-square)

JSON5 parser for PHP.This library using [kujirahand/JSON5-PHP](https://github.com/kujirahand/JSON5-PHP) as reference.

## Requirements
- PHP 5.5.11 or later
- Composer
- JSON extension
- mbstring extension

## Features
- Parse JSON5 string
- Parse JSON5 by file

## Install
Use composer.

### 1, Download this library
Modify require directive in ``composer.json``.

```json
{
  "require": {
    "hiroto-k/json5-php": "~1.0"
  }
}
```

### 2, Load ``vendor/autoload.php`` file
Please add ``require "vendor/autoload.php"`` in your php file.

### 3, Use ``JSON5`` class
Example
```php
<?php
require "vendor/autoload.php";

use HirotoK\JSON5\JSON5;

$json5_string = "{hoge: 'foo',}";

// Return 'stdClass'
$json_object = JSON5::decode($json5_string);

// Return 'array'
$json_array = JSON5::decode($json5_string, true);


$json5_file = "./tests/files/example.json5";

// Pass file name or SplFileObject.
// Return 'stdClass'
$json_object = JSON5::decodeFile($json5_file);
$json_object = JSON5::decodeFile(new SplFileObject($json5_file));

// Return 'array'
$json_array = JSON5::decodeFile($json5_file, true);
$json_array = JSON5::decodeFile(new SplFileObject($json5_file), true);
```

## License
[MIT License](https://github.com/Hiroto-K/JSON5-php/blob/master/LICENSE "MIT License")