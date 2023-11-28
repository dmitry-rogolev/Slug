<?php

namespace dmitryrogolev\Slug\Tests\Feature\Traits;

use dmitryrogolev\Slug\Tests\TestCase;
use dmitryrogolev\Slug\Traits\HasConfig;

/**
 * Тестируем функционал доступа к конфигурации.
 */
class HasConfigTest extends TestCase
{
    /**
     * Есть ли метод, возвращающий и изменяющий имя slug'а?
     *
     * @return void
     */
    public function test_default(): void
    {
        // Сравниваем возвращаемое значение с конфигурацией.
        $this->assertEquals(config('slug.default'), Config::default());

        // Изменяем конфигурацию.
        $value = 'my_slug_name';
        Config::default($value);
        $this->assertEquals($value, Config::default());
    }

    /**
     * Есть ли метод, возвращающий и изменяющий разделитель строк?
     *
     * @return void
     */
    public function test_separator(): void
    {
        // Сравниваем возвращаемое значение с конфигурацией.
        $this->assertEquals(config('slug.separator'), Config::separator());

        // Изменяем конфигурацию.
        $value = '.';
        Config::separator($value);
        $this->assertEquals($value, Config::separator());
    }

    /**
     * Есть ли метод, возвращающий и изменяющий языковой код ASCII символов?
     *
     * @return void
     */
    public function test_language(): void
    {
        // Сравниваем возвращаемое значение с конфигурацией.
        $this->assertEquals(config('slug.language'), Config::language());

        // Изменяем конфигурацию.
        $value = 'ru';
        Config::language($value);
        $this->assertEquals($value, Config::language());
    }

    /**
     * Есть ли метод, возвращающий и изменяющий словарь?
     *
     * @return void
     */
    public function test_dictionary(): void
    {
        // Сравниваем возвращаемое значение с конфигурацией.
        $this->assertEquals(config('slug.dictionary'), Config::dictionary());

        // Изменяем конфигурацию.
        $value = [
            '#' => 'hash',
            '@' => 'dog',
            '$' => 'dollar',
        ];
        Config::dictionary($value);
        $this->assertEquals($value, Config::dictionary());
    }
}

class Base
{
    use HasConfig;
}

class Config
{
    public static function __callStatic($method, $args)
    {
        return (new Base)->{$method}(...$args);
    }
}
