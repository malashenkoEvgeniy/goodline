<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends BaseModel
{
   	protected $translateTable = "App\Models\AboutUsTranslate";

    protected $table = 'about_us';
    protected $guarded = [];

    public function aboutUsTranslates(){
    	return $this->hasMany('App\Models\AboutUsTranslate');
    }

    public function aboutUsItems(){
    	return $this->hasMany('App\Models\AboutUsItems');
    }
}
