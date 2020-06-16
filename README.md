# The Magic DTO

This library provides functionality to access the class property with setter and getter functions call without implementing them.

## Installation

Use the package manager [composer](https://getcomposer.org/doc/00-intro.md) to install The-Magic-DTO.

```bash
composer require akef/the-magic-dto
```

## Usage

just you need to use this trait in your class:
```php
use \Akef\MDTO\SetAndGetProvider;
```
or call The magic class in your class ```__call``` magic function like:
```php
public function __call($name, $arguments)
{
    return (new \Akef\MDTO\MagicManager())->init($this, $name, $arguments)->run();
}
```
## Example
```php
require 'vendor/autoload.php';

class Test
{
    use \Akef\MDTO\SetAndGetProvider;
    
    private $foo;
}

$testObject = new test();

$test->setFoo('It is working!');
$fooValue = $testObject->getFoo();
echo $fooValue; //It is working!
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update the tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
