<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
//use Intervention\Image\ImageManagerStatic as Image;/

class BaseService
{

    public static function translit($value)
    {
        $converter = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ь' => '', 'ы' => 'y', 'ъ' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        );

        $value = mb_strtolower($value);
        $value = strtr($value, $converter);
        $value = mb_ereg_replace('[^-0-9a-z^.]', '-', $value);
        $value = mb_ereg_replace('[-]+', '-', $value);
        $value = trim($value, '-');

        return $value;
    }

    public static function storeFileForResize( $file, $storePath = '/uploads/', $parameters=null)
    {

        $fileNewName = time() . $file->getClientOriginalName();
        $fileNewName = self::translit($fileNewName);
        $manager= new ImageManager(['driver'=>'gd']);
        $image = $manager->make($file);
        $width = Image::make($image)->width();
        $height = Image::make($image)->height();
        $strF = public_path() . $storePath .'f'. $fileNewName;
        $strD = public_path() . $storePath .'d'. $fileNewName;
        $strT = public_path() . $storePath .'t'. $fileNewName;
        $strM = public_path() . $storePath .'m'. $fileNewName;
        $strP = public_path() . $storePath .'p'. $fileNewName;
        $start_img = [
            'img_f_w' => 1900,
            'img_f_h' => 900,
        ];

        if($width>$height){
            if( $start_img['img_f_w'] < $width ) {
                $image->resize($start_img['img_f_w'], null, function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strF,95);
            } else {
                $image->save($strF,95);
            }
            if( $parameters['img_d_w'] < $width ) {
                $image->resize($parameters['img_d_w'], null, function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strD,95);
            } else {
                $image->save($strD,95);
            }
            if( $parameters['img_t_w'] < $width ) {
                $image->resize($parameters['img_t_w'], null, function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strT,95);
            } else {
                $image->save($strT,95);
            }
            if( $parameters['img_m_w'] < $width ) {
                $image->resize($parameters['img_m_w'], null, function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strM,95);
            } else {
                $image->save($strM,95);
            }
            if( $parameters['img_p_w'] < $width ) {
                $image->resize($parameters['img_p_w'], null, function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strP,95);
            } else {
                $image->save($strP,95);
            }

        } else {
            if( $start_img['img_f_h'] < $height ) {
                $image->resize(null, $start_img['img_f_h'],  function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strF,95);
            } else {
                $image->save($strF,95);
            }
            if( $parameters['img_d_h'] < $height ) {
                $image->resize(null, $parameters['img_d_h'],  function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strD,95);
            } else {
                $image->save($strD,95);
            }
            if( $parameters['img_t_h'] < $height ) {
                $image->resize(null, $parameters['img_t_h'],  function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strT,95);
            } else {
                $image->save($strT,95);
            }
            if( $parameters['img_m_h'] < $height ) {
                $image->resize(null, $parameters['img_m_h'],  function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strM,95);
            } else {
                $image->save($strM,95);
            }
            if( $parameters['img_p_h'] < $height ) {
                $image->resize(null, $parameters['img_p_h'],  function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strP,95);
            } else {
                $image->save($strP,95);
            }
        }

        $data = [
            'name' => $fileNewName,
            'format' => $file->getClientOriginalExtension(),
            'pathF' => $storePath .'f'. $fileNewName,
            'pathD' =>  $storePath .'d'. $fileNewName,
            'pathT' => $storePath .'t'. $fileNewName,
            'pathM' => $storePath .'m'. $fileNewName,
            'pathP' => $storePath .'p'. $fileNewName,
        ];

        return $data;
    }

    public static function create_media($model, $originalFile, $storePath, $parameters)
    {
        $file = self::storeFileForResize($originalFile, $storePath, $parameters);
        $req = [
            'img_f' => $file['pathF'],
            'img_d' => $file['pathD'],
            'img_t' => $file['pathT'],
            'img_m' => $file['pathM'],
            'img_prev' => $file['pathP'],
        ];

        if ($model->media !== null ) {
            self::delete_media($model);
            $model->media()->update($req);
        } else {
            $model->media()->create($req);
        }
        return $model;
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
