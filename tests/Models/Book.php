<?php

namespace Railken\EloquentInstance\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Railken\EloquentInstance\HasRelationships;

class Book extends Model
{
    use HasRelationships;

    public function author()
    {
        $author = new Author();
        $author->setTable('author_custom');

        return $this->belongsTo($author);
    }
}
