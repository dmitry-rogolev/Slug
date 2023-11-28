# Slug

Предоставляет функционал для работы со slug'ом во фреймворке Laravel.

**Slug** &mdash; это уникальная строка идентификатор, понятная человеку и содержащая только "безопасные" символы.

## Содержание

1. [Подключение](#подключение)
2. [Установка](#установка)
3. [Использование](#использование)

    - [Модели](#модели)
    - [Фасад](#фасад)

4. [Конфигурация](#конфигурация)

    - [config](#config)
    - [.env](#env)

5. [Лицензия](#лицензия)

## Подключение 

Добавьте ссылку на репозиторий в файл `composer.json`.

    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:dmitry-rogolev/Slug.git"
        }
    ]

Подключите пакет с помощью команды.

    composer require dmitryrogolev/slug

## Установка 

Опубликуйте файл конфигурации с помощью команды.

    php artisan slug:install 

## Использование

### Модели

Для того, упростить работу со столбцом slug в модели, вы можете подключить трейт `dmitryrogolev\Slug\Traits\HasSlug`, реализующий интерфейс `dmitryrogolev\Slug\Contracts\Sluggable`.

    <?php

    namespace App\Models;

    use dmitryrogolev\Slug\Contracts\Sluggable;
    use dmitryrogolev\Slug\Traits\HasSlug;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Item extends Model implements Sluggable
    {
        use HasFactory, HasSlug;

После этого вам будет доступен следующий функционал:

    // Возвращает имя аттрибута "slug".
    $item->getSlugName();

    // Изменяет имя аттрибута "slug".
    $item->setSlugName('url');

    // Возвращает значение аттрибута "slug".
    $item->getSlug();

    // Изменяет значение аттрибута "slug".
    $item->setSlug('my new category'); 
    $item->getSlug(); // my-new-category

    // Изменяет значение аттрибута "slug".
    $item->{$item->getSlugName()} = 'my new category';
    $item->getSlug(); // my-new-category

    // Возвращает модель по его slug'у. 
    $item = Item::findBySlug('My category');
    $item->getSlug(); // my-category

### Фасад 

Для преобразования строки в slug вы можете использовать фасад `dmitryrogolev\Slug\Facades\Slug`.

    Slug::from('It is my slug'); // it-is-my-slug

## Конфигурация 

### config

Если вы опубликовали файл конфигурации, то откройте файл `config/slug.php`.

В нем вы увидите следующие параметры:

    /**
     * * Имя slug'а по умолчанию.
     * 
     * Используется, например, для именования столбца slug'а в таблице.
     */
    'default'    => env('SLUG_DEFAULT', 'slug'),

    /**
     * * Строковый разделитель. 
     * 
     * Используется для разделения slug'а на подстроки.
     * 
     * Например: "It is my slug." => "it-is-my-slug."
     */
    'separator'  => env('SLUG_SEPARATOR', '-'),

    /**
     * * Язык или локаль исходной строки.
     * 
     * Могут быть указаны для транслитерации в зависимости от языка 
     * в любом из следующих форматов: en, en_GB или en-GB.
     * 
     * Например, передача "de" приводит к сопоставлению 
     * "äöü" с "aeoeue", а не "aou", как в других языках.
     * 
     * @link https://clck.ru/FCCse ASCII
     * @link https://clck.ru/36q9mU ASCII языковые коды.
     */
    'language'   => env('SLUG_LANGUAGE', 'en'),

    /**
     * * Словарь. 
     * 
     * При приведении строки к slug'у, все подстроки, 
     * являющиеся ключами данного массива, будут заменены на их значения.  
     */
    'dictionary' => [
        '@' => 'at',
    ],

### .env

Некоторые параметры вы можете настроить в своем `.env` конфиге.

    SLUG_DEFAULT=slug
    SLUG_SEPARATOR=-
    SLUG_LANGUAGE=en

## Лицензия 

Этот пакет является бесплатным программным обеспечением, распространяемым на условиях [лицензии MIT](./LICENSE).
