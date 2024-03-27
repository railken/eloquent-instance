<?php

namespace Railken\EloquentInstance\Tests\Models;

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
