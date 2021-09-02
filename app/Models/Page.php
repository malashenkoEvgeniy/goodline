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

    public function media()
    {
        return $this->morphOne(Media::class, 'imageable');
    }

    public function pageTranslate()
    {
        return $this->hasMany('App\Models\PageTranslate');
    }

    public function page_parent()
    {
        return $this->belongsTo('App\Models\Page', 'parent_id');
    }

    public function getKids()
    {
        return $this->hasMany('App\Models\Page', 'parent_id');
    }

//    public function hasKids(): bool
//    {
//        return count($this->getKids()) > 0;
//    }
}
