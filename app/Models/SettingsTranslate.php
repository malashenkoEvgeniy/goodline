<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsTranslate extends Model
{
    protected $table = 'settings_translates';
    protected $guarded = [];

    public function settings()
    {
        return $this->hasMany('App\Models\Settings');
    }
}
