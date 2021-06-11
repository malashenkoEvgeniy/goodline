<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExampleImage extends Model
{
    protected $table = 'work_example_images';
    protected $guarded = [];

	public function workExample()
    {
        return $this->belongTo('App\Models\WorkExample');
    }
}
