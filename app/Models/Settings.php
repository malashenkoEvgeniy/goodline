<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends BaseModel
{
    protected $translateTable = "App\Models\SettingsTranslate";

    protected $table = 'settings';
    protected $guarded = [];

    public function settingsTranslate()
    {
        return $this->hasMany('App\Models\SettingsTranslate');
    }
}
