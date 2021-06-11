<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $table = 'product_colors';
    protected $guarded = [];

    public function product(){
    	return $this->belongsTo('App\Models\Product');
    }
}