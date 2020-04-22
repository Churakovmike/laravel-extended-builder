## Laravel form typecasting
This package is a good way to organize subqueries of your models.
### Requirements
+ laravel 5.5+

## Getting started
### Install
The package is available on packagist.
```php
composer require churakovmike/laravel-extended-builder
```

### Usage

1. You need to create a class that will be inherited from ChurakovMike\ExtendedBuilder\ExtendedQuery as an example

```php
<?php

namespace App;

use ChurakovMike\ExtendedBuilder\ExtendedQuery;

/**
 * Class UserQuery
 * @package App
 *
 * @property string $modelClass
 */
class UserQuery extends ExtendedQuery
{
    public function isActive()
    {
        return $this->where('status', true);
    }
    
    public function hasName($name)
    {
        return $this->where('name', $name);
    }
}

```

2. Then you need to add a method to the main model that will call query builder.
```php
<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    public static function where()
    {
        return new \App\UserQuery(get_called_class());
    }
}
```

3. Now you can call subqueries from extended query, as well as use regular Bulder methods, see an example
```php
$user = User::where()
        ->isActive()
        ->first();
```
Function call chain example:
```php
$user = User::where()
        ->isActive()
        ->hasName('Mike')
        ->first();
```
