<?php

namespace dmitryrogolev\Is\Tests\Feature\Services;

use dmitryrogolev\Slug\Facades\Slug;
use dmitryrogolev\Slug\Tests\RefreshDatabase;
use dmitryrogolev\Slug\Tests\TestCase;

/**
 * Тестируем сервис работы с таблицей ролей.
 */
class ServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Есть ли метод, возвращающий "slug" из переданного значения?
     *
     * @return void
     */
    public function test_from(): void
    {
        $this->assertEquals('eto-moi-slag', Slug::from('Это мой слаг.'));
        $this->assertEquals('it-is-my-slug', Slug::from('it_is_my_slug.'));
        $this->assertEquals('it-is-my-slug', Slug::from('it-is-my-slug'));
        $this->assertEquals('it-is-my-slug', Slug::from('it is my slug'));
        $this->assertEquals('it+is+my+slug', Slug::from('it, is, my, slug', '+'));
    }
}
