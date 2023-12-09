<?php

namespace dmitryrogolev\Slug\Tests\Feature\Traits;

use dmitryrogolev\Slug\Tests\Models\Item;
use dmitryrogolev\Slug\Tests\RefreshDatabase;
use dmitryrogolev\Slug\Tests\TestCase;

/**
 * Тестируем функционал, упрощающий работу с аттрибутом "slug".
 */
class HasSlugTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Есть ли метод, возвращающий имя столбца "slug"?
     */
    public function test_get_slug_name(): void
    {
        $model = app(Item::class);
        $this->assertEquals('slug', $model->getSlugName());
    }

    /**
     * Есть ли метод, изменяющий имя столбца "slug"?
     */
    public function test_set_slug_key(): void
    {
        $model = app(Item::class);
        $model->setSlugName('url');
        $this->assertEquals('url', $model->getSlugName());
    }

    /**
     * Есть ли метод, возвращающий значение slug'а?
     */
    public function test_get_slug(): void
    {
        $model = $this->generate(Item::class);
        $this->assertEquals($model->slug, $model->getSlug());
    }

    /**
     * Есть ли метод, изменяющий значение slug'а?
     */
    public function test_set_slug(): void
    {
        $model = $this->generate(Item::class);

        $model->setSlug('My slug');
        $this->assertEquals('my-slug', $model->getSlug());
    }

    /**
     * Есть ли статический метод поиска модели по его "slug"?
     */
    public function test_find_by_slug(): void
    {
        $slug = 'My slug';
        $item = $this->generate(Item::class, ['slug' => $slug]);

        // ! ||--------------------------------------------------------------------------------||
        // ! ||                          Подтверждаем возврат модели.                          ||
        // ! ||--------------------------------------------------------------------------------||

        $model = Item::findBySlug($slug);
        $this->assertInstanceOf(Item::class, $model);

        // ! ||--------------------------------------------------------------------------------||
        // ! ||                                 Передаем slug.                                 ||
        // ! ||--------------------------------------------------------------------------------||

        $model = Item::findBySlug($slug);
        $this->assertTrue($item->is($model));

        // ! ||--------------------------------------------------------------------------------||
        // ! ||                     Передаем отсутствующий в таблице slug.                     ||
        // ! ||--------------------------------------------------------------------------------||

        $model = Item::findBySlug('undefined');
        $this->assertNull($model);

        // ! ||--------------------------------------------------------------------------------||
        // ! ||               Подтверждаем количество выполненных запросов к БД.               ||
        // ! ||--------------------------------------------------------------------------------||

        $this->resetQueryExecutedCount();
        $model = Item::findBySlug($slug);
        $this->assertQueryExecutedCount(1);
    }
}
