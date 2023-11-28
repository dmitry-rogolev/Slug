<?php

namespace dmitryrogolev\Slug\Tests\Feature\Console\Commands;

use dmitryrogolev\Slug\Tests\TestCase;

/**
 * Тестируем команду установки пакета "Slug".
 */
class InstallCommandTest extends TestCase
{
    /**
     * Запускается ли команда?
     *
     * @return void
     */
    public function test_run(): void
    {
        $this->artisan('slug:install')->assertOk();
        $this->artisan('slug:install --config')->assertOk();
    }
}
