<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

class Page extends BaseModel
{
    use Sluggable;
    protected $translateTable = "App\Models\PageTranslate";

    protected $table = 'pages';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'url' => [
                'source' => 'title'
            ]
        ];
    }

    public function pageTranslate()
    {
        return $this->hasMany('App\Models\PageTranslate');
    }
}
