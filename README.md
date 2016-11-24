# laravel-useful-helpers
Some useful helpers for Laravel

Laravel 5.3 compatible

```
composer require daltcore/laravel-useful-helpers dev-master
```

```php
/**
* Generate a password without i o 0 I l L etc.
**/
echo user_friendly_password($length = 9, $add_dashes = false, $available_sets = 'lud');
```

```php
/**
* In case of named routes, you can use this function to transform the uri '/' to web.home.index
echo route_name('/'); // web.home.index
```
