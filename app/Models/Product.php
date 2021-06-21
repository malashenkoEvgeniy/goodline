<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

class Product extends BaseModel
{
    use Sluggable;
    protected $translateTable = "App\Models\ProductTranslate";

    protected $table = 'products';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'url' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Category')->using('App\Models\CategoryProduct');
    }

    public function productTranslate()
    {
        return $this->hasMany('App\Models\ProductTranslate');
    }


    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function properties()
    {
        return $this->belongsToMany(Characteristics::class);
    }

}
