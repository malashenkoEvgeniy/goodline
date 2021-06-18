<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormRequest;
use Illuminate\Support\Facades\App;

class BaseController extends Controller
{

    public function translit($value)
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

    public function storeFile($file, $storePath = '/uploads/')
    {
        $fileNewName = time() . $file->getClientOriginalName();
        $fileNewName = $this->translit($fileNewName);
        $file->move(public_path() . $storePath, $fileNewName);
        $data = ['name' => $fileNewName, 'format' => $file->getClientOriginalExtension(), 'path' => $storePath . $fileNewName];

        return $data;
    }

    public function deleteFile($path)
    {
        if ($path !== null) {
            if (file_exists(public_path($path))) {
                return unlink(public_path($path));
            }
        }
    }

    public function storeWithTranslation($model, $data, $translation)
    {
        $model = $model::create($data);
        $translation = $model->translations()->create($translation);
        return compact('model', 'translation');
    }

    public function updateTranslation($model, $translationData, $request = null)
    {
        $recordTranslation = $model->translate(); // Ищем запись по текущему языку

        if ($recordTranslation !== null && $recordTranslation->language == App::getLocale()) { //Нашли запись и текущий язык сайта совпадает с записью? да = обновляем
            $recordTranslation->update($translationData);
        } else { // создаём новый перевод
            $model = $model->translations()->create($translationData);
        }

        return $model;
    }

    public function storeImage(Request $request)
    {
        $file = $this->storeFile(request()->file('file'), $this->storePath);
        return json_encode(['location' => $file['path']]);
    }
}
