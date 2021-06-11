<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsTranslate extends Model
{
    protected $table = 'about_us_translates';
    protected $guarded = [];

    public function aboutUs(){
    	return $this->belongsTo('App\Models\AboutUs');
    }
}
