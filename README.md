# laravel-useful-helpers
Some useful helpers for Laravel

Laravel 5.3/5.4/5.5/5.6/5.7/5.8/6.0/7.0 compatible

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
* @param null|string $uri    = '/'
* @param string      $method = 'GET'
**/
echo route_name(); // site.home.show
echo route_name(\URL::current()); // site.home.show
echo route_name('cms/user/1/delete', 'DELETE'); // cms.user.delete
```

### Check if the given route name match the current route name
Just give a string and a boolean will be returned if the given route name has a match for the current route name.
```php
/**
 * Check if the given route name is or are the same as the current route
 *
 * @param  string $route
 * @return boolean
 */
if (active_route('cms.post.*')) { ...
```

### Check if the given URI match the current URI
You have two options:
- Check if the given URI matches only a part of the current URI
- Check if the given URI matches the current URI exactly
```php
/**
 * Check if the current uri contains the given uri
 *
 * @param  string  $uri
 * @param  boolean $strict
 * @return boolean
 */
if (activeUri('posts')) { ...
if (activeUri('posts', true)) { ...
```
