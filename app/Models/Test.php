<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Test extends Model
{
    use HasTranslations;
    use HasFactory;

    protected $guarded = [];
    public $translatable = ["title", "content", "slug"];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $field = $field ?? $this->getRouteKeyName();

        return $query->where("{$field}->{$this->getLocale()}", $value);
    }
}
