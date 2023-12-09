<?php

namespace dmitryrogolev\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Добавляет модели функционал, облегчающий работу с аттрибутом "slug".
 */
interface Sluggable
{
    /**
     * Возвращает имя аттрибута "slug".
     */
    public function getSlugName(): string;

    /**
     * Изменяет имя аттрибута "slug".
     */
    public function setSlugName(string $name): static;

    /**
     * Возвращает значение аттрибута "slug".
     */
    public function getSlug(): string;

    /**
     * Изменяет значение аттрибута "slug".
     *
     * @return void
     */
    public function setSlug(string $value): static;

    /**
     * При записи аттрибута "slug" приводит его к формату slug'а.
     */
    public function setSlugAttribute(string $value): void;

    /**
     * Возвращает модель по его slug'у.
     */
    public static function findBySlug(string $slug): ?Model;

    /**
     * Приводит переданную строку к "slug" значению.
     *
     * @param  string  $str Входная строка.
     */
    public static function toSlug(string $str): string;
}
