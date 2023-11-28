<?php

namespace dmitryrogolev\Slug\Tests;

use dmitryrogolev\Slug\Providers\SlugServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Получить поставщиков пакета.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string<\Illuminate\Support\ServiceProvider>>
     */
    protected function getPackageProviders($app): array
    {
        return [
            SlugServiceProvider::class,
        ];
    }
}
