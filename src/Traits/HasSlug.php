<?php

namespace dmitryrogolev\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Добавляет модели функционал, облегчающий работу с аттрибутом "slug".
 */
trait HasSlug
{
    /**
     * Имя аттрибута "slug".
     */
    protected string $slugName = 'slug';

    /**
     * Возвращает имя аттрибута "slug".
     */
    public function getSlugName(): string
    {
        return $this->slugName;
    }

    /**
     * Изменяет имя аттрибута "slug".
     */
    public function setSlugName(string $name): static
    {
        $this->slugName = $name;

        return $this;
    }

    /**
     * Возвращает значение аттрибута "slug".
     */
    public function getSlug(): string
    {
        return $this->attributes[$this->getSlugName()];
    }

    /**
     * Изменяет значение аттрибута "slug".
     *
     * @return void
     */
    public function setSlug(string $value): static
    {
        $this->attributes[$this->getSlugName()] = static::toSlug($value);

        return $this;
    }

    /**
     * При записи аттрибута "slug" приводит его к формату slug'а.
     */
    public function setSlugAttribute(string $value): void
    {
        $this->attributes[$this->getSlugName()] = static::toSlug($value);
    }

    /**
     * Возвращает модель по его slug'у.
     */
    public static function findBySlug(string $slug): ?Model
    {
        return static::where(app(static::class)->getSlugName(), static::toSlug($slug))->first();
    }

    /**
     * Приводит переданную строку к "slug" значению.
     *
     * @param  string  $str Входная строка.
     * @param  string  $separator ['-'] Строковый разделитель.
     * @param  string  $language ['en'] Язык или локаль исходной строки. Могут быть указаны для транслитерации в зависимости от языка
     * в любом из следующих форматов: en, en_GB или en-GB.
     * @param  array  $dictionary ['@'=>'at'] Словарь.
     */
    public static function toSlug(string $str, ?string $separator = '-', ?string $language = 'en', ?array $dictionary = ['@' => 'at']): string
    {
        return Str::slug($str, $separator, $language, $dictionary);
    }
}
