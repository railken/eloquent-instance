<?php

namespace Railken\EloquentInstance\Tests;

use NilPortugues\Sql\QueryFormatter\Formatter;
use Illuminate\Support\Facades\Schema;

abstract class Base extends \Orchestra\Testbench\TestCase
{
    protected $formatter;

    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');

        Schema::create('book_custom', function ($t) {
            $t->increments('id');
            $t->integer('author_id');
            $t->timestamps();
        });

        Schema::create('author_custom', function ($t) {
            $t->increments('id');
            $t->timestamps();
        });

        $this->formatter = new Formatter();
    }

    public function assertQuery($x, $y)
    {
        $this->assertEquals(
            $this->formatter->format(strtolower(trim(preg_replace('!\s+!', ' ', $x)))),
            $this->formatter->format(strtolower(trim(preg_replace('!\s+!', ' ', $y))))
        );
    }
}
