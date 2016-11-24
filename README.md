# laravel-useful-helpers
Some useful helpers for Laravel

Laravel 5.3 compatible

```
composer require daltcore/laravel-useful-helpers dev-master
```

### Generate user friendly passwords
So use's are not confused anymore with some characters. This is a know problem
with people who can't see correct.
```php
/**
* Generate a password without i o 0 I l L etc.
**/
echo user_friendly_password($length = 9, $add_dashes = false, $available_sets = 'lud');
```

### URL to Route name
Get the route name for the url that's given. Might be handy some times.
```php
/**
* In case of named routes, you can use this function to transform the uri '/' to web.home.index
**/
echo route_name(\URL::current()); // site.home.show
```
