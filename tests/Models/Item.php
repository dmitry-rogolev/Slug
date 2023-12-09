<?php

namespace dmitryrogolev\Slug\Tests\Models;

use dmitryrogolev\Contracts\Sluggable;
use dmitryrogolev\Slug\Tests\Database\Factories\ItemFactory;
use dmitryrogolev\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель, имеющая аттрибут "slug".
 */
class Item extends Model implements Sluggable
{
    use HasFactory, HasSlug;

    /**
     * Атрибуты, для которых разрешено массовое присвоение значений.
     *
     * @var array<string>
     */
    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        array_push($this->fillable, $this->getSlugName());
    }

    /**
     * Возвращает фабрику модели.
     */
    public static function newFactory(): ItemFactory
    {
        return new ItemFactory;
    }
}
