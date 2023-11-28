<?php

namespace dmitryrogolev\Slug\Tests\Database\Factories;

use dmitryrogolev\Slug\Facades\Slug;
use dmitryrogolev\Slug\Tests\Models\Item;
use Orchestra\Testbench\Factories\UserFactory as TestbenchUserFactory;

/**
 * Фабрика модели, имеющей аттрибут "slug".
 */
class ItemFactory extends TestbenchUserFactory
{
    /**
     * Имя модели.
     *
     * @var \dmitryrogolev\Slug\Tests\Models\Item
     */
    protected $model = Item::class;

    /**
     * Устанавливает состояние модели по умолчанию.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->title();

        return [
            'slug' => Slug::from($title),
        ];
    }
}