<?php

namespace App\Services;

class ProductService
{
    const STORE_PATH = '/uploads/';
    const PARAMETERS = [
        'img_d_w' => 350,
        'img_d_h' => 259,
        'img_t_w' => 365,
        'img_t_h' => 330,
        'img_m_w' => 350,
        'img_m_h' => 330,
        'img_p_w' => 70,
        'img_p_h' => 70,
    ];

    public static function create_media($model, $originalFile, $storePath, $parameters)
    {
        $file = BaseService::storeFileForResize($originalFile, $storePath, $parameters);
        $req = [
            'img_f' => $file['pathF'],
            'img_d' => $file['pathD'],
            'img_t' => $file['pathT'],
            'img_m' => $file['pathM'],
            'img_prev' => $file['pathP'],
        ];

        $model->media()->create($req);

        return $model;
    }

    public static function delete_media($media)
    {
        if ($media !== null){
            if (file_exists(public_path($media->img_prev))) {
                unlink(public_path($media->img_prev));
            }
            if (file_exists(public_path($media->img_f))) {
                unlink(public_path($media->img_f));
            }
            if (file_exists(public_path($media->img_d))) {
                unlink(public_path($media->img_d));
            }
            if (file_exists(public_path($media->img_m))) {
                unlink(public_path($media->img_m));
            }
            if (file_exists(public_path($media->img_t))) {
                unlink(public_path($media->img_t));
            }
            $media->delete();
        }
        return true;
    }
}
