# Hotmart Package Laravel Unofficial

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require wesleydeveloper/hotmart
```
Add the service provider to config/app.php in the providers array, or if you're using Laravel 5.5, this can be done via the automatic package discovery.
```php
Wesleydeveloper\Hotmart\HotmartServiceProvider::class
```
If you want you can use the facade. Add the reference in config/app.php to your aliases array.
```php
'Hotmart' => Wesleydeveloper\Hotmart\Facades\Hotmart::class
```
##Configuration
Laravel Hotmart requires connection configuration. To get started, you'll need to publish all vendor assets:
```bash
$ php artisan vendor:publish --provider="Wesleydeveloper\Hotmart\HotmartServiceProvider"
```
You are free to change the configuration file as needed, but the default expected values are below:
```bash
HOTMART_CLIENT=
HOTMART_SECRET=
HOTMART_BASIC=
```
## Usage
###Hotmart
This is the class where you have to focus. It is connected to the API connection class, Support\HotConnect.
#### Examples
```php
   use Wesleydeveloper\Hotmart\Hotmart;
   
   $hotmart = new Hotmart();
   $hotmart->getHistory();
   
```
To use the facade
```php
use Wesleydeveloper\Hotmart\Facades\Hotmart;

Hotmart::getHistory();
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

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/wesleydeveloper/hotmart.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/wesleydeveloper/hotmart.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/wesleydeveloper/hotmart/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/wesleydeveloper/hotmart
[link-downloads]: https://packagist.org/packages/wesleydeveloper/hotmart
[link-travis]: https://travis-ci.org/wesleydeveloper/hotmart
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/wesleydeveloper
[link-contributors]: ../../contributors
