<?php

namespace App\Services;

use App\Models\HomeSlider;

class HomeSliderService
{
    const STORE_PATH = '/uploads/';
    const PARAMETERS = [
        'img_d_w' => 1365,
        'img_d_h' => 475,
        'img_t_w' => 768,
        'img_t_h' => 475,
        'img_m_w' => 320,
        'img_m_h' => 475,
        'img_p_w' => 250,
        'img_p_h' => 90,
    ];


    public static function create_media($originalFile)
    {
        $imageExtension = ['jpg','jpeg','webp','png'];
        if (in_array($originalFile->getClientOriginalExtension(),$imageExtension)) {
            $slideRequestData['is_image'] = true;
            $slideRequestData['file_path'] = '';
            $file = BaseService::storeFileForResize($originalFile, self::STORE_PATH, self::PARAMETERS);
            $slide = HomeSlider::create($slideRequestData);
            $slide->media()->create([
                'img_f' => $file['pathF'],
                'img_d' => $file['pathD'],
                'img_t' => $file['pathT'],
                'img_m' => $file['pathM'],
                'img_prev' => $file['pathP'],
            ]);
        }else{
            $slideRequestData['is_image'] = false;
            $originalFileNewName = time() . $originalFile->getClientOriginalName();
            $originalFile->move(public_path() . self::STORE_PATH, $originalFileNewName);
            $slideRequestData['file_path'] = '/uploads/home_slides/' . $originalFileNewName;
            $slide = HomeSlider::create($slideRequestData);
        }
        return $slide;
    }

    public static function delete_media($model)
    {
        if ($model->media !== null){
            if (file_exists(public_path($model->media->img_prev))) {
                unlink(public_path($model->media->img_prev));
            }
            if (file_exists(public_path($model->media->img_f))) {
                unlink(public_path($model->media->img_f));
            }
            if (file_exists(public_path($model->media->img_d))) {
                unlink(public_path($model->media->img_d));
            }
            if (file_exists(public_path($model->media->img_m))) {
                unlink(public_path($model->media->img_m));
            }
            if (file_exists(public_path($model->media->img_t))) {
                unlink(public_path($model->media->img_t));
            }
        }
        return true;
    }

}
