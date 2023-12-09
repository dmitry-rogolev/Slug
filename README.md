# Slug

Предоставляет функционал для работы со slug'ом во фреймворке Laravel.

**Slug** &mdash; это уникальная строка идентификатор, понятная человеку и содержащая только "безопасные" символы.

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

## Использование

### Модели

Для того, упростить работу со столбцом slug в модели, вы можете подключить трейт `dmitryrogolev\Traits\HasSlug` и реализовать интерфейс `dmitryrogolev\Contracts\Sluggable`.

    <?php

    namespace App\Models;

    use dmitryrogolev\Contracts\Sluggable;
    use dmitryrogolev\Traits\HasSlug;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Item extends Model implements Sluggable
    {
        use HasFactory, HasSlug;
    }

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

    // Возвращает модель по его slug'у. 
    $item = Item::findBySlug('My category');
    $item->getSlug(); // my-category

Трейт `dmitryrogolev\Traits\HasSlug` по умолчанию использует метод `slug` помощника `Illuminate\Support\Str` при привидении входной строки к slug'у. Вы можете изменить это поведение, переопределив метод `toSlug`:

    public function toSlug(string $str, ?string $separator = '-', ?string $language = 'en', ?array $dictionary = ['@' => 'at']): string
    {
        return Str::slug($str, $separator, $language, $dictionary);
    }

## Лицензия 

Этот пакет является бесплатным программным обеспечением, распространяемым на условиях [лицензии MIT](./LICENSE).
