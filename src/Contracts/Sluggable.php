<?php

namespace dmitryrogolev\Slug\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Добавляет модели функционал, облегчающий работу с аттрибутом "slug".
 */
interface Sluggable
{
    /**
     * Возвращает имя аттрибута "slug".
     *
     * @return string
     */
    public function getSlugName(): string;

    /**
     * Изменяет имя аттрибута "slug".
     *
     * @param string $name
     * @return static
     */
    public function setSlugName(string $name): static;

    /**
     * Возвращает значение аттрибута "slug".
     *
     * @return string
     */
    public function getSlug(): string;

    /**
     * Изменяет значение аттрибута "slug".
     *
     * @param string $value
     * @return void
     */
    public function setSlug(string $value): static;

    /**
     * При записи аттрибута "slug" приводит его к формату slug'а.
     *
     * @param string $value
     * @return void
     */
    public function setSlugAttribute(string $value): void;

    /**
     * Возвращает модель по его slug'у.
     * 
     * @param string $slug
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function findBySlug(string $slug): Model|null;
}
