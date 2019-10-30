# Hotmart SDK PHP Unofficial

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
###### Scrutinizer
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wesleydeveloper/hotmart/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/wesleydeveloper/hotmart/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/wesleydeveloper/hotmart/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Build Status](https://scrutinizer-ci.com/g/wesleydeveloper/hotmart/badges/build.png?b=master)](https://scrutinizer-ci.com/g/wesleydeveloper/hotmart/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/wesleydeveloper/hotmart/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/wesleydeveloper/hotmart/?branch=master)

SDK PHP for connection to the Hotmart API. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer
``` bash
$ composer require wesleydeveloper/hotmart
```
## Configuration
Create array settings
```php
    use Wesleydeveloper\Hotmart\Hotmart;
    
   $config = [
       'client_id' => '[YOUR_CLIENT_ID]',
       'client_secret' => '[YOUR_CLIENT_SECRET]',
       'basic' => '[YOUR_BASIC]'
   ];

   $hotmart = new Hotmart($config);
   var_dump($hotmart->getLoggedUser());
```
or set variables
```php
   use Wesleydeveloper\Hotmart\Hotmart;

   $client_id = '[YOUR_CLIENT_ID]';
   $client_secret = '[YOUR_CLIENT_SECRET]';
   $basic = '[YOUR_BASIC]';
   
   $hotmart = new Hotmart();
   $hotmart->setConfig($client_id, $client_secret, $basic);
   var_dump($hotmart->getLoggedUser()); 
```
## Usage
### Hotmart
This is the class where you have to focus. It is connected to the API connection class, Support\HotConnect.

All required and optional parameters are documented in class /path-to-project/vendor/wesleydeveloper/hotmart/src/Hotmart.php
#### Examples
```php
   var_dump($hotmart->getHotlinks());
```
## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Wesley Silva][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/wesleydeveloper/hotmart.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/wesleydeveloper/hotmart.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/wesleydeveloper/hotmart/master.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/wesleydeveloper/hotmart
[link-downloads]: https://packagist.org/packages/wesleydeveloper/hotmart
[link-travis]: https://travis-ci.org/wesleydeveloper/hotmart
[link-author]: https://github.com/wesleydeveloper
[link-contributors]: ../../contributors