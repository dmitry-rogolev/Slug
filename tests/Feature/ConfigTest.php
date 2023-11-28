<?php

namespace dmitryrogolev\Slug\Tests\Feature;

use dmitryrogolev\Slug\Tests\TestCase;

/**
 * Тестируем параметры конфигурации.
 */
class ConfigTest extends TestCase
{
    /**
     * Есть ли конфигурация имени slug'а?
     *
     * @return void
     */
    public function test_default(): void
    {
        $this->assertTrue(is_string(config('slug.default')));
        $this->assertNotEmpty(config('slug.default'));
    }

    /**
     * Есть ли конфигурация разделителя строк?
     *
     * @return void
     */
    public function test_separator(): void
    {
        $this->assertTrue(is_string(config('slug.separator')));
        $this->assertNotEmpty(config('slug.separator'));
    }

    /**
     * Есть ли конфигурация языкового кода ASCII символов?
     *
     * @return void
     */
    public function test_language(): void
    {
        $this->assertTrue(is_string(config('slug.language')));
        $this->assertNotEmpty(config('slug.language'));
    }

    /**
     * Есть ли конфигурация словаря?
     *
     * @return void
     */
    public function test_dictionary(): void
    {
        $this->assertTrue(is_array(config('slug.dictionary')));
    }
}
