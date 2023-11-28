<?php

namespace dmitryrogolev\Slug\Services;

use dmitryrogolev\Slug\Traits\HasConfig;
use Illuminate\Support\Str;

/**
 * Сервис работы с пакетом "Slug".
 */
class Service
{
    use HasConfig;

    /**
     * Возвращает "slug" из переданной строки.
     *
     * @param string $str
     * @param string|null $separator
     * @param string|null $language
     * @param array|null $dictionary
     * @return string
     */
    public function from(string $str, string $separator = null, string $language = null, array $dictionary = null): string
    {
        return Str::slug(
            $str,
            ! is_null($separator) ? $separator : $this->separator(),
            ! is_null($language) ? $language : $this->language(),
            ! is_null($dictionary) ? $dictionary : $this->dictionary(),
        );
    }
}
