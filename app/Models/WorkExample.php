<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExample extends BaseModel
{
    protected $translateTable = "App\Models\WorkExampleTranslate";

    protected $table = 'work_examples';
    protected $guarded = [];

	public function workExampleTranslate()
    {
        return $this->hasMany('App\Models\WorkExampleTranslate');
    }

    public function workExampleImages()
    {
        return $this->hasMany('App\Models\WorkExampleImage');
    }
}
