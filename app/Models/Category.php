<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{

    protected $translateTable = "App\Models\CategoryTranslate";

    protected $table = 'categories';
    protected $guarded = [];


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function scopeIsLive($query)
    {
        return $query->where('live', true);
    }

    public function scopeOfSort($query, $sort)
    {
        foreach ($sort as $column => $direction) {
            $query->orderBy($column, $direction);
        }

        return $query;
    }

    public function categoryTranslate(){
        return $this->hasMany('App\Models\CategoryTranslate');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->using('App\Models\CategoryProduct');
    }
}