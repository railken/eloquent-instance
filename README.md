<h1 align="left">Eloquent Instance</h1>

[![Actions Status](https://github.com/railken/eloquent-instance/workflows/Test/badge.svg)](https://github.com/railken/eloquent-instance/actions)

A simple trait that will enable your eloquent models to use instance of models instead of classes. Why? Because otherwise it would be impossible to relate two models defined and stored in the database.

## Requirements

PHP 7.2 and laravel 5.8

## Installation

You can install it via [Composer](https://getcomposer.org/) by typing the following command:

```bash
composer require railken/eloquent-instance
```


## Usage

Simple include `Railken\EloquentInstance\HasRelationships` in your model and start using 

```php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Railken\EloquentInstance\HasRelationships;

class Author extends Model
{
	use HasRelationships;
	
    public function books()
    {
    	$book = new Book();
    	$book->setTable('book_custom');

        return $this->hasMany($book);
    }
}
```
