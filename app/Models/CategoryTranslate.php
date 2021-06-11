<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslate extends Model
{
    protected $table = 'category_translates';
    protected $guarded = [];

    public function category(){
    	return $this->belongsTo('App\Models\Category');
    }
}
