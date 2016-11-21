# laravel-useful-helpers
Some useful helpers for Laravel

Laravel 5.3 compatible

```php
/**
* Generate a password without i o 0 I l L etc.
**/
echo user_friendly_password($length = 9, $add_dashes = false, $available_sets = 'lud');
```
