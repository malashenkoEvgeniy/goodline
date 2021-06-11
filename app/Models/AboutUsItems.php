<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsItems extends BaseModel
{
    protected $translateTable = "App\Models\AboutUsItemsTranslate";

    protected $table = 'about_us_items';
    protected $guarded = [];

    public function aboutUsItemsTranslate(){
    	return $this->hasMany('App\Models\AboutUsItemsTranslate');
    }

    public function aboutUs(){
    	return $this->belongsTo('App\Models\AboutUs');
    }
}
