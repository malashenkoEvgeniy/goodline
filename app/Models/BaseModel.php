<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $translateTable;

    public function translate($language = null){

        if ($language == 'all') { // получить все переводы
            $response = $this->hasMany($this->translateTable)->get();
            return $response;
        }

        if ($language == null) { // Если язык не выбран установить текущий
    		$language = App::getLocale();
        }

        $response = $this->hasMany($this->translateTable)->where('language',$language)->first();

        if($response === null){
            $response = $this->hasMany($this->translateTable)->where('language','ru')->first();
        }

        return $response;
    }
}
