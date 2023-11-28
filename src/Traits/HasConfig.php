<?php

namespace dmitryrogolev\Slug\Traits;

/**
 * Конфигурация пакета "Slug".
 */
trait HasConfig
{
    /**
     * Имя slug'а по умолчанию.
     * 
     * Используется, например, для именования столбца в таблице.
     *
     * @param string|null $value
     * @return string|null
     */
    public function default(string|null $value = null): string|null
    {
        if (! is_null($value)) {
            config(['slug.default' => $value]);
        }

        return config('slug.default');
    }

    /**
     * Строковый разделитель. 
     * 
     * Используется для разделения slug'а на подстроки.
     *
     * @param string|null $value
     * @return string|null
     */
    public function separator(string|null $value = null): string|null
    {
        if (! is_null($value)) {
            config(['slug.separator' => $value]);
        }

        return config('slug.separator');
    }

    /**
     * Языковой код ASCII исходной строки. 
     * 
     * Используется для преобразования строки к ASCII строке.
     * 
     * @link https://clck.ru/36q9mU ASCII языковые коды.
     *
     * @param string|null $value
     * @return string|null
     */
    public function language(string|null $value = null): string|null
    {
        if (! is_null($value)) {
            config(['slug.language' => $value]);
        }

        return config('slug.language');
    }

    /**
     * Словарь. 
     * 
     * При приведении строки к slug'у, все подстроки, 
     * являющиеся ключами данного массива, будут заменены на их значения. 
     *
     * @param array|null $value
     * @return array|null
     */
    public function dictionary(array|null $value = null): array|null
    {
        if (! is_null($value)) {
            config(['slug.dictionary' => $value]);
        }

        return config('slug.dictionary');
    }
}
