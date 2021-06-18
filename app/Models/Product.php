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


    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function properties()
    {
        return $this->belongsToMany(Characteristics::class);
    }

}
