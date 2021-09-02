<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends BaseModel
{
    protected $translateTable = "App\Models\HomeSliderTranslate";

    protected $table = 'home_sliders';
    protected $guarded = [];


    public function sliderTranslates(){
    	return $this->hasMany('App\Models\HomeSliderTranslate');
    }

    public function media()
    {
        return $this->morphOne(Media::class, 'imageable');
    }

}
