<?php

namespace dmitryrogolev\Slug\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase as TestingRefreshDatabase;

trait RefreshDatabase
{
    use TestingRefreshDatabase;

    /**
     * Определите миграцию базы данных.
     */
    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(
            __DIR__.'/database/migrations'
        );
    }
}
