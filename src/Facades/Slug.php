<?php

namespace dmitryrogolev\Slug\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Фасад для работы с пакетом "Slug".
 */
class Slug extends Facade
{
    /**
     * Получить зарегистрированное имя компонента.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'slug';
    }
}
