<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExampleTranslate extends Model
{
    protected $table = 'work_example_translates';
    protected $guarded = [];

	public function workExample()
    {
        return $this->belongTo('App\Models\WorkExample');
    }
}
