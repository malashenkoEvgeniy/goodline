<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $translateTable;



    public function translate()
    {
        $locale = App::getLocale();

        $response = $this->hasMany($this->translateTable)->where('language', $locale)->first();

        if ($response === null) {
            $response = $this->hasMany($this->translateTable)->where('language', 'en')->first();
        }

        if ($response === null) {
            $response = $this->hasMany($this->translateTable)->where('language', 'ua')->first();
        }

        if ($response === null) {
            $response = $this->hasMany($this->translateTable)->where('language', 'ru')->first();
        }

        if ($response === null) {
            App::abort(404);
        }

        return $response;
    }


    public function translations()
    {
        return $this->hasMany($this->translateTable);
    }
}
