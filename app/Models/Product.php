<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    protected $translateTable = "App\Models\ProductTranslate";

    protected $table = 'products';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsToMany('App\Models\Category')->using('App\Models\CategoryProduct');
    }

    public function productTranslate()
    {
        return $this->hasMany('App\Models\ProductTranslate');
    }

    public function productColors()
    {
        return $this->hasMany('App\Models\ProductColor');
    }

    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

}
