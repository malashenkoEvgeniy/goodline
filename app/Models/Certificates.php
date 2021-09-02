<?php

namespace App\Models;


class Certificates extends BaseModel
{
    protected $table = 'certificates';
    protected $guarded = [];
    protected $translateTable = CertificatesTranslate::class;

    public function media()
    {
        return $this->morphOne(Media::class, 'imageable');
    }
}
