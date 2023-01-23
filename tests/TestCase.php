<?php

namespace Tests;

use Illuminate\Database\SQLiteConnection;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        $db = app()->make('db');
        if($db->connection() instanceof SQLiteConnection){
            $db->getSchemaBuilder()->enableForeignKeyConstraints();
        }
        $this->withHeaders([
            'Accept' => 'application/json'
        ]);
    }
}
