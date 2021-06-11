<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTranslate extends Model
{
    protected $table = 'page_translates';
    protected $guarded = [];

    public function pageTranslate()
    {
        return $this->belongsTo('App\Models\Page');
    }
}
