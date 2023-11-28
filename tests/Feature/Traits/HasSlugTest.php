<?php

namespace dmitryrogolev\Slug\Tests\Feature\Traits;

use dmitryrogolev\Slug\Facades\Slug;
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
     *
     * @return void
     */
    public function test_get_slug_name(): void
    {
        $this->assertEquals(Slug::default(), app(Item::class)->getSlugName());
    }

    /**
     * Есть ли метод, изменяющий имя столбца "slug"?
     *
     * @return void
     */
    public function test_set_slug_key(): void
    {
        $model = app(Item::class);
        $model->setSlugName('some_name');
        $this->assertEquals('some_name', $model->getSlugName());
    }

    /**
     * Есть ли метод, возвращающий значение slug'а?
     *
     * @return void
     */
    public function test_get_slug(): void
    {
        $this->runLaravelMigrations();
        Slug::separator('-');

        $model                          = app(Item::class);
        $model->{$model->getSlugName()} = 'my slug';
        $this->assertEquals('my-slug', $model->getSlug());
    }

    /**
     * Есть ли метод, изменяющий значение slug'а?
     *
     * @return void
     */
    public function test_set_slug(): void
    {
        $model = app(Item::class);
        $model->setSlug('My slug');
        $this->assertEquals('my-slug', $model->getSlug());
    }

    /**
     * Есть ли статический метод поиска модели по его "slug"?
     *
     * @return void
     */
    public function test_find_by_slug(): void
    {
        $model = Item::factory()->create(['slug' => 'My slug']);
        $this->assertEquals('my-slug', $model->getSlug());
        $this->assertTrue($model->is(Item::findBySlug('My slug')));
    }
}
