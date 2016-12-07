# [Folder Creator](https://github.com/helionogueir/foldercreator)

A simple library for read, create, manipulate folders / directories.

## Installation

Composer (https://getcomposer.org/) and (https://packagist.org/)
```sh
composer require helionogueir/foldercreator
```
------
## Usage

### helionogueir\foldercreator\folder\Create

Tool for create directory
```php
use helionogueir\foldercreator\folder\Create;
$pathname = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "helionogueir_foldercreator_folder_create;";
(new Create())->mkdir($pathname);
```
------
### helionogueir\foldercreator\folder\Delete

Tool for create directory
```php
use helionogueir\foldercreator\folder\Delete;
$pathname = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "helionogueir_foldercreator_folder_create;";
(new Delete())->rm($pathname);
```
------
### helionogueir\foldercreator\tool\AccessMode

Tool for create directory
```php
use helionogueir\foldercreator\tool\AccessMode;
use helionogueir\foldercreator\folder\Create;
$pathname = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "helionogueir_foldercreator_folder_create;";
(new Create())->mkdir($pathname, AccessMode::MOD_0777);
```
------
### helionogueir\foldercreator\tool\Path

Tool for create directory
```php
use helionogueir\foldercreator\tool\Path;
$pathname = "pathnam/to\\file/or\\directory";
echo Path::replaceOSSeparator($pathname);
```
------
## TDD (Test Driven Development)

PHPUnit (https://phpunit.de/)
```sh
phpunit -c ./foldercreator/tests/unit.xml
```
