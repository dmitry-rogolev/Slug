<?php

namespace dmitryrogolev\Slug\Traits;

use dmitryrogolev\Slug\Facades\Slug;
use Illuminate\Database\Eloquent\Model;

/**
 * Добавляет модели функционал, облегчающий работу с аттрибутом "slug".
 */
trait HasSlug
{
    /**
     * Имя аттрибута "slug".
     *
     * @var string
     */
    protected string $slugName;

    /**
     * Возвращает имя аттрибута "slug".
     *
     * @return string
     */
    public function getSlugName(): string
    {
        return isset($this->slugName) ? $this->slugName : Slug::default();
    }

    /**
     * Изменяет имя аттрибута "slug".
     *
     * @param string $name
     * @return static
     */
    public function setSlugName(string $name): static
    {
        $this->slugName = $name;

        return $this;
    }

    /**
     * Возвращает значение аттрибута "slug".
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->attributes[$this->getSlugName()];
    }

    /**
     * Изменяет значение аттрибута "slug".
     *
     * @param string $value
     * @return void
     */
    public function setSlug(string $value): static
    {
        $this->attributes[$this->getSlugName()] = Slug::from($value);

        return $this;
    }

    /**
     * При записи аттрибута "slug" приводит его к формату slug'а.
     *
     * @param string $value
     * @return void
     */
    public function setSlugAttribute(string $value): void
    {
        $this->attributes[$this->getSlugName()] = Slug::from($value);
    }

    /**
     * Возвращает модель по его slug'у.
     * 
     * @param string $slug
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function findBySlug(string $slug): Model|null
    {
        return static::where(app(static::class)->getSlugName(), Slug::from($slug))->first();
    }
}
