# laravel-useful-helpers
Some useful helpers for Laravel

Laravel 5.3/5.4 compatible

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

### Check if the given route name(s) match the current route name
Just give a string or an array with string or multiple params and a boolean will be returned if the given route name(s) has a match for the current route name.
```php
/**
 * Check if the given route name(s) is or are the same as the current route
 *
 * @param  mixed $array
 * @return boolean
 */
if(activeRoute('posts.index')) { ...
if(activeRoute('posts.index', 'posts.show', ...)) { ...
if(activeRoute(['posts.index', 'posts.show', ...])) { ...
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
if(activeUri('posts')) { ...
if(activeUri('posts', true)) { ...
```
