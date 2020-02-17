<?php

namespace Railken\EloquentInstance\Tests;

use Railken\EloquentInstance\Tests\Models\Book;
use Railken\EloquentInstance\Tests\Models\Author;

class RelationshipsTest extends BaseTest
{
    public function testRelationships()
    {
        $author = new Author();
        $author->setTable('author_custom');
        $author->save();

        $this->assertEquals(true, !empty($author->id));

        $book = new Book();
        $book->author_id = $author->id;
        $book->setTable('book_custom');
        $book->save();

        $this->assertQuery('select * from `author_custom` where `author_custom`.`id` = ?', $book->author()->toSql());

        $this->assertEquals(1, $book->newQuery()->count());
        $this->assertEquals(1, $author->newQuery()->count());
    }
}
