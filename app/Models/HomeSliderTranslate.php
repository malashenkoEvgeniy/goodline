<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSliderTranslate extends BaseModel
{
	protected $table = 'home_slider_translates';
    protected $guarded = [];

    public function slide(){
    	return $this->belongsTo('App\Models\HomeSlider');
    }
}
