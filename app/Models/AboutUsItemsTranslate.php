<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsItemsTranslate extends Model
{
    protected $table = 'about_us_items_translates';
    protected $guarded = [];

    public function aboutUsItem(){
    	return $this->belongsTo('App\Models\AboutUsItems');
    }
}
