<?php

namespace App\Models;

class Characteristics extends BaseModel
{
    protected $table = 'characteristics';
    protected $guarded = [];
    protected $translateTable = CharacteristicsTranslations::class;
}
