<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'content' => 'string',
        'template' => 'string',
    ];

    protected $fillable = ['name', 'slug', 'content', 'template'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
