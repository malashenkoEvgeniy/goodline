<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslate extends Model
{
    protected $table = 'product_translates';
    protected $guarded = [];

    public function product(){
    	return $this->belongsTo('App\Models\Product');
    }
}
